<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Consulta Mensajes</title>
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
                    <a href="Consulta Usuarios.php" class="nav-item nav-link">Consultas</a>
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
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Formulario</h3>
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
                <p class="m-0">Mensajes</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Ingresa los siguientes datos</span></p>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form">
                        <div id="success"></div>

                            <?php
                                $con = new PDO('mysql:host=localhost;dbname=canineworld','root','');
                                $query = $con->prepare('select max(numeroregistro) as numeroregistro from mensajes');
                                $query->execute();
                                $row = $query->fetch();
                                $numero = $row['numeroregistro'];
                                $numero++;
                                $usuario=$correo=$mensaje=$genero="";

                                function limpiar($data){
                                    $data = trim($data);
                                    $data = stripslashes($data);
                                    $data = htmlspecialchars($data);
                                    return $data;
                                }
                                if($_SERVER['REQUEST_METHOD']=='POST'){
                                    $usuario=limpiar($_POST['usuario']);
                                }
                            ?>

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <fieldset>
                                    <!-- folio -->
                                    <label for="">Numero de registro</label>
                                    <input type="numero" class="form-control" name="numero" disabled value="<?php
                                        echo $numero; ?>" />
                                    <br>

                                    <!-- nombre -->
                                    <input type="text" class="form-control" name="usuario" placeholder="Tu nombre" required="required" data-validation-required-message="Por favor ingrese su nombre" />
                                    <br>

                                    <!-- email -->
                                    <input type="email" class="form-control" name="correo" placeholder="Tu email" required="required" data-validation-required-message="Por favor ingrese su email" />
                                    <br>

                                    <!-- genero -->
                                    <label for="date-4441" class="u-label u-label-4">Elige tu género </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="genero" id="genero"
                                            value="Masculino" checked="">
                                        <label class="form-check-label" for="genero">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="genero" id="genero"
                                            value="Femenino" checked="">
                                        <label class="form-check-label" for="genero">
                                            Femenino
                                        </label>
                                    </div>
                                    <br>

                                    <!-- mensaje -->
                                    <textarea class="form-control" rows="6" name="mensaje" placeholder="Ingresa tus dudas o sugerencias" required="required" data-validation-required-message="Por favor ingrese su mensaje"></textarea>
                                    <br>

                                    <!-- boton -->
                                    <button class="btn btn-primary py-2 px-4" type="submit" name="Enviar">Enviar mensaje</button>

                                </fieldset>
                            </form>

                            <?php
                                if(isset($_REQUEST['Enviar'])){
                                    $query = $con->prepare('select usuario from mensajes where usuario= :usuario');

                                    $query->execute(['usuario'=>$usuario]);
                                    $row = $query->fetch(PDO::FETCH_NUM);
                                    if($query->rowCount()<=0){
                                        $usuario=$_POST['usuario'];
                                        $genero=$_POST["genero"];
                                        $correo=$_POST["correo"];
                                        $mensaje=$_POST["mensaje"];
                    
                                        $insert = 'insert into mensajes(usuario,genero,correo,mensaje) values(:usuario,:genero,:correo,:mensaje)';
                                        $insert = $con->prepare($insert);
                                        $insert->bindParam(':usuario',$usuario,PDO::PARAM_STR);
                                        $insert->bindParam(':genero',$genero,PDO::PARAM_STR);
                                        $insert->bindParam(':correo',$correo,PDO::PARAM_STR);
                                        $insert->bindParam(':mensaje',$mensaje,PDO::PARAM_STR);
                                        $insert->execute();
                                        echo "Tus datos se agregaron satisfactoriamente!!!";
                                    }
                                    else if ($query -> rowCount() > 0){
                                        echo "<br> Ya existe un usuario con ese nombre.";
                                    }
                                    $query->closeCursor();
                                    $query = null;
                                    $con = null;
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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