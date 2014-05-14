$(function(){
	ysk_admin.init();
});

var ysk_admin = {
	
	init: function(){
		ysk_admin.initUpdate();
	},
	
	initUpdate: function(){},
	
	buildModel: function(){},
	
	checkLength: function(){
	
	    var status = Model.status();
	    //remove the blanks
	  
	    //This does not remove the spaces, so use a loop to set 
	    //a count on the fly.
	    //status = status.replace(' ', '');  // Doesn't work. Why?
	    
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