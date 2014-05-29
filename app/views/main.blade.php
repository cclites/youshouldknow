<!DOCTYPE html>
<html>
	<head>
		<title>uShouldKnow.us</title>
		
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC|Belgrano|Kameron' rel='stylesheet' type='text/css'>
		
		@include('helpers/cssIncludes')
		@include('meta')
		
	</head>
	<body>
		
		@include('header')
		
		@if( isset($result) && isset($vote) )
		
            @include('voteBar/voteBar')
            
            @if( isset($bill) )
		        @include('billBar/billBar')
		        @include('sponsorBar/sponsorBar')
		    @endif
		     
        @elseif( $isAdmin )
            @include('admin/update')
        @else
          <!-- Load static main page -->
          @include('default/default')  
        @endif
        
        @include('footer/footer')
        
        <div id="dialog" style="display:none;>
        	<label for="Email">Email:</label>
				<input type="text" name="Email" id="Email" />
				  <br>
				<label for="Message">Message:</label><br />
				<textarea name="Message" rows="10" cols="25" id="Message"></textarea>
			
				<input type="submit" name="submit" value="Submit" class="submit-button" />
        </div>
        
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
		
		<script>
           (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
               (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
               })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

           ga('create', 'UA-51448107-1', 'ushouldknow.us');
           ga('send', 'pageview');

       </script>
	</body>
</html>