function MappingStatusMap(rootdir, map_id, textfield_id, statusedit_id)
{
	// DEFINITIONS
	var epsg4326 = new OpenLayers.Projection("EPSG:4326");

	// METHODS
	this.set_map_from_textfield = function()
	{
		// default values
		latitude=51.53;
		longitude=0.14;
		zoom=5;
		width=450;
		height=450;

		// clear vector layer
		this.vectors.removeFeatures(this.vectors.features);

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
			else if (words[0]=="symbols")
			{
				all_symbols = this.symbols;
				this.symbols = {};

				for (var j=1; j<words.length; j++)
				{
					symbol = words[j];
					if (!all_symbols[symbol]) continue;

					this.symbols[symbol] = all_symbols[symbol];
				}
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
				for (var j in this.symbols) feature.attributes.states[j]="";

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

		content += "symbols";
		for (symbol in this.symbols) content += " "+symbol;
		content += "\n";

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

	// CALLBACKS
	this.clear_properties = function(ev)
	{
		// clear properties_element
		while (this.properties_element.hasChildNodes())
		{
			this.properties_element.removeChild(this.properties_element.firstChild);
		}

		// make invisible
		this.properties_element.style.display = "none";
	}

	// CONSTRUCTOR

	// predefined symbols and states
	this.symbols = {
		"Labelled":"street names",
		"Car":"streets",
		"Bike":"bike paths",
		"Foot":"footpaths",
		"Transport":"public transport",
		"Public":"public buildings",
		"Fuel":"fuel stations",
		"Restaurant":"restaurants and hotels",
		"Tourist":"sights",
		"Nature":"natural areas as rivers, forest",
		"Housenumbers":"housenumbers"
	};

	this.states = {
		"":"unknown",
		"0":"nothing",
		"1":"partial",
		"2":"nearly everything",
		"3":"done",	
		"4":"double-checked",
		"X":"don't exist"
	};

	// get html elements
	this.map_element = document.getElementById(map_id);
	this.textfield_element = document.getElementById(textfield_id);

	// make textfield invisible
	this.textfield_element.style.display="none";

	// adjust position of attribution control
	var attribution = new OpenLayers.Control.Attribution({
		draw: function()
		{
			var div = OpenLayers.Control.Attribution.prototype.draw.apply(this, arguments);
			div.style.bottom = "0em";
			div.style.right = null;
			div.style.left = "3px";
			return div;
		}
	});

	// create map
	this.map = new OpenLayers.Map(map_id, {
		controls:[
			new OpenLayers.Control.Navigation(),
			new OpenLayers.Control.PanZoomBar(),
			new OpenLayers.Control.PanZoom(),
			attribution,
			new OpenLayers.Control.MousePosition({displayProjection: epsg4326})
		],
		maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34),
		maxResolution:156543.0399,
		units:'meters',
		projection: "EPSG:900913"
	});

	// add layers
	var mapniklayer = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
	this.map.addLayer(mapniklayer);

	this.vectors = new OpenLayers.Layer.Vector("Vector Layer");
	this.map.addLayer(this.vectors);

	// read textfield
	this.set_map_from_textfield();

	// preload images
	this.preloaded_images = {};
	for (symbol in this.symbols)
	{
		this.preloaded_images[symbol]={};

		for (state in this.states)
		{
			this.preloaded_images[symbol][state] = new Image();
			this.preloaded_images[symbol][state].src = rootdir+"/images/State_"+symbol+state+".png";

			var title = this.symbols[symbol]+": "+this.states[state];
			this.preloaded_images[symbol][state].setAttribute("alt", title);
			this.preloaded_images[symbol][state].setAttribute("title", title);
		}
	}

	if (statusedit_id) // editing
	{
		if (!this.edit) alert("You must load mappingstatusedit.js in order to be able to edit a map!");

		statusedit_element = document.getElementById(statusedit_id);
		this.edit(statusedit_element);
	}
	else // viewing
	{
		// StatusInfo class
		var StatusInfo = function(mappingstatusmap, status_element, label_element)
		{
			this.show_feature = function(feature)
			{
				while (this.status_element.hasChildNodes())
					this.status_element.removeChild(this.status_element.firstChild);

				while (this.label_element.hasChildNodes())
					this.label_element.removeChild(this.label_element.firstChild);

				for (symbol in this.mappingstatusmap.symbols)
				{
					state = feature.attributes.states[symbol];
					this.status_element.appendChild(this.mappingstatusmap.preloaded_images[symbol][state]);
				}

				if (feature.attributes.article)
				{
					this.label_element.style.color = "#00f";
					this.label_element.style.textDecoration = "underline";
				}
				else
				{
					this.label_element.style.color = "#000";
					this.label_element.style.textDecoration = "none";
				}

				if (feature.attributes.label)
				{
					this.label_element.appendChild(
						document.createTextNode(feature.attributes.label)
					);
					this.label_element.style.display="block";
				}
				else if (feature.attributes.article)
				{
					this.label_element.appendChild(
						document.createTextNode(feature.attributes.article)
					);
					this.label_element.style.display="block";
				}

				this.status_element.style.display="block";
			}

			this.hide = function()
			{
				this.status_element.style.display="none";
				this.label_element.style.display="none";
			}

			this.mappingstatusmap = mappingstatusmap;

			this.status_element = status_element;
			this.status_element.style.backgroundColor="#fff";

			this.label_element = label_element;
			this.label_element.style.backgroundColor="#fff";

			this.hide();
		}

		// callbacks
		var on_select = function(ev) // set scope to the SelectFeature control when registering this callback!
		{
			if (ev.feature.attributes.islink=="false")
			{
				this.unselect(ev.feature);
				return;
			}

			var link = wgArticlePath.replace('$1', ev.feature.attributes.article);
			window.location.href = link;
		}

		var on_highlight = function(ev)
		{
			this.statusinfo.show_feature(ev.feature);
		}

		var on_unhighlight = function(ev)
		{
			this.statusinfo.hide();
		}

		// styles of highlighted and selected features with and without hyperlink
		var styleMap = new OpenLayers.StyleMap({
			"default":OpenLayers.Feature.Vector.style["default"],
			"temporary":OpenLayers.Feature.Vector.style["temporary"],
			"select":OpenLayers.Feature.Vector.style["select"]
		});

		styleMap.addUniqueValueRules("temporary", "islink", {
			"true":{cursor:"pointer", fillOpacity:0.7, strokeColor:"#000", strokeWidth:2},
			"false":{cursor:""}
		});

		this.vectors.styleMap=styleMap;

		// SelectFeature controls for hovering and clicking
		var highlight = new OpenLayers.Control.SelectFeature(this.vectors, {
			hover:true,
			highlightOnly: true,
			renderIntent: "temporary"
		});
	
		var select = new OpenLayers.Control.SelectFeature(this.vectors);

		this.map.addControl(highlight);
		this.map.addControl(select);

		highlight.activate();
		select.activate();

		// hovering events
		highlight.events.on({
			"featurehighlighted": on_highlight,
			"featureunhighlighted": on_unhighlight,
			scope: this
		});

		// clicking event
		this.vectors.events.on({
			"featureselected": on_select,
			scope: select
		});

		// create div that will contain the status icons
		status_element = document.createElement("div");
		status_element.style.position = "absolute";
		status_element.style.right = "0px";
		status_element.style.top = "0px";
		status_element.style.zIndex = this.map.Z_INDEX_BASE['Popup']-1;
		this.map.viewPortDiv.appendChild(status_element);

		// create div that will contain the polygon label
		label_element = document.createElement("div");
		label_element.style.position = "absolute";
		label_element.style.right = "0px";
		label_element.style.top = "25px";
		label_element.style.zIndex = this.map.Z_INDEX_BASE['Popup']-1;
		this.map.viewPortDiv.appendChild(label_element);

		// create StatusInfo object
		this.statusinfo = new StatusInfo(this, status_element, label_element);
	}
}
