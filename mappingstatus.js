function mappingstatusmap(map_id, data_id, properties_id, edit)
{
	// definitions
	var epsg4326 = new OpenLayers.Projection("EPSG:4326");
	var symbols = {"l":{"name":"street names"}, "c":{"name":"streets"}}
	var states = {"?":"unknown", "0":"nothing", "1":"partial", "2":"nearly everything", "3":"done", "4":"double-checked", "X":"doesn't exist"}

	// subclasses
	var callback = function()
	{
		var func = arguments[0];
		var args = Array.prototype.slice.call(arguments,1);

		this.run = function()
		{
			var passedargs = Array.prototype.slice.call(arguments,0);
			var allargs = passedargs.concat(args);
			func.apply(null,allargs);
		};
	};

	var mapconfig = function(text)
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

		for (var i=0;i<lines.length;i++)
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

				// get polygon
				var words = parts[0].split(" ");
				var polygon = Array();

				for (var j=1;j<words.length;j++)
				{
					var coordinates = words[j].split(",");
					polygon[j-1]=Array(parseFloat(coordinates[0]),parseFloat(coordinates[1]));
				}

				// get status
				var words = parts[1].split(" ");
				var state = Object();

				// set default values
				for (var j in symbols) state[j]="?";

				// read states
				for (var j=1;j<words.length;j++)
				{
					var keyvalue = words[j].split("=");
					state[keyvalue[0]]=keyvalue[1];
				}

				// add to polygon list
				this.polygons[this.polygons.length]={"points":polygon,"state":state};
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
				for (j in this.polygons[i].state)
				{
					text += " "+j+"="+this.polygons[i].state[j];
				}
				text += "\n";
			}

			return text;
		}
	}

	// callbacks
	var unselectfeature = function(feature, map)
	{
		// clear properties_element
		while (map.properties_element.hasChildNodes())
		{
			map.properties_element.removeChild(map.properties_element.firstChild);
		}

		// make invisible
		map.properties_element.style.display = "none";
	}

	var selectfeature_view = function(feature, map)
	{
		// clear properties_element
		while (map.properties_element.hasChildNodes())
		{
			map.properties_element.removeChild(map.properties_element.firstChild);
		}

/*		"Wikiseite: <input type='text' id='mappingstatus_wikipage'>";
		"<br/>Beschreibung: <input type='text' id='mappingstatus_description'>"; */

		// create table
		var table = document.createElement("table");
		table.setAttribute("border","1");
		map.properties_element.appendChild(table);
		var tr = document.createElement("tr");
		table.appendChild(tr);
		for (symbol in symbols)
		{
			var td=document.createElement("td");
			state = map.config.polygons[feature.mappingstatus_polygon_index].state[symbol];
			td.appendChild(document.createTextNode(symbol+"="+state));
			tr.appendChild(td);
		}

		// make visible
		map.properties_element.style.display = "block";
	}

	var selectfeature_edit = function(feature, map)
	{
		// clear properties_element
		while (map.properties_element.hasChildNodes())
		{
			map.properties_element.removeChild(map.properties_element.firstChild);
		}

		var form = document.createElement("form");
		map.properties_element.appendChild(form);

/*		"Wikiseite: <input type='text' id='mappingstatus_wikipage'>";
		"<br/>Beschreibung: <input type='text' id='mappingstatus_description'>"; */

		// create table
		var table = document.createElement("table");
		table.setAttribute("border","1");
		form.appendChild(table);

		// header row
		var tr = document.createElement("tr");
		table.appendChild(tr);
		var td=document.createElement("td");
		tr.appendChild(td);
		for (symbol in symbols)
		{
			var td=document.createElement("th");
			td.appendChild(document.createTextNode(symbols[symbol].name));
			tr.appendChild(td);
		}

		// one row per state
		for (state in states)
		{
			var tr = document.createElement("tr");
			table.appendChild(tr);
			var td=document.createElement("th");
			td.appendChild(document.createTextNode(states[state]));
			tr.appendChild(td);

			// create radioboxes
			for (symbol in symbols)
			{
				var radiobox = document.createElement("input");
				radiobox.setAttribute("type","radio");
				radiobox.setAttribute("name",map.properties_element.id+"_"+symbol);
				radiobox.setAttribute("value",state);

				if (map.config.polygons[feature.mappingstatus_polygon_index].state[symbol]==state)
				{
					radiobox.setAttribute("checked","checked");
				}

				var radio_onchange = function(ev,map,index,symbol,state)
				{
					map.config.polygons[index].state[symbol]=state;
				}

				var cb=new callback(radio_onchange, map,feature.mappingstatus_polygon_index,symbol,state);
				radiobox.onchange=cb.run;

				var td=document.createElement("td");
				td.appendChild(radiobox);
				tr.appendChild(td);
			}
		}

		// make visible
		map.properties_element.style.display = "block";
	}

	var feature_clicked = function(feature, map)
	{
		alert(feature.mappingstatus_polynom_index);
	}

	// methods
	this.draw_map = function()
	{
		this.map_element.style.display = "block";
		this.map_element.style.width = this.config.width+"px";
		this.map_element.style.height = this.config.height+"px";
		
		var lonLat = new OpenLayers.LonLat(this.config.longitude, this.config.latitude);
		lonLat.transform( epsg4326, this.map.getProjectionObject());
		this.map.setCenter(lonLat, this.config.zoom);

		// update/insert features
		this.vectors.eraseFeatures(this.vectors.features);

		var features=Array();
		for (i in this.config.polygons)
		{
			var polygon=this.config.polygons[i];
			var geometrypoints = Array();

			for (j in polygon.points)
			{
				var lonLat = new OpenLayers.LonLat(polygon.points[j][0], polygon.points[j][1]);
				lonLat.transform( epsg4326, this.map.getProjectionObject());
				geometrypoints[j] = new OpenLayers.Geometry.Point(lonLat.lon,lonLat.lat);
			}

			features[i]=new OpenLayers.Feature.Vector(
				new OpenLayers.Geometry.Polygon(
					Array(new OpenLayers.Geometry.LinearRing(geometrypoints))
				)
			);

			// select/unselect callbacks need this to find polygon in config
			features[i].mappingstatus_polygon_index = i;
		}

		this.vectors.addFeatures(features);
	}

	this.get_config_from_map = function()
	{
		this.config.zoom = this.map.zoom;
		var centerlonlat=this.map.center.clone().transform(this.map.getProjectionObject(), epsg4326);
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
					var lonLat = new OpenLayers.LonLat(points[j].x, points[j].y);
					lonLat.transform(this.map.getProjectionObject(), epsg4326);
					polygon[j]=Array(lonLat.lon,lonLat.lat);
				}

				if (this.config.polygons[i]==null)
				{
					var state = Object();
					for (var j in symbols) state[j]="?";

					this.config.polygons[i]={"points":null,"state":state};
					this.vectors.features[i].mappingstatus_polygon_index=i;
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
	
	// constructor
	this.map_element = document.getElementById(map_id);
	this.data_element = document.getElementById(data_id);
	this.properties_element = document.getElementById(properties_id);

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

	if (edit)
	{
		// select handlers
		var selectcb = new callback(selectfeature_edit, this);
		var unselectcb = new callback(unselectfeature, this);

		var select = new OpenLayers.Control.SelectFeature(this.vectors, {onSelect:selectcb.run,onUnselect:unselectcb.run});
		this.map.addControl(select);
		select.activate();

		// update config when polygon is added
		this.vectors.events.register("featureadded", this, this.get_config_from_map);

		// editing toolbar
		this.map.addControl(new OpenLayers.Control.EditingToolbar(this.vectors));
	}
	else
	{
		// select handlers
		var selectcb = new callback(selectfeature_view, this);
		var unselectcb = new callback(unselectfeature, this);

		var select = new OpenLayers.Control.SelectFeature(this.vectors, {onSelect:selectcb.run,onUnselect:unselectcb.run,hover:true});
		this.map.addControl(select);
		select.activate();

/*		// click
		var test=function()
		{
			alert("hallo");
		}

		var control = new OpenLayers.Control();
		OpenLayers.Util.extend(control, {
			
		});
//		control.handler = new OpenLayers.Handler.Feature(control,this.vectors, {click:test});
		this.map.addControl(control);
		control.activate();*/
	}

	this.config = new mapconfig(this.data_element.value);

	this.draw_map();

	this.update_data();
}
