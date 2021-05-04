<?php
	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Cinema Project</title>

	<link rel="shortcut icon" href="../assets/SuperA/images/gt_favicon.png">

	<!-- SuperAwesome -->
		<!-- Bootstrap itself -->
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!-- Icons -->
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<!-- Fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
		<!-- Custom styles -->
		<link rel="stylesheet" href="../assets/SuperA/css/styles.css">


	<!-- ClearBlog -->
		<!-- Bootstrap core CSS -->
		<link href="../assets/ClearB/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom fonts for this template -->
	  <link href="../assets/ClearB/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

	  <!-- Custom styles for this template -->
	  <link href="../assets/ClearB/css/clean-blog.min.css" rel="stylesheet">



	<!--[if lt IE 9]> <script src="assets/js/html5shiv.js"></script> <![endif]-->
</head>

<body>

<!-- Header -->

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">.
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
					<?php if (isset($_SESSION['login'])){
					echo'	<li class="nav-item">
	            		<a class="nav-link" href="../modif/modif.php">Modification</a>
	          		</li>
								<li class="nav-item">
									<a class="nav-link" href="../connexion/deconnexion.php">Deconnexion</a>
								</li>';}else {

											echo'	<li class="nav-item">
											<a class="nav-link" href="../connexion/connexion.php">Connexion</a>
											</li>';
										}
						?>
          <li class="nav-item">
            <a class="nav-link" href="../inscription/inscription.php">Inscription</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../assets/img/accueil.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Cinéma :<br>Project PHP</h1>
            <span class="subheading">Site de réservation des billets</span>
          </div>
        </div>
      </div>
    </div>
  </header>
<!-- /Header -->


<!-- Content -->
<main class="content">

	<!-- Lead -->
	<section class="container space-before space-after">
		<div class="row">
			<div class="col-sm-10 col-sm-push-1">
				<h1 class="text-center">Films à L'affiche</h1>
			</div>
		</div>
	</section>
	<!-- /Lead -->



	<!-- Features -->
	<section class="container space-before">

		<?php
		$side = 1;
		$bdd = new PDO('mysql:host=localhost;dbname=cine_php;charset=utf8', 'root', '');
		$req = $bdd->prepare('SELECT nom, description, image FROM films INNER JOIN salles ON films.id_salles = salles.id ');
		$req ->execute();
		$res = $req->fetchall();
		foreach ($res as $key => $value) {
		  ?>

		<div class="row featurelist space-after">
		  <div class="<?php if($side == 1){echo 'col-md-5 col-sm-6 col-sm-push-6';}else {echo 'col-md-5 col-sm-6 col-md-push-1';} ?> ">
		    <img class="img-feature img-responsive" src="../assets/img/<?php echo $value["image"]; ?>" alt="Sample image">
		  </div>

		    <div class="<?php if($side == 1){echo 'col-md-5 col-sm-6 col-md-pull-4 col-sm-pull-6';$side=2;}else {echo 'col-md-5 col-md-push-1 col-sm-6';$side=1;} ?> ">
		      <h2 class="space-before"><?php echo $value["nom"]; ?></h2>
		      <p><?php echo $value["description"]; ?></p>
		    </div>

		</div>
		<?php  }	?>
	</section>
	<!-- /Features -->

</main>


<footer>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<ul class="list-inline text-center">
					<li class="list-inline-item">
						<a href="#">
							<span class="fa-stack fa-lg">
								<i class="fas fa-circle fa-stack-2x"></i>
								<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#">
							<span class="fa-stack fa-lg">
								<i class="fas fa-circle fa-stack-2x"></i>
								<i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#">
							<span class="fa-stack fa-lg">
								<i class="fas fa-circle fa-stack-2x"></i>
								<i class="fab fa-github fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
				</ul>
				<p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
			</div>
		</div>
	</div>
</footer>

<p class="small text-muted text-center">Copyright &copy; 2014, Your name. Design by: <a href="http://gettemplate.com/" rel="designer" title="Free Bootstrap templates">GetTemplate</a></p>
<br>

</body>
</html>
