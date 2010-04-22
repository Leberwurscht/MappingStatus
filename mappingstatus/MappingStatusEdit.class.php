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

class MappingStatusEdit extends SpecialPage {
	function __construct() {
		parent::__construct( 'MappingStatusEdit' );
		wfLoadExtensionMessages('MappingStatus');
	}
 
	function execute( $par ) {
		global $wgRequest, $wgOut, $wgTitle, $wgScriptPath, $wgUser, $wgLang, $wgJsMimeType;

		$this->setHeaders();

		$wgOut->setPagetitle(wfMsg('mappingstatus_edittitle'));
 
		$action = $wgRequest->getText("action");

		$id = $wgRequest->getInt("mappingstatusmapid");

		$title = Title::newFromText($par);
		if ($title==null)
		{
			$wgOut->addWikiText(wfMsg('mappingstatus_noarticle'));
			return;
		}

		$article  = new Article($title);

		$editor = new EditPage($article);

		$submit = "";

		if ($action=="save")
		{
			// set editing summary and the new article text
			$editor->summary = wfMsg('mappingstatus_summary', $id);
			$editor->textbox1 = $this->setMappingStatus($article, $wgRequest->getText("textbox1"), $id);

			// set up some variables needed for attemptSave
			$editor->save = true;

			$editor->starttime = $wgRequest->getVal("wpStarttime");
			if ( !preg_match( '/^\d{14}$/', $editor->starttime ))
				$editor->starttime = null;

			$editor->edittime = $wgRequest->getVal("wpEdittime");
			if ( !preg_match( '/^\d{14}$/', $editor->edittime ))
				$editor->edittime = null;

			// save page with access control and stuff
			// will redirect to edited page if successful
			$editor->attemptSave();

			// error messages if saving was not successful
			if ($editor->isConflict)
				$wgOut->addHTML("<strong style='color:#f00;'>".htmlentities(wfMsg('mappingstatus_conflict'))."</strong>");
			else if (!$editor->didSave)
				$wgOut->addHTML("<strong style='color:#f00;'>".htmlentities(wfMsg('mappingstatus_save_error'))."</strong>");
		}
		else
		{
			$title = $article->getTitle();
			$permErrors = $title->getUserPermissionsErrors('edit', $wgUser);

			// test whether article can be created
			if (!$title->exists())
				$permErrors = array_merge($permErrors, wfArrayDiff2($title->getUserPermissionsErrors('create', $wgUser), $permErrors));

			if ($permErrors)
				$wgOut->addHTML("<strong style='color:#f00;'>".htmlentities(wfMsg('mappingstatus_permerror'))."</strong>");
			else
				$submit = "<input type='submit' value='".htmlentities(wfMsg('mappingstatus_save'))."'/>\n";
		}

		$root = "$wgScriptPath/extensions/mappingstatus";
		$htmlroot = htmlentities($root);
		$jsroot = addslashes($root);

		$status=$this->getMappingStatus($article,$id);
		$status = $editor->safeUnicodeOutput($status);
		$url = $wgTitle->escapeLocalURL()."/".$par."?action=save&mappingstatusmapid=$id";
		$url = htmlentities($url);

		$wgOut->addScript("<script type='$wgJsMimeType' src='http://openlayers.org/api/OpenLayers.js'></script>\n");
		$wgOut->addScript("<script type='$wgJsMimeType' src='http://openstreetmap.org/openlayers/OpenStreetMap.js'></script>\n");
		$wgOut->addScript("<script type='$wgJsMimeType' src='$htmlroot/mappingstatus.js'></script>\n");
		$wgOut->addScript("<script type='$wgJsMimeType' src='$htmlroot/i18n.js.php?lang=".$wgLang->getCode()."'></script>\n");
		$wgOut->addScript("<script type='$wgJsMimeType' src='$htmlroot/mappingstatusedit.js'></script>\n");

		$form = "<form action='$url' method='post' id='editform' onsubmit='mappingstatusmap.onsubmit();'>\n";
		$form .= "<div style='display:block; border-style:solid; border-width:1px; border-color:lightgrey;' id='mappingstatusmap'></div>\n";
		$form .= "<div id='mappingstatusedit'></div>\n";
		$form .= "<textarea rows='10' cols='80' name='textbox1' id='mappingstatusdata'>$status</textarea>\n";
		$form .= "<input type='hidden' name='wpStarttime' value='".wfTimestampNow()."' />\n";
		$form .= "<input type='hidden' name='wpEdittime' value='".$editor->mArticle->getTimestamp()."' />\n";
		$form .= $submit;
		$form .= "</form>\n";

		$form .= "<script type='$wgJsMimeType'>\n";
		$form .= "\tvar mappingstatusmap = new MappingStatusMap('$jsroot','mappingstatusmap','mappingstatusdata','mappingstatusedit');\n";
		$form .= "</script>\n";

		$wgOut->addHTML($form);
	}

	function getMappingStatus($article,$id)
	{
		$content = $article->getContent();
		$matches=array();
		preg_match("/\<mappingstatus id=\"$id\"\>(.*?)\<\/mappingstatus\>/is",$content,$matches);
		return $matches[1];
	}

	function setMappingStatus($article,$status,$id)
	{
		$content = $article->getContent();
		$count=0;
		$replaced=preg_replace("/\<mappingstatus id=\"$id\"\>(.*?)\<\/mappingstatus\>/is","<mappingstatus id=\"$id\">$status</mappingstatus>",$content,1,$count);

		if ($count==0)
		{
			$replaced = "<mappingstatus id=\"$id\">$status</mappingstatus>\n\n".$content;
		}

		return $replaced;
	}
}

?>
