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
	alert("NB! Please fill all fields!");
} else 
			if ((fname.length) < 2) {
				alert("Name should atleast 2 character in length...!");
			} else if ((sname.length) < 2) {
				alert("Surname should atleast 2 character in length...!");
			} else {
			$.post("register.php", {
				fname1: fname,
				sname1: sname,
				email1: email,
				age1: age,
				sex1: sex,
				country1: country,
				city1: city,
				pcode1: pcode
				}, function(data) {
					if (data == 'You have Successfully Registered.....') {
						$("form")[0].reset();
					}
					alert(data);
				});
			}
});
});