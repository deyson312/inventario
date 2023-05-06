
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <img class="logo_navbar" src="" alt="">
    <div class="container-fluid">
        <h3 class="text-light">Sistema de inventario </h3>
    </div>
    </div>
</nav>
<?php 

session_start();

if($_POST) {
    include("./bd.php");

    $sentencia = $conexion->prepare("SELECT *, count(*) as n_usuarios
    FROM `tbl_usuarios` WHERE nombredelusuario = :nombredelusuario AND password = :password");


    $nombredelusuario = $_POST["nombredelusuario"];
    $password = $_POST["password"];
    $sentencia->bindParam(":nombredelusuario", $nombredelusuario); 
    $sentencia->bindParam(":password", $password); 
    $sentencia->execute();
    $registro= $sentencia->fetch(PDO::FETCH_LAZY);

    if($registro["n_usuarios"] == 1){
        $_SESSION['nombredelusuario'] = $registro["nombredelusuario"];
        $_SESSION['logueado'] = true;
        header("Location:index.php");
        exit();
    } else {
        $mensaje = "Error: El usuario o la contraseña son incorrectos";
    }
}

?>



<!doctype html>
<html lang="en">

<head>
<div class="main-container">
  
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    
    <!-- place navbar here -->
  </header>
  <main class="container">
  
  <div class="row  ">
  <div class="col-md-4  ">
    
  </div>
  <div class="col-md-4  ">
    <br>
    <br>
    <div class="card">
      <div class="card-header">
        Login
      </div>
      <div class="card-body">
      <?php if(isset($mensaje)){?>
         <div class="alert alert-danger" role="alert">
          <strong><?php echo $mensaje;?></strong>
         </div>
         <?php } ?>
         
      <form action="" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Usuario:</label>
          <input type="text"
            class="form-control" name="nombredelusuario" id="nombredelusuario" aria-describedby="helpId" placeholder="Escriba su usuario">
          
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Contraseña:</label>
          <input type="password"
            class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Ingrese su contraseña">
            
        </div>

        <button type="submit" class="btn btn-primary">Entrar al sistema</button>
      </div>
      </form>
      </div>
    </div>
  </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
