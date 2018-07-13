<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Song Eval Results</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
<?php

$db = mysqli_connect("localhost","myuser","myuser01","songevaldb");

$stitle_query="SELECT DISTINCT song_title FROM song_score_view";
$stitle_result=mysqli_query($db, $stitle_query);

/* $num=mysql_numrows($result); */

mysqli_close($db);


?>
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Song Eval Results</a></h1>
		<form id="form_73729" class="appnitro"  method="get" action="songeval_result.php">
					<div class="form_description">
			<h2>Song Eval Results</h2>
			<p></p>
		</div>						
			<ul >
			
		<li id="li_7" >
		<label class="description" for="element_7">Song Name </label>
		<div>
		<select class="element select medium" id="element_7" name="song_name"> 
		<?php foreach ($stitle_result as $row)
		{
			?>
		<option value="<?php echo $row['song_title'];?>"><?php echo $row['song_title'];?></option>
		<?php
		}
		 ?>		
		</select>
		</div> 
		</li>
						
		<li class="buttons">
			    <input type="hidden" name="form_id" value="73729" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
		<br>
		<br>
		
		<li id="li_2" >
		<label class="description" for="element_2">Submitter </label>
		<div>
			<input id="element_2" name="submitter" class="element text medium" type="text" maxlength="255" value="" readonly /> 
		</div> 
		</li>	
		
		<li id="li_3" >
		<label class="description" for="element_3">Score </label>
		<div>
			<input id="element_3" name="score" class="element text small" type="text" maxlength="255" value="" readonly /> 
		</div> 
		</li>		
		
		<li id="li_5" >
		<label class="description" for="element_5">Service Usage </label>
		<span>
			<input id="element_5_1" name="service_usage_1" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_5_1">Worship</label>
			<input id="element_5_2" name="service_usage_2" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_5_2">Evangelistic</label>
			<input id="element_5_3" name="service_usage_3" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_5_3">Youth</label>

		</span> 
		</li>		
		
		<li id="li_6" >
		<label class="description" for="element_6">Selection </label>
		<span>
			<input id="element_6_1" name="selection_1" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_6_1">Normal</label>
			<input id="element_6_2" name="selection_2" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_6_2">Special</label>
			<input id="element_6_3" name="selection_3" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_6_3">Outside</label>

		</span> 
		</li>		
		
		<li id="li_4" >
		<label class="description" for="element_4">Comments </label>
		<div>
			<textarea id="element_4" name="comments" class="element textarea medium" readonly ></textarea> 
		</div> 
		</li>

		</ul>
			
		</form>	
		<div id="footer">
			Select new song: <a href="http://www.localhost/songeval/songeval_select.php">Here</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>