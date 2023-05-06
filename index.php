<?php
session_start();
include("templates/header.php");
?>

<style>
  /* Estilos personalizados */
  .p-5 {
    background-color: ;
    border: 1px solid #ccc;
    margin-bottom: 2rem;
    
  }

  .container-fluid {
    max-width: 800px;
    margin: 0 auto;
  }

  h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
  }

  p {
    font-size: 1.5rem;
    margin-bottom: 2rem;
  }

  img {
    max-width: 100%;
    height: auto;
    margin-bottom: 2rem;
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
  }

  .btn-primary:hover {
    background-color: #0069d9;
    border-color: #0069d9;
  }
</style>

<br>
<div class="p-5">
  <div class="container-fluid">
    <h1>Bienvenido al sistema</h1>
    <p>Usuario: <?php echo $_SESSION['nombredelusuario']; ?></p>
    <img src="./th.jpg" alt="Descripción de la imagen">
    <br>
    <a name="" id="" class="btn btn-primary" href="<?php echo $url_base;?>/secciones/equipos/">Equipos</a>
    
  </div>
</div>

<?php
include("templates/footer.php");
?>