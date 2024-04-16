<?php 
if ( isset($_GET['filename']) ) {
    $filepath = '../files/'.$_GET['folder'].'/'.$_GET['filename'].'.'.$_GET['extension'];
}
if($_GET['extension'] == 'xls' || $_GET['extension'] = 'xlsx'){
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
}
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=' . basename($filepath));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filepath));
readfile($filepath);
exit;
?>