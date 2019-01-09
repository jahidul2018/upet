<?php 
ob_start();
	session_start();
		require_once 'config/connect.php';
			include 'inc/header.php'; 
				//include 'inc/nav2.php'; 
				?>
					<!--End of php-->

<!--Start php-->

<?php 
	$email    = "";
		$password = "";
			$reenter_password= "";

				$errors = array(); 

					// connect to the database
					$db = mysqli_connect('localhost', 'root', '', 'ecomphp');

						// REGISTER USER
						if (isset($_POST['submit'])) {
						  // receive all input values from the form

							 /* $email = mysqli_real_escape_string($db, $_POST['email']);*/
							  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
								  $password= ($_POST['password']);
								    $reenter_password= ($_POST['reenter_password']);

									  // form validation: ensure that the form is correctly filled ...
									  // by adding (array_push()) corresponding error unto $errors array

										  if (empty($email)) { array_push($errors, "Email is required"); }
											  if (empty($password)) { array_push($errors, "Password is required"); }
												  if (empty($reenter_password)) { array_push($errors, "Re-enter password is required"); }
													  if ($password != $reenter_password) { array_push($errors, "The two passwords do not match"); }

	  // first check the database to make sure 
	  // a user does not already exist with the same username and/or email
	  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
		  $result = mysqli_query($db, $user_check_query);
			  $user = mysqli_fetch_assoc($result);
			  
				  if ($user) { // if user exists

					    if ($user['email'] === $email) {
					      array_push($errors, "email already exists");
					    }
					  }

	  // Finally, register user if there are no errors in the form
	  if (count($errors) == 0) {
		  	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);//encrypt the password before saving in the database
		  		$activation_code = md5($_POST['password'] + microtime());

					//$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
						echo $sql = "INSERT INTO users (email, password, Active, ActivationCode) VALUES ('$email', '$password' , 0, '$activation_code')";


							$result = mysqli_query($db, $sql) or die(' data are not INSERTED Error: '.mysqli_error($db));


							if(!$result){
								array_push($errors, "there is an error in connection".mysql_errno()); 
									}else{
										require "PHPMailer-master/PHPMailerAutoload.php";
										
										$mail = new PHPMailer;

											$mail->isSMTP();                               
												$mail->Host = 'smtp.gmail.com'; 
													$mail->SMTPAuth = true;                            
														$mail->Username = 'mike2016trison@gmail.com'; 
															$mail->Password = 'M!shuk2017.';           
																$mail->SMTPSecure = 'tls';                           
																	$mail->Port = 587;                             
																	//$mail->SMTPDebug = 2;                             
							

																	//$mail->addAddress('srabon.bilash@outlook.com', 'Srabon Chowdhury'); 
																$mail->addAddress($email); 
															$mail->isHTML(true);              

														$mail->Subject = 'www.upet.com';
													$mail->Body    = '<h4>Hello '.$email.'...</h4><br/><br/><em>
														wellcome to <em><a href="http://localhost/upet/">www.upet.com</a>.<br/><h3>
															Click the link below to activate your account <br/><br/>
																<a href="http://localhost/upet/food/account_activation_mail.php?activation_code=' . $activation_code . '">Active Account</a></h3><br/>.<br/>';


										$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

									if(!$mail->send()) {
												array_push($errors, "Message could not be sent.<br/>there is an error in connection".mysql_errno());
											//echo 'Mailer Error: ' . $mail->ErrorInfo;
										//$fmsg = "Invalid Login Credentials";
								} else {
								//echo "User exits, create session";
							$_SESSION['customer'] = $email;
						$_SESSION['customerid'] = mysqli_insert_id($db);
					header("location: petcheckout.php");
				}
						
			}

		}
	}

?>

<!--End php-->

<!-- <!--script-->

<script type="text/javascript">
	function validate(){
				
			//for Email
				
				var erremail = document.getElementById("errEmail1");
					var email = document.subscription.email;
						//var reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9.]){1,}\.([A-Za-z]{2,4})$/;
						var reg2 = /^[A-Za-z0-9][A-Za-z0-9._%+-]{0,63}@(?:[A-Za-z0-9]{1,10}\.){1,2}[A-Za-z]{2,4}$/;
						
							if(email.value === "")
								{
									erremail.innerHTML = "This field is required";
									err++;
								}
							
									else if(!reg2.test(email.value))
										{
											erremail.innerHTML = "Invalid email address. Correct format: abc.def@example.com";
											err++;
										}
									
											else
												{
													erremail.innerHTML = " ";
												}
										
				//for password
				
				var errpass = document.getElementById("errPass");
					var pass = document.subscription.password;
					
						if(pass.value === "")
							{
								errpass.innerHTML = "This field is required";
								err++;
							}
							
								else if(pass.value.length < 8)
								{
									errpass.innerHTML = "Password must have at least 8 characters";
									err++;
								}
								
									else if( !/[a-z]/.test(pass.value) || !/[A-Z]/.test(pass.value) || !/[0-9]/.test(pass.value) || !/[!@#$%^&*~_]/.test(pass.value) )
									{
										errpass.innerHTML = "Must contain at least 1 uppercase letter, lowercase letter, number and special character";
										err++;
									}
									
										else
											{
												errpass.innerHTML = " ";
											}


						
				// for Re-enter Password
				
				var errRepass = document.getElementById("errRepass");
					var repass = document.subscription.reenter_password;
					
						if(repass.value === "")
							{
								errRepass.innerHTML = "This field is required";
								err++;
								}
							
								else if(repass.value !== pass.value)
								{
									errRepass.innerHTML = "Password didn't match";
									err++;
									}
								
									else
										{
											errRepass.innerHTML = " ";
											}
						
		
		console.log (err);
		
			if(err==0){
				console.log ( 'well done' );
				return true;
				}
				else{
					
					return false;
						}
			
	}			
		
		</script>

<!--End Script-->
<script type="text/javascript">
	/*if (window.location.protocol != "https:"){
		var redirect_url = "https://volunteers.bestfriends.org/?nd=intake&entry_point_id=24&unit_id=2&chapter_id=0&http_referral=https://volunteers.bestfriends.org/?nd=intake";
		window.location = redirect_url; 
	}*/

	function submissionFunctions () {
			get_member_info ();
			return true;
	}


	$(document).ready(function(){

			$('#postal_code').blur(function() {
				$.ajax({
					url:'/',
					data: {
						html: 'xmlhttp-vms_zip_code_chapter_lookup',
						postal_code: $('#postal_code').val(),
						unit_id: '2'
					},
					async:false,
					success: function (data) {
						chapter_lookup = $.trim(data);
						if(chapter_lookup != "false"){
							$('#chapter_id').val(chapter_lookup);
						}
					}
				});
			});



		if($('#country').val() !== 'US'){
			$('#us_address_div').hide();
			$('#non_us_address_div').show();
			$('.us_addr').removeClass('required');
		}


		
		$('#country').change(function() {
                if($('#country').val() == 'US'){
				$('#address_label').text("*Street Address");
				$('#address2_label').text("Apt/Suite");
				$('#us_address_div').show();
				$('#non_us_address_div').hide();
				$('#address5').removeClass('postal_code');
			} else {
				$('#address_label').text("*Address 1");
				$('#address2_label').text("Address 2");
				$('#address3_label').text("Address 3");
				$('#address4_label').text("Address 4");
				$('#address5_label').text("Address 5");
				$('#address5').removeClass('postal_code');
				$('#us_address_div').hide();
				$('#non_us_address_div').show();
			}
		});

		$.validator.addMethod('validUsernameLength', function(value, element) {return this.optional(element) || /^.{6,}/.test(value); }, 'Username must be a minimum of six (6) characters in length');

		$.validator.addMethod('validUsernameChars', function(value, element) {
			var regex=/^([a-z]|[A-Z]|[0-9]|[\.@\+-_])+$/;
			if(!regex.test(value)) {
				return false;
			} else {
				return true;
			}
		}, 'Username may only contain<br>alphanumeric characters<br>and: . @ + - _');

		$.validator.addMethod('password8', function(value, element) {return this.optional(element) || /^.{8,}/.test(value); }, 'Password must be a minimum of eight (8) characters in length');

		$.validator.addMethod('passwordChars', function(value, element) {
			// return this.optional(element) || /^.{8,}/.test(value); 
			var upper_case;
			var lower_case;
			var numerals;
			var special_chars;

			if(/[A-Z]+/.test(value)){
				upper_case = true;
			}
			if(/[a-z]+/.test(value)){
				lower_case = true;
			}
			if(/[0-9]+/.test(value)){
				numerals = true;
			}
			if(/[^a-zA-Z0-9\s]+/.test(value)){
				special_chars = true;
			}

			if (upper_case){
				if(lower_case){
					if(numerals || special_chars){
						return true;
					} else {
						return false;
					}
				} else if (numerals && special_chars) {
					return true;
				} else {
					return false;
				}
			} else if (lower_case && numerals && special_chars) {
				return true;
			} else {
				return false;
			}
		}, 'Password must be comprised of three of the following four groups of characters: Uppercase letters, lowercase letters, numerals, and special characters');

		$.validator.addMethod('dateMDY', function(value, element) {return this.optional(element) || /^\d{1,2}[\/-]\d{1,2}[\/-]\d{4}$/.test(value); }, 'Invalid Date Format use mm-dd-yyyy');
		$.validator.addMethod('dateYMD', function(value, element) {return this.optional(element) || /^\d{4}[\/-]\d{2,2}[\/-]\d{2,2}$/.test(value); }, 'Invalid Date Format use yyyy-mm-dd');
            $.validator.addMethod('phoneNumber', function(value, element) { return this.optional(element) || /^(\+.*|\d{3,3}[-]\d{3,3}[-]\d{4,4}($|x\d*$))/.test(value); },'Invalid Phone Number Format use ###-###-####x###');
		$.validator.addMethod('validEmail', function(value, element) {
			var is_valid_email = '';
			$.ajax({
				url:'/',
				data:{html:'xmlhttp-vms_validate_unique_email',email:value},
				async:false,
				success: function( data ) { is_valid_email = $.trim(data); }
			});

			if(is_valid_email == 'true' || value == 'noemail@bestfriends.org') {
				return true;
			} else {
				return false;
			}
		}, 'Email is already in use or invalid.');

		$.validator.addMethod('validRelatedCredentials',function(value, element) {
				var related_username = $("#related_username") != null ? $("#related_username").val() : '';
				var related_password = $("#related_passwd")   != null ? $("#related_passwd").val() : '';
				if(related_username == '' && related_password == '') {
					return true;
				}
				var correct_credentials = '';
				$.ajax({
					url: '/',
					data: {html:'xmlhttp-vms_validate_credentials',username: related_username, passwd: related_password},
					async: false,
					dataType: "json",
					success: function(data){
						correct_credentials = data.result;
					}
				});
				if (correct_credentials == 'OK') {
					$("label[for='related_username'].error").hide();
					$("label[for='related_passwd'].error").hide();
				}
				return correct_credentials == 'OK' ? true : false;
		}, 'Invalid Credentials, please review. (Username and Password are validated together, so please make sure both values are correct) ');

		$.validator.addMethod('checkUsernameTaken', function(value, element) {
			var is_username_available = '';
			$.ajax({
				url:'/',
				data:{html:'xmlhttp-vms_check_username_taken',username:value},
				async:false,
				success: function( data ) { is_username_available = $.trim(data); }
			});

			if(is_username_available == 'true') {
				return true;
			} else {
				return false;
			}
		}, 'Username is taken');


		$('#volunteer_application').validate({
			success: function(label) {
				$("label[for='username']").addClass("valid").text("Username is available");
				$("label[for='username']").addClass('success');
			},
			rules: {
				verify_password: {equalTo: "#password" },
				home_phone: {required: function(element) { return $("#cell_phone").val() == "" && $("#work_phone").val() == ""; }},
				cell_phone: {required: function(element) { return $("#home_phone").val() == "" && $("#work_phone").val() == ""; }},
				work_phone: {required: function(element) { return $("#cell_phone").val() == "" && $("#home_phone").val() == ""; }},
				ec_home_phone: {required: function(element) { return $("#ec_cell_phone").val() == "" && $("#ec_work_phone").val() == ""; }},
				ec_work_phone: {required: function(element) { return $("#ec_cell_phone").val() == "" && $("#ec_home_phone").val() == ""; }},
				ec_cell_phone: {required: function(element) { return $("#ec_work_phone").val() == "" && $("#ec_home_phone").val() == ""; }}

                        ,address: {required: function(element) { return true }},
                        city:    {required: function(element) { return $('#country').val() == "US" }},
                        state:   {required: function(element) { return $('#country').val() == "US" }},
                            county:  {required: function(element) { return $('#country').val() == "US" }},
                        postal_code: {required: function(element) { return $('#country').val() == "US" }}
					//,
					//address2: {required: function(element) { return $('#country').val() != "US" }},
					//address3: {required: function(element) { return $('#country').val() != "US" }},
					//address4: {required: function(element) { return $('#country').val() != "US" }},
					//address5: {required: function(element) { return $('#country').val() != "US" }}
			},
			messages: {
				verification_code: {
					required: 'A guardian must be verified.'
				}
			},
			errorPlacement: function(error, element) {
				if (element.attr('data-validate_error_id') !== undefined) {
					var err_element = element.attr('data-validate_error_id');
					error.insertAfter("#" + err_element);
				} else {
					error.insertAfter(element);
				}
			},
			submitHandler: function(form) {
				$("#verify_password").prop('disabled', true);
				var rules = $("#username").removeAttrs("checkUsernameAvailable");


					form.submit();

			}
		});
	});
</script> 

<!--section start-->
<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<!--title-->
					<!-- <div class="page_header text-center">
						 <h2>Shop - Account</h2>
						<p>Tagline Here</p> 
					</div> -->
					<!-- End title-->
					<div class="col-md-12">
				<div class="row shop-login">


<div class="block noborder vol_app">
	<div class="block_title">
		<h3>Introduction/Description</h3>
	</div>
	<div class="block_body">
                        <p id="welcome_message"></p><p>Welcome!&nbsp;</p>
<p>We're thrilled you're interested in volunteering with Best Friends - Atlanta. As a leader in animal welfare, Best Friends is working to Save Them All™.&nbsp;</p>
<div><em>A few things to note:</em></div>
<ul type="disc">
<li>If you already had a volunteer account with Atlanta Pet Rescue and Adoption, you should have received an email inviting you to activate your account with Best Friends. If you did not receive this email, please let us know by contacting us at <a href="mailto:volunteerATL@bestfriends.org">volunteerATL@bestfriends.org</a>. Please do <span style="text-decoration: underline;">not</span> set up a new account.</li>
<li>All volunteers must be at least 18 years old.</li>
</ul>
<div><strong>Upon completion of these intake steps, you will receive a welcome email with important information about what to do next to begin volunteering. Please be sure to use an active email address, and check your spam filters for this email. If you do not receive this email within 24 hours of creating your account, please email <a href="mailto:volunteerATL@bestfriends.org">volunteerATL@bestfriends.org</a>.</strong></div><p></p>
        </div>
</div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
            <form class="form-horizontal" role="form">
                <h2>Registration</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="lastName" placeholder="Last Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email* </label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="Email" class="form-control" name= "email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Date of Birth*</label>
                    <div class="col-sm-9">
                        <input type="date" id="birthDate" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                    <div class="col-sm-9">
                        <input type="phoneNumber" id="phoneNumber" placeholder="Phone number" class="form-control">
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div>
                <div class="form-group">
                        <label for="Height" class="col-sm-3 control-label">Height* </label>
                    <div class="col-sm-9">
                        <input type="number" id="height" placeholder="Please write your height in centimetres" class="form-control">
                    </div>
                </div>
                 <div class="form-group">
                        <label for="weight" class="col-sm-3 control-label">Weight* </label>
                    <div class="col-sm-9">
                        <input type="number" id="weight" placeholder="Please write your weight in kilograms" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="femaleRadio" value="Female">Female
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="maleRadio" value="Male">Male
                                </label>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block">*Required fields</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form> <!-- /form -->
        </div> <!-- ./container -->

<!-- <center><form action="" method="post" name="volunteer_application" id="volunteer_application" onsubmit="return submissionFunctions();">
		


	<div class="block vol_app">
		<div class="block_title"><h3>Name</h3></div>
		<div class="block_body">
		<ul class="form_list inline">
				<li><label for="title">Title</label>
					<div>
						<select name="title" id="title" class="valid">
								<option value="">Select ...</option>
							<option value="Dr.">Dr.</option>
									<option value="Mr.">Mr.</option>
									<option value="Ms.">Ms.</option>
									<option value="Mrs.">Mrs.</option>

						</select>
					</div>
				</li>
				<li class="newline"><label for="first_name">*First Name</label>
					<div>
					<input name="first_name" id="first_name" value="" class="required" required=" ">
					</div>
				</li>
				<li><label for="middle_name">Middle Name</label>
					<div>
					<input name="middle_name" id="middle_name" value=""></div>
				</li>
				<li><label for="last_name">*Last Name</label>
					<div>
					<input name="last_name" id="last_name" value="" class="required"></div>
				</li>
				<li class="newline"><label for="suffix">Suffix</label>
					<div>
			<select name="suffix" id="suffix" class="valid">
					<option value="">Select ...</option>
				<option value="Jr.">Jr.</option>
<option value="M.D.">M.D.</option>
<option value="D.V.M.">D.V.M.</option>

			</select>
				</div>
			</li>
		</ul>
		</div>
	</div>




		<div class="block vol_app">
			<div class="block_title"><h3>Address</h3></div>
			<div class="block_body">
			<ul class="form_list inline">
			<li>
				<label for="address_type">*Address Type</label>
					<div>
			<select name="address_type" id="address_type" class="required">
					<option value="">Select ...</option>
				<option value="Home">Home</option>
<option value="Mailing">Mailing</option>
<option value="Work">Work</option>
<option value="University">University</option>
<option value="Seasonal">Seasonal</option>

			</select>
					</div>
			</li>
			 <li>
				<label for="country">*Country</label>
	                        <div>
			<select name="country" id="country" class="required">
					<option value="">Select ...</option>
				<option value="AF">AFGHANISTAN</option>
<option value="AX">ALAND ISLANDS</option>
<option value="AL">ALBANIA</option>
<option value="DZ">ALGERIA</option>
<option value="AS">AMERICAN SAMOA</option>
<option value="AD">ANDORRA</option>
<option value="AO">ANGOLA</option>
<option value="AI">ANGUILLA</option>
<option value="AQ">ANTARCTICA</option>
<option value="AG">ANTIGUA AND BARBUDA</option>
<option value="AR">ARGENTINA</option>
<option value="AM">ARMENIA</option>
<option value="AW">ARUBA</option>
<option value="AU">AUSTRALIA</option>
<option value="AT">AUSTRIA</option>
<option value="AZ">AZERBAIJAN</option>
<option value="BS">BAHAMAS</option>
<option value="BH">BAHRAIN</option>
<option value="BD">BANGLADESH</option>
<option value="BB">BARBADOS</option>
<option value="BY">BELARUS</option>
<option value="BE">BELGIUM</option>
<option value="BZ">BELIZE</option>
<option value="BJ">BENIN</option>
<option value="BM">BERMUDA</option>
<option value="BT">BHUTAN</option>
<option value="BO">BOLIVIA, PLURINATIONAL STATE OF</option>
<option value="BQ">BONAIRE, SINT EUSTATIUS AND SABA</option>
<option value="BA">BOSNIA AND HERZEGOVINA</option>
<option value="BW">BOTSWANA</option>
<option value="BV">BOUVET ISLAND</option>
<option value="BR">BRAZIL</option>
<option value="IO">BRITISH INDIAN OCEAN TERRITORY</option>
<option value="BN">BRUNEI DARUSSALAM</option>
<option value="BG">BULGARIA</option>
<option value="BF">BURKINA FASO</option>
<option value="BI">BURUNDI</option>
<option value="KH">CAMBODIA</option>
<option value="CM">CAMEROON</option>
<option value="CA">CANADA</option>
<option value="CV">CAPE VERDE</option>
<option value="KY">CAYMAN ISLANDS</option>
<option value="CF">CENTRAL AFRICAN REPUBLIC</option>
<option value="TD">CHAD</option>
<option value="CL">CHILE</option>
<option value="CN">CHINA</option>
<option value="CX">CHRISTMAS ISLAND</option>
<option value="CC">COCOS (KEELING) ISLANDS</option>
<option value="CO">COLOMBIA</option>
<option value="KM">COMOROS</option>
<option value="CG">CONGO</option>
<option value="CD">CONGO, THE DEMOCRATIC REPUBLIC OF THE</option>
<option value="CK">COOK ISLANDS</option>
<option value="CR">COSTA RICA</option>
<option value="CI">COTE D'IVOIRE</option>
<option value="HR">CROATIA</option>
<option value="CU">CUBA</option>
<option value="CW">CURA</option>
<option value="CY">CYPRUS</option>
<option value="CZ">CZECH REPUBLIC</option>
<option value="DK">DENMARK</option>
<option value="DJ">DJIBOUTI</option>
<option value="DM">DOMINICA</option>
<option value="DO">DOMINICAN REPUBLIC</option>
<option value="EC">ECUADOR</option>
<option value="EG">EGYPT</option>
<option value="SV">EL SALVADOR</option>
<option value="GQ">EQUATORIAL GUINEA</option>
<option value="ER">ERITREA</option>
<option value="EE">ESTONIA</option>
<option value="ET">ETHIOPIA</option>
<option value="FK">FALKLAND ISLANDS (MALVINAS)</option>
<option value="FO">FAROE ISLANDS</option>
<option value="FJ">FIJI</option>
<option value="FI">FINLAND</option>
<option value="FR">FRANCE</option>
<option value="GF">FRENCH GUIANA</option>
<option value="PF">FRENCH POLYNESIA</option>
<option value="TF">FRENCH SOUTHERN TERRITORIES</option>
<option value="GA">GABON</option>
<option value="GM">GAMBIA</option>
<option value="GE">GEORGIA</option>
<option value="DE">GERMANY</option>
<option value="GH">GHANA</option>
<option value="GI">GIBRALTAR</option>
<option value="GR">GREECE</option>
<option value="GL">GREENLAND</option>
<option value="GD">GRENADA</option>
<option value="GP">GUADELOUPE</option>
<option value="GU">GUAM</option>
<option value="GT">GUATEMALA</option>
<option value="GG">GUERNSEY</option>
<option value="GN">GUINEA</option>
<option value="GW">GUINEA-BISSAU</option>
<option value="GY">GUYANA</option>
<option value="HT">HAITI</option>
<option value="HM">HEARD ISLAND AND MCDONALD ISLANDS</option>
<option value="VA">HOLY SEE (VATICAN CITY STATE)</option>
<option value="HN">HONDURAS</option>
<option value="HK">HONG KONG</option>
<option value="HU">HUNGARY</option>
<option value="IS">ICELAND</option>
<option value="IN">INDIA</option>
<option value="ID">INDONESIA</option>
<option value="IR">IRAN, ISLAMIC REPUBLIC OF</option>
<option value="IQ">IRAQ</option>
<option value="IE">IRELAND</option>
<option value="IM">ISLE OF MAN</option>
<option value="IL">ISRAEL</option>
<option value="IT">ITALY</option>
<option value="JM">JAMAICA</option>
<option value="JP">JAPAN</option>
<option value="JE">JERSEY</option>
<option value="JO">JORDAN</option>
<option value="KZ">KAZAKHSTAN</option>
<option value="KE">KENYA</option>
<option value="KI">KIRIBATI</option>
<option value="KP">KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF</option>
<option value="KR">KOREA, REPUBLIC OF</option>
<option value="KW">KUWAIT</option>
<option value="KG">KYRGYZSTAN</option>
<option value="LA">LAO PEOPLE'S DEMOCRATIC REPUBLIC</option>
<option value="LV">LATVIA</option>
<option value="LB">LEBANON</option>
<option value="LS">LESOTHO</option>
<option value="LR">LIBERIA</option>
<option value="LY">LIBYA</option>
<option value="LI">LIECHTENSTEIN</option>
<option value="LT">LITHUANIA</option>
<option value="LU">LUXEMBOURG</option>
<option value="MO">MACAO</option>
<option value="MK">MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF</option>
<option value="MG">MADAGASCAR</option>
<option value="MW">MALAWI</option>
<option value="MY">MALAYSIA</option>
<option value="MV">MALDIVES</option>
<option value="ML">MALI</option>
<option value="MT">MALTA</option>
<option value="MH">MARSHALL ISLANDS</option>
<option value="MQ">MARTINIQUE</option>
<option value="MR">MAURITANIA</option>
<option value="MU">MAURITIUS</option>
<option value="YT">MAYOTTE</option>
<option value="MX">MEXICO</option>
<option value="FM">MICRONESIA, FEDERATED STATES OF</option>
<option value="MD">MOLDOVA, REPUBLIC OF</option>
<option value="MC">MONACO</option>
<option value="MN">MONGOLIA</option>
<option value="ME">MONTENEGRO</option>
<option value="MS">MONTSERRAT</option>
<option value="MA">MOROCCO</option>
<option value="MZ">MOZAMBIQUE</option>
<option value="MM">MYANMAR</option>
<option value="NA">NAMIBIA</option>
<option value="NR">NAURU</option>
<option value="NP">NEPAL</option>
<option value="NL">NETHERLANDS</option>
<option value="NC">NEW CALEDONIA</option>
<option value="NZ">NEW ZEALAND</option>
<option value="NI">NICARAGUA</option>
<option value="NE">NIGER</option>
<option value="NG">NIGERIA</option>
<option value="NU">NIUE</option>
<option value="NF">NORFOLK ISLAND</option>
<option value="MP">NORTHERN MARIANA ISLANDS</option>
<option value="NO">NORWAY</option>
<option value="OM">OMAN</option>
<option value="PK">PAKISTAN</option>
<option value="PW">PALAU</option>
<option value="PS">PALESTINIAN TERRITORY, OCCUPIED</option>
<option value="PA">PANAMA</option>
<option value="PG">PAPUA NEW GUINEA</option>
<option value="PY">PARAGUAY</option>
<option value="PE">PERU</option>
<option value="PH">PHILIPPINES</option>
<option value="PN">PITCAIRN</option>
<option value="PL">POLAND</option>
<option value="PT">PORTUGAL</option>
<option value="PR">PUERTO RICO</option>
<option value="QA">QATAR</option>
<option value="RE">REUNION</option>
<option value="RO">ROMANIA</option>
<option value="RU">RUSSIAN FEDERATION</option>
<option value="RW">RWANDA</option>
<option value="BL">SAINT BARTH</option>
<option value="SH">SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA</option>
<option value="KN">SAINT KITTS AND NEVIS</option>
<option value="LC">SAINT LUCIA</option>
<option value="MF">SAINT MARTIN (FRENCH PART)</option>
<option value="PM">SAINT PIERRE AND MIQUELON</option>
<option value="VC">SAINT VINCENT AND THE GRENADINES</option>
<option value="WS">SAMOA</option>
<option value="SM">SAN MARINO</option>
<option value="ST">SAO TOME AND PRINCIPE</option>
<option value="SA">SAUDI ARABIA</option>
<option value="SN">SENEGAL</option>
<option value="RS">SERBIA</option>
<option value="SC">SEYCHELLES</option>
<option value="SL">SIERRA LEONE</option>
<option value="SG">SINGAPORE</option>
<option value="SX">SINT MAARTEN (DUTCH PART)</option>
<option value="SK">SLOVAKIA</option>
<option value="SI">SLOVENIA</option>
<option value="SB">SOLOMON ISLANDS</option>
<option value="SO">SOMALIA</option>
<option value="ZA">SOUTH AFRICA</option>
<option value="GS">SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
<option value="SS">SOUTH SUDAN</option>
<option value="ES">SPAIN</option>
<option value="LK">SRI LANKA</option>
<option value="SD">SUDAN</option>
<option value="SR">SURINAME</option>
<option value="SJ">SVALBARD AND JAN MAYEN</option>
<option value="SZ">SWAZILAND</option>
<option value="SE">SWEDEN</option>
<option value="CH">SWITZERLAND</option>
<option value="SY">SYRIAN ARAB REPUBLIC</option>
<option value="TW">TAIWAN, PROVINCE OF CHINA</option>
<option value="TJ">TAJIKISTAN</option>
<option value="TZ">TANZANIA, UNITED REPUBLIC OF</option>
<option value="TH">THAILAND</option>
<option value="TL">TIMOR-LESTE</option>
<option value="TG">TOGO</option>
<option value="TK">TOKELAU</option>
<option value="TO">TONGA</option>
<option value="TT">TRINIDAD AND TOBAGO</option>
<option value="TN">TUNISIA</option>
<option value="TR">TURKEY</option>
<option value="TM">TURKMENISTAN</option>
<option value="TC">TURKS AND CAICOS ISLANDS</option>
<option value="TV">TUVALU</option>
<option value="UG">UGANDA</option>
<option value="UA">UKRAINE</option>
<option value="AE">UNITED ARAB EMIRATES</option>
<option value="GB">UNITED KINGDOM</option>
<option value="US" selected="">UNITED STATES</option>
<option value="UM">UNITED STATES MINOR OUTLYING ISLANDS</option>
<option value="UY">URUGUAY</option>
<option value="UZ">UZBEKISTAN</option>
<option value="VU">VANUATU</option>
<option value="VE">VENEZUELA, BOLIVARIAN REPUBLIC OF</option>
<option value="VN">VIET NAM</option>
<option value="VG">VIRGIN ISLANDS, BRITISH</option>
<option value="VI">VIRGIN ISLANDS, U.S.</option>
<option value="WF">WALLIS AND FUTUNA</option>
<option value="EH">WESTERN SAHARA</option>
<option value="YE">YEMEN</option>
<option value="ZM">ZAMBIA</option>
<option value="ZW">ZIMBABWE</option>


			</select>
	                        </div>
	                </li>
		<li class="newline">
			<label for="address" id="address_label">*Street Address</label> 
			<div>
				<input name="address" id="address" value="">
			</div>
		</li>
		<li>
			<label for="address2" id="address2_label">Apt/Suite</label>
			<div>
				<input name="address2" id="address2" value="">
			</div>
		</li>
		<div id="us_address_div">
			<li class="newline">
				<label for="city">*City</label>
				<div>
					<input name="city" id="city" value="" class="required us_addr">
				</div>
			</li>
                <li>
                    <label for="state">*State</label>
                    <div>
			<select name="state" id="state" class="required us_addr">
					<option value="">Select ...</option>
				<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="DC">District of Columbia</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="PR">Puerto Rico</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
<option value="AA">AA/Armed Forces Americas</option>
<option value="AE">AE/Armed Forces Europe</option>
<option value="AP">AP/Armed Forces Pacific</option>

			</select>
                    </div>
                </li>
			<li>
				<label for="postal_code">*Postal Code</label>
					<div>
						<input name="postal_code" id="postal_code" value="" class="us_addr digits">
					</div>
			</li>


			<li>
				<label for="county">*County</label>
					<div>

			<script type="text/javascript">
				$(document).ready(function(){
					$("#state").change(function(e){
						if($(this).val() != '') {
							$("#county").load('/', {html:'xmlhttp-vms_dropdown_filter', text: "", code:"County", 'default':"", filter:$(this).val()});
						} else {
							$("#county").html('<option value="">Please select a state first.</option>')
						}
					});
					if($("#state").val() != '') {
						$("#county").load('/', {html:'xmlhttp-vms_dropdown_filter', text: "", code:"County", 'default':"", filter:$("#state").val()});
					}

					$("select[name='county']").change(function(e){
					});
				});
			</script>
			<select name="county" id="county" class="required us_addr">
				<option value="">Please select a state first.</option>
			</select>
					</div>
			</li>

		</div>
		<div id="non_us_address_div" style="display:hidden;">
			<li class="newline"><label id="address3_label" for="address3">Address 3</label><div><input name="address3" id="address3" value=""></div></li>
			<li><label id="address4_label" for="address4">Address 4</label><div><input name="address4" id="address4" value=""></div></li>
			<li><label id="address5_label" for="address5">Address 5</label><div><input name="address5" id="address5" value=""></div></li>
		</div>
	</ul>
	</div>
	</div>




	<div class="block vol_app">
	<div class="block_title"><h3>Contact Information</h3></div>
	<div class="block_body">
		<ul class="form_list inline">
		<li>
			<label for="email">*Email</label>
				<div>
				<input name="email" id="email" class="required email validEmail"></div>
		</li>
		<li class="newline">
			<label for="home_phone">Home Phone  </label>
				<div>
				<input name="home_phone" id="home_phone" class="phoneNumber">
				</div>
		</li>
		<li>
			<label for="work_phone">Work Phone  </label>
				<div>
				<input name="work_phone" id="work_phone" class="phoneNumber">
				</div>
		</li>
		<li>
			<label for="cell_phone">Cell Phone </label>
				<div>
				<input name="cell_phone" id="cell_phone" class="phoneNumber">
				</div>
		</li>
		<li class="note">*One phone number is required</li>
		<li class="note">**For international numbers add "+" before the number</li>
	</ul>
	</div>
	</div>

























<div class="block">
	<a name="emergency" id="emergency"></a>




	<div id="emergency_contact_title" class="block_title"><h3>Emergency Contact </h3></div>

	<div id="emergency_contact_body" class="block_body">
		<ul class="form_list inline">
			<li>
				<label for="ec_first_name">*First Name</label>
				<div><input name="ec_first_name" id="ec_first_name" value="" class="required"></div>
			</li>
			<li>
				<label for="ec_last_name">*Last Name</label>
				<div><input name="ec_last_name" id="ec_last_name" value="" class="required"></div>
			</li>
			<li>
				<label for="ec_relationship">*Relationship</label>
				<div>
			<select name="ec_relationship" id="ec_relationship" class="required">
					<option value="">Select ...</option>
				<option value="Aunt">Aunt</option>
<option value="Brother">Brother</option>
<option value="Co-Worker">Co-Worker</option>
<option value="Daughter">Daughter</option>
<option value="Father">Father</option>
<option value="Friend">Friend</option>
<option value="Grandparent">Grandparent</option>
<option value="Guardian">Guardian</option>
<option value="Mother">Mother</option>
<option value="Neighbor">Neighbor</option>
<option value="Parent">Parent</option>
<option value="Partner">Partner</option>
<option value="Roommate">Roommate</option>
<option value="Sibling">Sibling</option>
<option value="Significant Other">Significant Other</option>
<option value="Sister">Sister</option>
<option value="Spouse">Spouse</option>
<option value="Son">Son</option>
<option value="Stepparent">Stepparent</option>
<option value="Supervisor">Supervisor</option>
<option value="Uncle">Uncle</option>
<option value="Other">Other</option>

			</select>
				</div>
			</li>
			<li class="divider"></li>
			<li class="newline">
				<label for="ec_home_phone">Home Phone</label>
				<div><input name="ec_home_phone" id="ec_home_phone" value="" class="phoneNumber"></div>
			</li>
			<li>
				<label for="ec_work_phone">Work Phone</label>
				<div><input name="ec_work_phone" id="ec_work_phone" value="" class="phoneNumber"></div>
			</li>
			<li class="newline">
				<label for="ec_cell_phone">Cell Phone</label>
				<div><input name="ec_cell_phone" id="ec_cell_phone" value="" class="phoneNumber"></div>
			</li>
			<li class="note">*One phone number is required</li>
			
			<li>
				<label for="ec_email">Email</label><div>
				<input name="ec_email" id="ec_email" value="" class="email"></div>
			</li>
			<li class="divider"></li>
			<li class="newline">
				<label for="ec_address1">Address</label>
				<div><input name="ec_address1" id="ec_address1" value="" class=""></div>
			</li>
			<li>
				<label for="ec_address2">Apt/Suite</label>
				<div><input name="ec_address2" id="ec_address2" value=""></div>
			</li>
			<li>
				<label for="ec_city">City</label>
				<div><input name="ec_city" id="ec_city" value="" class=""></div>
			</li>
			<li class="newline">
				<label for="ec_state">State</label>
				<div>
			<select name="ec_state" id="ec_state">
					<option value="">Select ...</option>
				<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="DC">District of Columbia</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="PR">Puerto Rico</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
<option value="AA">AA/Armed Forces Americas</option>
<option value="AE">AE/Armed Forces Europe</option>
<option value="AP">AP/Armed Forces Pacific</option>

			</select>
				</div>
			</li>
			<li>
				<label for="ec_postal_code">Zip Code</label>
				<div><input name="ec_postal_code" id="ec_postal_code" value="" class="digits"></div>
			</li>


			<li class="sectiontitle">Secondary Emergency Contact</li> 
									
			<li class="newline">
				<label for="ec2_first_name">First Name</label>
				<div><input name="ec2_first_name" id="ec2_first_name" value="" class=""></div>
			</li>
			<li>
				<label for="ec2_last_name">Last Name</label>
				<div><input name="ec2_last_name" id="ec2_last_name" value="" class=""></div>
			</li> 
			<li>
				<label for="ec2_relationship">Relationship</label><br>
				<div>
			<select name="ec2_relationship" id="ec2_relationship">
					<option value="">Select ...</option>
				<option value="Aunt">Aunt</option>
<option value="Brother">Brother</option>
<option value="Co-Worker">Co-Worker</option>
<option value="Daughter">Daughter</option>
<option value="Father">Father</option>
<option value="Friend">Friend</option>
<option value="Grandparent">Grandparent</option>
<option value="Guardian">Guardian</option>
<option value="Mother">Mother</option>
<option value="Neighbor">Neighbor</option>
<option value="Parent">Parent</option>
<option value="Partner">Partner</option>
<option value="Roommate">Roommate</option>
<option value="Sibling">Sibling</option>
<option value="Significant Other">Significant Other</option>
<option value="Sister">Sister</option>
<option value="Spouse">Spouse</option>
<option value="Son">Son</option>
<option value="Stepparent">Stepparent</option>
<option value="Supervisor">Supervisor</option>
<option value="Uncle">Uncle</option>
<option value="Other">Other</option>

			</select>
				</div>
			</li>
			<li class="divider"></li>
			<li class="newline">
				<label for="ec2_home_phone">Home Phone</label>
				<div><input name="ec2_home_phone" id="ec2_home_phone" value="" class="phoneNumber"></div>
			</li>
			<li>
				<label for="ec2_work_phone">Work Phone</label>
				<div><input name="ec2_work_phone" id="ec2_work_phone" value="" class="phoneNumber"></div>
			</li>
			<li class="newline">
				<label for="ec2_cell_phone">Cell Phone</label>
				<div><input name="ec2_cell_phone" id="ec2_cell_phone" value="" class="phoneNumber"></div>
			</li>
			
			<li>
				<label for="ec2_email">Email</label>
				<div><input name="ec2_email" id="ec2_email" value="" class="email"></div>
			</li>
			<li class="divider"></li>
			<li class="newline">
				<label for="ec2_address1">Address</label>
				<div><input name="ec2_address1" id="ec2_address1" value="" class=""></div>
			</li>
			<li>
				<label for="ec2_address2">Apt/Suite</label>
				<div><input name="ec2_address2" id="ec2_address2" value=""></div>
			</li>
			<li>
				<label for="ec2_city">City</label>
				<div><input name="ec2_city" id="ec2_city" value="" class=""></div>
			</li>
			
			<li class="newline">
				<label for="ec2_state">State</label>
				<div>
			<select name="ec2_state" id="ec2_state">
					<option value="">Select ...</option>
				<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="DC">District of Columbia</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="PR">Puerto Rico</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
<option value="AA">AA/Armed Forces Americas</option>
<option value="AE">AE/Armed Forces Europe</option>
<option value="AP">AP/Armed Forces Pacific</option>

			</select>
				</div>
			</li>
			<li>
				<label for="ec2_postal_code">Zip Code</label>
				<div><input name="ec2_postal_code" id="ec2_postal_code" value="" class="digits"></div>
			</li>
		</ul>
	</div>
</div>








<script type="text/javascript" src="./Volunteer Application_files/yearmonthday.min.js.download"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// convert the date_of_birth field into 3 selects (month day and year)
		$('#date_of_birth').yearMonthDay({
			targetFormat:  'y-m-d',
			displayFormat: 'm-d-y',
			yearCount:     -100,
			showBeforeTarget: true
		});
		jQuery.validator.addMethod("multiDateValidator", function(value, element) {
			var div = $(this).parent();
			if($('.year').val() == '' && $('.month').val() == '' && $('.day').val() == '') {
				return true;
			}
			else if($('.year').val() == '' || $('.month').val() == '' || $('.day').val() == '') {
				return false;
			} else {
				return true;
			}
		}, "Please enter a month, day, and year for the date.");

		$('div.yearMonthDay select.year').addClass('multiDateValidator');
	});
</script>

<div class="block">
	<a name="stat"></a>




	<div id="stat_info_title" class="block_title"><h3>Statistical Information</h3></div>
	<div id="stat_info_body" class="block_body">
		<ul class="form_list inline">       
				
				










					<li>
						<label for="gender">Gender</label>
						<div>
			<select name="gender_lookup" id="gender_lookup">
					<option value="">Select ...</option>
				<option value="Female">Female</option>
<option value="Male">Male</option>
<option value="Non-binary">Non-binary</option>

			</select>
						</div>
					</li>












						<li>
							<label for="date_of_birth">*Date of Birth (mm-dd-yyyy)</label>
							<div>
								<div class="yearMonthDay"><select class="month"><option value="">Month</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>-<select class="day"><option value="">Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>-<select class="year multiDateValidator"><option value="">Year</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option></select></div><input type="text" name="date_of_birth" id="date_of_birth" value="" class="check_birthday_date_range required text" style="display: none;">
							</div>
						</li>
							<script type="text/javascript">
								var minimum_age = 16;
								$(document).ready(function(){
									$('.under_13').hide();

									$('.yearMonthDay').on('change','select', function () {
										if($('.year').val() != '' && $('.month').val() != '' && $('.day').val() != '') {
											$('#date_of_birth').trigger('change');
										}
									});
									$('#date_of_birth').change(function(){
										var dob = $.datepicker.parseDate('yy-mm-dd', $(this).val());
										var ageDifMs = Date.now() - dob.getTime();
										var ageDate = new Date(ageDifMs);
										var age = Math.abs(ageDate.getUTCFullYear() - 1970);
										if(age < minimum_age){
											$('.under_13').show();
											$('#verification_code').addClass('required');
										} else {
											$('.under_13').hide();
											$('#verification_code').removeClass('required');
										}
									});

									$('#verify_guardian').click(function(){
										$('#guardian_verification_alert')
											.removeClass()
											.addClass('alert alert-info')
											.html('Verifying...');

										$.ajax({
											url:"/",
											data:{
												nd: 'xmlhttp-vms_intake_guardian_verification',
												u: $('#guardian_username').val(),
												p: $('#guardian_password').val()
											},
											async: true,
											success: function(data){
												var results = $.trim(data);

												var results_array = results.split(",");
												if(results_array.shift() == "SUCCESS"){
													$("#verification_code").val(results_array.shift());
													$('.under_13').hide();
													$('#guardian_username').val('');
													$('#guardian_password').val('');
													$('#guardian_verification_alert')
														.removeClass()
														.addClass('alert alert-success')
														.html('Guardian verified.');
													$('li.guardian_verification_alert').show();
												} else {
													$("#verification_code").val('');
													$('#guardian_verification_alert')
														.removeClass()
														.addClass('alert alert-danger')
														.html('Guardian verification failed.');
												}
											}
										});
									});
								});
							</script>
							<li class="newline under_13" style="display: none;">
								<label for="guardian_username">Guardian Username</label>
								<div><input type="text" name="guardian_username" id="guardian_username" class="text"></div>
							</li>
							<li class="under_13" style="display: none;">
								<label for="guardian_password">Guardian password</label>
								<div><input type="password" name="guardian_password" id="guardian_password" class="password"></div>
							</li>
							<li class="under_13" style="display: none;">
								<label>&nbsp;</label>
								<div><input type="button" value="Verify" id="verify_guardian" class="button"></div>
								<input type="hidden" value="" name="verification_code" id="verification_code">
							</li>
							<li class="newline under_13" style="display: none;">
								<div>You are under 16. You will need your parent or guardian to verify your registration.</div>
							</li>
							<li class="newline under_13 guardian_verification_alert" style="display: none;">
								<div id="guardian_verification_alert"></div>
							</li>



























		</ul>
	</div>
</div>


















<div class="block vol_app">
	<div class="block_title">
		<h3>Additional Questions</h3>
		
	</div>
	<div class="block_body">

	<ul class="form_list inline">






<script type="text/javascript" src="./Volunteer Application_files/jquery.validate.min.js.download"></script>



	<script type="text/javascript" src="./Volunteer Application_files/tiny_mce.js.download"></script>
	<script type="text/javascript" src="./Volunteer Application_files/editor5_onpage_entity.js.download"></script>




















<script type="text/javascript">
	$(document).ready(function(){
		$.validator.addMethod('get_tinymce', function(value, element) {
			var this_field_id = $(element).attr('id');
			var field_required = $(element).attr('data-is_required');
			$('#' + this_field_id).val(tinyMCE.get(this_field_id).getContent());
			var this_field_value = $('#' + this_field_id).val();
			if (field_required == 'Yes' && this_field_value == ''){
				return false;
			}
			else{
				return true;
			}
		}, 'This field is required.');

		$('#entity_type_form').validate();

	});
</script>









	<input type="hidden" name="created_on_nd" id="created_on_nd" value="intake">





	<input type="hidden" name="added" value="1">




	<input type="hidden" name="entity_type" value="Member Information">
	<input type="hidden" name="entity_view" value="Most Recent">
	<input type="hidden" name="entity_id" value="">
	
	
	<input type="hidden" name="has_account_id" value="">
	<input type="hidden" name="ref_table_account_id" value="">
	<input type="hidden" name="submitted_account_id" value="">
	<input type="hidden" name="hierarchy_id" id="hierarchy_id" value="">


	<input type="hidden" name="created_on_section_id" id="created_on_section_id" value="">



	
		
			




				
				 <input type="hidden" name="entity_type_id" value="1">
	
					<li class="sectiontitle">T-Shirt Preference</li>
	

					<li class=" newline">

							<label for="field_1_dropdown">
						
							* 
							Unisex T-Shirt Size</label> 
							<div>


		<select name="field_1_dropdown" id="field_1_dropdown" class="required valid">
			<option value="">Select...</option>
			<option value="6">X-Small</option>
<option value="1">Small</option>
<option value="2">Medium</option>
<option value="3">Large</option>
<option value="4">X-Large</option>
<option value="5">2X-Large</option>
<option value="7">3X-Large</option>
<option value="8">4X-Large</option>

		</select><label for="field_1_dropdown" generated="true" class="error"></label>


							</div>
					</li>


	


				
				
	
					<li class="sectiontitle"></li>
	

					<li class=" newline">

							<label for="field_5_dropdown">
						
							* 
							Are you currently a Best Friends member? (Best Friends members have donated a total of $25 or more in the last 12 months. Members support tens of thousands of animals across the country and also receive Best Friends magazine.).</label> 
							<div>


		<select name="field_5_dropdown" id="field_5_dropdown" class="required valid">
			<option value="">Select...</option>
			<option value="15">Yes</option>
<option value="16">No</option>
<option value="17">Not sure</option>

		</select><label for="field_5_dropdown" generated="true" class="error"></label>


							</div>
					</li>


	
	
<br>


	</ul>



		<input type="hidden" name="unisex_tshirt_size" id="unisex_tshirt_size" value="">
		<input type="hidden" name="current_bf_member" id="current_bf_member" value="">
		



	<script type="text/javascript">
		function get_member_info () {
					var field_sku;
					var orig_date;
					var new_date;
					var new_date_array;
						field_sku = $('#field_1_dropdown').val();
					

					$.ajax({
						url: '/',
						data: {
							html: 'xmlhttp-vms_entity_option_value',
							field_sku: field_sku
						},
						async: false,
						success: function (data) {
							var return_var = $.trim(data);
							if (return_var != 'false-no option value found'){
								$('#unisex_tshirt_size').val(return_var);
							}
						}
					});
						field_sku = $('#field_5_dropdown').val();
					

					$.ajax({
						url: '/',
						data: {
							html: 'xmlhttp-vms_entity_option_value',
							field_sku: field_sku
						},
						async: false,
						success: function (data) {
							var return_var = $.trim(data);
							if (return_var != 'false-no option value found'){
								$('#current_bf_member').val(return_var);
							}
						}
					});

			return true;
		}
	</script>


	</div>
</div>





	
	



			<input type="hidden" name="chapter_id" id="chapter_id" value="3">




	<div class="block create_account fb_tab_create">
		<div class="block_title">
			<h3>Create Your Account</h3>
		</div>
		<div class="block_body">
			Passwords shall be a minimum of eight (8) characters in length and be comprised of three of the following four groups of characters: Uppercase letters, lowercase letters, numerals, and special characters
		<ul class="form_list inline">
		<li>
			<label for"username"="">*Username</label>
				<div>
				<input type="text" name="username" id="username" class="checkUsernameTaken required validUsernameLength validUsernameChars text">
				</div>
		</li>
		<li>
			<label for="password">*Password:</label>
				<div>
				<input type="password" name="password" id="password" class="required password8 passwordChars password">
				</div>
		</li>
		<li>
			<label for="verify_password">*Verify Password:</label>
				<div>
				<input type="password" name="verify_password" id="verify_password" class="required password">
				</div>
		</li>
		</ul>
		</div>
	</div>


		<div class="page_actions vol_app">
			<input type="submit" class="button submit" value="Submit">
		</div>
</form></center> -->