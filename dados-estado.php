<?php
include("conexao.php");
$conexao = con_mysql();

$uf = "";
$estado = "";
$capital = "";
$gentilico = "";
$area = "";

if(isset($_GET["uf"])){             // Existe?

    $uf = $_GET["uf"];        // Recupera o valor do parâmetro
    $sql = "SELECT * FROM estados WHERE uf = :uf";
    $resultado = $conexao->prepare($sql); 
    $resultado->bindParam(':uf', $uf, PDO::PARAM_STR);
    $resultado->execute();

    while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){  
        $uf = $linha["uf"];     
        $estado = $linha["estado"];
        $capital = $linha["capital"];
        $gentilico = $linha["gentilico"];
        $area = $linha["area"];

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cidades do Brasil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
        <?php include("navbar.php"); ?>
        
        <section class="servicos bg-light pt-4 pb-2 text-center">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div class="alert alert-danger text-dark text-white col-12" role="alert">
                            <h1 class='mt-4 mb-4 display-4'>Estado <?php echo $estado; ?></h1> 
                            <p>
                                Projeto realizado no Senac de Limeira: 
                                <button type="button" class="btn btn-link">
                                    <a href="https://github.com/TeuSoares/cidades_brasil">Repositório GitHub</a>
                                </button>
                            </p>
                        </div>
                        <div class="container">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Alterna navegação">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                        <li class="nav-item active px-2 py-2">
                                            <button type="button" class="btn btn-outline-danger px-4"><a class="link-estado" href="estado.php?uf=<?php echo $uf; ?>">Lista de Cidades</a></button>
                                        </li>
                                        <li class="nav-item  py-2">
                                            <button type="button" class="btn btn-outline-danger px-4"><a class="link-estado" href="dados-estado.php?uf=<?php echo $uf; ?>">Dados do Estado</a></button>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center h4 py-5">
                                    Capital
                                    <span class="badge badge-primary badge-pill"><?php echo $capital; ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center h4 py-5">
                                    Gentilico
                                    <span class="badge badge-primary badge-pill"><?php echo $gentilico; ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center h4 py-5">
                                    Área do estado
                                    <span class="badge badge-primary badge-pill"><?php echo $area; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>     
            </div>
        </section>
    </body>
</html>