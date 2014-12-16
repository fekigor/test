$(document).ready(function() {
$("#register").click(function() {
var fname = $("#fname").val();
var sname = $("#sname").val();
var email = $("#email").val();
var age = $("#age").val();
var sex = $("#sex").val();
var country = $("#country").val();
var city = $("#city").val();
var pcode = $("#pcode").val();
if (fname == '' || sname == '' || email == '' || age == '' || sex == '' || country == '' || city == '' || pcode == ''  ) {
	alert("Please fill all fields...!!!!!!");
} 
});
});