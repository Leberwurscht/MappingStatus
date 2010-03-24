
//var mappingstatusmaps=Object();
//var mappingstatusvectors=Object();
//var mappingstatusconfigs=Object();

function mappingstatus_mapconfig(text)
{
	// default values
	this.latitude = 51.53;
	this.longitude=0.14;
	this.zoom=5;
	this.width=400;
	this.height=400;
	this.polygons=Array();

	// parse data
	lines=text.split("\n");

	for (i=0;i<lines.length;i++)
	{
		line = lines[i];
		words = line.split(" ");

		if (words[0]=="latitude") this.latitude = parseFloat(words[1]);
		else if (words[0]=="longitude") this.longitude = parseFloat(words[1]);
		else if (words[0]=="zoom") this.zoom = parseFloat(words[1]);
		else if (words[0]=="width") this.width = parseFloat(words[1]);
		else if (words[0]=="height") this.height = parseFloat(words[1]);
//		else if (words[0]=="polygon") this.height = parseFloat(words[1]);
	}

	this.get_text = function()
	{
		text = "latitude "+this.latitude+"\n";
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

/*function updatetest(data_id)
{
	map=mappingstatusmaps[data_id];
	config=mappingstatusconfigs[data_id];

	config.zoom = map.zoom;
	epsg4326 = new OpenLayers.Projection("EPSG:4326");
	centerlonlat=map.center.transform(map.getProjectionObject(), epsg4326);
	config.longitude=centerlonlat.lon;
	config.latitude=centerlonlat.lat;

	data_element = document.getElementById(data_id);
	data_element.value = config.get_text();
}

function mappingstatusold(map_id, data_id, edit)
{
	data_element = document.getElementById(data_id);
	config = new mappingstatus_mapconfig(data_element.value);
	data_element.value = config.get_text();

	map_element = document.getElementById(map_id);
	map_element.style.display = "block";
	map_element.style.width = config.width+"px";
	map_element.style.height = config.height+"px";

	map = new OpenLayers.Map(map_id, {
		controls:[
			new OpenLayers.Control.Navigation(),
			new OpenLayers.Control.PanZoomBar(),
			new OpenLayers.Control.PanZoom(),
			new OpenLayers.Control.Attribution()],
		maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34),
		maxResolution:156543.0399, units:'meters', projection: "EPSG:900913"
	});

	layer = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
	map.addLayer(layer);

	vectors = new OpenLayers.Layer.Vector("Vector Layer");
	map.addLayer(vectors);

	if (edit)
	{
		map.addControl(new OpenLayers.Control.EditingToolbar(vectors));
	}

	epsg4326 = new OpenLayers.Projection("EPSG:4326");
	lonLat = new OpenLayers.LonLat(config.longitude, config.latitude).transform( epsg4326, map.getProjectionObject());
	map.setCenter (lonLat, config.zoom);

	mappingstatusmaps[data_id]=map;
	mappingstatusvectors[data_id]=vectors;
	mappingstatusconfigs[data_id]=config;
}*/

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
			new OpenLayers.Control.MousePosition()
		],
		maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34),
		maxResolution:156543.0399, units:'meters', projection: "EPSG:900913"
	});

	var layer = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
	this.map.addLayer(layer);

	this.vectors = new OpenLayers.Layer.Vector("Vector Layer");
	this.map.addLayer(this.vectors);

	if (edit)
	{
		this.map.addControl(new OpenLayers.Control.EditingToolbar(this.vectors));
	}

	this.config = new mappingstatus_mapconfig(this.data_element.value);

	this.set_properties = function()
	{
		this.map_element.style.display = "block";
		this.map_element.style.width = this.config.width+"px";
		this.map_element.style.height = this.config.height+"px";
		
		var lonLat = new OpenLayers.LonLat(this.config.longitude, this.config.latitude).transform( mappingstatus_epsg4326, this.map.getProjectionObject());
		this.map.setCenter(lonLat, this.config.zoom);
	}

	this.get_config = function()
	{
		this.config.zoom = this.map.zoom;
		var centerlonlat=this.map.center.clone().transform(this.map.getProjectionObject(), mappingstatus_epsg4326);
		this.config.longitude=centerlonlat.lon;
		this.config.latitude=centerlonlat.lat;

		for (i=0; i<this.vectors.features.length; i++)
		{
			geometry=this.vectors.features[i].geometry;
			if (geometry.CLASS_NAME=="OpenLayers.Geometry.Polygon")
			{
				polygon=Array();
				points = geometry.components[0].components;

				for (j=0; j<points.length; j++)
				{
					lonLat = new OpenLayers.LonLat(points[j].x, points[j].y).transform(this.map.getProjectionObject(), mappingstatus_epsg4326);
					polygon[j]=Array(lonLat.lat,lonLat.lon);
					this.config.polygons[i]=polygon;
				}
			}
		}
	}

	this.update_data = function()
	{
		this.get_config();
		this.data_element.value = this.config.get_text();
	}

	this.set_properties();
	this.update_data();
}
