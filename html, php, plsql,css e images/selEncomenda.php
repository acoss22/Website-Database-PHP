<html>

<body>
<?php include "PHP/connect.php"; ?>

<h1>Lista Encomendas</h1>

<?php   
$cursor=oci_new_cursor($conn);	
$stmt=oci_parse($conn,"begin P_ENTREGAS.sel(:error,:errorMsg,:result);end;");
oci_bind_by_name ($stmt, ":error", $error,3);
oci_bind_by_name ($stmt,":errorMsg",$errorMsg,512);
oci_bind_by_name ($stmt,":result", $cursor, -1, OCI_B_CURSOR);
oci_execute($stmt);
if($error!=0){
echo "<h2 class=\"erro\">Erro: $errorMsg</h2>";
} else{
echo "<table> 
	<tr>
	<td>ID</td>
	<td>Utilizador</td>
	<td>Livro</td>
	<td>Data Entrega</td>
	<td>Data Compra</td>
	<td>Estado</td>
	</tr>";
	oci_execute($cursor);
	while ($result=oci_fetch_object($cursor)){
	echo"
	<tr>
		<td>$result->ENT_ID</td>
		<td>$result->UTI_ID_F</td>
		<td>$result->LIV_ID_F</td>		
		<td>$result->ENT_DT_ENTREGA</td>
		<td>$result->ENT_DT_COMPRA</td>
		<td>$result->ENT_COMPRA</td>
	</tr>";
	}
	echo "</table> ";
	oci_free_statement($stmt);
	oci_free_cursor($cursor);
	oci_close($conn);
}
?>
</body>
</html>