<?php
	$updateStatus=$_POST["updateStatus"];
	$Write="<?php $" . "updateStatus='" . $updateStatus . "'; " . "echo $" . "updateStatus;" . " ?>";
  echo $updateStatus;
	file_put_contents('StatContainer.php',$Write);
?>