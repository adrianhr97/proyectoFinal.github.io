<?php
    session_start();
    if (!isset($_SESSION['username'])) {
    }
?>

<?php
    $dbusername = "root";
    $dbpassword = "root";
    $dbservername = "localhost";
    $dbname = "test";

    $conn = new mysqli($dbservername, $dbusername, $dbpassword);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "USE $dbname";
    if ($conn->query($sql) === TRUE) {
        //echo "Database entered";
    } else {
        //echo "Error accessing database: " . $conn->error;
    }

    // CARGAR MECANICOS DROPDOWN
    $sql = "SELECT * FROM mecanic";

    $result = $conn->query($sql);
    $mecanicos = array();

    if ($result->num_rows > 0) {
        $i = 0;
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $mecanicos[$i] = array($row["id"],$row["name"], $row["speciality"]);
            $i++;
        }
    } else {
        //echo "No results";
    }

    //echo json_encode((array)$mecanicos);


    // CARGAR USUARIOS DROPDOWN
    $sql = "SELECT * FROM members";

    $result = $conn->query($sql);
    $usuarios = array();

    if ($result->num_rows > 0) {
        $i = 0;
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $usuarios[$i] = array($row["id"],$row["username"], $row["password"]);
            $i++;
        }
    } else {
        //echo "No results";
    }

    //echo json_encode((array)$usuarios);
    $conn->close();
?>

<!DOCTYPE html>
<html>
<title>TALLERES PIN PIN</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</html>

<body>
  <!-- NAVBAR -->
  <nav class="mb-3 navbar navbar-expand-lg navbar-dark bg-dark sticky-top" role="navigation">
    <div class="container">
      <a href="inside.php" class="navbar-brand brand">TALLERES PIN PIN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto text-dark">
          <li class="nav-item">
            <a class="nav-link" href="inside.php">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modalParte">NUEVO PARTE</a>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">USUARIOS</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalMecanico">REGISTRAR MECANICO</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalMecanicoDel">ELIMINAR MECANICO</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalUser">CREAR USUARIO</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalUserDel">ELIMINAR USUARIO</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">LOGOUT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="text-center mt-4">
    <h1 class="text-light"><b>TALLERES PIN PIN</b></h1>
    <h2 class="text-light">Registro de entrada de vehículos</h2>
  </header>

  <!-- CONTENIDO CENTRAL -->
  <div class="container text-center">
    <div class="row mt-5">
      <div class="col-md-3 col-lg-3"></div>
      <div class="col-md-6 col-lg-6">
        <form class="mt-5" action="" method="">
          <div class="md-form mb-3">
            <h1 class="text-light">BUSCA UN PARTE AQUÍ</h1>
            <input class="form-control validate" type="text" name="matricula" placeholder="Matricula"
              onkeyup="searchVehicle()" id="matricula">
          </div>
          <br>
        </form>
        <div class="col-md-3 col-lg-3"></div>
      </div>
    </div>

    <div class="panel text-center justify-content-center" id="panel"></div>

    <div class="container text-center mt-5">

    </div>


  </div>




  <footer class="page-footer font-small">
    <div class="container">
      <div class="row">
        <div class="col-md-12 pt-4 pb-2">
          <div class="mb-2 flex-center">
            <a class="fb-ic">
              <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <a class="tw-ic">
              <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <a class="li-ic">
              <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <a class="ins-ic">
              <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <a class="pin-ic">
              <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center">
      <p class="w3-medium">C/ Coronel Bens Nº31</p>
      <p class="w3-medium">Teléfono: 928-654-980 687-045-065</p>
      <p class="w3-medium">Horario de Lunes a viernes de: 8:00 a 16:00</p>
    </div>


    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> Adrianaso S.L.</a>
    </div>
  </footer>

   <!-- Modal Registrar Parte -->
   <div class="modal fade" id="modalParte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Parte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form class="mt-5" action="database/signup.php" method="post">
                    <div class="md-form mb-3">
                        <input onkeyup="autocompleteVehicle()" class="form-control validate" type="text" id="matriculaParte" name="matriculaParte" placeholder="matricula">
                    </div>
                    <div class="md-form mb-3">
                        <input class="form-control validate" type="date" name="fechaEntrada" placeholder="fechaEntrada">
                    </div>
                    <div class="md-form mb-3">
                        <input class="form-control validate" type="text" id="titular" name="titular" placeholder="titular">
                    </div>
                    <div class="md-form mb-3">
                        <input class="form-control validate" type="text" id="tipo" name="tipo" placeholder="tipo">
                    </div>
                    <div class="md-form mb-3">
                        <textarea class="form-control validate" type="text" name="averia" rows=3 placeholder="averia"></textarea>
                    </div>

                    <div class= "md-orm md-3">
                        <select class="form-control validate" type="text" name="mecanico">
                            <?php
                                for ($i = 0; $i < sizeof($mecanicos); $i++){
                                    $mecanico = $mecanicos[$i][1];
                                    $rol = $mecanicos [$i][2];
                                    echo "<option value=$mecanico>$mecanico - $rol</option>";
                                }
                            ?>
                        </select>
                    </div>   
                    <br>

                    <div class="d-flex justify-content-center">
                        <input class="btn btn-primary" type="submit" value="CREAR PARTE">
                    </div>
    
                </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Modal Registrar Mecanico -->
  <div class="modal fade" id="modalMecanico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Mecanico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="mt-5" action="database/insertMeca.php" method="post">
            <div class="md-form mb-3">
              <input class="form-control validate" type="text" name="name" placeholder="Nombre">
            </div>
            <div class="md-form mb-3">
              <input class="form-control validate" type="text" name="speciality" placeholder="Especialidad">
            </div>
            <div class="d-flex justify-content-center">
              <input class="btn btn-primary" type="submit" value="INSERTAR">
            </div>
         
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Modal Borrar Mecanico -->
  <div class="modal fade" id="modalMecanicoDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Mecanico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="mt-5" action="database/deleteMeca.php" method="post">
            <div class="md-form mb-3">
              <select class="form-control validate" type="text" name="id">
                <?php
                                for ($i = 0; $i < sizeof($mecanicos); $i++){
                                    $id = $mecanicos[$i][0];
                                    $mecanico = $mecanicos[$i][1];
                                    $rol = $mecanicos[$i][2];
                                    echo "<option value=$id>$mecanico - $rol</option>";
                                }
                            ?>
              </select>
            </div>

            <div class="d-flex justify-content-center">
              <input class="btn btn-primary" type="submit" value="BORRAR">
            </div>
        
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Modal Crear Usuario -->
  <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="mt-5" action="database/createUser.php" method="post">
            <div class="md-form mb-3">
              <input class="form-control validate" type="text" name="username" placeholder="Nombre">
            </div>
            <div class="md-form mb-3">
              <input class="form-control validate" type="password" name="password" placeholder="Contraseña">
            </div>
            <div class="d-flex justify-content-center">
              <input class="btn btn-primary" type="submit" value="INSERTAR">
            </div>
           
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Modal Eliminar Usuario -->
  <div class="modal fade" id="modalUserDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="mt-5" action="database/deleteUser.php" method="post">
            <div class="md-form mb-3">
              <select class="form-control validate" type="text" name="id">
                <?php
                                for ($i = 0; $i < sizeof($usuarios); $i++){
                                    $id = $usuarios[$i][0];
                                    $mecanico = $usuarios[$i][1];
 
                                    echo "<option value=$id>$mecanico</option>";
                                }
                            ?>
              </select>
            </div>

            <div class="d-flex justify-content-center">
              <input class="btn btn-primary" type="submit" value="BORRAR">
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script src="main.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>