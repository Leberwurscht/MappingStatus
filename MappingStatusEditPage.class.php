<?php

class MappingStatusEditPage extends EditPage {
	function showTextbox1( $classes ) {
		global $wgOut, $wgUser;
		$wgOut->addHTML( "TEST2\n" );
	}
/*	function showEditForm( $formCallback=null ) {
		global $wgOut, $wgUser, $wgLang, $wgContLang, $wgMaxArticleSize, $wgTitle, $wgRequest;
		$this->setHeaders();
		$wgOut->addHTML( "TEST\n" );
	}*/
}

?>
