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

class MappingStatus {
	static function parse( $input, $argv )
	{
		global $wgScriptPath, $wgHooks, $wgParser, $wgUser, $wgLang;

		wfLoadExtensionMessages('MappingStatus');

		// Special characters in textarea don't work unless properly encoded.
		// EditPage has a method to do this, that's why we need a EditPage
		// instance here
		$editor = new EditPage(new Article($wgParser->getTitle()));
		$status = $editor->safeUnicodeOutput($input);

		if (!isset($argv["id"]))
		{
			return "<strong style='color:#f00;'>".htmlentities(wfMsg('mappingstatus_noid'))."</strong>";
		}
		else $id=(int)$argv["id"];

		$root = "$wgScriptPath/extensions/mappingstatus";
		$htmlroot = htmlentities($root);
		$jsroot = addslashes($root);

		$output = "<script type='text/javascript' src='http://openlayers.org/api/OpenLayers.js'></script>\n";
		$output .= "<script type='text/javascript' src='http://openstreetmap.org/openlayers/OpenStreetMap.js'></script>\n";
		$output .= "<script type='text/javascript' src='$htmlroot/mappingstatus.js'></script>\n";
		$output .= "<script type='text/javascript' src='$htmlroot/i18n.js.php?lang=".$wgLang->getCode()."'></script>\n";

		$output .= "<div style='display:none; border-style:solid; border-width:1px; border-color:lightgrey;' id='mappingstatusmap_$id'></div>\n";
		$output .= "<textarea rows='10' cols='80' readonly='readonly' id='mappingstatusdata_$id'>$status</textarea>\n";

		$editlink_id = "";
		if (!$wgParser->getTitle()->getUserPermissionsErrors('edit', $wgUser))
		{
			$sp = Title::newFromText("Special:MappingStatusEdit");
			$editlink = ( $sp->escapeLocalURL() )."/".( $wgParser->getTitle()->getSubpageUrlForm() )."?mappingstatusmapid=$id";
			$editlink = htmlentities($editlink);

			$editlink_id = "mappingstatusedit_$id";
			$output .= "<a href='$editlink' id='$editlink_id'>".htmlentities(wfMsg('mappingstatus_edit'))."</a>";
		}

		$output .= "<script>new MappingStatusMap('$jsroot','mappingstatusmap_$id','mappingstatusdata_$id').add_legend('$editlink_id');</script>\n";

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
