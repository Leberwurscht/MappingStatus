mappingstatus.prototype.edit = function(properties_element)
{

	var editingwindow = function()
	{
		// methods
		// callbacks
		// contructor
		this.element = document.createElement("form");
	}


	// select handlers
	var featureadded = function(ev)
	{
		if (ev.feature.attributes.states) return;

		ev.feature.attributes.label="";
		ev.feature.attributes.article="";
		ev.feature.attributes.islink="false";
		ev.feature.attributes.states={};

		// set default values
		for (var j in symbols) ev.feature.attributes.states[j]="";
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

		var button_onclick = function(scope, control, feature)
		{
			var scope=scope;
			var control=control;
			var feature=feature;

			this.run = function()
			{
				control.unselect(feature);
				scope.vectors.removeFeatures([feature]);
				scope.clear_properties();
			}
		};

		var callback = new button_onclick(this, select, ev.feature);
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

		headers = {}
		for (symbol in symbols)
		{
			headers[symbol]=document.createElement("th");
//				td.appendChild(document.createTextNode(symbols[symbol]));
			var state=ev.feature.attributes.states[symbol];
			headers[symbol].appendChild(this.images[symbol][state]);
			tr.appendChild(headers[symbol]);
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

				var radio_onchange = function(feature,images,header,symbol,state)
				{
					var feature=feature;
					var images=images;
					var header=header;
					var symbol=symbol;
					var state=state;

					this.run = function()
					{
						feature.attributes.states[symbol]=state;
						header.removeChild(header.firstChild);
						header.appendChild(images[symbol][state]);
					}
				};

				var callback = new radio_onchange(ev.feature,this.images,headers[symbol],symbol,state);
				radiobox.onchange=callback.run;

				var td=document.createElement("td");
				td.appendChild(radiobox);
				tr.appendChild(td);
			}
		}

		// make visible
		this.properties_element.style.display = "block";
	};

	// properties class
	var featureproperties = function(element)
	{
		this.set_feature = function(feature)
		{
			
		}

		// constructor
		this.form = document.createElement("form");
		this.form.style.border="1px solid #000";
		this.form.style.backgroundColor="#ccc";
		element.appendChild(this.form);

		var header = document.createElement("h4");
		header.appendChild(document.createTextNode("Edit Polygon"));
	};

	// callbacks
	var on_select = function(ev)
	{
		this.properties.set_feature(ev.feature);
	};

	var on_unselect = function(ev)
	{
		this.properties.hide();
	};

	var on_add = function(ev) // set default values for new features
	{
		if (ev.feature.attributes.states) return;

		ev.feature.attributes.label="";
		ev.feature.attributes.article="";
		ev.feature.attributes.islink="false";
		ev.feature.attributes.states={};

		// set default values
		for (var j in symbols) ev.feature.attributes.states[j]="";
	};

	// create properties object
	this.properties = new featureproperties(properties_element);

	// set up SelectFeature control
	this.editSelectControl = new OpenLayers.Control.SelectFeature(this.vectors);
	this.map.addControl(this.editSelectControl);
	this.editSelectControl.activate();

	// register callbacks
	this.vectors.events.on({
		"featureselected": on_select,
		"featureunselected": on_unselect,
		"featureadded": on_add,
		scope: this
	});

	// set up editing toolbar
	var navigation = new OpenLayers.Control.Navigation();
	var polygon = new OpenLayers.Control.DrawFeature(this.vectors, OpenLayers.Handler.Polygon, {'displayClass': 'olControlDrawFeaturePolygon'});
	var panel = new OpenLayers.Control.Panel({defaultControl: navigation, displayClass: 'olControlEditingToolbar'});
	panel.addControls([navigation,polygon]);
	this.map.addControl(panel);
}
