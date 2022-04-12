<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
</head>
<body>
  <a  href="../Events">Event List</a>

<h2 class="text-center">Add Event</h2>
<form action="add" method="post">
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Event Title</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control name" value="">
      <span id="error_name" class="text-danger"></span>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Start Date</label>
    <div class="col-sm-10">
     <input type="text" name="start_date"  class="form-control datepicker"  id="start_date">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">End  Date</label>
    <div class="col-sm-10">
     <input type="text" name="end_date"  class="form-control datepicker"  id="end_date">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Recurrence</label>
    <div class="col-sm-10">
     <input type="radio" name="recurrence_type" id="repeat"  class=""  value="1" checked="">
     <label for="repeat">Repeat</label>
     <select name="repeat_type">
     	<option value="1">Every</option>
     	<option value="2">Every Other</option>

     </select>
     <select name="repeat_on">
     	<option value="1">Day</option>
     	<option value="2">Week</option>

     </select>
     <br />
     <input type="radio" name="recurrence_type" id="repeat"  class=""  value="2">
     <label for="repeat">Repeat on the </label>
      <select name="repeat_type_on">
     	<option value="1">First</option>
     	<option value="2">Second</option>

     </select>
     <select name="repeat_type_day">
     	<option value="1">Sun</option>
     	<option value="2">Mon</option>
     	<option value="3">Tue</option>
     	<option value="4">Wed</option>
     	<option value="5">Thu</option>
     	<option value="6">Fri</option>
     	<option value="7">Sat</option>


     </select>
       <select name="repeat_type_of">
     	<option value="1">Mon</option>
     	<option value="2">3 Month</option>
     </select>
    </div>

  </div>
<button id="submit" type="submit">Sumbit</button>

</form>

</body>
<script type="text/javascript">

  $(document).ready(function(){
    $flag=1;
      $(".name").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
              $('#submit').attr('disabled',true);
               $("#error_name").text("* You have to enter your first name!");
          }
          else
          {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_name").text("");

          }
    });
	 $( function() {
    $( "#start_date" ).datepicker({
    	format: 'yyyy-mm-dd',
      onSelect: function(selected) {
           $("#end_date").datepicker("option","maxDate", selected)
        }
    });

    $( "#end_date" ).datepicker({
    	format: 'yyyy-mm-dd',


    });
  } );
 
</script>
</html>