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
<body id="results" >
<?php
$sservice_array = array();
$sselection_array = array();

$db = mysqli_connect("localhost","myuser","myuser01","songevaldb");

$stitle_song = $_GET['song_name'] ;

$sscore_query="SELECT DISTINCT score_rating, submitter_name, submit_date FROM song_score_view WHERE song_title = '$stitle_song'";
$sscore_result=mysqli_query($db, $sscore_query);

while ($row = mysqli_fetch_assoc($sscore_result)) {
        $sscore_result_num = $row["score_rating"];
		$sscore_submitter = $row["submitter_name"];
		$sscore_date = $row["submit_date"];
    }
	
$sscore_result_str = strval($sscore_result_num);


$sservice_query="SELECT recommend_comment FROM song_score_view WHERE song_title = '$stitle_song' AND recommend_type = 'Service'";
$sservice_result=mysqli_query($db, $sservice_query);
foreach($sservice_result as $row) {
          $sservice_array[] = $row['recommend_comment'];
}

$sselection_query="SELECT recommend_comment FROM song_score_view WHERE song_title = '$stitle_song' AND recommend_type = 'Selection'";
$sselection_result=mysqli_query($db, $sselection_query);
foreach($sselection_result as $row) {
          $sselection_array[] = $row['recommend_comment'];
}


$soverall_comment_query="SELECT DISTINCT eval_comments FROM song_score_view WHERE song_title = '$stitle_song'";
$soverall_comment_result=mysqli_query($db, $soverall_comment_query);
foreach($soverall_comment_result as $row) {
          $soverall_comment = $row['eval_comments'];
}

/* free result set 
    mysqli_free_result($result);*/

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
		<form id="form_001" class="appnitro"  method="post" action="">
		<ul >
			
		<li id="li_1" >
		<label class="description" for="element_1">Song Name </label>
		<div>
			<input id="element_1" name="song_name" class="element text medium" type="text" maxlength="255" value="<?php
			   echo $stitle_song;
			   ?>"/>
		</div> 
		</li>
						
		<li id="li_2" >
		<label class="description" for="element_2">Submitter </label>
		<div>
			<input id="element_2" name="submitter" class="element text medium" type="text" maxlength="255" value="<?php
			   echo $sscore_submitter;
			   ?>"/> 
		</div> 
		</li>	
		
				<li id="li_8" >
		<label class="description" for="element_2">Date </label>
		<div>
			<input id="element_8" name="submitter" class="element text medium" type="text" maxlength="255" value="<?php
			   echo $sscore_date;
			   ?>"/> 
		</div> 
		</li>	
		
		<li id="li_3" >
		<label class="description" for="element_3">Score </label>
		<p>This song has recieved the following score. 
		  <img src="scoring_meter.JPG" alt="Score Meter" width="100" height="100" style="float:right">This song has recieved the following score...</p>
		<div>
			<input id="element_3" name="score" class="element text small" type="text" maxlength="255" value="<?php
			   echo $sscore_result_str;
			   ?>"/> 
		</div> 
		</li>		
		
	
		<li id="li_4" >
		<label class="description" for="element_4">Service Usage </label>
		<span>
			<input id="element_4_1" name="service_usage_1" class="element checkbox" type="checkbox" value="1" <?php
            if (in_array('Worship', $sservice_array)) {
                    echo ' checked';
            }
			?>/>
			<label class="choice" for="element_4_1">Worship</label>
			<input id="element_4_2" name="service_usage_2" class="element checkbox" type="checkbox" value="1" <?php
            if (in_array('Evangelistic', $sservice_array)) {
                    echo ' checked';
            }
			?>/>
			<label class="choice" for="element_4_2">Evangelistic</label>
			<input id="element_4_3" name="service_usage_3" class="element checkbox" type="checkbox" value="1" <?php
            if (in_array('Youth', $sservice_array)) {
                    echo ' checked';
            }
			?>/>
			<label class="choice" for="element_4_3">Youth</label>

		</span> 
		</li>		
		
		<li id="li_5" >
		<label class="description" for="element_5">Selection </label>
		<span>
			<input id="element_5_1" name="selection_1" class="element checkbox" type="checkbox" value="1" <?php
            if (in_array('Normal', $sselection_array)) {
                    echo ' checked';
            }
			?>/>
			<label class="choice" for="element_5_1">Normal</label>
			<input id="element_5_2" name="selection_2" class="element checkbox" type="checkbox" value="1" <?php
            if (in_array('Special', $sselection_array)) {
                    echo ' checked';
            }
			?>/>
			<label class="choice" for="element_5_2">Special</label>
			<input id="element_5_3" name="selection_3" class="element checkbox" type="checkbox" value="1" <?php
            if (in_array('Outside', $sselection_array)) {
                    echo ' checked';
            }
			?>/>
			<label class="choice" for="element_5_3">Outside</label>

		</span> 
		</li>		
		
		<li id="li_6" >
		<label class="description" for="element_6">Comments </label>
		<div>
			<textarea id="element_6" name="comments" class="element textarea medium">
			<?php
			   echo $soverall_comment;
			   ?>
			</textarea> 
		</div> 
		</li>

		</ul>
	</form>		
	</div>		  <!-- Use whatever tags are appropriate for content. -->
    </main>
		<div id="footer">
			Select new song: <a href="http://www.localhost/songeval/songeval_select.php">Back</a>
		</div>
	</div>
	</body>
</html>