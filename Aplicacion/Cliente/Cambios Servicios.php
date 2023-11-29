<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Modificación de servicios</title>
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

<body >
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
            <h3 class="display-3 font-weight-bold text-white">Modificación de:</h3>
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

                        <!-- Contenido pagina -->
        <h1>Modificar servicios</h1>
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
			<label for="exampleFormControlInput1" class="form-label">ID del servicio a modificar:</label>
			<input type="text" class="form-control" id="id"  name="id" value="<?php echo $id;?>">
            <br>
			<input type="submit" class="btn btn-primary" name ="buscar" id="buscar" value="Buscar número de servicio!!!"/>
			<br/>
            <br><br>
			<?php
				if(isset($_REQUEST['buscar'])){
					$id=isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
					$query = $con->prepare('select * FROM mascotas where id = :id');
					$query->setFetchMode(PDO::FETCH_ASSOC);
					$query->execute(['id' => $id]);
					$row = $query->fetch();
					if($query -> rowCount() > 0){
						
						echo 	'<label>Número de servicio:</label>'.
									'<input type="text" value="'.$row['id'].'" disabled/><br/>'.

									
								'<label>Nombre del propietario:</label>'.
								'<input type="text" lang="es" href="qa-html-language-declarations.es". name="nombrePropietario" value ="'.$row['nombrePropietario'].'"/><br/>'.
                            
                                '<label>Teléfono:</label>'.
								'<input type="text" lang="es" href="qa-html-language-declarations.es". name="telefono" value ="'.$row['telefono'].'"/><br/>'.

                                '<label>Género:</label>'.
								'<input type="text" lang="es" href="qa-html-language-declarations.es". name="genero" value ="'.$row['genero'].'"/><br/>'.


                                '<label>Fecha:</label>'.
                                '<input type="text" lang="es" href="qa-html-language-declarations.es". name="fecha" value ="'.$row['fecha'].'"/><br/>'.
                            
                                '<label>Nombre de la mascota:</label>'.
								'<input type="text" lang="es" href="qa-html-language-declarations.es". name="nombreMascota" value ="'.$row['nombreMascota'].'"/><br/>'.

                                '<label>Edad del propietario:</label>'.
								'<input type="text" lang="es" href="qa-html-language-declarations.es". name="edadPropietario" value ="'.$row['edadPropietario'].'"/><br/>'.

                                '<label>Raza de la mascota:</label>'.
								'<input  type="text" lang="es" href="qa-html-language-declarations.es". name="razaMascota" value ="'.$row['razaMascota'].'"/><br/>'.
                                
                                '<label>Alergias:</label>'.
								'<input  type="text" lang="es" href="qa-html-language-declarations.es". name="alergias" value ="'.$row['alergias'].'"/><br/>'.
                                
                                '<br/>'.

                                '
                                    <label for="floatingSelect">Selecciona el servicio deseado:</label><br>
                                    
                                    <label for="option1">Baño $150.00</label>
                                    <input type="hidden" name="option1" value="None">
                                    <input onkeyup="updateTotal()" type="checkbox" id="option1" value="option1" name="option1"> <br>

                                    <label for="option2">Corte de pelo $200</label>
                                    <input type="hidden" name="option2" value="None">
                                    <input  onkeyup="updateTotal()" type="checkbox" id="option2" value="option2" name="option2"> <br>

                                    <label for="option3">Corte de uñas $100.00</label>
                                    <input type="hidden" name="option3" value="None">
                                    <input onkeyup="updateTotal()" type="checkbox" id="option3" value="option3" name="option3"> <br>

                                    <label for="option4">Limpieza oídos y/u ojos $80.00</label>
                                    <input type="hidden" name="option4" value="None">
                                    <input onkeyup="updateTotal()" type="checkbox" id="option4" value="option4" name="option4"> <br>

                                    <label for="option5">Cepillado dental $50.00</label>
                                    <input type="hidden" name="option5" value="None">
                                    <input onkeyup="updateTotal()" type="checkbox" id="option5" value="option5" name="option5">
                                    
                                '.


                                '<br/>'.
                                '<label>Total: </label>'.
								'<input onkeyup="updateTotal()" type="text" lang="es" href="qa-html-language-declarations.es". name="totalFormulario"  id="totalFormulario" disabled value ="'.$row['total'].'"/><br/>'.
                                '<label>Pago con:</label>'.
								'<input onkeyup="updateTotal()" type="text" lang="es" href="qa-html-language-declarations.es". name="pago"  id="pago" value ="'.$row['pago'].'"/><br/>'.
                                '<label>Adeudo</label>'.
								'<input" type="text" lang="es" href="qa-html-language-declarations.es". name="cambioForm"  id="cambioForm" disabled value ="'.$row['cambio'].'"/><br/>'.
								'<button type="submit" name="cambiar">Cambiar datos</button><br/>';
						}else if ($query -> rowCount() <= 0){
							echo "No existe éste usuario.";
						}		 
				}//if(isset($_REQUEST[''buscar]))
				
                if(isset($_REQUEST['cambiar'])){
					$id=$_POST['id'];
					$nombrePropietario=$_POST['nombrePropietario'];
					$telefono=$_POST['telefono'];
					$genero=$_POST['genero'];
					$fecha=$_POST['fecha'];
					$nombreMascota=$_POST['nombreMascota'];
					$edadPropietario=$_POST['edadPropietario'];
					$razaMascota=$_POST['razaMascota'];
					$alergias=$_POST['alergias'];

                    
                    

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

                    $pago = $_POST['pago'];
                    $totalServicios = $option1 + $option2 + $option3 + $option4 + $option5;
                    $cambio = $totalServicios - $pago;

                    
                    $query = "INSERT INTO mascotas 
                            (servicio1, servicio2, servicio3, servicio4, servicio5) 
                            VALUES (?,?,?,?,?)";


					
					$sql = "UPDATE mascotas SET id=?, nombrePropietario=?,  telefono=?, genero=?, pago=?, fecha=?, nombreMascota=?, edadPropietario=?, razaMascota=?, alergias=?, total=?, cambio=?, servicio1=?, servicio2=?, servicio3=?, servicio4=?, servicio5=? WHERE id=?";
					$stmt= $con->prepare($sql);
					$stmt->execute([$id, $nombrePropietario, $telefono, $genero, $pago, $fecha, $nombreMascota, $edadPropietario, $razaMascota, $alergias, $total, $cambio, $servicio1, $servicio2, $servicio3, $servicio4, $servicio5, $id]);
		
					$row = $stmt->fetch();
					if($stmt->rowCount() > 0){
						echo"<h3>Los siguientes datos fueron modificados con éxito</h3>";
						print ("<hr/>");
						print ("<table class='table table-striped'>");
							print ("<tr>");
								print ("<th>ID del servicio</th>");
								print ("<td>".$id."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Nombre del propietario</th>");
								print ("<td>".$nombrePropietario."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Teléfono</th>");
								print ("<td>".$telefono."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Género</th>");
								print ("<td>".$genero."</td>");
							print ("</tr>");
                            
                            print ("<tr>");
								print ("<th>Fecha</th>");
								print ("<td>".$fecha."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Nombre de la mascota</th>");
								print ("<td>".$nombreMascota."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Edad del propietario</th>");
								print ("<td>".$edadPropietario."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Raza de la mascota</th>");
								print ("<td>".$razaMascota."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Alergias</th>");
								print ("<td>".$alergias."</td>");
							print ("</tr>");
                            

                            print ("<tr>");
								print ("<th>Pago realizado</th>");
								print ("<td>".$pago."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Total a pagar</th>");
								print ("<td>".$totalServicios."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Adeudo</th>");
								print ("<td>".$cambio."</td>");
							print ("</tr>");

                            
                            print ("<tr>");
								print ("<th>Servicio 1</th>");
								print ("<td>".$servicio1."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Servicio 2</th>");
								print ("<td>".$servicio2."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Servicio 3</th>");
								print ("<td>".$servicio3."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Servicio 4</th>");
								print ("<td>".$servicio4."</td>");
							print ("</tr>");

                            print ("<tr>");
								print ("<th>Servicio 5</th>");
								print ("<td>".$servicio5."</td>");
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

            console.log("Entro  UPDATE");
            
            var totalExtrarerDeFormulario =  document.getElementById("totalFormulario").value;
           
            var checkboxes = document.querySelectorAll("input[type='checkbox']");
            for (var i = 0; i < checkboxes.length; i++) {
              var checkbox = checkboxes[i];
              if (checkbox.checked) {
                var optionValue = checkbox.value;
                var price = prices[optionValue];
                totalExtrarerDeFormulario += price;
              }
            }
            document.getElementById("totalFormulario").innerHTML = totalExtrarerDeFormulario;


          }

          document.getElementById("pago").addEventListener("input", function() {
            updateCambio();
          });

          function updateCambio() {
            var pago = parseInt(document.getElementById("pago").value);
            var totalExtrarerDeFormulario1 =  parseInt(document.getElementById("totalFormulario").value);
            console.log(totalExtrarerDeFormulario1);

    
            var cambio = totalExtrarerDeFormulario1 - pago;
            document.getElementById("cambioForm").innerHTML = cambio;
           

          }
        </script>

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