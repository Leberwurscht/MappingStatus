function mappingstatus_mapconfig(text)
{
	// default values
	this.latitude = 51.53;
	this.longitude=0.14;
	this.zoom=5;
	this.width=400;
	this.height=400;

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
	}

	this.get_text = function()
	{
		text = "latitude "+this.latitude+"\n";
		text += "longitude "+this.longitude+"\n";
		text += "zoom "+this.zoom+"\n";
		text += "width "+this.width+"\n";
		text += "height "+this.height+"\n";

		return text;
	}
}

function mappingstatus(map_id, data_id, edit)
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
	epsg4326 = new OpenLayers.Projection("EPSG:4326");
	lonLat = new OpenLayers.LonLat(config.longitude, config.latitude).transform( epsg4326, map.getProjectionObject());
	map.setCenter (lonLat, config.zoom);
}
