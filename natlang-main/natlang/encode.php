<?php ob_start(); session_start();  $link = 2; require('db/db.php');
if(!isset($_SESSION['user'])) { header('location:logreg.php');}
 ?>
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
if(isset($_POST['post'])){ $word = validate($_POST['word']);     $meaning = validate($_POST['meaning']);
if(QueryDB("SELECT COUNT(*) FROM code WHERE encode ='$word'  ")->fetchColumn()>0){
print "<script>swal({text:'Word Previously Exists',type:'warning',title:'Duplicate'},
function(){ window.location = 'encode'});</script>"; die();
}
if(QueryDB("INSERT INTO code VALUES('','$word','$meaning','1','".time()."') ")){
print "<script>swal({text:'Successful',type:'success',title:'Viola'},
function(){ window.location = 'encode'});</script>"; die();
  }
}





?>
        <div class="container">
            <div class="row">
<h4 class="text-center">DETECTING VIOLENT CONVERSATIONS ON SOCIAL MEDIA IN PRESENCE OF CODED AND NATURAL LANGUAGE</h4>
                <div class="text-center">
                    <h3 style="color:red;">Encode Text</h3>
                </div>


                <div class="table table-responsive col-md-12">

                  <div class="col-md-6 col-md-offset-2">
                   <form action="" method="POST">
<div class="form-group"><label>Word</label><textarea class="form-control word" cols="2" rows="2" required="" name="word"></textarea>
<p id="show" style="color:red"></p>
</div>
<div class="form-group"><label>Meaning</label><textarea class="form-control meaning" cols="2" rows="2" required="" name="meaning"></textarea></div>
<div class="form-group"><input type="submit" name="post" class="form-control btn btn-info post" value="Post"></div>
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

$('.post').prop('disabled',true);

  $('.word').blur(function(){
    word = $(this).val();
      $.ajax({url: 'check_word', type: 'POST',data: {word: word},success: function (result) {
    if(result==1){
    $.toast({title: 'Word Already Exists', position: 'middle',backgroundColor: 'red',fontWeight:'bolder',width: '250px',duration: 2000 });
    $('#show').html('Word Already Assigned a Meaning');
    $('.post').prop('disabled',true);
}else {
  $('.post').prop('disabled',false);
}

}

});

  });



</script>

</body>
</html>
