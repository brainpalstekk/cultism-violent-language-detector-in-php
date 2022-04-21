<?php $link = 4; require('db/db.php'); ?>
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
                    <h3 style="color:red;">Recorded Chat (Machine Learning)</h3>
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
<thead><tr><th>S/N</th><th>Encoded</th><th>Decoded</th><th>Recorded Time</th></tr></thead>
<tbody>
  <?php $counter = 1;  foreach(QueryDB("SELECT * FROM  code where status=1 ORDER BY date_added DESC ")as $rows){ extract($rows);?>
  <tr><td><?php echo $counter++;  ?></td><td><?php echo $encode;  ?></td> <td><?php echo $decode;  ?></td>
    <td><?php  echo get_time_ago($rows['date_added']);  ?></td>

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
