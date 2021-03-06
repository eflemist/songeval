<!DOCTYPE html>
<html lang="en-ca">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./view2.css" type="text/css">
    <title>Select</title>
<!--
This is an HTML page with four major subdivisions: header, nav, main, footer.
The navigation subdivision is the focus of this example.
The site, including the nav menu, would be styled using CSS in the external stylesheet.
-->
</head>
<body id="results">  <!-- id indicates page; is used by menu CSS to indicate active page.  No JS needed. -->

<?php

$db = mysqli_connect("localhost","myuser","myuser01","songevaldb");

$stitle_query="SELECT DISTINCT song_title FROM song_score_view";
$stitle_result=mysqli_query($db, $stitle_query);

/* $num=mysql_numrows($result); */

mysqli_close($db);


?>

<div class="outer">
    <header>
	      <h1>Music Evaluation Site</h1>
        
    </header>
	
    <nav>
        <ul>
            <li class="home"><a href="songeval_home.html">home</a></li>
            <li class="requests"><a href="songeval_request.html">Request</a></li>
            <li class="evaluations"><a href="songeval_eval.html">Eval</a></li>
            <li class="results"><a href="songeval_select.php">Result</a></li>
            <li class="about"><a href="songeval_about.html">About</a></li>
        </ul>
    </nav>
	
    <main>
        <div id="form_container">
		<form id="form_001" class="appnitro"  method="get" action="songeval_result.php">
		<ul >
		<li id="li_1" >
		<label class="description" for="element_1">Song Name </label>
		<div>
			<select class="element select medium" id="element_1" name="song_name"> 
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
			    <input type="hidden" name="form_id" value="001" />
			    
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

			<li id="li_4" >
		<label class="description" for="element_4">Service Usage </label>
		<span>
			<input id="element_4_1" name="service_usage_1" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_41">Worship</label>
			<input id="element_4_2" name="service_usage_2" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_4_2">Evangelistic</label>
			<input id="element_4_3" name="service_usage_3" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_4_3">Youth</label>

		</span> 
		</li>		
		
		<li id="li_5" >
		<label class="description" for="element_5">Selection </label>
		<span>
			<input id="element_5_1" name="selection_1" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_5_1">Normal</label>
			<input id="element_5_2" name="selection_2" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_5_2">Special</label>
			<input id="element_5_3" name="selection_3" class="element checkbox" type="checkbox" value="1" readonly />
			<label class="choice" for="element_5_3">Outside</label>

		</span> 
		</li>		
		
		<li id="li_6" >
		<label class="description" for="element_6">Comments </label>
		<div>
			<textarea id="element_6" name="comments" class="element textarea medium" readonly ></textarea> 
		</div> 
		</li>
		
	</ul>
	</form>		
	</div>		  <!-- Use whatever tags are appropriate for content. -->
    </main>
    <footer>
        <div></div>  <!-- Use whatever tags are appropriate for content. -->
    </footer>
</div>

</body>
</html>


