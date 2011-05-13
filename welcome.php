<div class=page>
<?php

// Fluttery Init (needed to use config,content and instance variables)
$config=$session->config;
$content=$session->content;
$instance=$session->instance;
$instid= $session->instance['instance_id'];

//Facebook Data Init (needed to use the Facebook User Data.
$signed_request = $_REQUEST["signed_request"];
list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

// Get content from App-Arena
$columns = $config['number_column'];
$rows = $config['number_row'];
$image_folder = $config['folder_image'];  

/* The images have to have the following filenames:
 * Full clear Image			img_clear.jpg
 * Image Parts (blur)		 	img_blur_001.jpg ... img_blur_100.jpg
 * Image Parts (clear)			img_clear_001.jpg ... img_clear_100.jpg
*/

// Full number of images
$number_img = $columns * $rows;

// No Fan Content (User who are not Fan of the Page see)
if ($data['page']['liked'] == 0) { ?>
		
		<div class="pageLandingNonFans"> 
			<div style="position:absolute; top:50px; left:150px;">
					<?=$content['no_fan_img']?>
			</div>
		</div>		
	<?php }


//Get User Permissons and Request
?> 
<script type="text/javascript">
function fbAuthAndSubmit(appID, scope) {
//	alert("Function fbauth");
	var permsGranted;
	permsGranted = true;
	var res = FB.ui({
		   method: 'permissions.request',
		   'perms': scope,
		   'display': 'popup'
		  },
			function(response) {				
			  	if (response.perms != null && isSetProperSubset(scope.split(","), response.perms.split(","))) {
//					alert("Berechtigung erteilt.");
//					alert(jQuery("#formX").html()) ; 
					document.getElementById("formX").submit();
				}
			}
	);
};
function isSetProperSubset(subset, superset) {
	  // first check lengths
	  if (subset.length > superset.length) {
	    return false;
	  }

	  var lookup = {};

	  for (var j in superset) {
	    lookup[superset[j]] = superset[j];
	  }

	  for (var i in subset) {
	    if (typeof lookup[subset[i]] == 'undefined') {
	      return false;
	    } 
	  }
	  return true;
};
</script>

<?// The Top Content of the Facebook Page?>
<div id=content>
		<?=$content['top_content']?>
	</div>
<?

// SELECT Database and get uncovered photo parts from database
$sql = "SELECT * FROM `image_parts` WHERE `clear`='1' AND `instance_id`=" . $instance['instance_id'];
$table = $global->db->fetchAll($sql);
$fields = array();
foreach ($table as $row) {
	$fields[$row['row']][$row['column']] = true;
}

//2) Check every Image if it is solved.
$image_solved = false;
if (isset($fields) && count($fields) > 0) {
	$image_solved = true;
	for ($i = 1; $i <= $rows; $i++) {
		for ($j = 1; $j <= $columns; $j++) {
			if (isset($fields[$i][$j]) && $fields[$i][$j])
				$image_solved = false;
		}
	}
}


//Show Message if all Images are solved.
if ($image_solved) {
?>  		
			<div id=solve_content>
				<?=$content['solved_content']?>
			</div>
<?
		echo "<img src='" . $image_folder . "img_clear.jpg'/>";
	die();
}

// Check in the Cookies if the User used the App. If he used the App before show Content.
$alreadyParticipated = false; 
if(isset($_COOKIE['img_participant']['$instid'])) {
	$alreadyParticipated = true;	
	?> <div id=solve_content>
		<?=$content['solve_content']?>
	</div>
<?
 }
 else 
{
// If the User dont use the App before shwo a random image which is not solved yet.
$part = true;
while ($part && !$image_solved) {
	$row_rand = rand(1,$rows);
	$col_rand = rand(1,$columns);	
	$img_nr1 = ($row_rand -1) * $columns +  $col_rand;
	if (isset($fields[$row_rand][$col_rand]) && $fields[$row_rand][$col_rand]){
			$part = true;
	}	else {?>
			<div>
				<?=$content['click_img']?>
			</div>
			<div id=random_img>
				<img src="<?=$image_folder?>img_clear_<?echo getNrAsStr($img_nr1)?>.jpg"/>
			</div>	
			<?$part = false;
			
		// Form with send the data of the right image if the user click on the right image ?>
		<form id='formX' method='POST' action='thank_you.php?instid=<?=$instid?>'>
			<input type='hidden' name='Row' value='<?=$row_rand?>' >
			<input type='hidden' name='Column' value='<?=$col_rand?>'>
			<input type='hidden' name='signed_request' value='<?=$_REQUEST['signed_request']?>'>
		</form>
	<?php }}	
 }	

// Show all images (blur and clear) and generate the Url for the correct image.
$img_nr2 = 1;
for ($i = 1; $i <= $rows; $i++) {
	for ($j = 1; $j <= $columns; $j++) {
		$img_nr2 = ($i - 1) * $columns + $j;
		if (isset($fields[$i][$j]) && $fields[$i][$j])
			echo "<img src='" . $image_folder . "img_clear_" . getNrAsStr($img_nr2) .  ".jpg' />";
		else
//			echo "<a href='#$img_nr2'><img src='" . $image_folder . "img_blur_" . getNrAsStr($img_nr2) .  ".jpg' />";
			if ($alreadyParticipated)
					echo "<span><img src='" . $image_folder . "img_blur_" . getNrAsStr($img_nr2) .  ".jpg'/>";
				else
				 if ($i == $row_rand && $j == $col_rand)	 	
						echo "<a href='#' onclick='fbAuthAndSubmit(\"" . $instance['fb_app_id'] . "\",\"email,publish_stream\")'><img src='" . $image_folder . "img_blur_" . getNrAsStr($img_nr2) .  ".jpg' /></a>";
				 	else
						echo "<a id='alert' href='javascript:void(0)'><img src='" . $image_folder . "img_blur_" . getNrAsStr($img_nr2) .  ".jpg' /></a>";
	}
	echo "<br />";
}

// Function which delete the null on higher numbers.

function getNrAsStr($nr) {
	if ($nr < 10)
		return "00" . $nr;
	if ($nr < 100)
		return "0" . $nr;
	if ($nr < 1000)
		return "" . $nr;
	return $nr;
}

echo  "<a href='#' onclick='fbAuthAndSubmit(\"" . $instance['fb_app_id'] . "\",\"email,publish_stream\")'>Test</a>";


?>

</div>	