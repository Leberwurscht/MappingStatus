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

		if ($action=="save")
		{
			# Do stuff
			$title    = Title::newFromText($par);
			$article  = new Article($title);
	//		$article->mContent = "EDITED";
			$editor= new EditPage($article);
	//		$editor= new MappingStatusEditPage($article);
	//		$editor->submit();
			$content="";
	//		$content=$editor->getContent();
			$detail=false;
			$editor->summary="";
			$editor->textbox1="EDITED";
			$r=$editor->attemptSave(&$detail);	
		}
		else
		{
			
		}

//		$output="Hello world! ".var_export($r,true).".";
//		$output.="OK";
//		$content .= $output;
//		$wgOut->addWikiText( $content );
	}
}

?>
