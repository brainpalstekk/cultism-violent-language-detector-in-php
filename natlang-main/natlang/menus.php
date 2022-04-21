 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:blue;">
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <i class="fa fa-bars " style="color:white;"></i>
                </button>
                <a class="navbar-brand" href="index">Violent Language Detector (VLD)</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
<?php  if(!isset($_SESSION['user'])) {}else{?>
 <!-- <li class="<?php  //if($link==5){ echo 'active';}   ?>"><a href="logreg"><i class="fa fa-list-ol"></i> Login</a></li>
  -->
 <li class="<?php  if($link==2){ echo 'active';}   ?>"><a href="encode"><i class="fa fa-tasks"></i> Encode</a></li>
  <li class="<?php  if($link==3){ echo 'active';}   ?>"><a href="communicate"><i class="fa fa-list-ol"></i> Communicate (Chat)</a></li>
  <li class="<?php  if($link==4){ echo 'active';}   ?>"><a href="machine_learning"><i class="fa fa-code"></i> Machine Learning (Training)</a></li>
  <li class="<?php  if($link==1){ echo 'active';}   ?>"><a href="index"><i class="fa fa-bullseye"></i> Preview</a></li>
                   
                    <!-- <li class="<?php  //if($link==3){ echo 'active';}   ?>"><a href="blog.html"><i class="fa fa-globe"></i> Encode</a></li> -->
 <li class="<?php  if($link==6){ echo 'active';}   ?>"><a href="conversations"><i class="fa fa-comments"></i> Conversations</a></li>
<!--  <li class="<?php  //if($link==6){ echo 'active';}   ?>"><a href="create_user"><i class="fa fa-user-plus"></i> Create User</a></li> -->

  <?php  if(isset($_SESSION['user'])){?>
  <li class=""><a href="logout"><i class="fa fa-sign-out"></i> Logout</a></li>
<?php  } ?>
<?php  } ?>


            </div>
        </nav>
