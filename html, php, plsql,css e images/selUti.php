<html>

<body>
<?php include "PHP/connect.php"; ?>

<h1>Lista de Utilizadores</h1>

<?php   
$cursor=oci_new_cursor($conn);	
$stmt=oci_parse($conn,"begin P_UTILIZADORES.sel(:error,:errorMsg,:result);end;");
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
	<td>Tipo Utilizador</td>
	<td>Username</td>
	<td>Password</td>
	<td>Nome</td>
	<td>Morada</td>
	<td>Data de Nascimento</td>
	<td>NIB</td>
	<td>BI</td>
	<td>Endereço Email</td>
	</tr>";
	oci_execute($cursor);
	while ($result=oci_fetch_object($cursor)){
	echo"
	<tr>
	<td>uti_id</td>
	<td>tpu_id_f</td>
	<td>uti_user</td>
	<td>uti_pass</td>
	<td>uti_nome</td>
	<td>uti_morada</td>
	<td>uti_dt_nasc</td>
	<td>uti_nib</td>
	<td>uti_bi</td>
	<td>uti_email</td>		
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