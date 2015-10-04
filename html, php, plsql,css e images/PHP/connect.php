<?php
$conn = oci_connect("BD131413", "14410516", "//serbd.estsetubal.ips.pt:1521/orcl");
if(!$conn){
$m = oci_error();
echo $m['message'],"\n";
} else {
}
?>
