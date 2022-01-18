<?php
include("conexao.php");

$uf = "";
$cidade = "";
$estado = "";
$pop2000 = "";
$pop2010 = "";
$tabela = "";
$tabela2 =  "";
$pesquisar = "";

if(isset($_GET["uf"])){             // Existe?

    $uf = $_GET["uf"];        // Recupera o valor do parâmetro
    $sql = "SELECT c.codigo,e.estado,c.cidade,c.pop2000,c.pop2010 
    FROM cidades as c
    INNER JOIN estados as e
    on c.uf = e.uf
    WHERE e.uf=('$uf');";
    $resultado = $conexao->query($sql);  


    while($linha = mysqli_fetch_array($resultado)){  
        $codigo = $linha["codigo"];     
        $estado = $linha["estado"];
        $cidade = $linha["cidade"];
        $pop2000 = $linha["pop2000"];
        $pop2010 = $linha["pop2010"];

        
        if(isset($_POST["pesquisar"])){
            $tabela = "";
        }else{
            $tabela.="
                <tbody>
                    <tr>
                    <td><a class='text-danger' href='cidade.php?codigo=$codigo'>$cidade</a></td>
                    <td>$pop2000</td>
                    <td>$pop2010</td>
                    </tr>
                </tbody>
            ";
        $tabela2 = "";
        }
    }

    if(isset($_POST["pesquisar"])){

        $pesquisar = $_POST["pesquisar"];
        $uf = $_GET["uf"]; 
        $sql2 = "SELECT c.codigo,e.estado,c.cidade,c.pop2000,c.pop2010 
        FROM cidades as c
        INNER JOIN estados as e
        on c.uf = e.uf
        WHERE e.uf=('$uf') and c.cidade=('$pesquisar');";
        $resultado2 = $conexao->query($sql2); 

        while($linha = mysqli_fetch_array($resultado2)){  
            $codigo = $linha["codigo"];     
            $estado = $linha["estado"];
            $cidade = $linha["cidade"];
            $pop2000 = $linha["pop2000"];
            $pop2010 = $linha["pop2010"];
    
            $tabela2.="
            <tbody>
                <tr>
                <td><a class='text-danger' href='cidade.php?codigo=$codigo'>$cidade</a></td>
                <td>$pop2000</td>
                <td>$pop2010</td>
                </tr>
            </tbody>
            ";
        }

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
                        <div class="alert alert-danger text-dark mb-4 col-md-12 py-4" role="alert">
                            <h1 class='mt-4 mb-4 display-4'>Estado <?php echo $estado; ?></h1> 
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate ea, voluptas facilis, modi asperiores corporis ex vitae dicta ab sed assumenda quisquam, reiciendis officia similique. Numquam maxime quos tempora hic?</p>
                        </div>
                        <div class="container">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Alterna navegação">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 d-sm-flex">
                                        <li class="nav-item active px-2 py-2">
                                            <button type="button" class="btn btn-outline-danger px-2"><a class="link-estado" href="estado.php?uf=<?php echo $uf; ?>">Lista de Cidades</a></button>
                                        </li>
                                        <li class="nav-item py-2">
                                            <button type="button" class="btn btn-outline-danger px-2"><a class="link-estado" href="dados-estado.php?uf=<?php echo $uf; ?>">Dados do Estado</a></button>
                                        </li>
                                    </ul>
                                    <form class="form-inline my-2 my-lg-0" method="POST">
                                        <input name="pesquisar" class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                                    </form>
                                </div>
                            </nav>
                        </div>
                        <table class='table'>
                            <thead class="thead-dark">
                                <tr>         
                                <th scope='col'>Cidades</th>
                                <th scope='col'>População 2000</th>
                                <th scope='col'>População 2010</th>
                                </tr>
                            </thead> 
                        <?php echo $tabela; ?>
                        <?php echo $tabela2; ?>
                        </table>
                    </div>
                </div>     
            </div>
        </section>
      

        <script src="js/jquery.js"> </script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>