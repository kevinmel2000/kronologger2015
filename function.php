<?
function ambil_kordinat_latlon($msgid,$link) {
  $sql1=" select lat_shout  ";
  $sql1=$sql1. " from shout ";
  $sql1=$sql1. " where msgid ='$msgid' ";
  foreach($link->query($sql1) as $row) {
     $lat_shout= $row['lat_shout'];
  }

  $sql1=" select lon_shout  ";
  $sql1=$sql1. " from shout ";
  $sql1=$sql1. " where msgid ='$msgid' ";
  foreach($link->query($sql1) as $row) {
     $lon_shout= $row['lon_shout'];
  }

  if ($lat_shout!="" &&  $lon_shout!="" ) {
    return  $lat_shout. "," .$lon_shout;
  }
  else {
    return "";
  }

}// end function

function getpasswordFile($id,$link) {
	$sql1=" select passprotected ";
	$sql1=$sql1. " from shout ";
	$sql1=$sql1. " where msgid ='$id' ";
  foreach($link->query($sql1) as $result) {
    $passprotected= $result['passprotected'];
  }

	return $passprotected;
}
 function makeClickableLinks($text) {
  $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_+.~#?&//=]+)','<a target=_new href="\1">\1</a>', $text);
  $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_+.~#?&//=]+)','\1<a target=_new href="http://\2">\2</a>', $text);
  $text = eregi_replace('([_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3})','<a href="mailto:\1">\1</a>', $text);
 return $text;
}

function clear_variable_post_get($namevariablel)
{
   //$namevariablel = mysql_real_escape_string($namevariablel);
  //echo "<br>namevariablel = ".$namevariablel;
  //$namevariablel = addslashes($namevariablel);
  //echo "<br>namevariablel = ".$namevariablel;
  //$namevariablel=strip_tags($namevariablel);
    $return = $namevariablel;
  //echo "<br>return = ".$return;
  return $return;
}

function tampilkanconverzonawaktu($waktutercetak,$link) {
  $sqlentrysekarang="SELECT DATE_SUB('$waktutercetak', INTERVAL -13 HOUR) as zonewaktu";
  foreach($link->query($sqlentrysekarang) as $row) {
  $zonewaktu= $row['zonewaktu'];
}
//$get=mysql_query($sqlentrysekarang) or die('Error, zonetime failed');
//$result=mysql_fetch_array($get);
//$zonewaktu= $result['zonewaktu'];
return $zonewaktu;
}

function time_left($integer)
{ /* Returns a string of the amount of time the integer (in seconds) refers
to.
$timeleft=time_left(86400);
$timeleft='1 day'.
Will not return anything higher than weeks. False if $integer=0 or fails.
*/

$seconds=$integer;
if ($seconds/60 >=1)
	{
	$minutes=floor($seconds/60);
	if ($minutes/60 >= 1)
		{ # Hours
		$hours=floor($minutes/60);
		if ($hours/24 >= 1)
			{ #days
			$days=floor($hours/24);
			if ($days/7 >=1)
				{ #weeks
				$weeks=floor($days/7);
				if ($weeks>=2) $return="$weeks weeks";
				else $return="$weeks week";
				} #end of weeks
			$days=$days-(floor($days/7))*7;
			if ($weeks>=1 && $days >=1) $return="$return, ";
			if ($days >=2) $return="$return $days days";
			if ($days ==1) $return="$return $days day";
			} #end of days
		$hours=$hours-(floor($hours/24))*24;
		if ($days>=1 && $hours >=1) $return="$return, ";
		if ($hours >=2) $return="$return $hours hours";
		if ($hours ==1) $return="$return $hours hour";
		} #end of Hours

	$minutes=$minutes-(floor($minutes/60))*60;
	if ($hours>=1 && $minutes >=1) $return="$return, ";
	if ($minutes >=2) $return="$return $minutes minutes";
	if ($minutes ==1) $return="$return $minutes minute";
	} #end of minutes
$seconds=$integer-(floor($integer/60))*60;
if ($minutes>=1 && $seconds >=1) $return="$return, ";
if ($seconds >=2) $return="$return $seconds seconds";
if ($seconds ==1) $return="$return $seconds second";
$return="$return ";
return $return. " ago ";
}
?>
