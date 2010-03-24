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
		$url = $wgTitle->escapeLocalURL()."/".$par."?action=save&mappingstatusmapid=$id";

		$form .= "<script type='text/javascript' src='http://openlayers.org/api/OpenLayers.js'></script>\n";
		$form .= "<script type='text/javascript' src='http://openstreetmap.org/openlayers/OpenStreetMap.js'></script>\n";
		$form .= "<script type='text/javascript' src='$wgScriptPath/extensions/mappingstatus/mappingstatus.js'></script>\n";
		$form .= "<script type='text/javascript'>\n";
		$form .= "var mappingstatusmap;\n";
		$form .= "\taddOnloadHook(function(){ mappingstatusmap=new mappingstatus('mappingstatusmap','mappingstatusdata',true); });\n";
		$form .= "</script>\n";

		$form .= "<form action='$url' method='post'>\n";
		$form .= "<div style='display:none; border-style:solid; border-width:1px; border-color:lightgrey;' id='mappingstatusmap'></div>\n";
		$form .= "<textarea rows='10' cols='80' name='textbox1' id='mappingstatusdata'>$status</textarea>\n";
		$form .= "<input type='button' value='Update' onclick='mappingstatusmap.update_data();'/>\n";
//		$form .= "<input type='button' value='Update' onclick='updatetest(\"mappingstatusdata\");'/>\n";
		$form .= "<input type='submit' value='Save'/>\n";
		$form .= "</form>\n";
		$wgOut->addHTML($form);
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
