<?php
/**
Parchment Transcript Recording Plugin Database Viewer
	* URL: http://code.google.com/p/parchment-transcript/
	* Description: A tool for viewing transcripts recorded with the transcript recording plugin for Parchment.
	* Author: Juhana Leinonen
	* Copyright: Copyright (c) 2011 Juhana Leinonen under MIT license.
**/

// transcript session id
$session = $_GET[ 'session' ];

$options = array(
	'warnings'		=> true,
	'statusline'	=> 'inline',
	'output'		=> 'html',
	'stripHTML'		=> true
);

// show warnings?
$options[ 'warnings' ] = !( isset( $_GET[ 'warnings' ] ) && $_GET[ 'warnings' ] == '0' );

if( isset( $_GET[ 'statusline' ] ) ) {
	$options[ 'statusline' ] = $_GET[ 'statusline' ];
}

if( isset( $_GET[ 'output' ] ) ) {
	$options[ 'output' ] = $_GET[ 'output' ];
}

$options[ 'stripHTML' ] = !( isset( $_GET[ 'stripHTML' ] ) && $_GET[ 'stripHTML' ] == '0' );


// tell the browser we're sending plaintext if so requested,
// otherwise create the HTML page structure
if( $options[ 'output' ] == 'text' ) {
	header( "Content-type: text/plain" );
}
else {

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Transcript</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="../../../assets/style.css">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="assets/glkote.css">
<link rel="stylesheet" type="text/css" href="assets/transcript.css">

</head>

<body>
	<div class="container">
		<header class="page-header">
			<h1><a href="http://mytilidae.com">Beware of Starfish</a><br />
			<small>A development site for Devin Cremins</small></h1>
		</header>

		<ol class="breadcrumb">
			<li><a href="../../../index.html">Home</a></li>
			<li><a href="../../index.html">Wizards! - Recorder</a></li>
			<li><a href="index.php">Transcripts</a></li>
			<li class="active">Session <?php echo $session; ?></li>
		</ol>

		<main>
<div id="transcript">

<div id="content">

<?php
}

define( 'INCLUDE_PATH', '../include/' );

include_once( INCLUDE_PATH.'db.php' );
include_once( INCLUDE_PATH.'view.php' );


echo display_transcript( $db, $session, $options );

if( $options[ 'output' ] == 'html' ) {
?>
</div>
</div>
</main>
</div>
<footer class="sticky">
<div class="well well-sm">
	All content is copyright <span class="glyphicon glyphicon-copyright-mark"></span> Devin Cremins.
	See more of her work at <a href="http://octopusoddments.com">OctopusOddments.com</a>.
</div>
</footer>
</body>
</html><?php
}
