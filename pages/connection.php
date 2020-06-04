<?php
  try
  {
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=mini_projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)) ;
  }
  catch(Exception $e)
  {
	// En cas d'erreur, on affiche un message et on arrête tout
		  die('Erreur : '.$e->getMessage());
  }
  $password_error =  $login_error  = "" ;
  if(isset($_POST['connexion']) & !empty($_POST['login']) & !empty($_POST['password']) ) {
	 $login = $_POST['login'] ;
	 $password = $_POST['password'] ;
		
	 $reponse = $bdd->query('SELECT * FROM user WHERE login= "'.$login.'"');
  
	 
	 //  On affiche chaque entrée une à une
	 while ($donnees = $reponse->fetch()){
		  if ($login == $donnees['login'] && $password == $donnees['password'] && $donnees['role'] == "admin") {
			  // echo "admin";
			  header('location:acceuil.php') ;
		  }
		  elseif ($login == $donnees['login'] && $password == $donnees['password'] && $donnees['role'] == "joueur") {
			  header('location:joueurs.php') ;
		  }
		  elseif ($login == $donnees['login'] && $password !== $donnees['password'] && $donnees['role'] == "joueur") {
			  $password_error  = "your password is not valid" ;
		  
		  }
		  elseif ($login !== $donnees['login'] && $password == $donnees['password'] && $donnees['role'] == "joueur") {
			  $login_error = "your login is not valid" ;
		  } 
		  elseif ($login !== $donnees['login'] && $password !== $donnees['password'] ) {
			  $login_error = "not corresponding, please data create account if you ain't please " ;
		  } 
		
	 }

  } elseif(isset($_POST['connexion']) &  empty($_POST['login']) & !empty($_POST['password']) ){ 
	$login_error = "will you fill a login please!" ;
  }  elseif(isset($_POST['connexion']) &  !empty($_POST['login']) &  empty($_POST['password']) ){ 
	$password_error = "will you fill a password please!" ;
  }  elseif(isset($_POST['connexion']) &  empty($_POST['login']) &  empty($_POST['password']) ){ 
	$login_error = "you haven't write anything! put inputs " ;
  } 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v8 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="sourcesanspro-font.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body class="form-v8">
	<div class="head">
            <h1 class="card-header info-color white-text text-center py-4" style="color: #FFFDFD;">
                <strong>LE PLAISIR DE JOUER</strong>
            </h1>
    </div>
	<div class="page-content">
		<div class="form-v8-content">
			<div class="form-left">
				<img src="images/logo1.PNG" alt="form">
			</div>
			<div class="form-right">
				<div class="tab">
					<div class="tab-inner">
						<button class="tablinks" onclick="openCity(event, 'sign-up')" id="defaultOpen">CONNEXION</button>
					</div>
					<div class="tab-inner">
						<button class="tablinks" onclick="openCity(event, 'sign-in')">S'INSCRIRE</button>
					</div>
				</div>
				<form class="form-detail" action="#" method="post">
					<div class="tabcontent" id="sign-up">
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="full_name" id="full_name" class="input-text" required>
								<span class="label">Login</span>
		  						<span class="border"></span>
							</label>
						</div>
						
						<div class="form-row">
							<label class="form-row-inner">
								<input type="password" name="password" id="password" class="input-text" required>
								<span class="label">Password</span>
								<span class="border"></span>
							</label>
						</div>
						
						<div class="form-row-last">
							<input type="submit" name="register" class="register" value="CONNEXION">
						</div>
					</div>
					
				</form>
				<form class="form-detail" action="#" method="post">
					<div class="tabcontent" id="sign-in">
						<div class="avatar">
							<label for="avatar">Choose a profile picture:</label>
                            <input type="file"id="avatar" name="avatar"accept="image/png, image/jpeg">
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="full_name_1" id="full_name_1" class="input-text" required>
								<span class="label">Firstname</span>
		  						<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="full_name_1" id="full_name_1" class="input-text" required>
								<span class="label">Lastname</span>
		  						<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="your_email_1" id="your_email_1" class="input-text" required>
								<span class="label">Login</span>
		  						<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="password" name="password_1" id="password_1" class="input-text" required>
								<span class="label">Password</span>
								<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="password" name="comfirm_password_1" id="comfirm_password_1" class="input-text" required>
								<span class="label">Comfirm Password</span>
								<span class="border"></span>
							</label>
						</div>
						<div class="form-row-last">
							<input type="submit" name="register" class="register" value="Sign In">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function openCity(evt, cityName) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		    document.getElementById(cityName).style.display = "block";
		    evt.currentTarget.className += " active";
		}

		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>