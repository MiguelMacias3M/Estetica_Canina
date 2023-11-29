<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Formulario de Servicios</title>
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
    <!-- inicio de sesion y etiqueta de usuario-->
    <div>

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
            <h3 class="display-3 font-weight-bold text-white">Bienvenido</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href=""></a></p>
                <p class="m-0">¿Qué le gustaría a tu amigo peludo?</p>
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

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="control-group">
                                <input type="text" class="form-control" id="id"
                                    name="id" required="required" disabled/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="nombrePropietario" placeholder="Nombre del propietario"
                                    name="nombrePropietario" required="required"
                                    data-validation-required-message="Por favor ingrese el nombre del propietario" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="number" class="form-control" id="edadPropietario" placeholder="Edad del propietario"
                                    name="edadPropietario" required="required"
                                    data-validation-required-message="Por favor ingrese su edad" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="number" class="form-control" id="telefono" placeholder="Teléfono del propietario"
                                    name="telefono" required="required"
                                    data-validation-required-message="Por favor ingrese su número de teléfono" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="mascota" placeholder="Nombre de la mascota"
                                    name="nombreMascota" required="required"
                                    data-validation-required-message="Por favor ingrese el nombre de la mascota" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <div class="form-floating mb-3">
                                    <label for="floatingSelect">Selecciona la raza</label>
                                    <select name="razaMascota" class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option selected=""> </option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Bulldog">Bulldog</option>
                                        <option value="Pastor Alemán">Pastor Alemán</option>
                                        <option value="Labrador">Labrador</option>
                                        <option value="Pug">Pug</option>
                                        <option value="Husky">Husky</option>
                                        <option value="Dalmata">Dalmata</option>
                                        <option value="Doberman">Doberman</option>
                                    </select>
                                </div>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <div class="form-floating mb-3">
                                    <label for="floatingSelect">Selecciona el servicio deseado:</label><br>
                                    
                                    <label for="option1">Baño $150.00</label>
                                    <input type="hidden" name="option1" value="None">
                                    <input type="checkbox" id="option1" value="option1" name="option1"> <br>

                                    <label for="option2">Corte de pelo $200</label>
                                    <input type="hidden" name="option2" value="None">
                                    <input type="checkbox" id="option2" value="option2" name="option2"> <br>

                                    <label for="option3">Corte de uñas $100.00</label>
                                    <input type="hidden" name="option3" value="None">
                                    <input type="checkbox" id="option3" value="option3" name="option3"> <br>

                                    <label for="option4">Limpieza oídos y/u ojos $80.00</label>
                                    <input type="hidden" name="option4" value="None">
                                    <input type="checkbox" id="option4" value="option4" name="option4"> <br>

                                    <label for="option5">Cepillado dental $50.00</label>
                                    <input type="hidden" name="option5" value="None">
                                    <input type="checkbox" id="option5" value="option5" name="option5"> <br>
                                </div>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <p class="help-block text-danger"></p>
                                <label for="date-4441" class="u-label u-label-4">Elige tu género </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="genero"
                                        value="Masculino" checked="">
                                    <label class="form-check-label" for="gridRadios1">
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="genero"
                                        value="Femenino" checked="">
                                    <label class="form-check-label" for="gridRadios1">
                                        Femenino
                                    </label>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-check">
                                    <p class="help-block text-danger"></p>

                                    <p class="help-block text-danger"></p> 
                                </div>

                                <div id="current_date"></p>

                              

                                <div class="u-form-date u-form-group u-form-partition-factor-2 u-form-group-4">
                                    <label for="date-4441" class="u-label u-label-4" > Fecha: </label>
                                        <!-- 
                                            //Obtener fecha
                                            <script>
                                            date = new Date();
                                            year = date.getFullYear();
                                            month = date.getMonth() + 1;
                                            day = date.getDate();
                                            document.getElementById("current_date").innerHTML = month + "/" + day + "/" + year;
                                            </script>
                                        -->
                                    <input type="date"  id="fecha" name="fecha"
                                        value="<?php echo date("Y-m-d");?>">
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <p class="help-block text-danger"></p>
                                <textarea class="form-control" rows="6" id="alergias" placeholder="Alergias" name="alergias"
                                    required="required"
                                    data-validation-required-message="Por favor ingrese las alergias con las que cuenta su mascota"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <div class="form-control">Total a pagar: <span id="total" name="total">0</span></div>
                                <p class="help-block text-danger"></p>

                                <div>Pago realizado:
                                  <input class="form-control" type="number" id="pago" name="pago">
                                </div>
                                <p class="help-block text-danger"></p>
                                
                                <div class="form-control">Saldo: <span id="cambio" name="cambio">0</span></div>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit" name="enviar" id="enviar">Comprar</div>
                        </form>

                        <?php
                          $conn = new PDO('mysql:host=localhost;dbname=canineworld','root','');

                          if(isset($_REQUEST['enviar'])){
                            $nombrePropietario = $_POST['nombrePropietario'];
                            $edadPropietario = $_POST['edadPropietario'];
                            $telefono = $_POST['telefono'];
                            $nombreMascota = $_POST['nombreMascota'];
                            $razaMascota = $_POST['razaMascota'];
                            $genero = $_POST['genero'];
                            $fecha = $_POST['fecha'];
                            $alergias = $_POST['alergias'];
                            $pago = $_POST['pago'];

                            $option1 = $_POST['option1'];
                            if($option1 != 'None') {$option1 = 150; $servicio1 = "Baño";} else {$option1 = 0; $servicio1 = null;}
                            $option2 = $_POST['option2'];
                            if($option2 != 'None') {$option2 = 200; $servicio2 = "Corte de pelo";} else {$option2 = 0; $servicio2 = null;}
                            $option3 = $_POST['option3'];
                            if($option3 != 'None') {$option3 = 100; $servicio3 = "Corte de uñas";} else {$option3 = 0; $servicio3 = null;}
                            $option4 = $_POST['option4'];
                            if($option4 != 'None') {$option4 = 80; $servicio4 = "Limpieza oídos y/u ojos";} else {$option4 = 0; $servicio4 = null;}
                            $option5 = $_POST['option5'];
                            if($option5 != 'None') {$option5 = 50; $servicio5 = "Cepillado dental";} else {$option5 = 0; $servicio5 = null;}

                            $total = $option1 + $option2 + $option3 + $option4 + $option5;
                            $cambio = $total - $pago;

                            $query = "INSERT INTO mascotas 
                            (nombrePropietario, edadPropietario, telefono, nombreMascota, razaMascota, genero, fecha, alergias, pago, cambio, total, servicio1, servicio2, servicio3, servicio4, servicio5) 
                            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                            $stmt = $conn->prepare($query);
                            $stmt->bindParam(1, $nombrePropietario);
                            $stmt->bindParam(2, $edadPropietario);
                            $stmt->bindParam(3, $telefono);
                            $stmt->bindParam(4, $nombreMascota);
                            $stmt->bindParam(5, $razaMascota);
                            $stmt->bindParam(6, $genero);
                            $stmt->bindParam(7, $fecha);
                            $stmt->bindParam(8, $alergias);
                            $stmt->bindParam(9, $pago);
                            $stmt->bindParam(10, $cambio);
                            $stmt->bindParam(11, $total);
                            $stmt->bindParam(12, $servicio1);
                            $stmt->bindParam(13, $servicio2);
                            $stmt->bindParam(14, $servicio3);
                            $stmt->bindParam(15, $servicio4);
                            $stmt->bindParam(16, $servicio5);

                            if($stmt->execute()){
                                
                                echo '<script language="javascript">alert("Datos guardados correctamente");</script>';
                            }else{
                                echo '<script language="javascript">alert("Ha ocurrido un error, los datos no se han guardado");</script>';
                            }
                          }
                          // Cerrar la conexión a la base de datos
                          $conn = null;
                        ?>
                    </div>
                </div>
            </div>
        </div>
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

        <script>
          window.addEventListener("load", function() {
            updateTotal();
               
          });
          
          var prices = {
            option1: 150,
            option2: 200,
            option3: 100,
            option4: 80,
            option5: 50
          };

          var checkboxes = document.querySelectorAll("input[type='checkbox']");
          for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener("click", function() {
              updateTotal();
            });
            checkboxes[i].addEventListener("click", function() {
              if (this.checked) {
                localStorage.setItem(this.id, "checked");
              } else {
                localStorage.removeItem(this.id);
              }
            });
            if (localStorage.getItem(checkboxes[i].id) === "checked") {
              checkboxes[i].checked = true;
            }
          }

          function updateTotal() {
            var total = 0;
            var checkboxes = document.querySelectorAll("input[type='checkbox']");
            for (var i = 0; i < checkboxes.length; i++) {
              var checkbox = checkboxes[i];
              if (checkbox.checked) {
                var optionValue = checkbox.value;
                var price = prices[optionValue];
                total += price;
              }
            }
            document.getElementById("total").innerHTML = total;
          }

          document.getElementById("pago").addEventListener("input", function() {
            updateCambio();
          });

          function updateCambio() {
            var pago = parseInt(document.getElementById("pago").value);
            var total = parseInt(document.getElementById("total").innerHTML);
            var cambio = total - pago;
            document.getElementById("cambio").innerHTML = cambio;
          }

          
        </script>
</body>

</html>