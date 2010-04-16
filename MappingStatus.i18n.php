<?php
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
 * @addtogroup Extensions 
 */

$messages = array();

// @author Maximilian Hoegner <pbmaxi@hoegners.de>
$messages['en'] = array(
	'mappingstatus_desc' => 'Adds a new tag for including maps in wiki pages where you can mark regions and specify how well they are mapped in openstreetmap.',
	'mappingstatus_noid' => 'MAPPINGSTATUS ERROR: ID NOT SET.',
	'mappingstatus_edit' => 'Edit',
	'mappingstatus_edittitle' => 'Edit mapping status',
	'mappingstatus_noarticle' => 'No article to edit.',
	'mappingstatus_summary' => 'updated map with ID $1',
	'mappingstatus_permerror' => 'You don\'t have the permission to edit this map.',
	'mappingstatus_save' => 'Save',
	'mappingstatus_states' => 'States',
	'mappingstatus_symbols' => 'Symbols',
	'mappingstatus_state_unknown' => 'unknown',
	'mappingstatus_state_0' => 'nothing',
	'mappingstatus_state_1' => 'partial',
	'mappingstatus_state_2' => 'nearly everything',
	'mappingstatus_state_3' => 'done',
	'mappingstatus_state_4' => 'double-checked',
	'mappingstatus_state_X' => 'don\'t exist',
	'mappingstatus_symbol_labelled' => 'street names',
	'mappingstatus_symbol_car' => 'streets',
	'mappingstatus_symbol_bike' => 'bike paths',
	'mappingstatus_symbol_foot' => 'footpaths',
	'mappingstatus_symbol_transport' => 'public transport',
	'mappingstatus_symbol_public' => 'public buildings',
	'mappingstatus_symbol_fuel' => 'fuel stations',
	'mappingstatus_symbol_restaurant' => 'restaurants and hotels',
	'mappingstatus_symbol_tourist' => 'sights',
	'mappingstatus_symbol_nature' => 'natural areas as rivers, forest',
	'mappingstatus_symbol_housenumbers' => 'housenumbers',
	'mappingstatus_legend' => 'Legend',
	'mappingstatus_delete_polygon' => 'delete polygon',
	'mappingstatus_edit_polygon' => 'Edit Polygon',
	'mappingstatus_label' => 'Label: ',
	'mappingstatus_article' => 'Article: ',
	'mappingstatus_status' => 'status',
	'mappingstatus_layer_error' => 'MappingStatus Error: \'layer\' keyword must show up before any polygons!'
);

// @author Maximilian Hoegner <pbmaxi@hoegners.de>
$messages['de'] = array(
	'mappingstatus_desc' => 'Fügt ein neues Tag hinzu, durch das Karten in Wiki-Seiten eingebunden werden können. Man kann Bereiche markieren und festlegen, wie gut diese in OpenStreetMap gemappt sind.',
	'mappingstatus_noid' => 'FEHLER IN MAPPINGSTATUS: KEINE ID GESETZT.',
	'mappingstatus_edit' => 'Bearbeiten',
	'mappingstatus_edittitle' => 'Mapping-Status bearbeiten',
	'mappingstatus_noarticle' => 'Kein Artikel zum Editieren angegeben.',
	'mappingstatus_summary' => 'Karte mit der ID $1 aktualisiert',
	'mappingstatus_permerror' => 'Keine Erlaubnis, diese Karte zu bearbeiten.',
	'mappingstatus_save' => 'Speichern',
	'mappingstatus_states' => 'Farben',
	'mappingstatus_symbols' => 'Symbole',
	'mappingstatus_state_unknown' => 'unbekannt',
	'mappingstatus_state_0' => 'nichts',
	'mappingstatus_state_1' => 'teilweise Daten',
	'mappingstatus_state_2' => 'fast alles',
	'mappingstatus_state_3' => 'fertig',
	'mappingstatus_state_4' => 'doppelt überprüft',
	'mappingstatus_state_X' => 'existiert nicht',
	'mappingstatus_symbol_labelled' => 'Straßennamen',
	'mappingstatus_symbol_car' => 'Straßen',
	'mappingstatus_symbol_bike' => 'Fahrradwege',
	'mappingstatus_symbol_foot' => 'Fußwege',
	'mappingstatus_symbol_transport' => 'Öffentiche Verkehrsmittel',
	'mappingstatus_symbol_public' => 'Öffentliche Einrichtungen',
	'mappingstatus_symbol_fuel' => 'Tankstellen',
	'mappingstatus_symbol_restaurant' => 'Restaurants und Hotels',
	'mappingstatus_symbol_tourist' => 'Sehenswürdigkeiten',
	'mappingstatus_symbol_nature' => 'Natürliche Bereiche wie Flüsse und Wälder',
	'mappingstatus_symbol_housenumbers' => 'Hausnummern',
	'mappingstatus_legend' => 'Legende',
	'mappingstatus_delete_polygon' => 'Polygon löschen',
	'mappingstatus_edit_polygon' => 'Polygon bearbeiten',
	'mappingstatus_label' => 'Titel: ',
	'mappingstatus_article' => 'Artikel: ',
	'mappingstatus_status' => 'Status',
	'mappingstatus_layer_error' => 'Fehler in MappingStatus: Das Schlüsselwort \'layer\' muss vor allen Polygon-Definitionen kommen!'
);

// @author Merritt
$messages['fr'] = array(
	'mappingstatus_desc' => 'Ajoute un nouveau tag, par lequel des cartes peuvent être intégrés dans les sites du wiki. On peux marquer des régions et déterminer comment bien ils sont réprésentés dans Openstreetmap.',
	'mappingstatus_noid' => 'FAUTE DANS MAPPINGSTATUS: la ID manque.',
	'mappingstatus_edit' => 'modifier', 
	'mappingstatus_edittitle' => 'modifier des régions du carte',
	'mappingstatus_noarticle' => 'Pas d\'article à modifier.',
	'mappingstatus_summary' => 'carte $1 actualisé',
	'mappingstatus_permerror' => 'pas de persmission à modifier cette carte',
	'mappingstatus_save' => 'sauvegarder'
);
