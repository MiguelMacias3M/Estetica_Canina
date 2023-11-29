<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Modificación Usuarios</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="../css/style1.css" rel="stylesheet">

</head>

<body>
<div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <i class=""><img src="img/iconoE-removebg-preview.png" alt="" width="15%"></i>
                <span class="text-primary">CANINE-WORLD</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--Menu desplegable-->
            
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
               <!--<label for="">Mensajes</label>
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="Formulario MensajesAdmin.php" class="nav-item nav-link active">Altas</a>
                    <a href="Baja Mensajes.php" class="nav-item nav-link">Bajas</a>
                    <a href="consulta mensajes.php" class="nav-item nav-link">Consultas</a>
                    <a href="cambios mensajes.php" class="nav-item nav-link">Cambios</a>
                </div>

                <label for="">Usuarios</label>
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="registroAdmin.php" class="nav-item nav-link active">Altas</a>
                    <a href="baja usuarios.php" class="nav-item nav-link">Bajas</a>
                    <a href="consulta usuarios.php" class="nav-item nav-link">Consultas</a>
                    <a href="cambios usuarios.php" class="nav-item nav-link">Cambios</a>
                </div>
                -->
                <a href=""></a>
                <a class="btn btn-warning py-2 px-4" href="../../cerrar.php">Cerrar sesión</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <!-- inicio de sesion y etiqueta de usuario-->
        <?php
		    session_start();
		    if(!isset($_SESSION['nivel'])){
			    header('location:../inicio de sesion.php');
		    }
            $mensaje =  "Usuario: ".$_SESSION['nombre'][1]."  Nivel: ".$_SESSION['nivel'][0];
		?>
        <div class="col-md-4">
			<input type="text" disable value="<?php echo $mensaje; ?>" size="50"  style="text-align: center; background-color: rgb(118, 253, 213); border-radius: 15px;">
		</div>
        
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Modificación de:</h3>
            <!--Menu lateral-->
            <div class="col-lg-1 mb-5">
                    <div  class = "sticky-container" >
                        <ul  class = "sticky" >
                            <h2>Usuarios</h2>
                            <li >
                                <img  src = "../img/icono menu (1).png"  width = "32"  height = "32" >
                                <P> <a  href = "Consulta Usuarios.php"> Consulta de: <br > Usuarios </a > </p >
                            </li >
                            <li>
                                <img  src = "../img/icono menu (1).png"  width = "32"  height = "32" >
                                <P> <a  href = "cambios usuarios.php"> Cambio de: <br > Usuarios </a > </p >
                            </li>
                            <li >
                                <img  src = "../img/icono menu (1).png"  width = "32"  height = "32" >
                                <P> <a  href = "baja usuarios.php"> Baja de: <br > Usuarios </a > </p >
                            </li >
                            <br>
                                 
                              
                            <h2>Mensajes</h2>
                            <li >
                                <img  src = "../img/icono menu (2).png"  width = "32"  height = "32" >
                                <P> <a  href = "consulta mensajes.php"> Consulta de: <br > Mensajes </a > </p >
                            </li >
                            <li>
                                <img  src = "../img/icono menu (2).png"  width = "32"  height = "32" >
                                <P> <a  href = "cambios mensajes.php"> Cambio de: <br > Mensajes </a > </p >
                            </li>
                            <li >
                                <img  src = "../img/icono menu (2).png"  width = "32"  height = "32" >
                                <P> <a  href = "baja mensajes.php"> Baja de: <br > Mensajes </a > </p >
                            </li >        
                        </ul >
                    </div >
                </div>
        <!--End menu lateral-->
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href=""></a></p>
                <p class="m-0">Usuarios</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Registros</span></p>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form">
                        <div id="success"></div>

                        <!-- Contenido pagina -->
        <h1>Modificar usuarios</h1>
        <?php
			$con = new PDO('mysql:host=localhost;dbname=canineworld','root','');
			$id="";
			function test_entrada($data){
				$data = trim($data);
				$data = stripslashes($data);        
				$data = htmlspecialchars($data);
				return $data;
			}
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$id = test_entrada($_POST["id"]);
			}
		?>
		<form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label for="exampleFormControlInput1" class="form-label">Ingresa el ID del susario a modificar</label>
			<input type="text" class="form-control" id="id"  name="id" value="<?php echo $id;?>">
            <br>
			<input type="submit" class="btn btn-primary" name ="buscar" id="buscar" value="Buscar ID del usuario"/>
			<br/>
            <br><br>
			<?php
				if(isset($_REQUEST['buscar'])){
					$id=isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
					$query = $con->prepare('select * FROM usuarios where id = :id');
					$query->setFetchMode(PDO::FETCH_ASSOC);
					$query->execute(['id' => $id]);
					$row = $query->fetch();
					if($query -> rowCount() > 0){
						
						echo 	'<label>ID de usuario:</label>'.
									'<input type="text" value="'.$row['id'].'" disabled/><br/>'.

									
								'<label>Nombre de usuario:</label>'.
								'<input type="text" lang="es" href="qa-html-language-declarations.es". name="nombre" value ="'.$row['nombre'].'"/><br/>'.

                                '<label>Email:</label>'.
                                '<input type="text" lang="es" href="qa-html-language-declarations.es". name="email" value ="'.$row['email'].'"/><br/>'.
                            
                                '<label>Teléfono:</label>'.
								'<input type="text" lang="es" href="qa-html-language-declarations.es". name="telefono" value ="'.$row['telefono'].'"/><br/>'.

                                '<label>Password:</label>'.
								'<input type="text" lang="es" href="qa-html-language-declarations.es". name="password" value ="'.$row['password'].'"/><br/>'.

                                '<label>Nivel:</label>'.
								'<input type="text" lang="es" href="qa-html-language-declarations.es". name="nivel" value ="'.$row['nivel'].'"/><br/>'.
                                

								'<button class="btn btn-warning"type="submit" name="cambiar">Cambiar datos</button><br/>';
						}else if ($query -> rowCount() <= 0){
							echo "No existe este usuario.";
						}		 
				}//if(isset($_REQUEST[''buscar]))
				
                if(isset($_REQUEST['cambiar'])){
					$id=$_POST['id'];
					$nombre=$_POST['nombre'];
					$email=$_POST['email'];
					$telefono=$_POST['telefono'];
					$password=$_POST['password'];
					$nivel=$_POST['nivel'];
					
					
					$sql = "UPDATE usuarios SET id=?, nombre=?, email=?, telefono=?, password=?, nivel=? WHERE id=?";
					$stmt= $con->prepare($sql);
					$stmt->execute([$id, $nombre, $email, $telefono, $password, $nivel, $id]);
		
					$row = $stmt->fetch();
					if($stmt->rowCount() > 0){
						echo"<h3>Los siguientes datos fueron modificados con exito</h3>";
						print ("<hr/>");
						print ("<table class='table table-striped'>");
							print ("<tr>");
								print ("<th>ID del usuario</th>");
								print ("<td>".$id."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Nombre del usuario</th>");
								print ("<td>".$nombre."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Email</th>");
								print ("<td>".$email."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Teléfono</th>");
								print ("<td>".$telefono."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Password</th>");
								print ("<td>".$password."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Nivel</th>");
								print ("<td>".$nivel."</td>");
							print ("</tr>");
							
						
						print ("</table>");
						print ("<hr/>");
					}else if ($stmt->rowCount()<=  0){
						echo "No se actualizó el registro!!!";
					}
				}
                $query = null;
				$con = null;
			?>
		</form>
        
    

    
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>