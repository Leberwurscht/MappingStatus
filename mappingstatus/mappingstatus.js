/*
 * MappingStatusMap is a Mediawiki extention that allows one to insert maps into
 * a wiki page, mark areas and set flags for how well that area is mapped in
 * Openstreetmap.
 *
 * Copyright 2010 Maximilian Hoegner <pbmaxi@hoegners.de>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

function MappingStatusMap(rootdir, map_id, textfield_id, statusedit_id)
{
	// I18N
	if (!this.translate_message)
	{
		this.translate_message = function (message)
		{
			return message;
		};
	}

	var wfMsg = this.translate_message;

	// DEFINITIONS
	var epsg4326 = new OpenLayers.Projection("EPSG:4326");
	var layers = {
		"mapnik":OpenLayers.Layer.OSM.Mapnik,
		"osmarender":OpenLayers.Layer.OSM.Osmarender,
		"cyclemap":OpenLayers.Layer.OSM.CycleMap
	};

	// METHODS
	this.set_layer = function(layer)
	{
		if (this.layer)	return false;

		if (!layers[layer]) layer="mapnik";
		this.layer = layer;

		var mapclass = layers[this.layer];
		var map_layer = new mapclass("Map");
		this.map.addLayer(map_layer);
		return true;
	}

	this.set_map_from_textfield = function()
	{
		// default values
		latitude=51.53;
		longitude=0.14;
		zoom=5;
		width=450;
		height=450;

		// clean layers
		while (this.map.layers.length) this.map.removeLayer(this.map.layers[0]);
		this.layer = null;

		// set up vector layer
		this.vectors = new OpenLayers.Layer.Vector("Vector Layer");

		this.map.addLayer(this.vectors);

		// parse textfield content
		var lines=this.textfield_element.value.split("\n");

		for (var i=0;i<lines.length;i++)
		{
			var line = lines[i].replace(/^\s+/, "").replace(/\s+$/, "");
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
			else if (words[0]=="layer")
			{
				if (words[1] in layers)
				{
					var success = this.set_layer(words[1]);
					if (!success)
					{
						var error = document.createElement("strong");
						error.appendChild(document.createTextNode(wfMsg("layer_error")));
						error.style.color = "#f00";
						this.map_element.parentNode.insertBefore(error, this.map_element);
					}
				}
			}
			else if (words[0]=="symbols")
			{
				var all_symbols = this.symbols;
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
				if (!this.layer) this.set_layer();

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

		if (!this.layer) this.set_layer();

		// set size
		this.map_element.style.width = width+"px";
		this.map_element.style.height = height+"px";

		// set center and zoom
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

		content += "layer "+this.layer+"\n";

		content += "symbols";
		for (var symbol in this.symbols) content += " "+symbol;
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

	this.add_legend = function(editlink_id)
	{
		var legend;
		var legendlink;

		var sample;
		for (var symbol in this.symbols)
		{
			sample=symbol;
			break;
		}

		if (sample)
		{
			// make legend
			var legend_id = this.map_element.getAttribute("id")+"_legend";
			legend = document.createElement("div");
			legend.style.display="none";
			legend.setAttribute("id", legend_id);

			var container = document.createElement("table");
			container.setAttribute("style", "border: 5px solid #eee;");
			legend.appendChild(container);

			var containertr = document.createElement("tr");
			container.appendChild(containertr);

			var containertd = document.createElement("td");
			containertd.setAttribute("style", "vertical-align:top; padding: 1em;");
			containertr.appendChild(containertd);
			var table = document.createElement("table");
			containertd.appendChild(table);

			var caption = document.createElement("caption");
			caption.setAttribute("style", "font-weight:bold;");
			caption.appendChild(document.createTextNode(wfMsg("states")));
			table.appendChild(caption);

			for (var state in this.states)
			{
				var tr = document.createElement("tr");
				table.appendChild(tr);

				var th = document.createElement("th");
				tr.appendChild(th);

				var img = new Image();
				img.src = this.preloaded_images[sample][state].src;
				img.setAttribute("alt",state);
				th.appendChild(img);

				var td = document.createElement("td");
				td.appendChild(document.createTextNode(wfMsg(this.states[state])));
				tr.appendChild(td);
			}

			var containertd = document.createElement("td");
			containertd.setAttribute("style", "vertical-align:top; padding: 1em;");
			containertr.appendChild(containertd);
			var table = document.createElement("table");
			containertd.appendChild(table);

			var caption = document.createElement("caption");
			caption.setAttribute("style", "font-weight:bold;");
			caption.appendChild(document.createTextNode(wfMsg("symbols")));
			table.appendChild(caption);

			for (var symbol in this.symbols)
			{
				var tr = document.createElement("tr");
				table.appendChild(tr);

				var th = document.createElement("th");
				tr.appendChild(th);

				var img = new Image();
				img.src = this.preloaded_images[symbol][""].src;
				img.setAttribute("alt",symbol);
				th.appendChild(img);

				var td = document.createElement("td");
				td.appendChild(document.createTextNode(wfMsg(this.symbols[symbol])));
				tr.appendChild(td);
			}

			// make link for buttons div
			legendlink = document.createElement("a");
			legendlink.setAttribute("href","#"+legend_id);
			legendlink.appendChild(document.createTextNode(wfMsg("legend")));

			// callback for link
			var toggle_visibility = function(element)
			{
				var element = element;

				this.run = function()
				{
					if (element.style.display=="none") element.style.display = "block";
					else element.style.display = "none";
				};
			};

			var callback = new toggle_visibility(legend);
			legendlink.onclick = callback.run;
		}

		// make buttons div
		var buttons = document.createElement("div");
		buttons.setAttribute("style","background-color:#eee; text-align:right;");
		buttons.style.width = this.map_element.style.width;

		if (legendlink)
		{
			buttons.appendChild(legendlink);

			if (editlink_id)
			{
				buttons.appendChild(document.createTextNode(" | "));
				buttons.appendChild(document.getElementById(editlink_id));
			}
		}
		else if (editlink_id)
		{
			buttons.appendChild(document.getElementById(editlink_id));
		}

		// place buttons div and legend below map
		if (this.map_element.nextSibling)
		{
			if (legend) this.map_element.parentNode.insertBefore(legend, this.map_element.nextSibling);
			this.map_element.parentNode.insertBefore(buttons, this.map_element.nextSibling);
		}
		else
		{
			this.map_element.parentNode.appendChild(buttons);
			if (legend) this.map_element.parentNode.appendChild(legend);
		}
	}

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

	// predefined symbols and states, mapping to i18n messages
	this.symbols = {
		"Labelled":"symbol_labelled",
		"Car":"symbol_car",
		"Bike":"symbol_bike",
		"Foot":"symbol_foot",
		"Transport":"symbol_transport",
		"Public":"symbol_public",
		"Fuel":"symbol_fuel",
		"Restaurant":"symbol_restaurant",
		"Tourist":"symbol_tourist",
		"Nature":"symbol_nature",
		"Housenumbers":"symbol_housenumbers",
		"Wheelchair":"symbol_wheelchair"
	};

	this.states = {
		"":"state_unknown",
		"0":"state_0",
		"1":"state_1",
		"2":"state_2",
		"3":"state_3",	
		"4":"state_4",
		"X":"state_X"
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

	// read textfield
	this.set_map_from_textfield();

	// preload images
	this.preloaded_images = {};
	for (var symbol in this.symbols)
	{
		this.preloaded_images[symbol]={};

		for (var state in this.states)
		{
			this.preloaded_images[symbol][state] = new Image();
			this.preloaded_images[symbol][state].src = rootdir+"/images/State_"+symbol+state+".png";

			var title = wfMsg(this.symbols[symbol])+": "+wfMsg(this.states[state]);
			this.preloaded_images[symbol][state].setAttribute("alt", title);
			this.preloaded_images[symbol][state].setAttribute("title", title);
		}
	}

	if (statusedit_id) // editing
	{
		if (!this.edit)
		{
			var error = document.createElement("strong");
			error.appendChild(document.createTextNode(wfMsg("edit_script_error")));
			error.style.color = "#f00";
			this.map_element.parentNode.insertBefore(error, this.map_element);
		}
		else
		{
			statusedit_element = document.getElementById(statusedit_id);
			this.edit(statusedit_element);
		}
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

				for (var symbol in this.mappingstatusmap.symbols)
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
