<html>
<head>
</head>
<body>
<?php include "PHP/connect.php";?>
<?php
$stmt = oci_parse ($conn,"begin P_UTILIZADORES.ins(:p_uti_nome,:p_tpu_id_f,:p_uti_user, 
:p_uti_pass,:p_uti_nome,:p_uti_morada,:p_uti_dt_nasc, 
:p_uti_nib,:p_uti_bi,:p_uti_email,:p_erro ,p_msg_erro); end;");
oci_bind_by_name($stmt,":p_uti_nome",$_REQUEST["p_uti_nome"]);
oci_bind_by_name($stmt,":p_tpu_id_f",$_REQUEST["p_tpu_id_f"]);
oci_bind_by_name($stmt,":p_uti_user",$_REQUEST["p_uti_user"]);
oci_bind_by_name($stmt,":p_uti_pass",$_REQUEST["p_uti_pass"]);
oci_bind_by_name($stmt,":p_uti_nome",$_REQUEST["p_uti_nome"]);
oci_bind_by_name($stmt,":p_uti_morada",$_REQUEST["p_uti_morada"]);
oci_bind_by_name($stmt,":p_uti_dt_nasc",$_REQUEST["p_uti_dt_nasc"]);
oci_bind_by_name($stmt,":p_uti_nib",$_REQUEST["p_uti_nib"]);
oci_bind_by_name($stmt,":p_uti_bi",$_REQUEST["p_uti_bi"]);
oci_bind_by_name($stmt,":p_uti_email",$_REQUEST["p_uti_email"]);
oci_bind_by_name($stmt,":error",$error,3);
oci_bind_by_name($stmt,":errorMsg",$errorMsg,512);
oci_execute($stmt);
if($error!=0){
echo "<h2 class=\"erro\">Erro: $errorMsg</h2>";}
else {
echo "<h2 class=\"sucesso\">Produto inserido com sucesso!";}
oci_free_statement($stmt);
oci_close($conn);
?>
</body> 
</html>