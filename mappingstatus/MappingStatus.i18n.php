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
	'mappingstatus_symbol_wheelchair' => 'ways for wheelchairs',
	'mappingstatus_legend' => 'Legend',
	'mappingstatus_delete_polygon' => 'delete polygon',
	'mappingstatus_edit_polygon' => 'Edit Polygon',
	'mappingstatus_label' => 'Label: ',
	'mappingstatus_article' => 'Article: ',
	'mappingstatus_status' => 'Status',
	'mappingstatus_edit_script_error' => 'You must load mappingstatusedit.js in order to be able to edit a map!',
	'mappingstatus_conflict' => 'Saving failed due to an edit conflict!',
	'mappingstatus_save_error' => 'Saving failed!'
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
	'mappingstatus_symbol_wheelchair' => 'Wege für Rollstühle',
	'mappingstatus_legend' => 'Legende',
	'mappingstatus_delete_polygon' => 'Polygon löschen',
	'mappingstatus_edit_polygon' => 'Polygon bearbeiten',
	'mappingstatus_label' => 'Titel: ',
	'mappingstatus_article' => 'Artikel: ',
	'mappingstatus_status' => 'Status',
	'mappingstatus_edit_script_error' => 'Das Script mappingstatusedit.js muss eingebunden werden, um eine Karte zu bearbeiten!',
	'mappingstatus_conflict' => 'Editier-Konflikt! Speichern fehlgeschlagen.',
	'mappingstatus_save_error' => 'Speichern fehlgeschlagen!'
);

// @author Merritt
// @author Maximilian Hoegner <pbmaxi@hoegners.de>
$messages['fr'] = array(
	'mappingstatus_desc' => 'Ajoute un nouveau tag, par lequel des cartes peuvent être intégrés dans les sites du wiki. On peux marquer des régions et déterminer comment bien ils sont réprésentés dans Openstreetmap.',
	'mappingstatus_noid' => 'CAS D\'ERREUR DANS MAPPINGSTATUS: la ID manque.',
	'mappingstatus_edit' => 'Adapter', 
	'mappingstatus_edittitle' => 'Modifier des régions du carte',
	'mappingstatus_noarticle' => 'Pas d\'article à modifier.',
	'mappingstatus_summary' => 'carte $1 actualisé',
	'mappingstatus_permerror' => 'pas de persmission à modifier cette carte',
	'mappingstatus_save' => 'Sauvegarder',
	'mappingstatus_states' => 'couleurs',
	'mappingstatus_symbols' => 'Symboles',
	'mappingstatus_state_unknown' => 'inconnu',
	'mappingstatus_state_0' => 'néant',
	'mappingstatus_state_1' => 'partiel',
	'mappingstatus_state_2' => 'presque complet',
	'mappingstatus_state_3' => 'complet',
	'mappingstatus_state_4' => 'contrôlé deux fois',
	'mappingstatus_state_X' => 'n\'existe pas',
	'mappingstatus_symbol_labelled' => 'Noms de rues',
	'mappingstatus_symbol_car' => 'Rues',
	'mappingstatus_symbol_bike' => 'Pistes cyclables',
	'mappingstatus_symbol_foot' => 'Chemins',
	'mappingstatus_symbol_transport' => 'Transport en commun',
	'mappingstatus_symbol_public' => 'Edifices publics',
	'mappingstatus_symbol_fuel' => 'Stations de service',
	'mappingstatus_symbol_restaurant' => 'Restaurants et hôtels',
	'mappingstatus_symbol_tourist' => 'Monuments',
	'mappingstatus_symbol_nature' => 'Domaines naturels comme des fôrests et des lacs',
	'mappingstatus_symbol_housenumbers' => 'Numéros',
	'mappingstatus_symbol_wheelchair' => 'Chemins pour des chaises roulantes',
	'mappingstatus_legend' => 'Légende',
	'mappingstatus_delete_polygon' => 'Eliminer polygone',
	'mappingstatus_edit_polygon' => 'Adapter polygone',
	'mappingstatus_label' => 'Titre: ',
	'mappingstatus_article' => 'Article: ',
	'mappingstatus_status' => 'Etat',
	'mappingstatus_edit_script_error' => 'Doit intégrer mappingstatusedit.js pour adapter des cartes!',
	'mappingstatus_conflict' => 'Sauvegarder tourné court à cause de conflit d\'éditer!',
	'mappingstatus_save_error' => 'Sauvegarder tourné court!'
);
