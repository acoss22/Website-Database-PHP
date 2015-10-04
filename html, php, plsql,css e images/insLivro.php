<html>
<head>
</head>
<body>
<?php include "PHP/connect.php";?>
<?php
$stmt = oci_parse ($conn,"begin P_LIVRO.insLivro(:p_liv_nome,:p_liv_preco,:p_liv_idioma,:p_edi_id_f,:p_obr_id_f,:error,:errorMsg); end;");
oci_bind_by_name($stmt,":p_liv_nome",$_REQUEST["p_liv_nome"]);
oci_bind_by_name($stmt,":p_liv_preco",$_REQUEST["p_liv_preco"]);
oci_bind_by_name($stmt,":p_liv_idioma",$_REQUEST["p_liv_idioma"]);
oci_bind_by_name($stmt,":p_edi_id_f",$_REQUEST["p_edi_id_f"]);
oci_bind_by_name($stmt,":p_obr_id_f",$_REQUEST["p_obr_id_f"]);
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