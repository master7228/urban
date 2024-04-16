<?php 
if ( isset($_GET['imagename']) ) {
    $filename = $_GET['imagename'];
    $filepath = '../files/bancoCampanas/'.$_GET['id'].'/images/'.$filename;
}
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename($filepath));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filepath));
readfile($filepath);
exit;
?>