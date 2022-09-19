<?php
include("conexao.php");
$conexao = con_mysql();

$palavra = "";

$tabela = "
<table class='table'>
    <thead class='thead-dark'>
        <tr>
            <th scope='col'>UF</th>
            <th scope='col'>Estados</th>
            <th scope='col'>Nº Cidades</th>
        </tr>
    </thead>   
";

$tabela2 = "
<table class='table'>
    <thead class='thead-dark'>
        <tr>
            <th scope='col'>#</th>
            <th scope='col'>Estados</th>
            <th scope='col'>Nº Cidades</th>
        </tr>
    </thead>   
";

if(isset($_POST["palavra"])){

    $palavra = $_POST["palavra"];
    $sql2 = "SELECT uf,estado,cidades FROM estados WHERE estado = :estado";
    $resultado2 = $conexao->prepare($sql2); 
    $resultado2->bindParam(':estado', $palavra, PDO::PARAM_STR);
    $resultado2->execute();
   
    while($linha = $resultado2->fetch(PDO::FETCH_ASSOC)){
        $uf = $linha["uf"];        
        $estado = $linha["estado"];
        $cidade = $linha["cidades"];

        $tabela2.="
            <tbody>
                <tr>
                <th scope='row'>1</th>
                <td><a class='text-danger' href='estado.php?uf=$uf'>$estado</a></td>
                <td>$cidade</td>
                </tr>
            </tbody>
        ";

    }
   
}

$sql = "SELECT uf,estado,cidades FROM estados;";
$resultado = $conexao->prepare($sql); 
$resultado->execute();

while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
    $uf = $linha["uf"];        
    $estado = $linha["estado"];
    $cidade = $linha["cidades"];

    if(isset($_POST["palavra"])){
        $tabela = "";
    }else{
        $tabela.="
            <tbody>
                <tr>
                <th scope='row'>$uf</th>
                <td><a class='text-danger' href='estado.php?uf=$uf'>$estado</a></td>
                <td>$cidade</td>
                </tr>
            </tbody>
        ";
        $tabela2 = "";
    }

}

$tabela.="</table>";
$tabela2.="</table>";
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
                        <div class="alert alert-success bg-dark text-white col-12" role="alert">
                            <h4 class="alert-heading">Cidades e Estados do Brasil</h4>
                            <p>
                                Projeto realizado no Senac de Limeira: 
                                <button type="button" class="btn btn-link">
                                    <a href="https://github.com/TeuSoares/cidades_brasil">Repositório GitHub</a>
                                </button>
                            </p>
                        </div>
                        
                        <nav class="navbar navbar-light bg-light mt-3 mb-2">
                            <form class="form-inline" method="POST">
                                <input name="palavra" class="form-control mr-sm-2" type="search" placeholder="Digite o estado desejado" aria-label="Pesquisar" value="<?php echo $palavra; ?>">
                                <button name="acaobuscar" class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                            </form>
                        </nav>
                            
                        <?php echo $tabela; ?> 
                        <?php echo $tabela2; ?> 
                    </div>
                </div>     
            </div>
        </section>
    </body>
</html>