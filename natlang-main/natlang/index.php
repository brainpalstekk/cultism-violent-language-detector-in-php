<?php ob_start(); session_start(); require('db/db.php');  $link = 1;
if(!isset($_SESSION['user'])) { header('location:logreg.php');}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violent Language Detector</title><?php  include('links.php');  ?>

<style>
  table tr th { text-align: center; }
</style>
</head>
<body>

    <div id="wrapper">

<?php include('menus.php');?>

        <hr />

        <div class="container">
            <div class="row">
<h4 class="text-center">DETECTING VIOLENT CONVERSATIONS ON SOCIAL MEDIA IN PRESENCE OF CODED AND NATURAL LANGUAGE</h4>
                <div class="text-center">
                    <h3 style="color:red;">Preview Panel</h3>
                </div>


                <div class="table table-responsive col-md-12">
             <?php

$EtoF = array('bread'=>'du pain', 'wine'=> 'du vin','eats'=> 'mange', 'drinks'=> 'bois','likes'=> 'aime', 1=> 'un','6.00'=>'6.00','john'=>'Jean');

//$EtoF = array('du pain'=>'bread', 'du vin'=> 'wine','mange'=> 'eats', 'bois'=> 'bois','likes'=> 'aime', 1=> 'un','6.00'=>'6.00','john'=>'Jean');

function translator($word,$dictionary){
  if(array_key_exists($word,$dictionary)){
      return $dictionary[$word];
  }else { return $word;}
}


function counttranslator($word,$dictionary){
  $beginCount = 0;
  if(array_key_exists($word,$dictionary)){
       $beginCount++;
  }
  return $beginCount;
}


//echo counttranslator('wine',$EtoF);

#A Sentence Translator Irrespective of the Case
function translateSentence($sentence){
global $EtoF; $normal = ''; $addup = 0;
$sentence = explode(" ",$sentence);
for($i=0; $i < count($sentence); $i++){
   // $blink = translator($sentence[$i],$EtoF);
    $blink = counttranslator($sentence[$i],$EtoF);
    if(array_key_exists($sentence[$i],$EtoF)){
       $addup++;
  }
    //$normal .=' '.$blink;
}
return $addup;
}

//echo translateSentence("bread and wine");



if(isset($_GET['trash'])){
  QueryDB("DELETE FROM code WHERE id ='".$_GET['trash']."' ");
  print "<script>swal({text:'Item was Trashed!',type:'success',title:'Viola'},
function(){ window.location = 'index'});</script>"; die();
}

if(isset($_POST['modify_text'])){
  $position = $_POST['position'];
  $word = validate($_POST['word']);
  $meaning = validate($_POST['meaning']);

if(QueryDB("UPDATE code SET encode ='$word', decode ='$meaning' WHERE id ='$position' LIMIt 1 ")){
print "<script>swal({text:'Item was Modified!',type:'success',title:'Viola'},
function(){ window.location = 'index'});</script>"; die();
}
}






?>
<table class="table table-bordered table-hover table-striped  text-center" id="example1">
<thead><tr><th>S/N</th><th>Encoded</th><th>Decoded</th><th>Action</th></tr></thead>
<tbody>
  <?php $counter = 1;  foreach(QueryDB("SELECT * FROM  code where status=1 ORDER BY date_added DESC ")as $rows){ extract($rows);?>
  <tr><td><?php echo $counter++;  ?></td><td><?php echo $encode;  ?></td> <td><?php echo $decode;  ?></td>
<td>
  <a href="?trash=<?php  echo $id;  ?>&pass=<?php echo crypt('optics');  ?>" id="delLink"><i class="fa fa-trash-o btn btn-danger"></i></a>
  <a  href="#ajax<?php echo $id;  ?>"  data-toggle="modal"><i class="fa fa-edit btn btn-info"></i></a>
<!--Office Creation-->
<div id="ajax<?php echo $id;  ?>" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog"><div class="modal-content col-md-8">
      <div class="modal-header " style="color:purple;font-family:cursive;text-align: center;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></div>
    <div class="modal-body">
      <h4 class="text-center">Modify Input</h4>
    <form action='index' method='POST' role='form'>
      <input type="hidden" name="position" value="<?php echo $id;  ?>" required>
        <label class="text-info">Word </label>
<div class="form-group"><input type="text" name="word" value="<?php  echo $encode; ?>"
    class="form-control" placeholder="word" required></div>

    <div class="form-group"> <label class="text-info">Meaning</label><input type="text" name="meaning" value="<?php  echo $decode; ?>"
    class="form-control" placeholder="meaning" ></div>
<input type="submit" name="modify_text"
class="form-control input-xs btn btn-primary input-xs input-sm" value="MKodify"
style="margin-top:1%;"></form></div></div></div></div>
<!--end of Office Creation-->
</td>
  </tr><?php } ?>
</tbody>
</table>
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
