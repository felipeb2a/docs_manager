<!DOCTYPE html>
<html>
	 <head>
	     <meta charset="utf-8">
	     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	     <title>DOCs</title>
	     <link rel="shortcut icon" href="../assets/img/header/logo.png" />
		 <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	     <link rel="stylesheet" href="../assets/css/style.css">
	     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
	     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">

	 </head>

	 <body>
	     <nav class="navbar navbar-light navbar-expand-lg bg-white clean-navbar">
	         <div class="container">
				<a class="navbar-brand logo" href="../index.php"><img src="../assets/img/header/logo.png" width="100" height="auto" class="d-inline-block align-top" loading="lazy" /></a>

	         	<button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
	             <div
	                class="collapse navbar-collapse" id="navcol-1">
	                 <ul class="nav navbar-nav ml-auto">	                     
	                     <li class="nav-item" role="presentation"></li>
	                     <li class="nav-item" role="presentation"></li>
	                 </ul>
	         </div>
	         </div>
	     </nav>
	     <main class="page landing-page">

	<section id="login" class="degrade">
	    <div class="container container2">
		    <div class="container container3">
		        <div class="content content2">
			        <form action="../functions/logar.php" method="post" style="margin-top: 30px;">
	                    <div class="form-group text-center h2">
	                        <label class="text-center text-dark">Login</label>
	                    </div>
	                    <div class="form-group">
	                    	<label class="text-center text-dark">Usuário</label>
	                        <input class="form-control" type="text" name="login">
	                        <label class="text-center text-dark">Senha</label>
	                        <input class="form-control" type="password" name="password">
	                    </div>
	                    <!-- enviar -->
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                  	</form>
			    </div>
		    </div>
		</div>
	</section>   

<?php
	include_once('../template/footer.php');
?>