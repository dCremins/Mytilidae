<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Transcript Archive</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="../../../assets/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="Robots" content="noindex,nofollow" />

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
			<li class="active">Transcripts</li>
		</ol>

		<main>

<?php
include_once( '../include/db.php' );

$query = $db->query( "SELECT * FROM {$dbSettings[ 'prefix' ]}stories WHERE 1 ORDER BY started DESC" ) or database_error( $db->errorInfo() );

$statusline = 'off';

//if( !empty( $_GET[ 'statusline' ] ) ) {
//	$statusline = $_GET[ 'statusline' ];
//}


/*

<div style="float:right;">
	<div>
		Status lines: <strong><?php
			if( $statusline == 'inline' ) {
				echo 'ON';
			}
			else {
				echo 'OFF';
			}
		?></strong>
	</div>
	<div>
		<a href="<?php echo $_SERVER[ 'PHP_SELF' ]; ?>?statusline=<?php
		 if( $statusline == 'inline' ) {
				echo 'off';
			}
			else {
				echo 'inline';
			}
		?>">change</a>
	</div>
</div>

*/

if( empty( $query ) ) {
	echo '<h1>No transcripts in the database</h1>';
}
else {
	echo '<div class="list-group">';

	foreach( $query as $q ) {
		echo '<a  class="list-group-item list-group-item-action" href="transcript.php?'.
		 "session={$q[ 'session' ]}&statusline=$statusline".
		 '">'.
		 $q[ 'story' ].' &emsp; | &emsp; '.$q[ 'session' ].
		 " &emsp; | &emsp; Started: {$q[ 'started' ]} ({$q[ 'inputcount' ]} turn".( $q[ 'inputcount' ] != 1 ? 's' : '' ).")".
		 '</a>';
	}

	echo '</div>';
}

?>
			</main>
		</div>
		<footer class="sticky">
			<div class="well well-sm">
				All content is copyright <span class="glyphicon glyphicon-copyright-mark"></span> Devin Cremins.
				See more of her work at <a href="http://octopusoddments.com">OctopusOddments.com</a>.
			</div>
		</footer>
	</body>
</html>
