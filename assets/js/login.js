$(document).ready(() => {
	$("#login_frm").submit((event) => {
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "./includes/login.inc.php",
			data: $("#login_frm").serialize(),
			dataType: "text",
			success: function (response) {
				console.log(response);
				if (response === "empty inputs") {
					swal({
						title: "Error!",
						text: 'All fields are required',
						icon: "warning",
					
					});
				}
					if (response === "user not found") {
						swal({
							title: "Error!",
							text: "Please enter the right username or email address",
							icon: "warning",
						});
				}
				
				if (response === "Wrong password") {
					swal({
						title: "Error!",
						text: "Wrong password",
						icon: "warning",
					});
				}

				if (response === "login success") {
				location.href = './'
				}



			},
		});
	});
});
