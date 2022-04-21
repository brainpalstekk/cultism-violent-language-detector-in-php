<?php ob_start(); session_start(); $link = 5; require('db/db.php');   ?>
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
if(isset($_POST['login'])){
  $username = validate($_POST['username']);  $password = validate($_POST['password']);

if(QueryDB("SELECT COUNT(*) FROM user WHERE username='$username' and password ='$password' ")->fetchColumn()>0){
    QueryDB("UPDATE user SET logged =last_logged where username='$username' ");
    QueryDB("UPDATE user SET last_logged ='".time()."' where username='$username' ");
    $_SESSION['user'] = $username;
    print "<script>
  swal({
    text:'fetching details...',
    title:'Please wait...',
    showCancelButton: false,
    showConfirmButton: false,
    imageUrl:'ajax-loader.gif',
    timer: 3000},function(){
            window.location = 'communicate' });</script>"; die();
}else{
print "<script>swal({text:'Account Unverified',type:'warning',title:'Invalid Login'},
function(){ window.location = 'logreg'});</script>"; die();

}

}


if(isset($_POST['register'])){
 $username = validate($_POST['username']);  $password = validate($_POST['password']);
if(QueryDB("SELECT COUNT(*) FROM user WHERE username='$username'  ")->fetchColumn()<1){
QueryDB("INSERT INTO  user VALUES('','$username','$password','".time()."','".time()."')  ");
$_SESSION['user'] = $username;

print "<script>
  swal({
    text:'Preparing Access Points for first time Login...',
    title:'Please wait...',
    showCancelButton: false,
    showConfirmButton: false,
    imageUrl:'ajax-loader.gif',
    timer: 3000},function(){
            window.location = 'communicate' });</script>"; die();


}else{
print "<script>swal({text:'Username Taken',type:'warning',title:'Invalid Username'},
function(){ window.location = 'logreg'});</script>"; die();

}

}



?>
        <div class="container">
            <div class="row">
<h4 class="text-center">DETECTING VIOLENT CONVERSATIONS ON SOCIAL MEDIA IN PRESENCE OF CODED AND NATURAL LANGUAGE</h4>



                <div class="table table-responsive col-md-12">

<div class="col-md-3 " style="">
<h1 class="text-center"><br class="hidden-sm hidden-xs"><br class="hidden-sm hidden-xs"></h1>
                  </div>

                  <div class="col-md-4 " style="border:1px dotted red;">
                   <form action="" method="POST">

                   <legend class="text-center" style="font-weight:bold;">LOGIN</legend>
                    <p class="text-center" style="font-weight:;color:red;"><?php echo @$error;  ?></p>
<div class="form-group"><label>Username</label><input type="text" name="username" class="form-control" required=""></div>

<div class="form-group"><label>Password</label><input type="password" name="password" class="form-control" required=""></div>
<div class="form-group"><input type="submit" name="login" class="form-control btn btn-info" value="Login"></div>

                   </form>

                  </div>
<!-- 
                  <div class="col-md-2 " style="">
<h1 class="text-center"><br class="hidden-sm hidden-xs"><br class="hidden-sm hidden-xs">OR</h1>
                  </div>
 -->
<?php  //if(isset($_SESSION['user'])){?>
                 <!--         <div class="col-md-4 " style="border:1px dotted red;">
                   <form action="" method="POST">
                   <legend class="text-center" style="font-weight:bold;">Register</legend>
                    <p class="text-center" style="font-weight:;color:red;"><?php //echo @$error;  ?></p>
<div class="form-group"><label>Username</label><input type="text" name="username" class="form-control" required=""></div>

<div class="form-group"><label>Password</label><input type="password" name="password" class="form-control" required=""></div>
<div class="form-group"><input type="submit" name="register" class="form-control btn btn-info" value="Login"></div>

                   </form>

                  </div> -->
<?php  // } ?>



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
