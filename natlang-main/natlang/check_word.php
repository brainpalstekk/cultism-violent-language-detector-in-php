<?php require('db/db.php'); ?>

<?php
if(isset($_POST['word'])){ $word = $_POST['word'];
if(QueryDB("SELECT COUNT(*) FROM code WHERE encode ='$word'")->fetchColumn()>0){
    echo 1;
}



}


?>
