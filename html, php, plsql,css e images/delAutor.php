<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>knOWLedge Loja Online</title>
<link href="css/default.css" rel="stylesheet" type="text/css" media="screen" />
</head>

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
		<li><a href="Ver.php">Ver </a></li>
	    <li><a href="inserirLivro.html">Inserir Livro</a></li>
		<li><a href="removerLivro.html">Remover Livro</a></li>
		<li><a href="inserirAutor.html">Inserir Autor</a></li>
		<li class="current_page_item"><a href="removerAutor.html">Remover Autor</a></li>
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
<?php include"PHP/connect.php";?>
<?php
$stmt =oci_parse($conn,"begin P_AUTOR.del(:p_aut_id,:p_erro,:p_msg_erro);end;");
oci_bind_by_name($stmt,":p_aut_id",$_REQUEST["p_aut_id"]);  
oci_bind_by_name($stmt,":p_erro",$p_erro,3);
oci_bind_by_name($stmt,":p_msg_erro",$p_msg_erro,512);
oci_execute($stmt);  
if($p_erro!=0){
echo"<h2 class=\"erro\">Erro: $p_msg_erro</h2>";}
else{
echo "<h2 class=\"sucesso\">Autor removido com sucesso!";}
oci_free_statement($stmt);
oci_close($conn);
?>
<div class="entry">
          <p class="links"><a href="#" class="more">Voltar ao início</a> &nbsp;&nbsp;&nbsp;</p>
		   
        </div>
      </div>
 
      </div>
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
</script><!-- #EndDate -->
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