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

    $homens = number_format($homens, 0, '', '.');
    $mulheres = number_format($mulheres, 0, '', '.');
    $popu2000 = number_format($popu2000, 0, '', '.');
    $popu2010 = number_format($popu2010, 0, '', '.');
    $rural = number_format($rural, 0, '', '.');
    $urbana = number_format($urbana, 0, '', '.');
    
} 

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cidades do Brasil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import CSS-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c4c99ec63b.js" crossorigin="anonymous"></script>
</head>
    <body>
        <header>
            <ul class="nav justify-content-center bg-dark py-2">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="estado-mapa.php">Mapa</a>
                </li>
            </ul>
        </header> <!--FIM Header-->
        
        <section class="servicos pt-4 pb-2 text-center">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div class="alert alert-danger text-dark" role="alert">
                            <h1 class='display-4 mt-4 mb-4'>Cidade <?php echo $cidade; ?></h1> 
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ullamcorper lorem. Quisque gravida tempor pulvinar. Curabitur lectus risus, elementum nec elit non, hendrerit consectetur orci. </p>
                        </div>
                        <div class="mt-2 mb-4">
                            <button type="button" class="btn btn-dark btn-sm bg-danger"><a class="text-white" href="cidade.php?codigo=<?php echo $codigo; ?>">Dados</a></button>
                            <button type="button" class="btn btn-dark btn-sm bg-danger"><a class="text-white" href="grafico.php?codigo=<?php echo $codigo; ?>">Gráficos</a></button>
                        </div>
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
      

        <script src="js/jquery.js"> </script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>