<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

function findexts ($filename) 
{ 
	$filename = strtolower($filename); 
	$exts = preg_split("[/\\.]", $filename); 
	$n = count($exts)-1; 
	$exts = $exts[$n]; 
	return $exts; 
} 


function getMois($month){
	$mois["January"] = "Janvier";
	$mois["February"] = "Février";
	$mois["March"] = "Mars";
	$mois["April"] = "Avril";
	$mois["May"] = "Mai";
	$mois["June"] = "Juin";
	$mois["July"] = "Juillet";
	$mois["August"] = "Août";
	$mois["September"] = "Septembre";
	$mois["October"] = "Octobre";
	$mois["November"] = "Novembre";
	$mois["December"] = "Décembre";
	return $mois[$month];
}
function getAy($month){
	$mois["January"] = "Ocak";
	$mois["February"] = "Şubat";
	$mois["March"] = "Mart";
	$mois["April"] = "Nisan";
	$mois["May"] = "Mayıs";
	$mois["June"] = "Haziran";
	$mois["July"] = "Temmuz";
	$mois["August"] = "Auğustos";
	$mois["September"] = "Eylül";
	$mois["October"] = "Ekim";
	$mois["November"] = "Kasım";
	$mois["December"] = "Aralık";
	return $mois[$month];
}
function getKamer($month){
	$mois["January"] = "يناير";
	$mois["February"] = "فبراير";
	$mois["March"] = "مارس";
	$mois["April"] = "ابريل";
	$mois["May"] = "مايو";
	$mois["June"] = "يونيو";
	$mois["July"] = "يوليو";
	$mois["August"] = "اغسطس";
	$mois["September"] = "سبتمبر";
	$mois["October"] = "أكتوبر";
	$mois["November"] = "نوفمبر";
	$mois["December"] = "ديسمبر";
	return $mois[$month];
}
function getDateIntervalString($sdate, $edate)
{
	if($sdate == "" || $edate == "") return "";
	list($year1, $month1, $day1) = explode("-", $sdate);
	list($year2, $month2, $day2) = explode("-", $edate);
	
	$strDate = "";
	if($year1 == "" || $year2== "" || $month1 == "" || $month2 == "" || $day1 == "" || $day2 == ""){
		return "-";
	}	
	else if( ($year1 == $year2) && ($month1 == $month2) && ($day1 == $day2) ){
		$strDate = date("d F Y", mktime(0,0,0, $month1, $day1, $year1));
	}
	else if( ($year1 == $year2) && ($month1 == $month2) ){
		if( ($day1 == 1) && ($day2 == 28) ){
			$strDate = substr( date("d F Y", mktime(0,0,0, $month1, $day1, $year1)), 3);
		}
		else{
			$strDate = $day1."-".date("d F Y", mktime(0,0,0, $month2, $day2, $year2));
		}
	}
	else if( ($year1 == $year2) ){
		$strDate = $day1." ".date("F", mktime(0,0,0, $month1, $day1, $year1))." - ".date("d F Y", mktime(0,0,0, $month2, $day2, $year2));
	}
	else{
		$strDate = date("d F Y", mktime(0,0,0, $month1, $day1, $year1))." - ".date("d F Y", mktime(0,0,0, $month2, $day2, $year2));
	}
	
	return $strDate;
}

function getDateIntervalStringTR($sdate, $edate){

	list($year1, $month1, $day1) = explode("-", $sdate);
	list($year2, $month2, $day2) = explode("-", $edate);
	
	$strDate = "";
	if($year1 == "" || $year2== "" || $month1 == "" || $month2 == "" || $day1 == "" || $day2 == ""){
		return "-";
	}	
	else if( ($year1 == $year2) && ($month1 == $month2) && ($day1 == $day2) ){
		$strDate = date("d ", mktime(0,0,0, $month1, $day1, $year1)).getAy(date("F", mktime(0,0,0, $month1, $day1, $year1))).date(" Y", mktime(0,0,0, $month1, $day1, $year1));
	}
	else if( ($year1 == $year2) && ($month1 == $month2) ){
		if( ($day1 == 1) && ($day2 == 28) ){
			$strDate = getAy(date("F", mktime(0,0,0, $month1, $day1, $year1))).date(" Y", mktime(0,0,0, $month1, $day1, $year1));
		}
		else{
			$strDate = $day1."-".date("d ", mktime(0,0,0, $month2, $day2, $year2)).getAy(date("F", mktime(0,0,0, $month2, $day2, $year2))).date(" Y", mktime(0,0,0, $month2, $day2, $year2));
		}
	}
	else if( ($year1 == $year2) ){
		$strDate = $day1." ".getAy(date("F", mktime(0,0,0, $month1, $day1, $year1)))." - ".date("d ", mktime(0,0,0, $month2, $day2, $year2)).getAy(date("F", mktime(0,0,0, $month2, $day2, $year2))).date(" Y", mktime(0,0,0, $month2, $day2, $year2));
	}
	else{
		$strDate = date("d ", mktime(0,0,0, $month1, $day1, $year1)).getMois(date("F", mktime(0,0,0, $month1, $day1, $year1))).date(" Y", mktime(0,0,0, $month1, $day1, $year1))." - ".date("d ", mktime(0,0,0, $month2, $day2, $year2)).getMois(date("F", mktime(0,0,0, $month2, $day2, $year2))).date(" Y", mktime(0,0,0, $month2, $day2, $year2));
	}
	
	return $strDate;
}

function getDateIntervalStringFR($sdate, $edate){

	list($year1, $month1, $day1) = explode("-", $sdate);
	list($year2, $month2, $day2) = explode("-", $edate);
	
	$strDate = "";
	if($year1 == "" || $year2== "" || $month1 == "" || $month2 == "" || $day1 == "" || $day2 == ""){
		return "-";
	}	
	else if( ($year1 == $year2) && ($month1 == $month2) && ($day1 == $day2) ){
		$strDate = date("d ", mktime(0,0,0, $month1, $day1, $year1)).getMois(date("F", mktime(0,0,0, $month1, $day1, $year1))).date(" Y", mktime(0,0,0, $month1, $day1, $year1));
	}
	else if( ($year1 == $year2) && ($month1 == $month2) ){
		if( ($day1 == 1) && ($day2 == 28) ){
			$strDate = getMois(date("F", mktime(0,0,0, $month1, $day1, $year1))).date(" Y", mktime(0,0,0, $month1, $day1, $year1));
		}
		else{
			$strDate = $day1."-".date("d ", mktime(0,0,0, $month2, $day2, $year2)).getMois(date("F", mktime(0,0,0, $month2, $day2, $year2))).date(" Y", mktime(0,0,0, $month2, $day2, $year2));
		}
	}
	else if( ($year1 == $year2) ){
		$strDate = $day1." ".getMois(date("F", mktime(0,0,0, $month1, $day1, $year1)))." - ".date("d ", mktime(0,0,0, $month2, $day2, $year2)).getMois(date("F", mktime(0,0,0, $month2, $day2, $year2))).date(" Y", mktime(0,0,0, $month2, $day2, $year2));
	}
	else{
		$strDate = date("d ", mktime(0,0,0, $month1, $day1, $year1)).getMois(date("F", mktime(0,0,0, $month1, $day1, $year1))).date(" Y", mktime(0,0,0, $month1, $day1, $year1))." - ".date("d ", mktime(0,0,0, $month2, $day2, $year2)).getMois(date("F", mktime(0,0,0, $month2, $day2, $year2))).date(" Y", mktime(0,0,0, $month2, $day2, $year2));
	}
	
	return $strDate;
}

function getDateIntervalStringAR($sdate, $edate){

	list($year1, $month1, $day1) = explode("-", $sdate);
	list($year2, $month2, $day2) = explode("-", $edate);
	
	$strDate = "";
	if($year1 == "" || $year2== "" || $month1 == "" || $month2 == "" || $day1 == "" || $day2 == ""){
		return "-";
	}	
	else if( ($year1 == $year2) && ($month1 == $month2) && ($day1 == $day2) ){
		$strDate = date("d ", mktime(0,0,0, $month1, $day1, $year1)).getKamer(date("F", mktime(0,0,0, $month1, $day1, $year1))).date(" Y", mktime(0,0,0, $month1, $day1, $year1));
	}
	else if( ($year1 == $year2) && ($month1 == $month2) ){
		if( ($day1 == 1) && ($day2 == 28) ){
			$strDate = getKamer(date("F", mktime(0,0,0, $month1, $day1, $year1))).date(" Y", mktime(0,0,0, $month1, $day1, $year1));
		}
		else{
			$strDate = $day1." - ".date("d ", mktime(0,0,0, $month2, $day2, $year2)).getKamer(date("F", mktime(0,0,0, $month2, $day2, $year2))).date(" Y", mktime(0,0,0, $month2, $day2, $year2));
		}
	}
	else if( ($year1 == $year2) ){
		$strDate = $day1." ".getKamer(date("F", mktime(0,0,0, $month1, $day1, $year1)))." - ".date("d ", mktime(0,0,0, $month2, $day2, $year2)).getKamer(date("F", mktime(0,0,0, $month2, $day2, $year2))).date(" Y", mktime(0,0,0, $month2, $day2, $year2));
	}
	else{
		$strDate = date("d ", mktime(0,0,0, $month1, $day1, $year1)).getKamer(date("F", mktime(0,0,0, $month1, $day1, $year1))).date(" Y", mktime(0,0,0, $month1, $day1, $year1))." - ".date("d ", mktime(0,0,0, $month2, $day2, $year2)).getKamer(date("F", mktime(0,0,0, $month2, $day2, $year2))).date(" Y", mktime(0,0,0, $month2, $day2, $year2));
	}
	
	return $strDate;
}
/**
Validate an email address.
Provide email address (raw input)
Returns true if the email address has the email 
address format and the domain exists.
*/
function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if
(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // domain not found in DNS
         $isValid = false;
      }
   }
   return $isValid;
  }
  function field_length_validator($val, $maxlen) {
  	if (strlen($val) > $maxlen) { 
            return false;
	} 
	else return true; 
  }
  function file_upload($temp_name, $file_name,$file_size) {
	//$temp_name = $_FILES['userfile']['tmp_name'][$id];
    //$file_type = $_FILES['userfile']['type'][$id];
    //$file_size = $_FILES['userfile']['size'][$id];
    //$result    = $_FILES['userfile']['error'][$id];
	
	if (file_exists($file_name)) unlink($file_name);
	if ( $file_size > 2500000) {
		$message = "The file size is over 2MB for file $id.";
		return $message;
	}
	//File Type Check
	//else if ( $file_type != "application/pdf" ) {
		//$message = "Sorry, You can upload only pdf files" ;
		//return $message;
	//}
	$updated  =  move_uploaded_file($temp_name, $file_name);
	$message = ($updated)?"File has uploaded." : "Somthing is wrong with uploading a file.";
	return $message;
	}
	function upload_cv($file_path){
		$temp_name = $_FILES['userfile']['tmp_name'];
	    $file_type = $_FILES['userfile']['type'];
	    $file_size = $_FILES['userfile']['size'];
	    $result    = $_FILES['userfile']['error'];
		
		if (file_exists($file_path)) unlink($file_path);
		if ( $file_size > 5500000) {
			$message = "The file size is over 5MB";
			return $message;
		}
		//File Type Check
		else if ( $file_type != "application/pdf" ) {
			$message = "Sorry, You can upload only pdf files" ;
			return $message;
		}
		if(!is_writable($ROSE_CV_DIR)){ echo "error in dir</br>"; }
		$updated  =  move_uploaded_file($temp_name, $file_path);
		$message = ($updated)?"File has uploaded." : "Somthing is wrong with uploading a file.";
		return $message;
	}
	function getDurationString($type) {
		if ($type == 1) return "day(s)";
		else if ($type == 2) return "month(s)";
		else return "year(s)";
	}
	function getStatusString($type) {
		if ($type == 1) return "Ongoing";
		else if ($type == 2) return "Completed";
		else return "Proposed";
	}
	function getDurationStringFR($type) {
		if ($type == 1) return "Jour(s)";
		else if ($type == 2) return "Mois";
		else return "Année(s)";
	}
	function getStatusStringFR($type) {
		if ($type == 1) return "En Cours";
		else if ($type == 2) return "Terminé(s)";
		else return "Proposé(s)";
	}
	function getDurationStringAR($type) {
		if ($type == 1) return "يوم";
		else if ($type == 2) return "شهر";
		else return "سنة";
	}
	function getStatusStringAR($type) {
		if ($type == 1) return "جاري";
		else if ($type == 2) return "منجز";
		else return "مقترح";
	}
	
	function getGUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }
    else {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}
?>