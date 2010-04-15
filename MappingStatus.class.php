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
		global $wgScriptPath, $wgHooks, $wgOut, $wgParser, $wgUser, $wgTitle;

		// Special characters in textarea don't work unless properly encoded.
		// EditPage has a method to do this, that's why we need a EditPage
		// instance here
		$editor = new EditPage(new Article($wgTitle));
		$status = $editor->safeUnicodeOutput($input);

		if (!isset($argv["id"]))
		{
			return "<strong style='color:#f00;'>MAPPINGSTATUS ERROR: ID NOT SET</strong>";
		}
		else $id=(int)$argv["id"];

		$root = "$wgScriptPath/extensions/mappingstatus";
		$htmlroot = htmlentities($root);
		$jsroot = addslashes($root);

		$output = "<script type='text/javascript' src='http://openlayers.org/api/OpenLayers.js'></script>\n";
		$output .= "<script type='text/javascript' src='http://openstreetmap.org/openlayers/OpenStreetMap.js'></script>\n";
		$output .= "<script type='text/javascript' src='$htmlroot/mappingstatus.js'></script>\n";
//		$output .= "<script type='text/javascript'>\n";
//		$output .= "\taddOnloadHook(function(){ new MappingStatusMap('$jsroot','mappingstatusmap_$id','mappingstatusdata_$id'); });\n";
//		$output .= "</script>\n";

		$output .= "<div style='display:none; border-style:solid; border-width:1px; border-color:lightgrey;' id='mappingstatusmap_$id'></div>\n";
		$output .= "<textarea rows='10' cols='80' readonly='readonly' id='mappingstatusdata_$id'>$status</textarea>\n";
//		$output .= "<script>document.getElementById('mappingstatusdata_$id').style.display='none';</script>\n";

/*		$output .= "<div style='text-align:right; background-color: #eee;' id='mappingstatuslinks_$id'>\n";
		$output .= "\t<a href='#mappingstatuslegend_$id' onclick=\"MappingStatusMap.toggle_visibility('mappingstatuslegend_$id');\">Legend</a>";
		$output .= $editlink;
		$output .= "\n</div>\n";*/

		$editlink_id = "";
		if (!$wgParser->getTitle()->getUserPermissionsErrors('edit', $wgUser))
		{
			$sp = Title::newFromText("Special:MappingStatusEdit");
			$editlink = ( $sp->escapeLocalURL() )."/".( $wgParser->getTitle()->getSubpageUrlForm() )."?mappingstatusmapid=$id";
			$editlink = htmlentities($editlink);

			$editlink_id = "mappingstatusedit_$id";
			$output .= "<a href='$editlink' id='$editlink_id'>Edit</a>";
		}

		$output .= "<script>new MappingStatusMap('$jsroot','mappingstatusmap_$id','mappingstatusdata_$id').add_legend('$editlink_id');</script>\n";

//		$output .= "<div style='display:none; background-color: #eee; border: 1px solid #aaa;' id='mappingstatuslegend_$id'>\n";
//		$output .= "</div>\n";

		$marker = "xx-mappingstatus-marker-$id-xx";

		$wgHooks['ParserAfterTidy'][] = array("MappingStatus::afterTidy",array($marker,$output));

		return "<div>$marker</div>";
	}

	static function afterTidy($data,$parser,&$text)
	{
		$marker=$data[0];
		$output=$data[1];
		$text = str_replace($marker, $output, $text);
		return true;
	}
}
