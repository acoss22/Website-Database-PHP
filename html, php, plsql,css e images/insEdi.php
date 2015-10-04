<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php include "PHP/connect.php";?>
<?php
   
  $stmt = oci_parse ($conn, "begin P_EDITORA.ins(:p_edi_nome,:error,:errorMsg); end;");
  oci_bind_by_name($stmt,":p_aut_nome",$_REQUEST["p_aut_nome"]);
  oci_bind_by_name($stmt,":error",$error,3);
  oci_bind_by_name($stmt,":errorMsg",$errorMsg,512);
  oci_execute($stmt);
  
  if ($error != 0) {
    echo "<h2 class=\"erro\">Erro: $errorMsg</h2>";
  }
  else {
    echo "<h2 class=\"sucesso\">Editora inserida com sucesso!";
  }
  oci_free_statement($stmt);
  oci_close($conn);
?>
</body> 
</html>