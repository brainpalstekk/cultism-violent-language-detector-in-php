<?php $link = 1; require('db/db.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Violent Natural Language Decoders</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="file/site.min.css">
    <script  src="file/site.min.js"></script>

    <script  src="dTables/jquery-3.3.1.min.js"></script>
    <script  src="dTables/jquery.dataTables.js"></script>
    <script  src="dTables/dataTables.bootstrap.js"></script>
    <script  src="dTables/init_tables.js"></script>
    <link  href="dTables/dataTables.bootstrap.css">
    <link  href="dTables/jquery.dataTables.css">

    <script  src="tab/sweetalert.min.js"></script>
    <link  href="tab/sweetalert.css">
    <script  src="tab/vanila_del_prompt.js"></script>
    <link  href="tab/vanila_del_prompt.css">

    <script src="tab/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="tab/bootstrap.min.css">
  </head>
  <body>
    <!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid" style="background-color:#4FC1E9">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header" style="background-color:#4FC1E9">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <i class="fa fa-bars" style="color:white;"></i>
            </button>
            <a href="#" class="navbar-brand" style="background-color:#4FC1E9; color:#000;font-weight: bold;">NATDECODE</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="getting-started.html">Getting Started</a></li>
              <li class="active"><a href="index.html">Documentation</a></li>
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Silverbux <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header">Setting</li>
                  <li><a href="#">Action</a></li>
                  <li class="divider"></li>
                  <li class="active"><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li class="disabled"><a href="#">Signout</a></li>
                </ul>
              </li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <!--header-->
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>SIDE PANEL</b></li>
                <li class="list-group-item"><input type="text" class="form-control search-query" placeholder="Search Something"></li>
                <li class="list-group-item <?php if($link=1){ echo 'active';}  ?>"><a href="index.html"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>
                <li class="list-group-item"><a href="icons.html"><i class="glyphicon glyphicon-certificate"></i>Text </a></li>
                <li class="list-group-item"><a href="list.html"><i class="glyphicon glyphicon-th-list"></i>Encode</a></li>
                <li class="list-group-item"><a href="forms.html"><i class="glyphicon glyphicon-list-alt"></i>Store</a></li>
              <!--   <li class="list-group-item"><a href="alerts.html"><i class="glyphicon glyphicon-bell"></i>Alerts</li>
                <li class="list-group-item"><a href="timeline.html" ><i class="glyphicon glyphicon-indent-left"></i>Timeline</a></li>
                <li class="list-group-item"><a href="calendars.html" ><i class="glyphicon glyphicon-calendar"></i>Calendars</a></li>
                <li class="list-group-item"><a href="typography.html" ><i class="glyphicon glyphicon-font"></i>Typography</a></li>
                <li class="list-group-item"><a href="footers.html" ><i class="glyphicon glyphicon-minus"></i>Footers</a></li>
                <li class="list-group-item"><a href="panels.html" ><i class="glyphicon glyphicon-list-alt"></i>Panels</a></li>
                <li class="list-group-item"><a href="navs.html" ><i class="glyphicon glyphicon-th-list"></i>Navs</a></li>
                <li class="list-group-item"><a href="colors.html" ><i class="glyphicon glyphicon-tint"></i>Colors</a></li>
                <li class="list-group-item"><a href="flex.html" ><i class="glyphicon glyphicon-th"></i>Flex</a></li>
                <li class="list-group-item"><a href="login.html" ><i class="glyphicon glyphicon-lock"></i>Login</a></li> -->
              <!--   <li>
                  <a href="#demo3" class="list-group-item " data-toggle="collapse">Item 3  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div class="collapse" id="demo3">
                    <a href="#SubMenu1" class="list-group-item" data-toggle="collapse">Subitem 1  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <div class="collapse list-group-submenu" id="SubMenu1">
                      <a href="#" class="list-group-item">Subitem 1 a</a>
                      <a href="#" class="list-group-item">Subitem 2 b</a>
                      <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse">Subitem 3 c <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
                        <a href="#" class="list-group-item">Sub sub item 1</a>
                        <a href="#" class="list-group-item">Sub sub item 2</a>
                      </div>
                      <a href="#" class="list-group-item">Subitem 4 d</a>
                    </div>
                    <a href="javascript:;" class="list-group-item">Subitem 2</a>
                    <a href="javascript:;" class="list-group-item">Subitem 3</a>
                  </div>
                </li> -->
               <!--  <li>
                  <a href="#demo4" class="list-group-item " data-toggle="collapse">Item 4  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo4">
                      <a href="" class="list-group-item">Subitem 1</a>
                      <a href="" class="list-group-item">Subitem 2</a>
                      <a href="" class="list-group-item">Subitem 3</a>
                    </li>
                </li> -->
              </ul>
          </div>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar">
                  <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Natural Language Preview</h3>
              </div>
              <div class="panel-body">
                  <div class="content-row"><h2 class="content-row-title">Preview of Violent Languages</h2> </div>

                  <div class="content-row">
                    <div class="row">

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


echo counttranslator('wine',$EtoF);

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




// echo translateSentence("We will eat bread and wine today");
echo translateSentence("bread and wine");
    // $addWords = ''; $addTranslated = '';
    // $sentence = strtolower($sentence);

    // $sentence = explode(" ",$sentence);
    // foreach($sentence as $words){
    //   $words = strtolower($words);
    //   if($words!=' '){
    //     $addWords = $addWords + $words;
    //   }else {
    //     $addTranslated = $addTranslated + " ".translator($addWords,$EtoF);
    //     $addWords = '';
    //   }
    // }
    // // return substr($addTranslated)[0]+' '.translator($addWords,$EtoF);
    // return substr($addTranslated,0).' '.translator($addWords,$EtoF);
 //}

  //echo translateSentence('The bread is wine');
    // for words in sentence:
    //     words = words.lower()
    //     if words !=' ':
    //         addWords = addWords + words
    //     else:
    //         addTranslated = addTranslated + ' ' +translator(addWords, EtoF)
    //         addWords = ''
    // return addTranslated[1:]+ ' ' + translator(addWords, EtoF)

##A Sentence Translator Irrespective of the Case
// def translateSentence(sentence):
//     addWords = ''
//     addTranslated = ''
//     sentence = sentence.lower()
//     for words in sentence:
//         words = words.lower()
//         if words !=' ':
//             addWords = addWords + words
//         else:
//             addTranslated = addTranslated + ' ' +translator(addWords, EtoF)
//             addWords = ''
//     return addTranslated[1:]+ ' ' + translator(addWords, EtoF)


?>
<table class="table table-bordered table-hover table-striped  text-center" id="example1">
<thead><tr><th>S/N</th><th>Encoded</th><th>Decoded</th><th>Action</th></tr></thead>
<tbody>
  <?php $counter = 1;  foreach(QueryDB("SELECT * FROM  code where status=1 ")as $rows){ extract($rows);?>
  <tr><td><?php echo $counter++;  ?></td><td><?php echo $encode;  ?></td> <td><?php echo $decode;  ?></td>
<td>
  <a href="?trash=<?php  echo $id;  ?>&pass=<?php echo crypt('optics');  ?>" id="delLink"><i class="fa fa-trash-o btn btn-danger"> Delete</i></a>
  <a href="?edit=<?php  echo $id;  ?>&pass=<?php echo crypt('optics');  ?>"><i class="fa fa-edit btn btn-info"> Edit</i></a>

</td>
  </tr><?php } ?>
</tbody>
</table>
                    </div>
                  </div>

                  <div class="content-row">

                    <div class="row">

                      <div class="col-md-12">



                </div>
                </div>
                </div>

                <!-- Jumbotron
                                ================================================== -->

                <!-- Thumbnails
                                ================================================== -->
                                <!--start here-->
                <!-- <div class="content-row">
                  <h2 class="content-row-title">Thumbnails</h2>
                  <div class="row">
                    <div class="col-sm-6 col-md-3">
                      <div class="thumbnail">
                        <img class="img-rounded" src="dist/img/thumbnail-1.jpg">
                        <div class="caption text-center">
                          <h3>Thumbnail label</h3>
                          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id ...</p>
                          <p><a href="#" class="btn btn-warning" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="thumbnail">
                        <img class="img-rounded" src="dist/img/thumbnail-2.jpg">
                        <div class="caption text-center">
                          <h3>Thumbnail label</h3>
                          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id ...</p>
                          <p><a href="#" class="btn btn-warning" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="thumbnail">
                        <img class="img-rounded" src="dist/img/thumbnail-3.jpg">
                        <div class="caption text-center">
                          <h3>Thumbnail label</h3>
                          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id ...</p>
                          <p><a href="#" class="btn btn-warning" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="thumbnail">
                        <img class="img-rounded" src="dist/img/thumbnail-4.jpg">
                        <div class="caption text-center">
                          <h3>Thumbnail label</h3>
                          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id ...</p>
                          <p><a href="#" class="btn btn-warning" role="button">Button</a>  <a href="#" class="btn btn-default" role="button">Button</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
<!--e3nd --here-->



              </div><!-- panel body -->
            </div>
        </div><!-- content -->
      </div>
    </div>
    <!--footer-->
<script>
    CustomConfirm('#delLink', function (confirmed, element) { if (confirmed) {
      location.href = element.href; } });
</script>
  </body>
</html>
