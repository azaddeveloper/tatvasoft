<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body>
  <h2 class="text-left"><?=$event['name']?></h2>
<table>
	<div class="container">
          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Date</th>
        <th>Day Name</th>
      </tr>
    </thead>

    <tbody>
      <?php
      $finalDaysArray=array();
      if($event['recurrence_type'] == 1){
        if($event['repeat_type'] == 1){ // every
          if($event['repeat_type_on'] == 1){ // Day 
              $start_date=$event['start_date'];
              $end_date=$event['end_date'];
              $date1 = date("Y-m-d",$start_date);
              $date2 = date("Y-m-d",$end_date);
              $days= getDaysBetweenTwoDays($date1,$date2);
              for($i=0;$i<=$days;$i++){ 
                $date=date("Y-m-d",strtotime($date1 . "+ ".$i."  day"));;
                $dayName=date('l', strtotime($date));;
                $finalDaysArray[$i]['date']= $date;
                $finalDaysArray[$i]['dayName']= $dayName;
              }
          } 

          if($event['repeat_type_on'] == 2){ // week 
              $start_date=$event['start_date'];
              $end_date=$event['end_date'];
              $date1 = date("Y-m-d",$start_date);
              $date2 = date("Y-m-d",$end_date);
              $days= getDaysBetweenTwoDays($date1,$date2);
              for($i=0;$i<=$days;$i++){ 
                $date=date("Y-m-d",strtotime($date1 . "+ ".$i."  day"));;
                $dayName=date('l', strtotime($date));;
                $finalDaysArray[$i]['date']= $date;
                $finalDaysArray[$i]['dayName']= $dayName;
                $i += 6;

              }
          } 
        }
        if($event['repeat_type'] == 2){ //every other
          $start_date=$event['start_date'];
          $end_date=$event['end_date'];
          $date1 = date("Y-m-d",$start_date);
          $date2 = date("Y-m-d",$end_date);
          $days= getDaysBetweenTwoDays($date1,$date2);
          for($i=0;$i<=$days;$i++){ 
                $date=date("Y-m-d",strtotime($date1 . "+ ".$i."  day"));;
                $dayName=date('l', strtotime($date));;
                $finalDaysArray[$i]['date']= $date;
                $finalDaysArray[$i]['dayName']= $dayName;
                $i++;
          }
        }
      }
      foreach ($finalDaysArray as $key => $value) {
        
      ?>
      <tr>
        <td><?=$value['date']?></td>
        <td><?=$value['dayName']?></td>

      </tr>
    <?php }?>
    	</tbody>
  </table>
  <h3>Total Recurrence Event: <?=count($finalDaysArray)?> </h3>
</div>
</table>
</body>
</html>