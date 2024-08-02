$(document).ready(function () {
	// code to get all records from table via select box
	$("#borrowers").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'b_id=' + id;    
		$.ajax({
			url: 'getEmployee.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(borrowerData) {
				if (borrowerData) {
					$("#heading").show();		  
					$("#no_records").hide();					
					$("#name").text(borrowerData.name);
					$("#contact").text(borrowerData.contact);
					$("#address").text(borrowerData.address);
					$("#garanter1").text(borrowerData.garanter1);
					$("#garanter2").text(borrowerData.garanter2);
					$("#records").show();		 
				} else {
					$("#heading").hide();
					$("#records").hide();
					$("#no_records").show();
				}   	
			} 
		});
	});
});


