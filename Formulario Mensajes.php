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
                <a href="inicio de sesion.php" class="btn btn-primary px-4">Aplicación</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Formulario</h3>
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

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0"
                    style="font-size: 40px; line-height: 40px;">
                    <i class="flaticon-043-teddy-bear"></i>
                    <span class="text-white">Canine-world</span>
                </a>
                <p>Empresa dedicada 100% al cuidado de tu canino, desde hace más de 10 años ofrecemos el servicio más
                    amigable, cómodo y de calidad para tu peludo.</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Ven y conócenos</h3>
                <div class="d-flex">
                    <h4 class="fa fa-map-marker-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Dirección</h5>
                        <p>C. Benito Juárez #12, Rincón de Romos, Ags.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-envelope text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Email</h5>
                        <p>canine-world-official@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-phone-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Teléfono</h5>
                        <p>449-123-90-02</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Naveguemos</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Inicio</a>
                    <a class="text-white mb-2" href="about.html"><i class="fa fa-angle-right mr-2"></i>Acerca de...</a>
                    <a class="text-white mb-2" href="class.html"><i class="fa fa-angle-right mr-2"></i>Productos</a>
                    <a class="text-white mb-2" href="gallery.html"><i class="fa fa-angle-right mr-2"></i>Galería</a>
                    <a class="text-white mb-2" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contacto </a>
                    <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Aplicación</a>
                </div>
            </div>

            
        </div>
        <!-- Footer End -->

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