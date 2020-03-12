<?php

  require 'database.php';
    $message = '';
	

  if (!empty($_POST['Nombre']) && !empty($_POST['Pais'])&& !empty($_POST['Ciudad'])&& !empty($_POST['Correo'])
  && !empty($_POST['Telefono'])&& !empty($_POST['Ocupacion'])&& !empty($_POST['Cargo'])&& !empty($_POST['password'])) {
    $sql = "INSERT INTO datos (nombre, pais,ciudad,correo,telefono,	ocupacion,	cargo,	contraseña) VALUES (:nombre, :pais,:ciudad,:correo,:telefono,	:ocupacion,	:cargo,	:password)";
    $stmt = $conn->prepare($sql);
	$stmt->bindParam(':nombre', $_POST['Nombre']);
	$stmt->bindParam(':pais', $_POST['Pais']);
	$stmt->bindParam(':ciudad', $_POST['Ciudad']);
	$stmt->bindParam(':correo', $_POST['Correo']);
	$stmt->bindParam(':telefono', $_POST['Telefono']);
	$stmt->bindParam(':ocupacion', $_POST['Ocupacion']);
	$stmt->bindParam(':cargo', $_POST['Cargo']);
	

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    
    if ($stmt->execute()) {
		?> 
   <script>alert("¡Registrado exitosamente!");</script>
   
           <?php
    
    } else {
		?> 
		 <script>alert("Hubo un error, no fue posible crear su cuenta");</script>
		 
				 <?php
     
    }
  }else{
	?> 
	 <script>alert("Por favor complete todos los campos");</script>
	 
			 <?php
	
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Spicy+Rice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<link rel="stylesheet"  href="css/principal.css">
</head>

<body>



	  <!-- ___________________________Encabezado de todos los usuarios________________________________________-->
		 
	  <div class="   container-fluid   float-left">

<nav class=" navbar navbar-light bg-light">
	<picture class="ml-rigth" >
		<source srcset="imagenes/cancer2XSS.png " media="(max-width:350px)">	
		<source srcset="imagenes/cancer2XS.png " media="(max-width:500px)">
		<source srcset="imagenes/cancer2.png " media="(max-width:900px)">
		<img  src="imagenes/cancer2.png">
	</picture>

	<form class="form-inline">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>
	  
</nav>
</div>	



	<!-- ___________________________BARRA Navegacion iniciar sesion________________________________________-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand " href="#">Registro </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        	<div class="collapse navbar-collapse" id="navbarNavDropdown">
          		<ul class="navbar-nav ml-auto">

            		<li class="nav-item ">
              		<a class="nav-link" href="./"><i class="fas fa-home"></i>Inicio  </a>
					</li>
					   
            		<li class="nav-item ">
              		<a class="nav-link" href="./login.php"><i class="fas fa-sign-in-alt"></i>Iniciar sesión  </a>
					</li>
					
           			<li class="nav-item active">
   		 			<a class="nav-link" href="./signup.php"><i class="fas fa-user-plus"></i>Registrarse  </a>
            		</li>
            	</ul>
        	</div>
    </div>
    
  </nav>
  
  
  <!-- __________________________Formulario Registro____________________________________________-->
<p></p>

<div class="container">
<form action="signup.php" method="POST">

  <div class=" form-group">
    <label for="Nombre ">Nombres y apellidos</label>
    <input type="text" class=" form-control" name="Nombre" placeholder="Ingrese su nombre completo">
  </div>
  
 <div class="form-row">
  		<div class="form-group col-md-6">
      	<label for="Pais">Pais</label>
      	<select name="Pais" class="  form-control">
		<option selected>Seleccione...</option>
		<option>Afganistán</option>
		<option>Akrotiri</option>
		<option>Albania</option>
		
		</select>
		</div>

    	<div class="form-group col-md-6">
      	<label for="Ciudad">Ciudad</label>
      	<input type="text" class=" form-control" name="Ciudad">
		</div>  	
		
  </div>


  
  <div class="form-row">
    	<div class="form-group col-md-6">
      	<label for="Correo">Correo electronico</label>
      	<input type="email" class=" form-control" name="Correo" placeholder="Ingrese su correo electronico">
    	</div>
	
		<div class="form-group col-md-6">
      	<label for="Telefono">Telefono </label>
      	<input type="text" class=" form-control" name="Telefono" placeholder="Ingrese un numero telefonico de contacto">
    	</div>
  </div>

  



  <div class="form-row">
  		<div class="form-group col-md-6">
      	<label for="Ocupacion">Ocupación</label>
      	<select name="Ocupacion" class=" form-control">
		<option selected>Seleccione...</option>
		<option>Estudiante</option>
		<option>Docente</option>
		<option>Profesional</option>
		<option>Otro</option>
		</select>
		</div>

    	<div class="form-group col-md-6">
      	<label for="Cargo">Cargo/Especialidad</label>
      	<input type="text" class=" form-control" name="Cargo">
		</div>  	
  </div>

  <div class="form-row">
    	<div class="form-group col-md-6">
		  <label for="password">Nueva contraseña</label>
		  <input name="password" class=" form-control" type="password" placeholder="Enter your Password">
      	
    	</div>
	
		<div class="form-group col-md-6">
		  <label for="CONFcontaseña">Confirme su contraseña</label>
		  
      	<input type="password" class=" form-control" name="CONFcontaseña" placeholder="Confirme su contraseña">
    	</div>
	
  </div>


  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Acepta los terminos y condiciones
      </label>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Registrarme</button>
</form>
</div>



<!-- __________________________pie de pagina____________________________________________-->
<Br></Br>

<footer class="bg-dark text-center p-2 text-white">
 	<p class="classtamañoletra">
    Nicolas Rubiano 2020 &copy;
	</p>
</footer>

<!-- __________________________Java script para responsive bootstrap____________________________________-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>





</body>
</html>