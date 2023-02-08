<?php include './inc/header.php'; ?>

<?php
	$name = $email = $body = ''; //SHORTHAND
	$nameErr = $emailErr = $bodyErr = '';

	//FORM VALIDATION

	if(isset($_POST['submit'])){
		
		//validate name
		if(empty($_POST['name'])){
			$nameErr = 'Name is required';
		}else{
			//MUST SANITIZE
			$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
		}
		//validate email
		if(empty($_POST['email'])){
			$emailErr = 'Email is required';
		}else{
			//MUST SANITIZE
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		}
		//validate body
		if(empty($_POST['body'])){
			$bodyErr = 'Feedback is required';
		}else{
			//MUST SANITIZE
			$body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);
		}

	if(empty($nameErr) && empty($emailErr) && empty($bodyErr)){

		//MEANS NO ERROR

		//SEND TO DB
		$sql = "INSERT INTO feedback (name, email, body) VALUES
			( '$name', '$email', '$body' ) ";

		if(mysqli_query($conn, $sql)){
			//SUCCESS

			header('Location: feedback.php');
		}else{
			echo 'Error '. mysqli_error($conn);
		}
	  }
	}	

?>



<!-- TO submit to the self in this case the index, we need to specify like this inside action. Or we can submit to other files as well. -->

				<img src="./img/message-icon.png" class=" 
				 w-25 mb-3" alt="" />
				<h2>Feedback</h2>
				<p class="lead text-center">Leave us a feedback</p>
				<form action=" <?php
					echo htmlspecialchars($_SERVER['PHP_SELF']);
				?>" class="mt-4 w-75" method="post">
					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input
							type="text"
							class="form-control 
							<?php  
								echo $nameErr? 'is-invalid': null ;
							?>
							"
							id="name"
							name="name"
							placeholder="Enter your name"
						/>
						<div class="invalid-feedback">
							<?php
								echo $nameErr;
							?>
						</div>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input
							type="email"
							class="form-control
							<?php  
								echo $emailErr? 'is-invalid': null ;
							?>
							
							"
							id="email"
							name="email"
							placeholder="Enter your email"
						/>
						<div class="invalid-feedback">
							<?php
								echo $emailErr;
							?>
						</div>
					</div>
					<div class="mb-3">
						<label for="body" class="form-label">Feedback</label>
						<textarea
							class="form-control
							<?php  
								echo $bodyErr? 'is-invalid': null ;
							?>
							"
							id="body"
							name="body"
							placeholder="Enter your feedback"
						></textarea>
						<div class="invalid-feedback">
							<?php
								echo $bodyErr;
							?>
						</div>
					</div>
					<div class="mb-3">
						<input
							type="submit"
							name="submit"
							value="Send"
							class="btn btn-dark w-100"
						/>
					</div>
				</form>


<?php include './inc/footer.php'; ?>
