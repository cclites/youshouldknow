<!DOCTYPE html>
<html>
	<head>
		<title>uShouldKnow.us</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/ushouldknow.css') }}
		
	</head>
	<body>
		
		@include('header')
		
		<div class="container">
			@include('voteBar')
		</div>
		
	    {{ HTML::script('js/jquery.js') }}
	    {{ HTML::script('js/jquery_ui.js') }}
	    {{ HTML::script('js/bootstrap.min.js') }}
	    {{ HTML::script('js/less.js') }}
	    {{ HTML::script('js/view_controller.js') }}
	    {{ HTML::script('js/custom_tags.js') }}
	
	</body>
</html>