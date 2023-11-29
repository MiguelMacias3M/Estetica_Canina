<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Baja de Mensajes</title>
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
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <i class=""><img src="img/iconoE-removebg-preview.png" alt="" width="15%"></i>
                <span class="text-primary">CANINE-WORLD</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="formularioServicios.php" class="nav-item nav-link active">Altas</a>
                    <a href="bajasServicios.php" class="nav-item nav-link">Bajas</a>
                    <a href="consultasServicios.php" class="nav-item nav-link">Consultas</a>
                    <a href="Cambios Servicios.php" class="nav-item nav-link">Cambios</a>
                </div>
                
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
            $mensaje =  "Bienvenid@ ".$_SESSION['nombre'][1];
		?>
        <div class="col-md-4">
			<input type="text" disable value="<?php echo $mensaje; ?>" size="20"  style="text-align: center; background-color: rgb(118, 253, 213); border-radius: 15px;">
		</div>
        
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Eliminación de:</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href=""></a></p>
                <p class="m-0">Servicios</p>
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

                        
<?php
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
    ?>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
        method="POST">
            <label for="id">Ingresa el número del servicio a borrar</label>
            <input type="text" name="id" id="id" value="<?php echo $id;?>">
            <input class="btn btn-primary" type="submit" name="buscarid" value="Buscar tu servicio">
           <br><br>

   
    <?php
     $con = new PDO('mysql:host=localhost;dbname=canineworld','root','');
  if(isset($_REQUEST['buscarid'])){
    $clave=isset($_REQUEST['id'])?$_REQUEST['id']:null;
    $query = $con->prepare('select * from mascotas where id =:id');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute(['id'=>$id]);
    $row = $query->fetch();
    if($query->rowCount()<=0){
        echo"No hay registros coincidentes";
    }else if($query->rowCount()>0){
       print("Datos del usuario");
       print("<div class='container mt-3'>");
        print("<table class='table table-striped'>");
            print("<table>");
            print("<tr>");
            print("<th>Número del servicio </th>");
            print("<td>".$row['id']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Nombre del propietario</th>");
            print("<td>".$row['nombrePropietario']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Teléfono</th>");
            print("<td>".$row['telefono']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Nombre de la mascota</th>");
            print("<td>".$row['nombreMascota']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Raza de la mascota</th>");
            print("<td>".$row['razaMascota']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Género</th>");
            print("<td>".$row['genero']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Fecha</th>");
            print("<td>".$row['fecha']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Alergias</th>");
            print("<td>".$row['alergias']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Total a pagar</th>");
            print("<td>".$row['total']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Pago realizado</th>");
            print("<td>".$row['pago']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Saldo</th>");
            print("<td>".$row['cambio']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Servicio 1</th>");
            print("<td>".$row['servicio1']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Servicio 2</th>");
            print("<td>".$row['servicio2']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Servicio 3</th>");
            print("<td>".$row['servicio3']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Servicio 4</th>");
            print("<td>".$row['servicio4']."</td>");
        print("</tr>");

        print("<tr>");
            print("<th>Servicio 5</th>");
            print("<td>".$row['servicio5']."</td>");
        print("</tr>");
            print("</table>");
            print("</hr>");
            print("<br>");
            print("<input class='btn btn-warning' type='submit' name='borrar' value='Eliminar servicio'>");
            print("</form>");

    }
   
}
if (isset($_REQUEST['borrar'])){
    $clave=isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
    $query = $con->prepare('delete FROM canineworld.mascotas where id= :id');
    $query->execute(['id' => $id]);
    if (!$query){
        echo "Error".$query->errorInfo();
    }
    echo "<hr/><hr/>Servicio eliminado";
    //Cerrar conexión
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