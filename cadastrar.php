<?php
session_start();
include('./php/config.php');
    $dis = "none";
// Usar $_POST para acessar o parâmetro "formulario"
if (isset($_POST["formulario"])) {
// echo 'aki 1'; exit; 
    
    switch ($_POST["formulario"]) {
        case 'cadastrar-usuario':
            $usuario = $_POST["usuario"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $telefone = $_POST["telefone"];
            $cpf_cnpj = $_POST["cpf_cnpj"];
            $genero = $_POST["genero"];

            // echo 'aki 2';exit;
            // Corrigir o SQL: Coloque os valores corretos de colunas
            $sql = "INSERT INTO cadastro (usuario, email, senha, telefone, cpf_cnpj, genero)
                    VALUES ('{$usuario}', '{$email}', '{$senha}', '{$telefone}', '{$cpf_cnpj}', '{$genero}')";
            // print_r($sql);exit;
            $res = $connect->query($sql);

            if ($res == true) {
                echo "<script>location.href= 'index.php'</script>;";
            } if ($res == 0) {
                
                $dis = "block";

            }

            break;
        default:
            // Caso o formulário não seja o esperado
            echo "<script>alert('Formulário não encontrado');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="br-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="./js/cadastro.js" type="text/javascript" defer></script>
    <link rel="stylesheet" href="./css/cadastrar.css">

    <style>#erro_cadastro {
    color: red;
    font-size: 15px;
    margin-left: -2px;
    margin-top: -20px;
    margin-bottom: 10px;
    display: <?php echo $dis ?>;
    }</style>

    <title>Cadastro Gazin</title>
</head>
<body>

    <!-- menu -->

    <header id="menu">
        <div>
            <img src="./img/logo-gazin.png" id="img-logo">
        </div>
        <div>

            

        </div>
    </header>

    <!-- /menu -->

    <!-- cadastro -->

    <section id="center-vertical"> 
        <center>
            <div id="center-vertical2">
                <form action="cadastrar.php" id="menu-cadastro" method="POST">
                            <input type="hidden" name="formulario" value="cadastrar-usuario">
                    <ul id="ul-cadastro">
                        <li >
                            <input class="li-cadastro" type="text" placeholder="Nome representante" name="usuario" required>
                        </li>                       
                        <li >                       
                            <input class="li-cadastro" type="email" placeholder="E-mail" name="email" required>
                        </li>                       
                        <li >                       
                            <input class="li-cadastro" type="password" placeholder="Senha" name="senha" required>
                        </li>               
                        <li >
                            <input class="li-cadastro" type="password" placeholder="Confirmar senha" required>
                        </li>
                        <li >
                            <input class="li-cadastro CLL" type="tel" maxlength="15" placeholder="(99) 9999-9999" name="telefone" required>
                        </li>
                        <li >
                            <input class="li-cadastro CPF" type="tel" placeholder="CPF/CNPJ" name="cpf_cnpj" required>
                        </li>
                        <div id="erro_cadastro"> 
                            Cadastro de CPF/CNPJ já existente
                        </div>
                        <div id="box-cadastro">
                            <li>
                                <input class="li-cadastro-box" type="radio" value="Homem" name="genero" required>
                                <label>Homem</label>
                            
                                <input class="li-cadastro-box" type="radio" value="Mulher" name="genero" required>
                                <label>Mulher</label>
                            </li>
                        </div>
                        <li >
                            <button id="button-cadastro" type="">Cadastrar</button>
                        </li>
                        <li class="li-s-casdastro">
                            Já possui cadastro? <a href="./index.php"><strong>Logar!!</strong></a>
                        </li>
                    </ul>
                </form>
            </div>
        </center>
    </section>


    <!-- /cadastro -->

    <!-- rodape -->

    <footer>
        <a href="https://github.com/Otavio1661" class="rodape">
            <div>
                <p> &copy; otavio.silva - <?php echo date('Y'); ?></p>
            </div>
        </a>
    </footer>

    <!-- /rodape -->

    <script>
        $('.CLL').mask('(00) 0000-0000');
        $('.CPF').mask('000.000.000-00');
    </script>


</body>
</html>