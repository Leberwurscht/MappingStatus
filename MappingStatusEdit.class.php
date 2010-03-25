<?php

class MappingStatusEdit extends SpecialPage {
	function __construct() {
		parent::__construct( 'MappingStatusEdit' );
		wfLoadExtensionMessages('MappingStatus');
	}
 
	function execute( $par ) {
		global $wgRequest, $wgOut, $wgTitle, $wgScriptPath, $wgUser;
 
		$this->setHeaders();

		$wgOut->setPagetitle("Edit mapping status");
 
		$action = $wgRequest->getText("action");

		$id = $wgRequest->getInt("mappingstatusmapid");

		$title = Title::newFromText($par);
		if ($title==null)
		{
			$wgOut->addWikiText("No article given.");
			return;
		}

		$article  = new Article($title);


		if ($action=="save")
		{
			$editor = new EditPage($article);
			$editor->summary = "updated mappingstatus";
			$editor->textbox1 = $this->setMappingStatus($article,$wgRequest->getText("textbox1"),$id);

			$detail=false;
			$r=$editor->attemptSave(&$detail);
		}
		else
		{
			$permErrors = $article->getTitle()->getUserPermissionsErrors( 'edit', $wgUser );

			# Can this title be created?
			if ( !$article->getTitle()->exists() ) {
				$permErrors = array_merge( $permErrors,
					wfArrayDiff2( $article->getTitle()->getUserPermissionsErrors( 'create', $wgUser ), $permErrors ) );
			}

			if ($permErrors)
			{
				$wgOut->addHTML("<strong style='color:#f00;'>You don't have the permission to edit this map.</strong>");
			}
		}

		$status=$this->getMappingStatus($article,$id);
		$url = $wgTitle->escapeLocalURL()."/".$par."?action=save&amp;mappingstatusmapid=$id";

		$form .= "<script type='text/javascript' src='http://openlayers.org/api/OpenLayers.js'></script>\n";
		$form .= "<script type='text/javascript' src='http://openstreetmap.org/openlayers/OpenStreetMap.js'></script>\n";
		$form .= "<script type='text/javascript' src='$wgScriptPath/extensions/mappingstatus/mappingstatus.js'></script>\n";
		$form .= "<script type='text/javascript'>\n";
		$form .= "\tvar mappingstatusmap;\n";
		$form .= "\taddOnloadHook(function(){\n";
		$form .= "\t\tmappingstatusmap=new mappingstatus('mappingstatusmap','mappingstatusdata','mappingstatusproperties',true);\n";
//		$form .= "\t\tform = document.getElementById('editform');\n";
//		$form .= "\t\taddHandler(form,'submit',mappingstatusmap.update_data);\n";
		$form .= "\t});\n";
		$form .= "</script>\n";

		$form .= "<form action='$url' method='post' id='editform'>\n";
		$form .= "<div style='display:none; border-style:solid; border-width:1px; border-color:lightgrey;' id='mappingstatusmap'></div>\n";
		$form .= "<div style='display:none;' id='mappingstatusproperties'>\n";
/*		$form .= "Wikiseite: <input type='text' id='mappingstatus_wikipage'>";
		$form .= "<br/>Beschreibung: <input type='text' id='mappingstatus_description'>";
		$form .= "<br/>Straßennamen: ".$this->getstatusselect("mappingstatus_l");
		$form .= "<br/>Straßen: ".$this->getstatusselect("mappingstatus_c");
		$form .= "<br/>Radwege: ".$this->getstatusselect("mappingstatus_b");
		$form .= "<br/>Fußwege: ".$this->getstatusselect("mappingstatus_fo");
		$form .= "<br/>Öffentliche Verkehrsmittel: ".$this->getstatusselect("mappingstatus_tr");
		$form .= "<br/>Öffentliche Einrichtungen: ".$this->getstatusselect("mappingstatus_p");
		$form .= "<br/>Tankstellen: ".$this->getstatusselect("mappingstatus_fu");
		$form .= "<br/>Restaurants und Hotels: ".$this->getstatusselect("mappingstatus_r");
		$form .= "<br/>Sehenswürdigkeiten: ".$this->getstatusselect("mappingstatus_t");
		$form .= "<br/>Natürliche Bereiche: ".$this->getstatusselect("mappingstatus_n");
		$form .= "<br/>Hausnummern: ".$this->getstatusselect("mappingstatus_h"); */
		$form .= "</div>\n";
		$form .= "<textarea rows='10' cols='80' name='textbox1' id='mappingstatusdata'>$status</textarea>\n";
		$form .= "<input type='button' value='Update' onclick='mappingstatusmap.update_data();'/>\n";
		$form .= "<input type='submit' value='Save'/>\n";
		$form .= "</form>\n";
		$wgOut->addHTML($form);
	}

	function getstatusselect($id)
	{
		$html = "<select id='$id'>\n";
		$html .= "\t<option value='-'>Status unbekannt</option>\n";
		$html .= "\t<option value='0'>keine oder wenige Daten</option>\n";
		$html .= "\t<option value='1'>teilweise Daten</option>\n";
		$html .= "\t<option value='2'>größtenteils vollständig</option>\n";
		$html .= "\t<option value='3'>alle Daten</option>\n";
		$html .= "\t<option value='4'>besichtigt und bestätigt von mindestens zwei Mappern</option>\n";
		$html .= "\t<option value='X'>nicht vorhanden</option>\n";
		$html .= "</select>\n";
		return $html;
	}

	function getMappingStatus($article,$id)
	{
		$content = $article->getContent();
		$matches=array();
		preg_match("/\<mappingstatus id=\"$id\"\>(.*?)\<\/mappingstatus\>/is",$content,&$matches);
		return htmlentities($matches[1]);
	}

	function setMappingStatus($article,$status,$id)
	{
		$content = $article->getContent();
		$count=0;
		$replaced=preg_replace("/\<mappingstatus id=\"$id\"\>(.*?)\<\/mappingstatus\>/is","<mappingstatus id=\"$id\">$status</mappingstatus>",$content,1,&$count);

		if ($count==0)
		{
			$replaced = "<mappingstatus id=\"$id\">$status</mappingstatus>\n\n".$content;
		}

		return $replaced;
	}
}

?>
