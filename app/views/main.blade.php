<!DOCTYPE html>
<html>
	<head>
		<title>uShouldKnow.us</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC|Belgrano|Kameron' rel='stylesheet' type='text/css'>
		
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/ushouldknow.css') }}
		
	</head>
	<body>
		
		@include('header')
		
		<div class="main container height1" data-id="1">
            
          
            @if( isset($GLOBALS["isadmin"]) )
			    @include('admin/admin')
			@else
			    {{ View::make("voteBar/VoteBar")}}
			@endif
			
			@if( $_SESSION["model"]["bill"])
    	        @include('billBar/billBar')
            @endif
         
		</div>
		
		{{ HTML::script('js/jquery.js') }}
	    {{ HTML::script('js/jquery_ui.js') }}
	    {{ HTML::script('js/bootstrap.min.js') }}
	    {{ HTML::script('js/less.js') }}
	    {{ HTML::script('js/view_controller.js') }}
	    {{ HTML::script('js/custom_tags.js') }}
		
	</body>
</html>