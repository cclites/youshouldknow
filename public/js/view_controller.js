$(function(){
	ysk.initButtons();
	ysk.initContact();
	ysk.initModal();
	
	var totals = ysk.calculateTableTotals();
	ysk.appendVoteTotals(totals);
	
});

var ysk = {
	
	initButtons: function(){
		$("button").each(function(){
			var url = $(this).data().bind,
			    tuples = url.split(":");
			
			$(this).click(function(){
			    window.open(tuples[1]);
		    });
		});
	},
	
	initContact: function(){
		$("#contactButton").click(function(){
			
			var html = $( "#contactForm" ).text();
            $( "#dialog" ).html( html);
            $( "#dialog" ).dialog( "open" );
            $( "#dialog").dialog({title: "Contact us"});
            
            ysk.initContactSubmit();
		 });
	},
	
	initModal: function(){
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 500,
			modal: true
		});
	},
	
	initContactSubmit: function(){
		
		$("#submitContact").click(function(){
			var contactEmail = $("#Email").val(),
		        contactMessage = $("#Message").val();
			$( "#dialog" ).dialog( "close" );
			$( "#dialog" ).html("");
			
			//Now, submit the email message
			$.ajax({
                url: 'http://ushouldknow.us/contact',
                data: {contactEmail: contactEmail, contactMessage: contactMessage},
			    type: "POST"
           }).success(function(data) {
                alert("Message Sent");
           });

		});
	},
	
	calculateTableTotals: function(){
		//find the vote table.
		//see what happens when I try to get totals.
		var yeaTotal = 
		    nayTotal =
		    nvTotal = 0;
		
		$(".vote .yea").each( function(){			
			yeaTotal += parseInt(  $(this).text() );
		});
		
		$(".vote .nay").each( function(){			
			nayTotal += parseInt(  $(this).text() );
		});
		
		$(".vote .nv").each( function(){	
			nvTotal += parseInt(  $(this).text() );
		});
		
		var totals = {
			yeaTotal: yeaTotal,
			nayTotal: nayTotal,
			nvTotal: nvTotal
		};
		
		return totals;
	},
	
	appendVoteTotals: function(totals){
		//$('#myTable tr:last').after('<tr>...</tr><tr>...</tr>');
		var html = "<tr><td>TOTALS:</td><td>" + totals.yeaTotal + 
		          "</td><td>" + totals.nayTotal +
		          "</td><td>" + totals.nvTotal + "</td><tr>";
		          
		$(".vote tr:last").after(html);
	}
};