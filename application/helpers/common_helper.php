<?php
function getDaysBetweenTwoDays($date1,$date2){
  $diff = abs(strtotime($date2) - strtotime($date1));
  $years = floor($diff / (365*60*60*24));
  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
 return $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
}

?>