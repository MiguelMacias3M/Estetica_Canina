<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registrate</title>
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
                </div>-->
                <a href=""></a>
                <a class="btn btn-warning py-2 px-4" href="../../cerrar.php">Cerrar sesión</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->



  
    <!-- Header End -->
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
            <h3 class="display-3 font-weight-bold text-white">Registro de:</h3>
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
                <p class="section-title px-5"><span class="px-2">Registro</span></p>
                <h1 class="mb-4">Registra a un nuevo usuario</h1>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form">
                        <div id="success"></div>

                        <!--Conexion con la base de datos-->
                        <?php
                            $con = new PDO('mysql:host=localhost;dbname=canineworld','root','');
                            $query = $con->prepare('select max(id) as id from usuarios');
                            $query->execute();
                            $row = $query->fetch();
                            $numero = $row['id'];
                            $numero++;
                            $nombre=$email=$telefono=$password=$nivel="";

                            function limpiar($data){
                                $data = trim($data);
                                $data = stripcslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                            }
                            if($_SERVER['REQUEST_METHOD']=='POST'){
                                $nombre=limpiar($_POST['nombre']);
                            }
                        ?>
                        
                        
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        
                            <fieldset>
                                <!-- id -->
                                <label for="">ID del usuario: </label>
                                <input type="numero" name="id" class="form-control"  disabled value="<?php echo $numero; ?>" />
                                <br>

                                <input type="text" class="form-control" name="nombre" placeholder="Nombre de ususario" required="required" data-validation-required-message="Por favor ingrese su nombre" />
                                <p class="help-block text-danger"></p>
                                
                                <input type="email" class="form-control" name="email" placeholder="Email" required="required" data-validation-required-message="Ingrese su email" />
                                <p class="help-block text-danger"></p>
                                
                                <input type="txt" class="form-control" name="telefono" placeholder="Teléfono" required="required" data-validation-required-message="Ingresa tu teléfono" />
                                <p class="help-block text-danger"></p>
                                
                                <input type="password" class="form-control" name="password" placeholder="Password" required="required" data-validation-required-message="Ingresa una contraseña" />
                                <p class="help-block text-danger"></p>
                                
                                <br>
                                <!-- nivel de usuario -->
                                <!-- genero -->
                                <label for="date-4441" class="u-label u-label-4">Selecciona tu nivel de usuario </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nivel" id="nivel" value="Cliente" checked="">
                                    <label class="form-check-label" for="nivel">
                                        Cliente
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nivel" id="nivel" value="Administrador" checked="">
                                    <label class="form-check-label" for="nivel">
                                        Administrador
                                    </label>
                                </div>
                                <br>

                                
                                <button class="btn btn-primary py-2 px-4" type="submit" name="enviar">Regístrate</button>
                            </fieldset>
                        </form>

                            <?php
                                if(isset($_REQUEST['enviar'])){
                                    $query = $con->prepare('select nombre from usuarios where nombre= :nombre');

                                    $query->execute(['nombre'=>$nombre]);
                                    $row = $query->fetch(PDO::FETCH_NUM);
                                    if($query->rowCount()<=0){
                                        $nombre = $_POST['nombre'];
                                        $email = $_POST['email'];
                                        $telefono= $_POST['telefono'];
                                        $password= $_POST['password'];
                                        $cifrado = password_hash($password,PASSWORD_DEFAULT,array("cost">=10));
                                        $nivel= $_POST['nivel'];

                                        $insert = "insert into usuarios(nombre,email,telefono,password,nivel) values (:nombre,:email,:telefono,:password,:nivel)";
                                        $insert = $con->prepare($insert);

                                        $insert->bindParam(':nombre',$nombre,PDO::PARAM_STR);
                                        $insert->bindParam(':email',$email,PDO::PARAM_STR);
                                        $insert->bindParam(':telefono',$telefono,PDO::PARAM_STR);
                                        
                                        $insert->bindParam(':password',$cifrado,PDO::PARAM_STR);
                                        $insert->bindParam(':nivel',$nivel,PDO::PARAM_STR);
                                        $insert->execute();
                                        echo "Usuario registrado satisfactoriamente!!!";
                                    }
                                    else if ($query -> rowCount() > 0){
                                        echo "<br> Ya existe un usuario con ese nombre.";
                                    }
                                    $query->closeCursor();
                                    $query = null;
                                    $con = null;
                                }
                                
                            ?>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-5">
                    <img src="img/cachorro.jpg" alt="" width="100%">
                </div>
            </div>
        </div>
    </div>

    
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
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