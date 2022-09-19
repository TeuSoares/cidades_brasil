<?php
include("conexao.php");
$conexao = con_mysql();

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
$label = "%";

if(isset($_GET["codigo"])){             // Existe?

    $codigo = $_GET["codigo"];        // Recupera o valor do parâmetro
    $sql = "SELECT c.codigo,e.estado,c.cidade,c.pop2000,c.pop2010,c.homens,c.mulheres,c.urbana,c.rural 
    FROM cidades as c
    INNER JOIN estados as e
        on c.uf = e.uf
        WHERE c.codigo=(:codigo);"; 
    $resultado = $conexao->prepare($sql); 
    $resultado ->bindParam(':codigo', $codigo, PDO::PARAM_STR);
    $resultado->execute();

    while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
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

    // $valores.="$resultado,$resultado2,$resultadoFinal,$resultadoUrbana,$resultadoFinal";
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php include("navbar.php"); ?>
        
    <section class="servicos pt-4 pb-2 text-center">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="alert alert-danger text-dark col-12" role="alert">
                        <h1 class='display-4 mt-4 mb-4'>Cidade <?php echo $cidade; ?></h1> 
                        <p>
                            Projeto realizado no Senac de Limeira: 
                            <button type="button" class="btn btn-link">
                                <a href="https://github.com/TeuSoares/cidades_brasil">Repositório GitHub</a>
                            </button>
                        </p>
                    </div>
                    <div class="navbar navbar-light col-md-12">
                        <h1 class='h1 mt-4 mb-4'>Gráfico Informativo</h1> 
                        <div>
                            <button type="button" class="btn btn-dark btn-sm bg-danger"><a class="text-white" href="cidade.php?codigo=<?php echo $codigo; ?>">Dados</a></button>
                            <button type="button" class="btn btn-dark btn-sm bg-danger"><a class="text-white" href="grafico.php?codigo=<?php echo $codigo; ?>">Gráficos</a></button>
                        </div>
                    </div>
                        <div class="col-12 d-flex">
                            <div class="alert alert-danger" role="alert">
                                Crescimento população entre 2000 e 2010
                            </div>
                            <div class="alert alert-secondary" role="alert">
                                Percentutal de Homens
                            </div>
                            <div class="alert alert-warning" role="alert">
                                Percentutal de Mulheres
                            </div>
                            <div class="alert alert-success" role="alert">
                                Percentutal população da zona rural
                            </div>
                            <div class="alert alert-primary" role="alert">
                                Percentutal população da zona urbana
                            </div>
                        </div>
                        <div class="col-12">
                            <canvas id="horizontalBar"></canvas>
                        </div>
                </div>
            </div>     
        </div>
    </section>

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

    <script>
        // Gráfico de Linhas
        var resultado = "<?php echo $resultado; ?>"
        var resultado2 = "<?php echo $resultado2; ?>"
        var resultadoFinal = "<?php echo $resultadoFinal; ?>"
        var resultadoUrbana = "<?php echo $resultadoUrbana; ?>"
        var resultadoRural = "<?php echo $resultadoRural; ?>"

        new Chart(document.getElementById("horizontalBar"), {
            "type": "horizontalBar",
            "data": {
                "labels": ["Crescimento", "Homens", "Mulheres", "Rural", "Urbana"],
                "datasets": [{
                    "label": "Valores em %",
                    "data": [resultadoFinal,resultado,resultado2,resultadoRural,resultadoUrbana],
                    "fill": false,
                    "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgb(212, 211, 211)",
                        "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)",
                        "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
                    ],
                        "borderColor": ["rgb(255, 99, 132)", "rgb(129, 129, 129)", "rgb(255, 205, 86)",
                        "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"
                    ],
                    "borderWidth": 1
                }]
            },
            "options": {
                "scales": {
                    "xAxes": [{
                        "ticks": {
                        "beginAtZero": true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
