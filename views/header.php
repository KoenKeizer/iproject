<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/videostyle.css">
	<link rel="stylesheet" type="text/css" href="css/imagestyle.css">

</head>
<body>
<header>
		<div id="nav">
			<ul>
				<li><a class="navButtons <?php echo ($currentPage == "home" ? "active" : "")?>" href="home">Home</a></li>
				<li><a class="navButtons <?php echo ($currentPage == "video" ? "active" : "")?>" href="videolist">Video's</a></li>
				<li><a class="navButtons <?php echo ($currentPage == "image" ? "active" : "")?>" href="image">Images</a></li>
				<li><a class="navButtons <?php echo ($currentPage == "admin" ? "active" : "")?>" href="admin">Beheer</a></li>
			</ul>
		</div>
		<div id="squareArrow">
			<div id="block"></div>
			<div class="arrow-down"></div>
		</div>
</header>
<div id="wrapper">
