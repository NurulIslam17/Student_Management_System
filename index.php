
<?php
	error_reporting(0);
	session_start();
	session_destroy();

	if($_SESSION['msg'])
	{
		$message = $_SESSION['msg'];
		echo "<script type='text/javascript'>
						alert('$message');
				</script>";
	}

	include 'connection.php';
	$sql = "SELECT * FROM teachers";
	$res = mysqli_query($con,$sql);

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap CDN -->
		 <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>Student Management System</title>
  </head>
	  <body>
	  	<!-- Navbar Section -->
		   <nav>
		   		<label class="logo">eSchool</label>
		   		<ul>
		   			<li><a href="">Home</a></li>
		   			<li><a href="">Contact</a></li>
		   			<li><a href="">Admission</a></li>
		   			<li><a href="login.php" class="btn btn-success">Login</a></li>
		   		</ul>
		   </nav>
		   <!--  -->
		   <div class="section1">
		   		<label class="img-text">
		   			Share the knowledge and Expand the Universe
		   		</label>
		   		<img class="bgImg" src="img (7).jpg">
		   </div>
				<!-- welcome section  -->
				<div class="container mt-2">
					<div class="row">
				   	<div class="col-md-4 mt-5 mb-3">
				   		<img class="welcImg" src="bild2.jpg">
				   	</div>

				   	<div class="col-md-7"> 
				   		<h2>Well Come to eSchool</h2>
				   		<p class="welcPara">
				   			A school magazine is an annual publication of a school. It contains the writings of the students and the teachers. It is a forum through which young learners can get the opportunity to express the green ideas of their minds. It is published every year with an interesting and significant title. Almost all aspects of the school are reflected through it. It is an important milestone in the progress and prospect of a school. A school magazine generally contains poems, short stories, essays, one-act plays, jokes, and reports of cultural activities of the school. Usually, there is a magazine committee in a school for publishing a magazine. A teacher is usually given the charge of guiding the work of publication. A group of students works together with much encouragement. The Headteacher is the chief patron of the magazine. The magazine editor at first invites writings on different subjects from the students. After proper scrutiny of the collected writings for the magazine, the editor selects good ones and sends them to the press for printing. The school authority bears the total expenditure of publication. The school magazine can help the students to develop their latent faculties as well as their power of thinking and writing. In fact, the school magazine is the first stepping stone for future writers. A young learner really feels proud and happy when he finds his writing in the magazine.
				   		</p>
				   	</div>
				   </div>
				</div>

				<!-- Teacher Section -->
				<center>
					<h2>Our Teachers</h2>
				</center>
				<div class="container mt-5">
					<div class="row">
							<?php
							while($data=$res->fetch_assoc())
							{

								?>

							<div class="col-md-3 cardDiv">
									<img src="<?php echo "{$data['image']}"; ?>" class="teachImg">
									<h3><?php echo "{$data['teacherName']}"; ?></h3>
								 <!--  <p> <?php echo "{$data['des']}"; ?></p>	 -->
						 	</div>

							<?php

							}

							?>
					</div>
				</div>

				
				<!-- Course Section -->
				<center>
					<h2>Courses We Offer...</h2>
				</center>
				<div class="container mt-5">
					<div class="row">

						<div class="col-md-3 cardCorse">
								<img src="scienceT.jpg" class="teachImg">
								<center>
									<h3>Science and Tech</h3>
								</center>
							  	Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
					 	</div>
					 		<div class="col-md-3 cardCorse">
								<img src="computer (2).jpg" class="teachImg">
								<center>
									<h3>Computer Tech</h3>
								</center>
							  	Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
					 	</div>
					 	<div class="col-md-3 cardCorse">
								<img src="fashion.jpg" class="teachImg">
								<center>
									<h3>Fashion Design</h3>
								</center>
							  	Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
					 	</div>
					 		<div class="col-md-3 cardCorse">
								<img src="arts.jpg" class="teachImg">
								<center>
									<h3>Arts and Paint</h3>
								</center>
							  	Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
					 	</div>
					</div>
				</div>

				
				<!-- Form section -->
				<center>
					<h2>Admission Form</h2>
				</center>

				<div class="admission mb-4" align="center">
					<form action="data_check.php" method="POST">
						<div class="inp-group">
							<label class="lebel-text">Name</label>
							<input class="inptForm" type="text" name="name">
						</div>

						<div class="inp-group">
							<label class="lebel-text">E-mail</label>
							<input class="inptForm" type="email" name="email">
						</div>
						<div class="inp-group">
							<label class="lebel-text">Phone</label>
							<input class="inptForm" type="text" name="phone">
						</div>
						<div class="inp-group">
							<label class="lebel-text"></label>
							<textarea class="comment" name="message" placeholder="Your Message"></textarea>
						</div>

						<div class="inp-group">
							<input class="btn btn-success" id="submit" type="submit" name="apply" value="Apply">
						</div>
					</form>
				</div>

				<footer>
					<p>All @Copyright reserved By Nurul Islam</p>
				</footer>

	  </body>
</html>