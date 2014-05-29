$(function(){
	ysk.initButtons();
	ysk.initContact();
	ysk.initModal();
});

var ysk = {
	
	initButtons: function(){
		$("button").each(function(){
			var url = $(this).data().bind;
			
			$(this).click(function(){
			    window.open(url);
		    });
		});
	},
	
	initContact: function(){
		$("#contactButton").click(function(){
			
			var html = $( "#contactForm" ).text();
            $( "#dialog" ).html( html);
            $( "#dialog" ).dialog( "open" );
            $( "#dialog").dialog({title: "Contact us"});
		 });
	},
	
	initModal: function(){
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 500,
			modal: true
		});
	}
};