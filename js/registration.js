$(document).ready(function() {
        // Change CAPTCHA on each click or on refreshing page.
        $("#reload").click(function() {
                        $("#img").remove();
                        location.reload();
                        $('<img id="img" src="captcha.php" />').appendTo("#imgdiv");
                });

	$("#register").click(function() {
		var fname = $("#fname").val();
		var sname = $("#sname").val();
		var email = $("#email").val();
		var age = $("#age").val();
		var sex = $("#sex").val();
		var country = $("#country").val();
		var city = $("#city").val();
		var pcode = $("#pcode").val();
		var captcha = $("#captcha").val();
	if (fname == '' || sname == '' || email == '' || age == '' || sex == '' || country == '' || city == '' || pcode == ''  ) {
		alert("NB! Please fill all fields!");
	} else 
				if ((fname.length) < 2) {
					alert("Name should atleast 2 character in length...!");
				} else if ((sname.length) < 2) {
					alert("Surname should atleast 2 character in length...!");
				} else {
					alert("Captcha validation");
					// Validating CAPTCHA with user input text.
					var dataString = 'captcha=' + captcha;
					$.ajax({
						type: "POST",
						url: "verify.php",
						data: dataString,
						success: function(html) {
							alert(html);
						}
					});					

				}
	});
});