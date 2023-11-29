<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Iniciar sesión</title>
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
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Inicio</a>
                    <a href="about.html" class="nav-item nav-link">Acerca de...</a>
                    <a href="class.html" class="nav-item nav-link">Productos</a>
                    <a href="gallery.html" class="nav-item nav-link">Galería</a>
                    <a href="Formulario Mensajes.php" class="nav-item nav-link">Contacto</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- inicio de sesion-->
    <?php
    session_start();

    // Verifica si ya hay una sesión activa
    if (isset($_SESSION['nivel'])) {
        header('location: aplicacion/consulta mensajes.php');
        exit(); // Asegúrate de salir después de redirigir
    }

    // Incluye el archivo de conexión
    include 'conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];

        try {
            // Utiliza una conexión PDO para mayor seguridad
            $query = $conexion->prepare('SELECT * FROM usuarios WHERE nombre = :nombre');
            $query->execute(['nombre' => $nombre]);
            $row = $query->fetch(PDO::FETCH_ASSOC);
            echo "Después de la ejecución de la consulta";
            var_dump($row);


            if (!empty($row)) {
                $_SESSION['nivel'] = $row['nivel'];
                $_SESSION['nombre'] = $row['nombre'];

                if ($row['nivel'] === 'Administrador') {
                    header('location: aplicacion/Administrador/consulta mensajes.php');
                    exit();
                } else {
                    header('location: aplicacion/Cliente/formularioServicios.php');
                    exit();
                }
            } else {
                echo '<script type="text/javascript"> 
                        alert("USUARIO O CONTRASEÑA INCORRECTA");
                        </script>';
                die(); // Detiene la ejecución del script
            }
        } catch (PDOException $e) {
            // Manejar errores de conexión o consulta
            echo "Error: " . $e->getMessage();
        }
    }
    ?>

<!-- Resto de tu formulario HTML -->

    


    <!-- Inicio de sesion Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Inicio</span></p>
                <h1 class="mb-4">Iniciar sesión</h1>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" METHOD="POST">
                            <!-- nombre usuario -->
                                <input type="text" class="form-control" value="username" name="nombre" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Usuario';}" placeholder="Nombre de usuario" required="required" data-validation-required-message="Por favor ingrese su nombre" />
                                <p class="help-block text-danger"></p>
                            
                            <!-- contraseña -->
                                <input type="password" class="form-control" value="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Contraseña';}" placeholder="Password" required="required" data-validation-required-message="Por favor ingrese su contraseña" />
                                <p class="help-block text-danger"></p>
                            

                            <!-- boton inicio de sesion -->
                                <button class="btn btn-primary py-2 px-4" type="submit"  name="inicio">Iniciar sesión</button>
                                <br>
                            
                               <label for="">¿No tienes cuenta? <a href="Aplicacion/registro.php">Crea tu cuenta.</a></label>
                            
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-5">
                    <img src="img/LOGO.png" alt="" width="100%">
    </div>
    <!-- Contact End -->



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
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>