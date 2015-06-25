<?php


$page = isset($_GET['page'])?$_GET['page']: ""; 

switch ($page) {
	case 'image':
		$currentPage = 'image';
		include('views/header.php');
		include('views/image.php');
	break;
	case 'videolist':
		$currentPage = 'video';
		include('views/header.php');
		include('views/player.php');
			break;
	case 'home':	
		$currentPage = 'home';
		include('views/header.php');
		include('views/home.php');
	break;
	case 'admin':
		$currentPage = 'admin';
		include('views/header.php');
		include('views/admin.php');
	break;
	default:
		$currentPage = 'home';
		include('views/header.php');
	break;
}	
//include('views/footer.php');
?>