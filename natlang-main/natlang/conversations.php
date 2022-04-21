<?php $link = 6; require('db/db.php'); ob_start(); session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violent Decoder</title><?php  include('links.php');  ?>
<style>
  table tr th { text-align: center; }
</style>
</head>
<body>

    <div id="wrapper">

<?php include('menus.php');?>

        <hr />
<?php
$arry_tab = array();
$fetch = QueryDB("SELECT * FROM code WHERE status=1 ");
while($rows=$fetch->fetch(PDO::FETCH_ASSOC)){
  $arry_tab[$rows['encode']] = $rows['decode'];
}
function translator($word,$dictionary){
  if(array_key_exists($word,$dictionary)){
      return $dictionary[$word];
  }else { return $word;}
}

function counttranslator($word,$dictionary){
  $beginCount = 0; $word = explode(" ",$word);
  for($i=0; $i<count($word);$i++){
if(array_key_exists($word[$i],$dictionary)){
       $beginCount++;
  }
}

  return $beginCount;
}

function translateSentence($sentence){
global $arry_tab; $normal = ''; $addup = 0;
$sentence = explode(" ",$sentence);
for($i=0; $i < count($sentence); $i++){
   $blink = translator($sentence[$i],$arry_tab);
    // $normal .=" ".$blink;
   $normal .=" ".$blink;

}
return $normal;
}



function handle_clean_translator($word,$dictionary){
  if(array_key_exists($word,$dictionary)){
      return $dictionary[$word];
  }else { return " ";}
}


function translateSentence_clean($sentence){
global $arry_tab; $normal = ''; $addup = 0;
$sentence = explode(" ",$sentence);
for($i=0; $i < count($sentence); $i++){
   $blink = handle_clean_translator($sentence[$i],$arry_tab);
  if($blink!=" "){
    $normal .=$sentence[$i].'   <b>[ '.$blink.' ] </b>';
  }else {
      $normal .=" ".$sentence[$i];
  }

    // $normal .=" ".$blink;


}
return $normal;
}



if(isset($_GET['trash'])){
  QueryDB("DELETE FROM chat where id ='".$_GET['trash']."'  ");
  print "<script>swal({text:'Removed',type:'success',title:'Done'},
function(){ window.location = 'conversations'});</script>"; die();
}

?>
        <div class="container">
            <div class="row">
<h4 class="text-center">DETECTING VIOLENT CONVERSATIONS ON SOCIAL MEDIA IN PRESENCE OF CODED AND NATURAL LANGUAGE</h4>



                <div class="table table-responsive col-md-12">
                  <div class="col-md-5 " >
                    <h4 class="text-center" style="color:purple;">Clean Conversation Records</h4>
                <?php $num = 1;  foreach(QueryDB("SELECT * FROM chat WHERE type='clean'")as $rows){ extract($rows);?>
     <p class="text-right" style="position: relative;top:10px;"><i class="fa fa-user"></i> <?php  echo get_user($chatter);  ?></p>
                  <div  class="col-md-12" style="background: lightgray;">
                    <div class="row">

                      <div class="col-md-8" style="color:black;"><?php  echo $msg;  ?></div>
                       <div class="col-md-3" style="color:black;font-size: 10px;">

                        <?php  echo get_time_ago($time_msg);  ?></div>
<div class="col-md-1" style="color:black;"><a id="delLink" href="?trash=<?php echo $id; ?>&copy=<?php echo crypt('optics'); ?>">
  <i class="fa fa-trash-o" style="color:red"></i></a></div>
                         <div class="col-md-6" style="color:black;"><?php  echo  $get = translateSentence_clean($msg);?>
</div> </div></div>
<?php  }  ?>
                  </div>

                  <div class="col-md-1 " style="">

                  </div>


                       <div class="col-md-5 ">
                    <h4 class="text-center" style="color:purple;">Violent Conversation Records</h4>
                <?php $num = 1;  foreach(QueryDB("SELECT * FROM chat WHERE type='violent'")as $rows){ extract($rows);?>
<p class="text-right" style="position: relative;top:10px;"><i class="fa fa-user"></i> <?php  echo get_user($chatter);  ?></p>
                  <div class="col-md-12" style="background: lightgray;">
                    <div class="row">
                      <div class="col-md-8" style="color:black;"><?php  echo $msg;  ?></div>
                       <div class="col-md-3" style="color:black;font-size: 10px;"><?php  echo get_time_ago($time_msg);  ?></div>
<div class="col-md-1" style="color:black;"><a id="delLink" href="?trash=<?php echo $id; ?>&copy=<?php echo crypt('optics'); ?>">
  <i class="fa fa-trash-o" style="color:red"></i></a></div>
                         <div class="col-md-6" style="color:black;"><?php  echo translateSentence_clean($msg);  ?></div>
   <div class="col-md-6" style="color:black;"><?php  echo translateSentence($msg);  ?></div>
                    </div></div><?php  } ?>
                  </div>




                </div>


            </div>


        </div>
    </div>

 <?php include('footer.php');    ?>
<script>
    CustomConfirm('#delLink', function (confirmed, element) { if (confirmed) {
      location.href = element.href; } });





</script>

</body>
</html>
