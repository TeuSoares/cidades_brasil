<?php
include("conexao.php");

$estado2 = "";
$cidade2 = "";
$popu2000 = "";
$popu2010 = "";
$mulheres = "";
$homens = "";
$uf2 = "";
$rural = "";
$urbana = "";
$city = "";
$codigo = "";
$calcu = "";
$resultado = "";
$resultadoFinal = "";
$resultado3 = "";
$resultadoRural = "";
$calcuRural = "";
$resultadoUrbana = "";
$calcuUrbana = "";

if(isset($_GET["codigo"])){             // Existe?

    $codigo = $_GET["codigo"];        // Recupera o valor do parâmetro
    $sql = "SELECT c.codigo,e.estado,c.cidade,c.pop2000,c.pop2010,c.homens,c.mulheres,c.urbana,c.rural 
    FROM cidades as c
    INNER JOIN estados as e
        on c.uf = e.uf
        WHERE c.codigo=('$codigo');";
    $resultado = $conexao->query($sql);  

    while($linha = mysqli_fetch_array($resultado)){
        $codigo = $linha["codigo"];
        $cidade = $linha["cidade"];
        $estado2 = $linha["estado"];
        $popu2000 = $linha["pop2000"];
        $popu2010 = $linha["pop2010"];
        $homens = $linha["homens"];
        $mulheres = $linha["mulheres"];
        $rural = $linha["rural"];
        $urbana = $linha["urbana"];
        
    }
    if($calcu = $homens * 100/$popu2010){
        $resultado = $calcu;
    }
    if($calcu2 = $mulheres * 100/$popu2010){
        $resultado2 = $calcu2;
    }
    if($calcu3 = $popu2010 - $popu2000){
        $resultado3 = $calcu3 / $popu2000;
        $resultadoFinal = $resultado3 * 100;
    }
    if($calcuUrbana = $urbana * 100/$popu2010){
        $resultadoUrbana = $calcuUrbana;
    }
    if($calcuRural = $rural * 100/$popu2010){
        $resultadoRural = $calcuRural;
    }
    $resultado = number_format($resultado, 2, '.', '');
    $resultado2 = number_format($resultado2, 2, '.', '');
    $resultadoFinal = number_format($resultadoFinal, 2, '.', '');
    $resultadoUrbana = number_format($resultadoUrbana, 2, '.', '');
    $resultadoRural = number_format($resultadoRural, 2, '.', '');
    
} 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Cidades do Brasil</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="mdb/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="mdb/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- Start your project here-->  
  <header>
            <ul class="nav justify-content-center bg-dark py-2">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Desativado</a>
                </li>
            </ul>
        </header> <!--FIM Header-->
        
        <section class="servicos pt-4 pb-2 text-center">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div class="alert alert-success bg-dark text-white" role="alert">
                            <h4 class="alert-heading">Cidades e Estados do Brasil</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ullamcorper lorem. Quisque gravida tempor pulvinar. Curabitur lectus risus, elementum nec elit non, hendrerit consectetur orci. </p>
                        </div>
                        <nav class="navbar navbar-light col-md-12">
                            <h1 class='h1 mt-4 mb-4'>Cidade <?php echo $cidade; ?></h1> 
                            <div>
                                <button type="button" class="btn btn-dark btn-sm bg-danger"><a class="text-white" href="cidade2.php?codigo=<?php echo $codigo; ?>">Dados</a></button>
                                <button type="button" class="btn btn-dark btn-sm bg-danger"><a class="text-white" href="grafico.php?codigo=<?php echo $codigo; ?>">Gráficos</a></button>
                            </div>
                        </nav>
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col">Dados</th>
                                    <th scope="col">Estatísticas</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">População de 2000</th>
                                    <td><?php echo $popu2000; ?> Habitantes</td>
                  
                                </tr>
                                <tr>
                                    <th scope="row">População de 2010</th>
                                    <td><?php echo $popu2010; ?> Habitantes</td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row">População de Homens</th>
                                    <td><?php echo $homens; ?> Homens</td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row">População de Mulheres</th>
                                    <td><?php echo $mulheres; ?> Mulheres</td>
                                   
                                </tr>
                                <tr>
                                    <th scope="row">População Zona Rural</th>
                                    <td><?php echo $rural; ?> habitantes</td>
                                   
                                </tr>
                                <tr>
                                    <th scope="row">População Zona Urbana</th>
                                    <td><?php echo $urbana; ?> habitantes</td>
                                   
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>     
            </div>
        </section>
  <!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="mdb/js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="mdb/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="mdb/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="mdb/js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
</body>
</html>
