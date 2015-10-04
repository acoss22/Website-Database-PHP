<html>
<head>
</head>
<body>
<?php include"PHP/connect.php";?>
<?php
$stmt =oci_parse($conn,"begin P_LIVRO.del(:p_liv_id,:p_erro,:p_msg_erro);end;");
oci_bind_by_name($stmt,":p_liv_id",$_REQUEST["p_liv_id"]);  
oci_bind_by_name($stmt,":p_erro",$p_erro,3);
oci_bind_by_name($stmt,":p_msg_erro",$p_msg_erro,512);
oci_execute($stmt);  
if($p_erro!=0){
echo"<h2 class=\"erro\">Erro: $p_msg_erro</h2>";}
else{
echo "<h2 class=\"sucesso\">Produto removido com sucesso!";}
oci_free_statement($stmt);
oci_close($conn);
?>
</body> 
</html>