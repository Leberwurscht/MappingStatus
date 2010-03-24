<?php
# OpenStreetMap MappingStatus - MediaWiki extension
#
# This defines what happens when <mappingstatus> tag is placed in the wikitext
#
# We show a map based on the lat/lon/zoom data passed in. This extension brings in
# the OpenLayers javascript, to show a slippy map.
#
# Usage example:
# <mappingstatus lat="51.485" lon="-0.15" z="11" w="300" h="200" layer="osmarender" marker="0" />
#
# Tile images are not cached local to the wiki.
# To acheive this (remove the OSM dependency) you might set up a squid proxy,
# and modify the requests URLs here accordingly.
#
# This file should be placed in the mediawiki 'extensions' directory
# ...and then it needs to be 'included' within LocalSettings.php
#
# #################################################################################
#
# Copyright 2008 Harry Wood, Jens Frank, Grant Slater, Raymond Spekking and others
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
# @addtogroup Extensions
#

class MappingStatus {
	# The callback function for converting the input text to HTML output
	static function parse( $input, $argv )
	{
		global $wgScriptPath, $wgHooks, $wgOut, $wgParser;

		if (!isset($argv["id"]))
		{
			return "<strong style='color:#f00;'>MAPPINGSTATUS ERROR: ID NOT SET</strong>";
		}
		else $id=(int)$argv["id"];

		$output = "<script type='text/javascript' src='http://openlayers.org/api/OpenLayers.js'></script>\n";
		$output .= "<script type='text/javascript' src='http://openstreetmap.org/openlayers/OpenStreetMap.js'></script>\n";
		$output .= "<script type='text/javascript' src='$wgScriptPath/extensions/mappingstatus/mappingstatus.js'></script>\n";
		$output .= "<script type='text/javascript'>\n";
		$output .= "\taddOnloadHook(function(){ mappingstatus('mappingstatusmap_$id','mappingstatusdata_$id',false); });\n";
		$output .= "</script>\n";

		$output .= "<div style='display:none; border-style:solid; border-width:1px; border-color:lightgrey;' id='mappingstatusmap_$id'></div>\n";
		$output .= "<textarea rows='10' cols='80' readonly='readonly' id='mappingstatusdata_$id'>$input</textarea>\n";

		$sp = Title::newFromText("Special:MappingStatusEdit");
		$editlink = ( $sp->escapeLocalURL() )."/".( $wgParser->getTitle()->getSubpageUrlForm() )."?mappingstatusmapid=$id";

		$output .= "<a href='$editlink'>EDIT</a>";

		$marker = "xx-mappingstatus-marker-$id-xx";

		$wgHooks['ParserAfterTidy'][] = array("MappingStatus::afterTidy",array($marker,$output));

		return $marker;
	}

	static function afterTidy($data,$parser,&$text)
	{
		$marker=$data[0];
		$output=$data[1];
		$text = str_replace($marker, $output, $text);
		return true;
	}
}
