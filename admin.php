<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
<div id="deleteContainer">
<?php
	require_once('includes/config.inc.php');

	$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

	$vidRes = $mysqli->query("SELECT * FROM videolist");

		$dirname = "images/";
		$images = glob("$dirname*.png", GLOB_BRACE+GLOB_NOSORT);
		usort($images, create_function('$b,$a', 'return filemtime($a) - filemtime($b);'));
		//$imagesRev = array_reverse($images);
		$i = 0;
		foreach($images as $image) {
			$i++;
			echo  '<img src="'.$image.'" id="image'.$i.'" width="200"><br>';
			
			echo '<form method="get">';
			echo $image;
			echo '<input type="submit" name="delete'.$i.'" value="Delete">';
			echo '</form><br>';
			if(isset($_GET['delete'.$i.''])){
				unlink($image);
				header('Location: admin.php');	
			}
		}
		while($videos = $vidRes->fetch_assoc()){
			$videoID = $videos['id'];
			echo '<p>'. $videos['src'] . ' : ' . $videos['title'] .'</p>'.
				 '<form method="get">
				 <input type="submit" name="deleteVid'.$videos['id'].'" value="Delete Video">
				 </form>';
				
			if(isset($_GET['deleteVid'.$videoID.''])){
				$deleteRes = $mysqli->query("DELETE FROM videolist WHERE id = '$videoID'");	
				header('Location: admin.php');
			}
		}
		if (isset($_POST['submitUpload'])){ 
			$newName = md5(time().$_FILES['imageToUpload']['tmp_name']).'.png';
			move_uploaded_file($_FILES['imageToUpload']['tmp_name'], 'images/'.$newName);
			header('Location: admin.php');
		}
		if (isset($_POST['submitVid'])){
				$vidSrc = $_POST['vidSrc'];
				$vidTitle = $_POST['vidTitle'];

			if(!empty($vidSrc) && !empty($vidTitle)){
				$result = $mysqli->query("INSERT INTO videolist (id, src, title) VALUES (NULL, '$vidSrc', '$vidTitle')");
			}
			header('Location: admin.php');
		}
?>
</div>
<form method="post" id="uploadForm" enctype="multipart/form-data">
	Image: <input type="file" name="imageToUpload" id="imageToUpload"><br>
	<input type="submit" value="Upload your image" name="submitUpload">
</form>
<div id="uploadForm">
	<form method="post" id="vidForm">
	<input type="text" placeholder="The ID behind watch?v=" name="vidSrc"><br>
	<input type="text" placeholder="Your wanted Title" name="vidTitle"><br>
	<input type="submit" value="Upload your image" name="submitVid">
</form>
</div>


</body>
</html>