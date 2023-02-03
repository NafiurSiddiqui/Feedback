<?php include './inc/header.php'; ?>

<?php
	// $feedback = [
	// 	[
	// 		'id'=> '1',
	// 		'name'=> 'Jin Yung',
	// 		'email'=> 'jin@xing.com',
	// 		'body'=> 'Putin in sum fidbag!'
	// 	],
	// 	[
	// 		'id'=> '2',
	// 		'name'=> 'Ryu',
	// 		'email'=> 'ryu@sf.com',
	// 		'body'=> 'Otashino khokorocho. FIGHT!!'
	// 	],
	// 	[
	// 		'id'=> '3',
	// 		'name'=> 'Beth',
	// 		'email'=> 'bethg@kiss.com',
	// 		'body'=> 'Beth was written by Kiss.'
	// 	],
	// ]

	$sql = 'SELECT * FROM feedback';
	$result = mysqli_query($conn, $sql); //CONN is coming from the header.
	$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


				<h2>Past Feedback</h2>
<?php
	if(empty($feedback)):
?>

		<p class="lead mt3">There is no feedback </p>

<?php
	endif;
?>

<?php foreach($feedback as $item): ?>

				<div class="card my-3 w-75">
					<div class="card-body text-center">
						<?php
							echo $item['body'];
						?>
						<div class="text-secondary mt-2">
							By <?php
								echo $item['name'];
							?> on 
							<?php
								echo $item['date'];
							?>
						</div>
					</div>
				</div>

				
<?php
	endforeach;
?>

<?php include './inc/footer.php'; ?>