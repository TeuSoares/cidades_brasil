<?php
include("conexao.php");

$sql = "SELECT uf,estado,cidades FROM estados;";
$resultado = $conexao->query($sql);  

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

$palavra = "";

if(isset($_POST["palavra"])){

    $palavra = $_POST["palavra"];
    $sql2 = "SELECT uf,estado,cidades FROM estados WHERE estado = '$palavra';";
    $resultado2 = $conexao->query($sql2);  
   
    while($linha = mysqli_fetch_array($resultado2)){
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

while($linha = mysqli_fetch_array($resultado)){  
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

$conexao->close();
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
        
        <section class="servicos bg-light pt-4 pb-2 text-center">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div class="alert alert-success bg-dark text-white" role="alert">
                            <h4 class="alert-heading">Cidades e Estados do Brasil</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ullamcorper lorem. Quisque gravida tempor pulvinar. Curabitur lectus risus, elementum nec elit non, hendrerit consectetur orci. </p>
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
      

        <script src="js/jquery.js"> </script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>