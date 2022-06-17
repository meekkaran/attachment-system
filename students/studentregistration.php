
<html>

<head>
	<title>StudentRegistration</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
	<div class="heading">
		<h2>Student Registration</h2>
	</div>

	<form id="studentreg" method="post" action="./includes/server.php" onSubmit="return validateForm()">
		<div class="inputform">
			<label>Fullname</label>
			<input type="text" id="fullname" name="fullname" value="">
		</div>
		<div class="inputform">
			<label>Admission Number</label>
			<input type="text" id="admissionnumber" name="admissionnumber" value="">
		</div>
		<div class="inputform">
			<label>Email</label>
			<input type="text" id="email" name="email">
		</div>
		<div class="inputform">
			<label>Phone Number</label>
			<input type="text" id="phonenumber" name="phonenumber" value="">
		</div>
		<div class="inputform">
			<label for="department">Department:</label>
			<select name="department" id="department">
				<option value="Mathematics and Actuarial Science">Mathematics and Actuarial Science</option>
				<option value="Computer and Information Science">Computer and Information Science</option>
				<option value="Community Health and Development">Community Health and Development</option>
				<option value="Natural Sciences">Natural Sciences</option>
				<option value="Nursing">Nursing</option>
			</select>
		</div>
		<div class="inputform">
			<label>Company Name</label>
			<input type="text" id="companyname" name="companyname" value="">
		</div>
		<div class="inputform">
			<label>Company Contact</label>
			<input type="text" id="companycontact" name="companycontact" value="">
		</div>
		<div class="inputform">
			<label>Company Address</label>
			<input type="text" id="companyaddress" name="companyaddress" value="">
		</div>
		<div class="inputform">
			<label>Company Email</label>
			<input type="text" id="companyemail" name="companyemail" value="">
		</div>
		<div class="inputform">
			<label>Starting Date</label>
			<input type="text" id="startingdate" name="startingdate" value="">
		</div>
		<div class="inputform">
			<label>Password</label>
			<input type="password" id="password_1" name="password_1">
		</div>
		<div class="inputform">
			<label>Confirm password</label>
			<input type="password" id="password_2" name="password_2">
		</div>
		<div class="inputform">
			<button type="submit" class="btn" id="register_btn" name="register_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="studentlogin.php">Sign in</a>
		</p>
	</form>
	<script>
		function validateForm() {
			//if fullname is empty
			fullname = document.getElementById("fullname").value;
			if (fullname == "" || fullname.length < 4) {
				alert("Please enter your full name");
				document.getElementById("fullname").focus();
				return false;
			}
			//if admissionnumber is empty
			admissionnumber = document.getElementById("admissionnumber").value;
			if (admissionnumber == "" || isNaN(admissionnumber) || admissionnumber.length < 5) {
				alert("please enter valid admission number");
				document.getElementById("admissionnumber").focus();
				return false;
			}
			//validate email
			email = document.getElementById("email").value;
			if (email.length == 0 || email.indexOf("@") == -1 || email.indexOf(".") == -1) {
				alert("You must enter a valid email");
				document.getElementById("email").focus();
				return false;
			}
			//if phonenumber is empty
			phonenumber = document.getElementById("phonenumber").value;
			if (phonenumber == "" || isNaN(phonenumber) || phonenumber.length < 6) {
				alert("please enter valid phone number");
				document.getElementById("phonenumber").focus();
				return false;
			}
			//if department is empty
			department = document.getElementById("department").value;
			if (department == "") {
				alert("please enter department");
				ddocument.getElementById("department").focus();
				return false;
			}
			//if company name is empty
			companyname = document.getElementById("companyname").value;
			if (companyname == "" || companyname.length < 4) {
				alert("Please enter your full name");
				document.getElementById("companyname").focus();
				return false;
			}
			//if company contact is empty
			companycontact = document.getElementById("companycontact").value;
			if (companycontact == "" || isNaN(companycontact) || companycontact.length < 8) {
				alert("please enter valid company contact");
				document.getElementById("companycontact").focus();
				return false;
			}
			//if companyaddress is empty
			companyaddress = document.getElementById("companyaddress").value;
			if (companyaddress == "" || companyaddress.length < 4) {
				alert("Please enter your company address");
				document.getElementById("companyaddress").focus();
				return false;
			}
			//if company email is empty
			companyemail = document.getElementById("companyemail").value;
			if (companyemail.length == 0 || companyemail.indexOf("@") == -1 || companyemail.indexOf(".") == -1) {
				alert("You must enter a valid companyemail");
				document.getElementById("companyemail").focus();
				return false;
			}
			//if startingdate is empty
			startingdate = document.getElementById("startingdate").value;
			if (dateadmin.indexOf("-") == -1) {
				alert("date of Adminstration must be entered and in the format yyyy-mm-dd");
				document.getElementById("startingdate").focus();
				return false;
			}
			startingdate = document.getElementById("startingdate").value;
			if (comps[0].length < 4 || comps[1].length < 1 || comps[2].length < 1) {
				alert("date of administration must be in the format yyyy-mm-dd");
				document.getElementById("startingdate").focus();
				return false;
			}
			startingdate = document.getElementById("startingdate").value;
			if (isNaN(comps[0]) || isNaN(comps[1]) || isNaN(comps[2])) {
				alert("date components must be integers and in the format yyyy-mm-dd");
				document.getElementById("startingdate").focus();
				return false;
			}
			//validating password1
			password_1 = document.getElementById("password_1").value;
			if (password_1 == "" || password_1.length < 8) {
				alert("Password should not be empty and it should have more than 8 characters");
				document.getElementById("password_1").focus();
				return false;
			}
			//validating password2
			password_2 = document.getElementById("password_2").value;
			if (password_2 == "" || password_2.length < 8) {
				alert("Password should not be empty and it should have more than 8 characters");
				document.getElementById("password_2").focus();
				return false;
			}
			//making sure both passwords do match

			password_1 = document.getElementById("password_1").value;
			password_2 = document.getElementById("password_2").value;
			if (password_1 != password_2) {
				alert("The two passwords should match.Try Again");
				document.getElementById("password_1").focus();
				document.getElementById("password_2").focus();
				return false;
			}
		}
	</script>
</body>


</html>