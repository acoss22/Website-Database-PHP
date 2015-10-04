<html>

<body>
<?php include "PHP/connect.php"; ?>

<h1>Lista Autores</h1>

<?php   
$cursor=oci_new_cursor($conn);	
$stmt=oci_parse($conn,"begin P_EDITORA.sel(:error,:errorMsg,:result);end;");
oci_bind_by_name ($stmt, ":error", $error,3);
oci_bind_by_name ($stmt,":errorMsg",$errorMsg,512);
oci_bind_by_name ($stmt,":result", $cursor, -1, OCI_B_CURSOR);
oci_execute($stmt);
if($error!=0){
echo "<h2 class=\"erro\">Erro: $errorMsg</h2>";
} else{
echo "<table> 
	<tr>
	<th>ID</th>
	<th>Nome</th>
	</tr>";
	oci_execute($cursor);
	while ($result=oci_fetch_object($cursor)){
	echo"
	<tr>
		<td>$result->EDI_ID</td>
		<td>$result->EDI_NOME</td>	
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