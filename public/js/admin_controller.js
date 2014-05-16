$(function(){
	ysk_admin.init();
});

var ysk_admin = {
	
	init: function(){
		ysk_admin.initUpdate();
	},
	
	//Init the status update button
	initUpdate: function(){
		$("#statusSubmit").click( function(){
			
			var status, chosenStates, data;
			
			if( Model.status() ){
				status = Model.status();
            }
			
			if(Model.chosenStates()){
				chosenStates = Model.chosenStates();
			}  
			    
			//submit
			var request = $.ajax({
				    url: "../update/?chosenStates=" + chosenStates + "&status=" + status,
					type: "POST",
			    }).done(function(data){
			    	alert("Status updated: " + data );
			    }).error( function(a, b, c){
			    	alert("Error:  " + a + "\n" + b  + "\n" + c);
			    });
			
			//alert(status + "\n\r" + chosenStates);    
			
		});
	},
	
	buildModel: function(){},
	
	//Check the length of the status message, and update 
	//character count.
	checkLength: function(){
	
	    var status = Model.status();
	  
	    //This does not remove the spaces, so use a loop to set 
	    //a count on the fly.
	    //status = status.replace(' ', '');  // Doesn't work. Why?
	                                         // Almost acts like a pointer
	    
	    var count = 0;
	    for(var i = 0; i < status.length; i += 1){
	    	if( status[i] !== " "  && status[i] !== '\n'){
	    		count += 1;
	    	}
	    }
	
	    //Theoretically should not be able to go over 120 chars
	    if(count < 121){
	  	    Model.chars(120 - count);
	    }
	    else{
	    	
	    	var strLen = 0;
	    	var charCnt = 0;
	    	
            for(var i = 0; charCnt < 121; i += 1){
            	
    	        if( status[i] !== " "  && status[i] !== '\n' ){
    		        charCnt += 1;
    	        }
    	        
    	        strLen += 1;
    	    }

	  	    Model.status( status.substr(0, strLen));
	    }
	}
};