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
 * @author Maximilian Hoegner <pbmaxi@hoegners.de>
 * @addtogroup Extensions 
 */

if (!defined('MEDIAWIKI')) die('This file is a MediaWiki extension, it is not a valid entry point');

define('MEDIAWIKI_MAPPINGSTATUS_VERSION', '2');

$wgExtensionCredits['parserhook'][] = array(
	'name'           => 'OpenStreetMap Mapping Status',
	'author'         => 'Maximilian Hoegner',
	'url'            => 'http://www.hoegners.de/Maxi/mappingstatus/',
	'version'        => MEDIAWIKI_MAPPINGSTATUS_VERSION,
	'descriptionmsg' => 'mappingstatus_desc',
);

// viewing
$wgAutoloadClasses['MappingStatusView'] = dirname(__FILE__).'/MappingStatusView.class.php';
$wgExtensionMessagesFiles['MappingStatus'] = dirname(__FILE__)."/MappingStatus.i18n.php";

$wgExtensionFunctions[] = 'wfmappingstatus';
function wfmappingstatus() {
	global $wgParser;
	$wgParser->setHook('mappingstatus', array('MappingStatusView', 'parse'));
}

// editing
$wgAutoloadClasses['MappingStatusEdit'] = dirname(__FILE__).'/MappingStatusEdit.class.php';
$wgSpecialPages['MappingStatusEdit'] = 'MappingStatusEdit';
