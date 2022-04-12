<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body>
  <a  href="Events/add">Add</a>
<table>
	<div class="container">
          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Dates</th>
        <th>Occurrence</th>
        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
    	<?php
    		foreach ($events as $key => $event) {
    	?>
      <tr>
        <td><?=$event['name']?></td>
        <td><?php echo date("Y-m-d",$event['start_date'])." to ".date("Y-m-d",$event['end_date']);?></td>
        <td>
        	<?php
        		if($event['recurrence_type'] == 1){
        			$repeat_type=($event['repeat_type'] == 1)?'Every ':'Every other ';
        			$repeat_type_on = ($event['repeat_type_on'] == 1)?'Day':'Week';
        			$occurance_type=$repeat_type." ".$repeat_type_on;

        		}
        		// if($event['repeat_type_on'] == 1){
        		// }
        		echo $occurance_type;
        		

        	?>

        </td>
        <th>
        	<?php 
        	$viewhref="Events/viewEevent?id=".$event['id'];
        		$deletehref="Events/deleteEvent?id=".$event['id'];
        	echo "<a href=".$viewhref.">View</a>";
        	echo "&nbsp;";
        	echo "&nbsp;";

        	echo "<a href=".$deletehref.">Delete</a>";
        	?>
        </th>

      </tr>
      <?php }?>
  </table>
</div>
</table>
</body>
</html>