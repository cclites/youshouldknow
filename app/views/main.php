<?php

    //Perfect. Model data is here in $model
?>

<!DOCTYPE html>
<html>
	<head>
		<title>uShouldKnow.us</title>
	</head>
	<body>
		
		<div class="container">
			<div class="voteSummary">
				<h2><?= $model->title ?></h2>
				<div>
					<div><?= $model->current_status_description ?></div>
					<div><?= $model->sponsor->name ?></div>
					<div><?= $model->link ?></div>
				</div>
				
			</div>
		</div>
		
	</body>
</html>