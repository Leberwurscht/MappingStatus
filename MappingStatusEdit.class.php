<?php

class MappingStatusEdit extends SpecialPage {
	function __construct() {
		parent::__construct( 'MappingStatusEdit' );
		wfLoadExtensionMessages('MappingStatus');
	}
 
	function execute( $par ) {
		global $wgRequest, $wgOut, $wgTitle, $wgScriptPath, $wgUser, $wgLang;

		$this->setHeaders();

		$wgOut->setPagetitle(wfMsg('mappingstatus_edittitle'));
 
		$action = $wgRequest->getText("action");

//		$exploded = explode("/",$par,2);
//		$wgOut->addHTML("<pre>".var_export(explode("/",$par,2),true)."</pre>");
		$id = $wgRequest->getInt("mappingstatusmapid");
/*		if (count($exploded)<2)
		{
			$wgOut->addWikiText("Map id and article name is required for editing a MappingStatus map!");
			return;
		}

		list($id,$par) = $exploded;
		$id = (int)$id;
	
		$wgOut->addHTML("<pre>".var_export(array($a,$b),true)."</pre>");	*/

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
			$editor->summary = wfMsg('mappingstatus_summary',$id);
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
				$wgOut->addHTML("<strong style='color:#f00;'>".htmlentities(wfMsg('mappingstatus_permerror'))."</strong>");
			}
			else
			{
				$submit = "<input type='submit' value='".htmlentities(wfMsg('mappingstatus_save'))."'/>\n";
			}
		}

		$root = "$wgScriptPath/extensions/mappingstatus";
		$htmlroot = htmlentities($root);
		$jsroot = addslashes($root);

		$status=$this->getMappingStatus($article,$id);
		$status = $editor->safeUnicodeOutput($status);
		$url = $wgTitle->escapeLocalURL()."/".$par."?action=save&mappingstatusmapid=$id";
		$url = htmlentities($url);

		$form .= "<script type='text/javascript' src='http://openlayers.org/api/OpenLayers.js'></script>\n";
		$form .= "<script type='text/javascript' src='http://openstreetmap.org/openlayers/OpenStreetMap.js'></script>\n";
		$form .= "<script type='text/javascript' src='$htmlroot/i18n.js.php?lang=".$wgLang->getCode()."'></script>\n";
		$form .= "<script type='text/javascript' src='$htmlroot/mappingstatus.js'></script>\n";
		$form .= "<script type='text/javascript' src='$htmlroot/mappingstatusedit.js'></script>\n";
/*		$form .= "<script type='text/javascript'>\n";
		$form .= "\tvar mappingstatusmap;\n";
		$form .= "\taddOnloadHook(function(){\n";
		$form .= "\t\tmappingstatusmap=new MappingStatusMap('$jsroot','mappingstatusmap','mappingstatusdata','mappingstatusedit');\n";
		$form .= "\t});\n";
		$form .= "</script>\n";*/

		$form .= "<form action='$url' method='post' id='editform' onsubmit='mappingstatusmap.onsubmit();'>\n";
		$form .= "<div style='display:none; border-style:solid; border-width:1px; border-color:lightgrey;' id='mappingstatusmap'></div>\n";
		$form .= "<div id='mappingstatusedit'></div>\n";
		$form .= "<textarea rows='10' cols='80' name='textbox1' id='mappingstatusdata'>$status</textarea>\n";
		$form .= $submit;
//		$form .= "<input type='submit' value='Save'/>\n";
		$form .= "</form>\n";

		$form .= "<script type='text/javascript'>\n";
		$form .= "\tvar mappingstatusmap = new MappingStatusMap('$jsroot','mappingstatusmap','mappingstatusdata','mappingstatusedit');\n";
		$form .= "</script>\n";

		$wgOut->addHTML($form);
	}

	function getMappingStatus($article,$id)
	{
		$content = $article->getContent();
		$matches=array();
		preg_match("/\<mappingstatus id=\"$id\"\>(.*?)\<\/mappingstatus\>/is",$content,&$matches);
		return $matches[1];
		//return htmlentities($matches[1]);
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
