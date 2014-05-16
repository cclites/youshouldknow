<!DOCTYPE html>
<html>
	<head>
		<title>uShouldKnow.us</title>
		
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC|Belgrano|Kameron' rel='stylesheet' type='text/css'>
		
		@include('helpers/cssIncludes')
		
	</head>
	<body>
		
		@include('header')
		
		@if( isset($result) )
		
            @include('voteBar/voteBar')
            
            @if( isset($bill) )
		        @include('billBar/billBar')
		        @include('sponsorBar/sponsorBar')
		    @endif
		     
        @elseif( $isAdmin )
            @include('admin/update')
        @endif
        
		@include('helpers/jsIncludes')
		
		@if($isAdmin)
			<script>
			    var Model = {
                        states: ko.mapping.fromJS({{$states}}),  //Not observable, and doesn't need to be
                        status: ko.observable('Status Update'),
                        chars: ko.observable(120),
                        chosenStates: ko.observableArray()
                    };
                    
                ko.applyBindings(Model);
                
			</script>
		@endif
		
	</body>
</html>