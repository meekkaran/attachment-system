<!DOCTYPE html>
<html>

<head>
	<title>StudentRegistration</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
</head>

<body>
	<div class="heading">
		<h2>Student Registration</h2>
	</div>

	<form id="studentreg" method="post" action="./includes/server.php">
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
			<input type="date" id="startingdate" name="startingdate" value="">
		</div>
		<div class="inputform">
			<label>Password</label>
			<input type="password" id="password_1" name="password_1">
		</div>
		<div class="inputform">
			<label>Confirm password</label>
			<input type="password" id="password_2" name="password_2">
		</div>
		<div class="errorform" id="errors"></div>
		<div class="inputform">
			<button type="submit" class="btn" id="register_btn" name="register_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="studentlogin.php">Sign in</a>
		</p>
	</form>
	<script>
		//prevent form from submitting itself automatically
		document.getElementById("studentreg").addEventListener("submit", function(event) {
			event.preventDefault()
		});
		//assign variables to html input elements
		let fullname = document.getElementById("fullname");
		let admissionnumber = document.getElementById("admissionnumber");
		let email = document.getElementById("email");
		let phonenumber = document.getElementById("phonenumber");
		let department = document.getElementById("department");
		let companyname = document.getElementById("companyname");
		let companyemail = document.getElementById("companyemail");
		let companycontact = document.getElementById("companycontact");
		let companyaddress = document.getElementById("companyaddress");
		let startingdate = document.getElementById("startingdate");
		let password_1 = document.getElementById("password_1");
		let password_2 = document.getElementById("password_2");

		let errors = document.getElementById("errors");

		//variables to check state of validity of the inputs
		let fnvalid = false
		let admvalid = false
		let emailvalid = false
		let phonevalid = false
		let deptvalid = false
		let compNamevalid = false
		let compEmailvalid = false
		let compContvalid = false
		let compAddvalid = false
		let datevalid = false
		let pwdvalid = false
		let pwd_2valid = false

		//add event listener for every input
		//validate fullname
		fullname.addEventListener("change", function() { //second argument is an unanymous function
			let fullnameV = fullname.value;
			if (fullnameV === "") {
				alert("FullName cannot be empty");
			} else if (fullnameV.length < 6) {
				alert("FullName Must Contain more than 6 characters");
			} else {
				fnvalid = true
			}
		});
		//validate admission number
		admissionnumber.addEventListener("change", function() {
			let admnumber = admissionnumber.value;
			if (admnumber === "") {
				alert("Admission Number is required");
			} else if (isNaN(admnumber)) {
				alert("Admmission number must be a number");
			} else {
				admvalid = true
			}
		});
		//validate email
		email.addEventListener("change", function() {

		});
		//validate phone number
		phonenumber.addEventListener("change", function() {
			let phone = phonenumber.value;
			if (phone === "") {
				alert("Phone Number required");
			} else if (isNaN(phone)) {
				alert("Phonenumber number must be a number");
			} else {
				phonevalid = true
			}
		});
		//validate department
		department.addEventListener("change", function() {
			let dept = department.value;
			if (dept === "") {
				alert("Department required");
			} else {
				deptvalid = true
			}
		});
		//validate company name
		companyname.addEventListener("change", function() {
			let compname = companyname.value;
			if (compname === "") {
				alert("{Company Name required");
			} else {
				compNamevalid = true
			}
		});
		//validate company email
		companyemail.addEventListener("change", function() {});
		//validate company contact
		companycontact.addEventListener("change", function() {
			let compcontact = companycontact.value;
			if (compcontact === "") {
				alert("Company Contact Required");
			} else if (isNaN(compcontact)) {
				alert("Company Contact must be a number must be a number");
			} else {
				compContvalid = true
			}
		});
		//validate company address
		companyaddress.addEventListener("change", function() {
			let compaddress = companyaddress.value;
			if (compaddress === "") {
				alert("Company Address required")
			} else {
				compAddvalid = true
			}
		});
		//validate startng date
		// startingdate.addEventListener("change", function(){
		// 	let da
		// });

		//validate password_1
		password_1.addEventListener("change", function() {
			let pwd = password_1.value;
			if (pwd === "") {
				alert("Password Required");
			} else if (pwd.length < 8) {
				alert("Password Must Contain more than 6 characters");
			} else {
				pwdvalid = true
			};
		});
		//validate password_2
		password_2.addEventListener("change", function() {
			let pwd_1 = password_2.value;
			if (pwd_1 === "") {
				alert("Password required")
			} else {
				pwd_2valid = true
			}
		});
		let register_btn = document.getElementById("register_btn");
		register_btn.addEventListener("click", function() {
			document.getElementById("studentreg").submit()
			console.log("submit button");
		});
	</script>
</body>


</html>