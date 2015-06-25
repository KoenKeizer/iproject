<div id="imageWrapper">
<?php
	$con = mysqli_connect("localhost", "roflcopter", "root123", "photoblock");

		if(mysqli_connect_errno()) {
			echo "Failed gg" . mysqli_connect_error();
		}

		$result = mysqli_query($con, "SELECT * FROM posts");
		$data = array();

		while($row = mysqli_fetch_assoc($result)) {
			echo '<div class="contentbox">
					<div class="title">
						'.$row['title'].'
					</div>
					<div class="content">
						'.$row['content'].'
					</div>
				</div>
				<div class="divider">
				</div>';
				}
			mysqli_close($con);
			?>
		</div>