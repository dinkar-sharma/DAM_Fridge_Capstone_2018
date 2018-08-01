/*Index page*/

function init_page() {
	$("#ForgetPasswordContainer").hide();
}

$("#ForgetPasswordLink").click(function(event) {
	console.log("Clicked on forget password link.");
	$("#SignInContainer").hide('slow');
	$("#ForgetPasswordContainer").show('slow');
});



$(document).ready(function() {
	init_page();
});