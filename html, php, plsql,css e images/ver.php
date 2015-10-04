<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>knOWLedge Loja Online</title>
<link href="css/default.css" rel="stylesheet" type="text/css" media="screen" />
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/aclonica:n4:default.js" type="text/javascript"></script>
<body>
<?php include "PHP/connect.php"; ?>

<body>
<div id="header">
  <div id="logo">
    <h1><a href="#">Knowledge</a></h1>
    <p>Loja online</p>
  </div>
  <div id="menu-bg">
  <div id="menu">
    <ul id="main">
	<li><a href="index.html">Homepage</a></li>
		<li><a href="#">Funções Admin</a></li>
		<li class="current_page_item"><a href="Ver.php">Ver </a></li>
	    <li><a href="inserirLivro.html">Inserir Livro</a></li>
		<li><a href="removerLivro.html">Remover Livro</a></li>
		<li><a href="inserirAutor.html">Inserir Autor</a></li>
		<li><a href="removerAutor.html">Remover Autor</a></li>
		
    </ul>

  </div>
  </div>
</div>

<div id="wrapper">
  <!-- start page -->
  <div id="page">
    <!-- start content -->
    <div id="content">
      <div class="post">
<?php include "PHP/connect.php"; ?>

<h1>Listagens (OPERACAO RESERVADA AO ADMINISTRADOR)  </h1>
<br>
</br>
<h1>Lista Livros</h1>

<?php   
$cursor=oci_new_cursor($conn);	
$stmt=oci_parse($conn,"begin P_LIVRO.sel(:error,:errorMsg,:result);end;");
oci_bind_by_name ($stmt, ":error", $error,3);
oci_bind_by_name ($stmt,":errorMsg",$errorMsg,512);
oci_bind_by_name ($stmt,":result", $cursor, -1, OCI_B_CURSOR);
oci_execute($stmt);
if($error!=0){
echo "<h2 class=\"erro\">Erro: $errorMsg</h2>";
} else{
echo "<table> 
	<tr>
	<td>ID Livro</td>
	<td>Editora</td>
	<td>Obra</td>
	<td>Nome</td>
	<td>Preco</td>
	<td>Idioma</td>
	</tr>";
	oci_execute($cursor);
	while ($result=oci_fetch_object($cursor)){
	echo"
	<tr>
		<td>$result->LIV_ID</td>
		<td>$result->EDI_ID_F</td>
		<td>$result->OBR_ID_F</td>	
		<td>$result->LIV_NOME</td>
		<td>$result->LIV_PRECO</td>
		<td>$result->LIV_IDIOMA</td>
		
	</tr>";
	}
	echo "</table> ";
	oci_free_statement($stmt);
	oci_free_cursor($cursor);
}
?>
<br>
</br>
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
		<td>$result->ENT_ESTADO</td>
	</tr>";
	}
	echo "</table> ";
	oci_free_statement($stmt);
	oci_free_cursor($cursor);
	}
	?>
<br>
</br>

<h1>Lista Autores</h1>

<?php   
$cursor=oci_new_cursor($conn);	
$stmt=oci_parse($conn,"begin P_AUTOR.sel(:error,:errorMsg,:result);end;");
oci_bind_by_name ($stmt, ":error", $error,3);
oci_bind_by_name ($stmt,":errorMsg",$errorMsg,512);
oci_bind_by_name ($stmt,":result", $cursor, -1, OCI_B_CURSOR);
oci_execute($stmt);
if($error!=0){
echo "<h2 class=\"erro\">Erro: $errorMsg</h2>";
} else{
echo "<table> 
	<tr>
	<td>ID Autor</td>
	<td>Nome</td>
	<td>Data de Nascimento</td>
	</tr>";
	oci_execute($cursor);
	while ($result=oci_fetch_object($cursor)){
	echo"
	<tr>
		<td>$result->AUT_ID</td>
		<td>$result->AUT_NOME</td>
		<td>$result->AUT_DT_NASC</td>		
	</tr>";
	}
	echo "</table> ";
	oci_free_statement($stmt);
	oci_free_cursor($cursor);
	
}
?>
<br>
</br>
<h1>Lista Editoras</h1>

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
	<td>ID</td>
	<td>Nome</td>
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

}
?>
<br>
</br>
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
	<td>Endereco Email</td>
	</tr>";
	oci_execute($cursor);
	while ($result=oci_fetch_object($cursor)){
	echo"
	<tr>
	<td>$result->UTI_ID</td>
	<td>$result->TPU_ID_F</td>
	<td>$result->UTI_USER</td>
	<td>$result->UTI_PASS</td>
	<td>$result->UTI_NOME</td>
	<td>$result->UTI_MORADA</td>
	<td>$result->UTI_DT_NASC</td>
	<td>$result->UTI_NIB</td>
	<td>$result->UTI_BI</td>
	<td>$result->UTI_EMAIL</td>		
	</tr>";
	}
	echo "</table> ";
	oci_free_statement($stmt);
	oci_free_cursor($cursor);
	oci_close($conn);
}
?>

 <div class="entry">
          <p class="links"><a href="#" class="more">Voltar ao início</a> &nbsp;&nbsp;&nbsp;</p>
        </div>
      </div>
 
      </div>
   
      </div>
    </div>
    <!-- start sidebars -->
     <div id="sidebar1" class="sidebar">
      <ul>
        <li>
          <h2>Livro mais pesquisado</h2>
          <ul>
            <li><a href="#"> Java for dummies </a></li>
          </ul>
        </li>
        <li>
          <h2>Autor mais pequisado</h2>
          <ul>
            <li><a href="#"> Maria Maquiavel </a></li>

          </ul>
        </li>
        <li>
          <h2>Livros mais vendidos</h2>
          <ul>
            <li><a href="#"> Crime Scene </a></li>

          </ul>
        </li>
        <li></li>
      </ul>
    </div>
    <div id="sidebar2" class="sidebar">
      <ul>
        <li>
          <label for="textfield2">Username:</label>
          <input type="text" name="textfield" id="textfield2" />
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" />
          <input type="submit" name="submit" id="submit" value="Submit" />
          <form id="searchform" method="get" action="#">
            <div></div>
          </form>
        </li>
        <li>
          <h2><!-- #BeginDate format:fcAm1m --> <script type="text/javascript">
document.write ('<p>Current time is: <span id="date-time">', new Date().toLocaleString(), '<\/span>.<\/p>')
if (document.getElementById) onload = function () {
	setInterval ("document.getElementById ('date-time').firstChild.data = new Date().toLocaleString()", 50)
}
</script> <!-- #EndDate -->
          </h2>
        </li>
      </ul>
    </div>
    <div style="clear: both;">&nbsp;</div>
  </div>
  <!-- end page -->
</div>
<div id="footer">
  <div id="footer-content">
   
  </div>
</div>
</body>
</html>

