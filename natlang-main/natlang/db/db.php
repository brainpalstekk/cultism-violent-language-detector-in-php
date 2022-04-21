<?php
//error_reporting(0);
try { $db = new PDO('mysql:host=localhost;dbname=natdecode;charset=utf8','root','');}
catch(Expression $e){ echo $e->getMessage(); }

// try { $db = new PDO('mysql:host=localhost;dbname=brainpa1_language;charset=utf8','brainpa1_user','^xdWsFpYjkVg');}
// catch(Expression $e){ echo $e->getMessage(); }

include('functions.php');


?>
