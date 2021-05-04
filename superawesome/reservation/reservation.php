<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../assets/Colorlib-booking/css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../assets/Colorlib-booking/css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Bootstrap core CSS -->
	  <link href="../assets/ClearB/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	  <!-- Custom fonts for this template -->
	  <link href="../assets/ClearB/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

	  <!-- Custom styles for this template -->
	  <link href="../assets/ClearB/css/clean-blog.min.css" rel="stylesheet">
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="../accueil/index.php">Cinema Project</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="../accueil/index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../modif/modif.php">Modification</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../connexion/connexion.php">Connexion</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Passez votre commande :</h1>
							<p>Ici vous pouvez passez votre commande en ligne et payer quand vous vous presentez au cinema. Grâce a ce fonctionnement si vous ne pouvez pas assiter a votre sceance
								il n'y aura pas de souci et vous n'aurez pas perdu d'argent.
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form action="../traitement/traitement.php" method="post">

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Etudiant</span>
											<input class="form-control" type="text" name="etudiant"  placeholder="Nombre de place" id="etudiant" required>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Navigo</span>
											<input class="form-control" type="text" name="navigo"  placeholder="Nombre de place" id="navigo" required>
											<span class="select-arrow"></span>
										</div>
									</div>
                  </div>
                  <div class="row">
                  <div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Normal</span>
												<input class="form-control" type="text" name="normal" placeholder="Nombre de place" id="normal" required>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Enfant</span>
												<input class="form-control" type="text" name="enfant" placeholder="Nombre de place" id="enfant" required>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<span class="form-label">Choisissez votre film</span>
									<select name="id" class="" id="id">
									  <?php
										$bdd = new PDO('mysql:host=localhost;dbname=cine_php;charset=utf8', 'root', '');
										$req = $bdd->prepare('SELECT * FROM films');
  									$req->execute([]);
  									$res = $req->fetchall();
									  #Affiche tous les noms de chaques film et mets en valeurs leur nom dans la table film
									  foreach ($res as $value) {
									    echo '<option name="'.$value['id'].'" value="'.$value['id'].'">'.$value['nom'].'</option>';
									  }
									  ?>
									</select>
								</div>
								<div class="row">
									<div class="col-sm-1">
										<div class="form-group">
											<span class="form-label">Paiement</span>
												<select class="paiement" name="paiement">
													<option value="carte">Carte bancaire</option>
													<option value="coupon">Coupon</option>
													<option value="espece">Espece</option>
												</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>

								<div class="form-btn">
									<input type="submit" value="Réservation" class="submit-btn" name="submit" id="submit" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
