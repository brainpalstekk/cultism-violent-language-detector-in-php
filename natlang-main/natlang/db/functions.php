<?php
 // $date = date('D, dS F Y @ H:i:s A');
function QueryDB($query){
  global $db;
  return $db->query($query);
}

//Reduce Length of Description to 180 only.
function _duration($text){
  if(strlen($text) > 200){ $returnText = substr($text,0,200).'...';}else{
    $returnText = $text;
  }
  return $returnText;
}


//Check if the field was Empty
function emptyResponse($field,$error){
  if(empty($_POST[$field])){ return $error; }
}



function validate($value){
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  $value = str_replace('"','&quot;', $value);
  $value = str_replace("'",'&apos;', $value);
  return $value;
  }

  function code_pics($count){
    $alphabets ='ABCDEFGHIJKLMNOPQRSTUVWXYZ'; $rCode = rand(10,99);
    $class_unique = rand(10,99).substr(str_shuffle($alphabets),0,$count).$rCode;
    return $class_unique;
  }





function _greetin(){

date_default_timezone_set('Africa/lagos');

// 24-hour format of an hour without leading zeros (0 through 23)
$Hour = date('G');

if ( $Hour >= 1 && $Hour <= 11 ) {

  $salute = 'Hope you slept well?  ';
} else if ( $Hour >= 12 && $Hour <= 16 ) {

  $salute = 'How are you today? ';
} else if ( $Hour >= 17 || $Hour <= 22 ) {

  $salute = 'Bonsoir ';
}
else if ( $Hour >= 23 || $Hour <= 24 ) {

    $salute = 'How was your day?   ';
}
return $salute;
}



function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}


function get_user($user_name){
  $start = QueryDB("SELECT * FROM  user WHERE username='$user_name'  ");
  $rows = $start->fetch(PDO::FETCH_ASSOC);
  return $rows['username'];
}
?>









