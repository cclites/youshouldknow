$(function(){
	ysk.initButtons();
});

var ysk = {
	
	initButtons: function(){
		$("button").each(function(){
			var url = $(this).data().bind;
			
			$(this).click(function(){
			    location.href = url;
		    });
		});
	}
};