<!DOCTYPE html>
<html>
	<head>
		<title>uShouldKnow.us</title>
		
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC|Belgrano|Kameron' rel='stylesheet' type='text/css'>
		
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/ushouldknow.css') }}
		
	</head>
	<body>
		
		@include('header')
		
		<!--div class="main container height1" data-id="1"-->
        @include('voteBar/voteBar')
		<!--/div -->
		
		@if( $bill )
		    @include('billBar/billBar')
		    @include('sponsorBar/sponsorBar')
		@endif
		
		{{ HTML::script('js/jquery.js') }}
	    {{ HTML::script('js/jquery_ui.js') }}
	    {{ HTML::script('js/bootstrap.min.js') }}
	    {{ HTML::script('js/less.js') }}
	    {{ HTML::script('js/view_controller.js') }}
	    {{ HTML::script('js/custom_tags.js') }}
		
	</body>
</html>