function mappingstatusmap(map_id, textfield_id, properties_id, edit)
{
	// definitions
	var epsg4326 = new OpenLayers.Projection("EPSG:4326");
	var symbols = {"l":{"name":"street names"}, "c":{"name":"streets"}};
	var states = {"?":"unknown", "0":"nothing", "1":"partial", "2":"nearly everything", "3":"done", "4":"double-checked", "X":"doesn't exist"};

	// methods
	this.set_map_from_textfield = function()
	{
		// default values
		latitude=51.53;
		longitude=0.14;
		zoom=5;
		width=400;
		height=400;

		// clear vector layer
		this.vectors.eraseFeatures(this.vectors.features);

		// parse textfield content
		var lines=this.textfield_element.value.split("\n");

		for (var i=0;i<lines.length;i++)
		{
			var line = lines[i];
			var words = line.split(" ");

			if (words[0]=="latitude")
			{
				var parsed = parseFloat(words[1]);
				if (!isNaN(parsed)) latitude=parsed;
			}
			else if (words[0]=="longitude")
			{
				var parsed = parseFloat(words[1]);
				if (!isNaN(parsed)) longitude=parsed;
			}
			else if (words[0]=="zoom")
			{
				var parsed = parseFloat(words[1]);
				if (!isNaN(parsed)) zoom=parsed;
			}
			else if (words[0]=="width")
			{
				var parsed = parseFloat(words[1]);
				if (!isNaN(parsed)) width=parsed;
			}
			else if (words[0]=="height")
			{
				var parsed = parseFloat(words[1]);
				if (!isNaN(parsed)) height=parsed;
			}
			else if (words[0]=="polygon")
			{
				// get label and article name
				var label="";
				var article="";

				if (line.substr(8,2)=="[[")
				{
					line = line.substr(10);
					var k = line.indexOf("]]")
					if (k==-1) continue;
					var content = line.substr(0,k);
					var j = line.indexOf("|");
					if (j==-1) article=content;
					else
					{
						article = content.substr(0,j);
						label = content.substr(j+1);
					}
					line = line.substr(k+2);
				}
				else if (line.substr(8,1)=="\"")
				{
					line = line.substr(9);
					var k = line.indexOf("\"")
					if (k==-1) continue;
					label = line.substr(0,k);
					line = line.substr(k+1);
				}
				else continue;

				// get coordinates of polygon points and add new feature
				var k = line.indexOf(":");
				if (k==-1) continue;
				var points = line.substr(0,k).replace(/^\s+/, "").replace(/\s+$/, "").split(" ");
				line = line.substr(k+1);

				var geometrypoints = [];

				for (var j=0;j<points.length;j++)
				{
					var coordinates = points[j].split(",");

					var lon = parseFloat(coordinates[0]);
					if (isNaN(lon)) continue;

					var lat = parseFloat(coordinates[1]);
					if (isNaN(lat)) continue;

					var lonLat = new OpenLayers.LonLat(lon,lat);
					lonLat.transform(epsg4326, this.map.getProjectionObject());
					geometrypoints.push( new OpenLayers.Geometry.Point(lonLat.lon,lonLat.lat) );
				}

				feature = new OpenLayers.Feature.Vector(
					new OpenLayers.Geometry.Polygon(
						Array(new OpenLayers.Geometry.LinearRing(geometrypoints))
					)
				);

				feature.attributes.label = label;
				feature.attributes.article = article;

				if (article) feature.attributes.islink="true";
				else feature.attributes.islink="false";

				feature.attributes.states={};

				this.vectors.addFeatures([feature]);

				// set default values
				for (var j in symbols) feature.attributes.states[j]="?";

				// get states
				var states = line.replace(/^\s+/, "").replace(/\s+$/, "").split(" ");

				for (var j=0;j<states.length;j++)
				{
					var tuple = states[j].split("=");
					feature.attributes.states[tuple[0]]=tuple[1];
				}
			}
		}

		this.map_element.style.display = "block";
		this.map_element.style.width = width+"px";
		this.map_element.style.height = height+"px";
		
		var lonLat = new OpenLayers.LonLat(longitude, latitude);
		lonLat.transform(epsg4326, this.map.getProjectionObject());
		this.map.setCenter(lonLat, zoom);	
	};

	this.set_textfield_from_map = function()
	{
		var content="";

		var centerlonlat=this.map.center.clone();
		centerlonlat.transform(this.map.getProjectionObject(), epsg4326);
		content += "latitude "+centerlonlat.lat+"\n";
		content += "longitude "+centerlonlat.lon+"\n";

		content += "zoom "+this.map.zoom+"\n";
		content += "width "+parseInt(this.map_element.style.width)+"\n";
		content += "height "+parseInt(this.map_element.style.height)+"\n";

		for (var i=0; i<this.vectors.features.length; i++)
		{
			var feature = this.vectors.features[i];
			if (feature.geometry.CLASS_NAME != "OpenLayers.Geometry.Polygon") continue;

			content += "polygon ";

			// label and article
			if (feature.attributes.article && feature.attributes.label)
			{
				content += "[["+feature.attributes.article+"|"+feature.attributes.label+"]]";
			}
			else if (feature.attributes.article)
			{
				content += "[["+feature.attributes.article+"]]";
			}
			else
			{
				content += "\""+feature.attributes.label+"\"";
			}

			// point coordinates
			var points = feature.geometry.components[0].components;

			for (var j=0; j<points.length; j++)
			{
				var lonLat = new OpenLayers.LonLat(points[j].x, points[j].y);
				lonLat.transform(this.map.getProjectionObject(), epsg4326);
				content += " "+lonLat.lon+","+lonLat.lat;
			}

			// states
			content += ":";

			for (var j in feature.attributes.states)
			{
				content += " "+j+"="+feature.attributes.states[j];
			}

			content += "\n";
		}

		this.textfield_element.value = content;
	};

	// callbacks
	var clear_properties = function(ev)
	{
		feature=ev.feature;

		// clear properties_element
		while (this.properties_element.hasChildNodes())
		{
			this.properties_element.removeChild(this.properties_element.firstChild);
		}

		// make invisible
		this.properties_element.style.display = "none";
	}

	// constructor
	this.map_element = document.getElementById(map_id);
	this.textfield_element = document.getElementById(textfield_id);
	this.properties_element = document.getElementById(properties_id);
	
	this.map = new OpenLayers.Map(map_id, {
		controls:[
			new OpenLayers.Control.Navigation(),
			new OpenLayers.Control.PanZoomBar(),
			new OpenLayers.Control.PanZoom(),
			new OpenLayers.Control.Attribution(),
			new OpenLayers.Control.MousePosition({displayProjection: epsg4326})
		],
		maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34),
		maxResolution:156543.0399,
		units:'meters',
		projection: "EPSG:900913"
	});

	var mapniklayer = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
	this.map.addLayer(mapniklayer);

	this.vectors = new OpenLayers.Layer.Vector("Vector Layer");
	this.map.addLayer(this.vectors);

	if (edit)
	{
		// select handlers
		var featureadded = function(ev)
		{
			ev.feature.label="";
			ev.feature.article="";
			ev.feature.attributes.islink="false";
			ev.feature.attributes.states={};

			// set default values
			for (var j in symbols) ev.feature.attributes.states[j]="?";
		};

		var featureclicked = function(ev)
		{
			// clear properties_element
			while (this.properties_element.hasChildNodes())
			{
				this.properties_element.removeChild(this.properties_element.firstChild);
			}

			// form
			var form = document.createElement("form");
			this.properties_element.appendChild(form);

			// delete button
			var button = document.createElement("input");
			button.setAttribute("type", "button");
			button.setAttribute("value", "delete");
			form.appendChild(button);

			var button_onclick = function(layer, feature)
			{
				var layer=layer;
				var feature=feature;

				this.run = function()
				{// geht noch nicht
					layer.eraseFeatures([feature]);
					clear_properties();
				}
			};

			var callback = new button_onclick(this.vectors, ev.feature);
			button.onclick = callback.run;

			// label
			var label_p = document.createElement("p");
			label_p.appendChild(document.createTextNode("Label"));
			var label = document.createElement("input");
			label.setAttribute("type", "text");
			label.setAttribute("value", ev.feature.attributes.label);
			label_p.appendChild(label);
			form.appendChild(label_p);

			var label_onblur = function(feature, element)
			{
				var feature=feature;
				var element=element;

				this.run = function()
				{
					feature.attributes.label=element.value;
				}
			};

			var callback = new label_onblur(ev.feature, label);
			label.onblur = callback.run;

			// article
			var article_p = document.createElement("p");
			article_p.appendChild(document.createTextNode("Article"));
			var article = document.createElement("input");
			article.setAttribute("type", "text");
			article.setAttribute("value", ev.feature.attributes.article);
			article_p.appendChild(article);
			form.appendChild(article_p);

			var article_onblur = function(feature, element)
			{
				var feature=feature;
				var element=element;

				this.run = function()
				{
					feature.attributes.article=element.value;
				}
			};

			var callback = new article_onblur(ev.feature, article);
			article.onblur = callback.run;

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
					radiobox.setAttribute("name",this.properties_element.id+"_"+symbol);
					radiobox.setAttribute("value",state);

					if (ev.feature.attributes.states[symbol]==state)
					{
						radiobox.setAttribute("checked","checked");
					}

					var radio_onchange = function(feature,symbol,state)
					{
						var feature=feature;
						var symbol=symbol;
						var state=state;

						this.run = function()
						{
							feature.attributes.states[symbol]=state;
						}
					};

					var callback = new radio_onchange(ev.feature,symbol,state);
					radiobox.onchange=callback.run;

					var td=document.createElement("td");
					td.appendChild(radiobox);
					tr.appendChild(td);
				}
			}

			// make visible
			this.properties_element.style.display = "block";
		};

		var select = new OpenLayers.Control.SelectFeature(this.vectors);
		this.vectors.events.on({
			"featureselected": featureclicked,
			"featureunselected": clear_properties,
			"featureadded": featureadded,
			scope: this
		});
		this.map.addControl(select);
		select.activate();

		// editing toolbar
		this.map.addControl(new OpenLayers.Control.EditingToolbar(this.vectors));
	}
	else
	{
		var featureclicked = function(ev)
		{
			if (ev.feature.attributes.islink=="false") return;

			var link = wgArticlePath.replace('$1', ev.feature.attributes.article);
			window.location.href = link;
		};

		var display_properties = function(ev)
		{
			// clear properties_element
			while (this.properties_element.hasChildNodes())
			{
				this.properties_element.removeChild(this.properties_element.firstChild);
			}

			if (ev.feature.attributes.label)
			{
				var label = document.createElement("p");
				label.appendChild(document.createTextNode(ev.feature.attributes.label));
				this.properties_element.appendChild(label);
			}
			else if (ev.feature.attributes.article)
			{
				var label = document.createElement("p");
				label.appendChild(document.createTextNode(ev.feature.attributes.article));
				this.properties_element.appendChild(label);
			}

			// create table
			var table = document.createElement("table");
			table.setAttribute("border","1");
			this.properties_element.appendChild(table);
			var tr = document.createElement("tr");
			table.appendChild(tr);
			for (var symbol in symbols)
			{
				var td=document.createElement("td");
				state = ev.feature.attributes.states[symbol];
				td.appendChild(document.createTextNode(symbol+"="+state));
				tr.appendChild(td);
			}

			// make visible
			this.properties_element.style.display = "block";
		};

		var styleMap = new OpenLayers.StyleMap({
			"default":OpenLayers.Feature.Vector.style["default"],
			"temporary":OpenLayers.Feature.Vector.style["temporary"],
			"select":OpenLayers.Feature.Vector.style["default"]
		});

		styleMap.addUniqueValueRules("temporary", "islink", {
			"true":{cursor:"pointer", fillOpacity:.7, strokeColor:"#000", strokeWidth:2},
			"false":{cursor:""}
		});

		this.vectors.styleMap=styleMap;

		var highlight = new OpenLayers.Control.SelectFeature(this.vectors, {
			hover:true,
			highlightOnly: true,
			renderIntent: "temporary"
		});
		
		highlight.events.on({
			"featurehighlighted": display_properties,
			"featureunhighlighted": clear_properties,
			scope: this
		});

		var select = new OpenLayers.Control.SelectFeature(this.vectors);
		this.vectors.events.on({"featureselected": featureclicked});

		this.map.addControl(highlight);
		this.map.addControl(select);
		highlight.activate();
		select.activate();
	}

	this.set_map_from_textfield();
}
