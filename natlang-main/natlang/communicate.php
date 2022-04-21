<?php ob_start(); session_start(); $link = 3; require('db/db.php'); 
if(!isset($_SESSION['user'])){ header('location:index'); die(); }   ?>
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
    $normal .=$sentence[$i].'   [ '.$blink.' ] ';
}
return $normal;
}

// function translateSentence($sentence){
// global $arry_tab; $normal = ''; $addup = 0;
// $sentence = explode(" ",$sentence);
// for($i=0; $i < count($sentence); $i++){
//    $blink = translator($sentence[$i],$arry_tab);
//     $normal .=$sentence[$i].'   <b>[ '.$blink.' ] </b>';
// }
// return $normal;
// }



//echo translateSentence("mutula mutubu");
if(isset($_POST['post'])){ $fresh = $_POST['word'];
  $word = $_POST['word'];
  $violentCount = counttranslator($word,$arry_tab);
 //print_r($arry_tab);



 if($violentCount>=1){

//QueryDB("INSERT INTO chat VALUES('','$fresh','".time()."','violent','".$_SESSION['user']."') ");

  ?>
  <div class="alert alert-danger alert-dismissible col-md-12 text-center" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button> <strong class="text-italic">
    This Communication Suggest Violence!
<br>Meaning : <h5><?php echo $zigi = translateSentence($fresh);  ?></h5>
  </strong></div>



 <?php 
 


print "<script>swal({text:'$zigi',type:'warning',title:'Violence Suggested'},
function(){  });</script>"; die();



}else { //QueryDB("INSERT INTO chat VALUES('','$fresh','".time()."','Clean','".$_SESSION['user']."') "); ?>
<div class="alert alert-success alert-dismissible col-md-12 text-center" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button> <strong class="text-italic">
    This Communication does not Suggest Violence!
  </strong></div>
<?php 

print "<script>swal({text:'Communication does not Suggest Violence',type:'success',title:'Violence Free'},
function(){  });</script>"; die();
 }
          } ?>




        <div class="container">
            <div class="row">
<h4 class="text-center">DETECTING VIOLENT CONVERSATIONS ON SOCIAL MEDIA IN PRESENCE OF CODED AND NATURAL LANGUAGE</h4>
                <div class="text-center">
                    <h3 style="color:red;">Communication</h3>
                </div>


                <div class="table table-responsive col-md-12">

                  <div class="col-md-4 col-md-offset-4">
                    <p class="text-center" style="color:purple;border-top:1px solid purple; border-bottom:1px solid purple;">
                      Hi, <strong><?php echo $_SESSION['user'];  ?></strong> - <?php echo _greetin();  ?></p>
                   <form action="" method="POST"  >
<div class="form-group"><label>Message</label><textarea class="form-control word" cols="2" rows="5" required="" name="word"></textarea>
<p id="show" style="color:red"></p>
</div>
<div class="form-group"><input type="submit" name="post" class="form-control btn btn-info post" value="Send Message"></div>
                   </form>

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
