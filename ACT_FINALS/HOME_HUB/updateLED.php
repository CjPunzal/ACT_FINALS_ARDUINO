<?php     
  require 'database.php';
  
  if (!empty($_POST)) {
    $ledState = $_POST['ledState'];
      
    // insert data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE doorstatus SET ledState = ? WHERE ID = 0";
    $q = $pdo->prepare($sql);
    $q->execute(array($ledState));
    Database::disconnect();
    header("Location: Main.php");
  } 
?>