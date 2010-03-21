<?php

class MappingStatusEdit extends SpecialPage {
	function __construct() {
		parent::__construct( 'MappingStatusEdit' );
		wfLoadExtensionMessages('MappingStatus');
	}
 
	function execute( $par ) {
		global $wgRequest, $wgOut, $wgTitle;
 
		$this->setHeaders();
 
		# Get request data from, e.g.
		$action = $wgRequest->getText("action");

		$title    = Title::newFromText($par);
		if ($title==null)
		{
			$wgOut->addWikiText("No article given.");
			return;
		}

		$article  = new Article($title);

		if ($action=="save")
		{
			# Do stuff
	//		$article->mContent = "EDITED";
			$editor= new EditPage($article);
	//		$editor= new MappingStatusEditPage($article);
	//		$editor->submit();
//			$content="";
	//		$content=$editor->getContent();
			$editor->summary="updated mappingstatus";
			$editor->textbox1=$this->saveMappingStatus($article,$wgRequest->getText("textbox1"));

			$detail=false;
			$r=$editor->attemptSave(&$detail);
		}
		else
		{
			$status=$this->loadMappingStatus($article);
//			$status=$this->saveMappingStatus($article);
//			$url = $wgRequest->getText("title");
			$url = $wgTitle->escapeLocalURL()."/".$par."?action=save";
			$form = "<form action='$url' method='post'>";
			$form .= "<textarea name='textbox1'>".$status."</textarea>";
			$form .= "<input type='submit' value='Save'>";
			$form .= '</form>';
			$wgOut->addHTML($form);
		}

//		$output="Hello world! ".var_export($r,true).".";
//		$output.="OK";
//		$content .= $output;
//		$wgOut->addWikiText( $content );
	}

	function loadMappingStatus($article)
	{
		$content = $article->getContent();
		$matches=array();
		preg_match("/\<mappingstatus\>(.*)\<\/mappingstatus\>/is",$content,&$matches);
		return $matches[1];
	}

	function saveMappingStatus($article,$status)
	{
		$content = $article->getContent();
		$replaced=preg_replace("/\<mappingstatus\>(.*)\<\/mappingstatus\>/is","<mappingstatus>".$status."</mappingstatus>",$content);
		return $replaced;
	}
}

?>
