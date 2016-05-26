<?php
define ( 'MAIL_STRING', 'comebaby' );
require ('sendEmail.php');

$return = false;

if(isset($_POST['address']) && isset($_POST['mailTitle']) && isset($_POST['mailBody']) )
	$return = sendMe($_POST['address'], $_POST['mailTitle'], $_POST['mailBody']);
	
echo json_encode($return);

?>