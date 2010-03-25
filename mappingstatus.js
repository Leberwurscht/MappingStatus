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
			var parts = line.split(":");
			var words = parts[0].split(" ");
			var polygon = Array();

			for (j=1;j<words.length;j++)
			{
				var coordinates = words[j].split(",");
				polygon[j-1]=Array(parseFloat(coordinates[0]),parseFloat(coordinates[1]));
			}
			var words = parts[1].split(" ");
			var status = Object();

			for (j=1;j<words.length;j++)
			{
				var keyvalue = words[j].split("=");
				status[keyvalue[0]]=keyvalue[1];
			}
			this.polygons[this.polygons.length]={"points":polygon,"status":status};
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
			for (j=0;j<this.polygons[i].points.length;j++)
			{
				text += " "+this.polygons[i].points[j][0]+","+this.polygons[i].points[j][1];
			}
			text += ":";
			for (j in this.polygons[i].status)
			{
				text += " "+j+"="+this.polygons[i].status[j];
			}
			text += "\n";
		}

		return text;
	}
}

var mappingstatus_epsg4326 = new OpenLayers.Projection("EPSG:4326");

function mappingstatus(map_id, data_id, properties_id, edit)
{
	this.data_element = document.getElementById(data_id);
	this.properties_element = document.getElementById(properties_id);
	this.map_element = document.getElementById(map_id);
	this.edit=edit;

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

	var unselectfeature = function(feature)
	{
		while (this.mappingstatus.properties_element.hasChildNodes())
		{
			this.mappingstatus.properties_element.removeChild(this.mappingstatus.properties_element.firstChild);
		}
	}

	var selectfeature = function(feature)
	{
		var generate_status_table = function(form,symbols,config,prefix,feature)
		{
			var states = {"?":"unbekannt","0":"nix","1":"bissl"};
			var table = document.createElement("table");
			table.setAttribute("border","1");
			form.appendChild(table);

			var tr = document.createElement("tr");
			table.appendChild(tr);
			var td=document.createElement("td");
			tr.appendChild(td);
			for (s in symbols)
			{
				var td=document.createElement("td");
				td.appendChild(document.createTextNode(s));
				tr.appendChild(td);
			}
			for (i in states)
			{
				var tr = document.createElement("tr");
				table.appendChild(tr);
				var td=document.createElement("td");
				td.appendChild(document.createTextNode(i));
				tr.appendChild(td);
				for (s in symbols)
				{
					var radiobutton = document.createElement("input");
					radiobutton.setAttribute("type","radio");
					radiobutton.setAttribute("name",prefix+s);
					radiobutton.setAttribute("value",i);
					if (feature.mappingstatus_polygon.status[s]==i)
					{
						radiobutton.setAttribute("checked","checked");
					}

					// callback to update config
					var callback = function(s,i,f)
					{
						var state=i;
						var symbol=s;
						var polygon=f.mappingstatus_polygon;

						this.run = function()
						{
							polygon.status[symbol]=state;
						}
					}

					var cb=new callback(s,i,feature);
					radiobutton.onchange=cb.run;

					var td=document.createElement("td");
					td.appendChild(radiobutton);
					tr.appendChild(td);
				}
			}
		}

		while (this.mappingstatus.properties_element.hasChildNodes())
		{
			this.mappingstatus.properties_element.removeChild(this.mappingstatus.properties_element.firstChild);
		}

		var form = document.createElement("form");
		this.mappingstatus.properties_element.appendChild(form);

		/*addselect(form,"Straßennamen","l");
		addselect(form,"Straßen","c");
		addselect(form,"Radwege","b");
		addselect(form,"Fußwege","fo");
		addselect(form,"Öffentliche Verkehrsmittel","tr");
		addselect(form,"Öffentliche Einrichtungen","p");
		addselect(form,"Tankstellen","fu");
		addselect(form,"Restaurants und Hotels","r");
		addselect(form,"Sehenswürdigkeiten","t");
		addselect(form,"Natürliche Bereiche","n");
		addselect(form,"Hausnummern","h");*/
		generate_status_table(form,{"l":"straßennamen","c":"straßen"},this.mappingstatus.config,this.mappingstatus.properties_element.name,feature);
		this.mappingstatus.properties_element.style.display = "block";
		
/*		"Wikiseite: <input type='text' id='mappingstatus_wikipage'>";
		"<br/>Beschreibung: <input type='text' id='mappingstatus_description'>"; */
	}

	if (edit)
	{
		this.map.addControl(new OpenLayers.Control.EditingToolbar(this.vectors));

		var select = new OpenLayers.Control.SelectFeature(this.vectors, {onSelect:selectfeature,onUnselect:unselectfeature});
		select.mappingstatus = this;
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

			for (j in polygon.points)
			{
				var lonLat = new OpenLayers.LonLat(polygon.points[j][0], polygon.points[j][1]);
				lonLat.transform( mappingstatus_epsg4326, this.map.getProjectionObject());
				geometrypoints[j] = new OpenLayers.Geometry.Point(lonLat.lon,lonLat.lat);
			}

			features[i]=new OpenLayers.Feature.Vector(
				new OpenLayers.Geometry.Polygon(
					Array(new OpenLayers.Geometry.LinearRing(geometrypoints))
				)
			);

			polygon.feature=features[i];
			polygon.feature.mappingstatus_polygon=polygon;
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
				}
				this.config.polygons[i].points=polygon;
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
