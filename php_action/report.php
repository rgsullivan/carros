<?php
//conexão
session_start();
include_once 'db_connect.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1.0"
    />
    <title>TIGRAO CARROS</title>

    <!-- CSS  -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      href="css/materialize.css"
      type="text/css"
      rel="stylesheet"
      media="screen,projection"
    />
    <link
      href="css/style.css"
      type="text/css"
      rel="stylesheet"
      media="screen,projection"
    />
  </head>
  
  <body>
    <nav class="orange" role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="#" class="brand-logo"
          ><img src="../assets/imagens/logo_horizontal2.png" alt="logo"/>
        </a>

        <ul class="right hide-on-med-and-down">
          <li><a href="index.php">Home</a></li>
          <li><a href="consultar.php">Consultar</a></li>
          <li><a href="adicionar.php">Adicionar</a></li>
          <li><a href="relatorio.php">Relatórios</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav">
          <li><a href="index.php">Home</a></li>
          <li><a href="consultar.php">Consultar</a></li>
          <li><a href="adicionar.php">Adicionar</a></li>
          <li><a href="relatorio.php">Relatórios</a></li>
        </ul>

        <a href="#" data-target="nav-mobile" class="sidenav-trigger"
          ><i class="material-icons">menu</i>
        </a>

      </div>
    </nav>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

  <!--icone pagina-->
  <link rel="../shortcut icon" href="../assets/imagens/icone.png" />

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js">
    defer
  </script>
  <script src="../js/materialize.js">
    defer
  </script>
  <script src="../js/init.js">
    defer
  </script>
</head>


<div class="selection no-pad-bot" id="index-banner">
  <div class="container">
    <br>
    <br>
    <div class="row center">
    <img src="../assets/imagens/LogoRelatorio.png" widht="200px"/>
      <div class="col s12 m12 l12 xl12">
        <h3 class+="light">Relatório</h3>

        <?php

        if (isset($_POST['btn-relatorio'])) :
            $marcaselecionada = $_POST['marcaselecionada'];
        endif;
        ?>
        <h4 class="light"><?php echo $marcaselecionada;?></h4>

        <table class="striped">
          <thead>
            <tr>
            <th>Marca</th>
              <th>Modelo</th>
              <th>Modelo/Fabricação</th>
              <th>Descricao</th>
              <th>Cor</th>
              <th>Placa</th>
              <th>Valor (R$)</th>
            </tr>
          </thead>
          <?php
          if (isset($_POST['btn-relatorio'])) :
            if ($marcaselecionada == "TODAS AS MARCAS") :
              $sql = "SELECT * FROM estoque ORDER BY marca,modelo,mod_fab";
            else :
              $sql = "SELECT * FROM estoque WHERE marca = '$marcaselecionada' ORDER BY marca,modelo,mod_fab";
            endif;
          endif;
          $resultado = mysqli_query($connect, $sql);
          while ($dados = mysqli_fetch_array($resultado)) :
          ?>
            <tr>
              <td><?php echo $dados['marca']; ?></td>
              <td><?php echo $dados['modelo']; ?></td>
              <td><?php echo $dados['descricao']; ?></td>
              <td><?php echo $dados['fabricacao']; ?></td>
              <td><?php echo $dados['cor']; ?></td>
              <td><?php echo $dados['placa']; ?></td>
              <td><?php echo $dados['valor']; ?></td>
            </tr>
          <?php endwhile; ?>
        </table>
      </div>
    </div>
    <br>
    <br>
  </div>
</div>

</body>
</html>