MappingStatusMap.prototype.edit = function(statusedit_element)
{
	// I18N
	var wfMsg = this.translate_message;

	// StatusEdit class
	var StatusEdit = function(mappingstatusmap, statusedit_element)
	{
		// METHODS
		this.show_feature = function(feature)
		{
			this.update_feature();

			this.feature = feature;
			this.states = {};

			this.label_element.value = feature.attributes.label;
			this.article_element.value = feature.attributes.article;

			for (symbol in mappingstatusmap.symbols)
			{
				// set image
				if (this.headers[symbol].hasChildNodes())
					this.headers[symbol].removeChild(this.headers[symbol].firstChild);

				var state = feature.attributes.states[symbol];
				this.states[symbol]=state;
				this.headers[symbol].appendChild(this.mappingstatusmap.preloaded_images[symbol][state]);

				// set radiobox
				this.radioboxes[state][symbol].checked=true;
			}

			this.form.style.display="block";
		};

		this.hide = function()
		{
			this.update_feature();

			this.feature = null;
			this.form.style.display="none";
		};

		this.update_feature = function()
		{
			if (!this.feature) return;

			this.feature.attributes.states = this.states;
			this.feature.attributes.label = this.label_element.value;
			this.feature.attributes.article = this.article_element.value;
		};

		// CONSTRUCTOR
		this.mappingstatusmap = mappingstatusmap;

		this.form = document.createElement("form");
		this.formname = statusedit_element.getAttribute("id");
		this.form.setAttribute("name", this.formname);
		this.form.style.border="1px solid #000";
		this.form.style.backgroundColor="#ccc";

		// delete button
		var button = document.createElement("input");
		button.setAttribute("type", "button");
		button.setAttribute("value", wfMsg("delete_polygon"));
		button.setAttribute("style", "float:right;");
		this.form.appendChild(button);

		var on_delete = function(statusedit)
		{
			var statusedit=statusedit;

			this.run = function()
			{
				if (!statusedit.feature) return;

				// unselect will result in this.hide being executed, so prevent
				// this.update_feature from running by voiding statusedit.feature
				feature = statusedit.feature;
				statusedit.feature = null;

				statusedit.mappingstatusmap.editSelectControl.unselect(feature);
				statusedit.mappingstatusmap.vectors.removeFeatures([feature]);
			};
		};
		
		var callback = new on_delete(this);
		button.onclick = callback.run;

		// header
		var header = document.createElement("h3");
		header.appendChild(document.createTextNode(wfMsg("edit_polygon")));
		this.form.appendChild(header);

		// table for text entries
		var table = document.createElement("table");
		table.style.backgroundColor="#ccc";
		table.setAttribute("border","0");
		this.form.appendChild(table);

		// label
		var tr = document.createElement("tr");
		table.appendChild(tr);
		var td = document.createElement("td");
		tr.appendChild(td);
		var label = document.createElement("label");
		label.appendChild(document.createTextNode(wfMsg("label")));
		td.appendChild(label);
		var td = document.createElement("td");
		tr.appendChild(td);
		this.label_element = document.createElement("input");
		this.label_element.setAttribute("type", "text");
		td.appendChild(this.label_element);

		// article
		var tr = document.createElement("tr");
		table.appendChild(tr);
		var td = document.createElement("td");
		tr.appendChild(td);
		var label = document.createElement("label");
		label.appendChild(document.createTextNode(wfMsg("article")));
		td.appendChild(label);
		var td = document.createElement("td");
		tr.appendChild(td);
		this.article_element = document.createElement("input");
		this.article_element.setAttribute("type", "text");
		td.appendChild(this.article_element);

		// -- status table --

		var header = document.createElement("h4");
		header.appendChild(document.createTextNode(wfMsg("status")));
		this.form.appendChild(header);

		var table = document.createElement("table");
		table.style.backgroundColor="#ccc";
		table.setAttribute("border","0");
		this.form.appendChild(table);

		// header row
		var tr = document.createElement("tr");
		table.appendChild(tr);
		var td = document.createElement("td");
		tr.appendChild(td);

		this.headers = {}
		for (symbol in this.mappingstatusmap.symbols)
		{
			this.headers[symbol]=document.createElement("th");
			tr.appendChild(this.headers[symbol]);
		}

		// radioboxes, one row per state
		this.radioboxes={};

		for (state in this.mappingstatusmap.states)
		{
			var tr = document.createElement("tr");
			table.appendChild(tr);

			var th = document.createElement("th");
			th.style.textAlign="right";
			tr.appendChild(th);

			th.appendChild(document.createTextNode(wfMsg(this.mappingstatusmap.states[state])));

			this.radioboxes[state]={};
			// create radioboxes
			for (symbol in this.mappingstatusmap.symbols)
			{
				this.radioboxes[state][symbol] = document.createElement("input");
				this.radioboxes[state][symbol].setAttribute("type", "radio");
				this.radioboxes[state][symbol].setAttribute("name", this.formname+"_status_"+symbol);
				this.radioboxes[state][symbol].setAttribute("value", state);

				var td = document.createElement("td");
				td.appendChild(this.radioboxes[state][symbol]);
				td.style.textAlign="center";
				tr.appendChild(td);

				// radiobox callback
				var radio_onchange = function(statusedit,symbol,state)
				{
					var statusedit=statusedit;
					var symbol=symbol;
					var state=state;

					this.run = function()
					{
						// update internal states object
						statusedit.states[symbol] = state;

						// update image
						statusedit.headers[symbol].removeChild(statusedit.headers[symbol].firstChild);
						statusedit.headers[symbol].appendChild(statusedit.mappingstatusmap.preloaded_images[symbol][state]);
					}
				};

				var callback = new radio_onchange(this, symbol, state);
				this.radioboxes[state][symbol].onchange = callback.run;
			}
		}

		this.hide();

		statusedit_element.appendChild(this.form);
	};

	// callbacks
	var on_select = function(ev)
	{
		this.statusedit.show_feature(ev.feature);
	};

	var on_unselect = function(ev)
	{
		this.statusedit.hide();
	};

	var on_add = function(ev) // set default values for new features
	{
		if (ev.feature.attributes.states) return;

		ev.feature.attributes.label="";
		ev.feature.attributes.article="";
		ev.feature.attributes.islink="false";
		ev.feature.attributes.states={};

		// set default values
		for (var j in this.symbols) ev.feature.attributes.states[j]="";
	};

	// create StatusEdit object
	this.statusedit = new StatusEdit(this, statusedit_element);

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

MappingStatusMap.prototype.onsubmit = function()
{
	this.statusedit.hide();
	this.set_textfield_from_map();
	return true;
}
