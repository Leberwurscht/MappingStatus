function mappingstatus_mapconfig(text)
{
	// default values
	this.latitude=51.53;
	this.longitude=0.14;
	this.zoom=5;
	this.width=400;
	this.height=400;
	this.polygons=Array();

	// parse data
	var lines=text.split("\n");

	for (i=0;i<lines.length;i++)
	{
		var line = lines[i];
		var words = line.split(" ");

		if (words[0]=="latitude") this.latitude = parseFloat(words[1]);
		else if (words[0]=="longitude") this.longitude = parseFloat(words[1]);
		else if (words[0]=="zoom") this.zoom = parseFloat(words[1]);
		else if (words[0]=="width") this.width = parseFloat(words[1]);
		else if (words[0]=="height") this.height = parseFloat(words[1]);
		else if (words[0]=="polygon")
		{
			var polygon = Array();

			for (j=1;j<words.length;j++)
			{
				var coordinates = words[j].split(",");
				polygon[j-1]=Array(parseFloat(coordinates[0]),parseFloat(coordinates[1]));
			}
			this.polygons[this.polygons.length]=polygon;
		}
	}

	this.get_text = function()
	{
		var text = "latitude "+this.latitude+"\n";
		text += "longitude "+this.longitude+"\n";
		text += "zoom "+this.zoom+"\n";
		text += "width "+this.width+"\n";
		text += "height "+this.height+"\n";

		for (i=0;i<this.polygons.length;i++)
		{
			text += "polygon"
			for (j=0;j<this.polygons[i].length;j++)
			{
				text += " "+this.polygons[i][j][0]+","+this.polygons[i][j][1];
			}
			text += "\n";
		}

		return text;
	}
}

var mappingstatus_epsg4326 = new OpenLayers.Projection("EPSG:4326");

function mappingstatus(map_id, data_id, edit)
{
	this.data_element = document.getElementById(data_id);
	this.map_element = document.getElementById(map_id);

	this.map = new OpenLayers.Map(map_id, {
		controls:[
			new OpenLayers.Control.Navigation(),
			new OpenLayers.Control.PanZoomBar(),
			new OpenLayers.Control.PanZoom(),
			new OpenLayers.Control.Attribution(),
			new OpenLayers.Control.MousePosition({displayProjection:new OpenLayers.Projection("EPSG:4326")})
		],
		maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34),
		maxResolution:156543.0399, units:'meters', projection: "EPSG:900913"
	});

	var layer = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
	this.map.addLayer(layer);

	this.vectors = new OpenLayers.Layer.Vector("Vector Layer");
	this.map.addLayer(this.vectors);

	this.select = function(feature)
	{
		
	}

	if (edit)
	{
		this.map.addControl(new OpenLayers.Control.EditingToolbar(this.vectors));

		var select = new OpenLayers.Control.SelectFeature(this.vectors, {onSelect:this.select});
		this.map.addControl(select);
		select.activate();
	}

	this.config = new mappingstatus_mapconfig(this.data_element.value);

	this.set_properties = function()
	{
		this.map_element.style.display = "block";
		this.map_element.style.width = this.config.width+"px";
		this.map_element.style.height = this.config.height+"px";
		
		var lonLat = new OpenLayers.LonLat(this.config.longitude, this.config.latitude).transform( mappingstatus_epsg4326, this.map.getProjectionObject());
		this.map.setCenter(lonLat, this.config.zoom);

		this.vectors.eraseFeatures(this.vectors.features);
		var features=Array();
		for (i in this.config.polygons)
		{
			var polygon=this.config.polygons[i];
			var geometrypoints = Array();

			for (j in polygon)
			{
				var lonLat = new OpenLayers.LonLat(polygon[j][0], polygon[j][1]);
				lonLat.transform( mappingstatus_epsg4326, this.map.getProjectionObject());
				geometrypoints[j] = new OpenLayers.Geometry.Point(lonLat.lon,lonLat.lat);
			}

			features[i]=new OpenLayers.Feature.Vector(
				new OpenLayers.Geometry.Polygon(
					Array(new OpenLayers.Geometry.LinearRing(geometrypoints))
				)
			);
		}
		this.vectors.addFeatures(features);
	}

	this.get_config_from_map = function()
	{
		this.config.zoom = this.map.zoom;
		var centerlonlat=this.map.center.clone().transform(this.map.getProjectionObject(), mappingstatus_epsg4326);
		this.config.longitude=centerlonlat.lon;
		this.config.latitude=centerlonlat.lat;

		for (i=0; i<this.vectors.features.length; i++)
		{
			var geometry = this.vectors.features[i].geometry;

			if (geometry.CLASS_NAME=="OpenLayers.Geometry.Polygon")
			{
				var polygon=Array();
				var points = geometry.components[0].components;

				for (j=0; j<points.length; j++)
				{
					var lonLat = new OpenLayers.LonLat(points[j].x, points[j].y).transform(this.map.getProjectionObject(), mappingstatus_epsg4326);
					polygon[j]=Array(lonLat.lon,lonLat.lat);
					this.config.polygons[i]=polygon;
				}
			}
		}
	}

	this.update_data = function()
	{
		this.get_config_from_map();
		this.data_element.value = this.config.get_text();
	}

	this.set_properties();
	this.update_data();
}
