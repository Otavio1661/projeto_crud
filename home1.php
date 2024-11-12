<?php 
session_start();

include('./php/config.php');

    $sql = "SELECT c.usuario FROM cadastro c WHERE c.cpf_cnpj = '" . $_SESSION['cpf_cnpj'] . "'";
    // echo '<pre>$sql<br />'; var_dump($sql); echo '</pre>';
    $result = $connect->query($sql);
    $user_data = mysqli_fetch_assoc($result);
    // TESTE 
    // echo '<pre>$user_data<br />'; var_dump($user_data['usuario']); echo '</pre>';

?>



<!DOCTYPE html>
<html lang="br-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./estilo.js" type="text/javascript" defer></script>
    <link rel="stylesheet" href="./css/home4.css">

    <title>Home Gazin</title>
</head>
<body>

    <!-- menu -->

    <header id="menu">
        <div id="img_home">
            <img src="./img/logo-gazin.png" id="img-logo">
        </div>
        
            <div id="usuario_d_login">
                <img src="./img/login.svg" alt=""> <h1>Perfil: <? echo $user_data['usuario'] ?> </h1>
            </div>

        <div>

            

        </div>
    </header>

    <!-- /menu -->

    <!-- home -->

    <section> 
        <div id="marge">    
            <a href="./dd_cliente.php">
                <div class="img-home">
                    <img src="./img/cadastro.png" alt="">
                    <p>Cadastro cliente</p>
                </div>
            </a>
            <a href="./central_cliente.php">
                <div class="img-home">
                    <img src="./img/clientes.png" alt="">
                    <p>Central do cliente</p>
                </div>
            </a>
            <div class="img-home">
                <img src="./img/dados-ps.png" alt="">
                <p>Dados do Representante</p>
            </div>
            <div class="img-home">
                <img src="./img/compras.png" alt="">
                <p>Vendas</p>
            </div>
            <div class="img-home">
                <img src="./img/produtos.png" alt="">
                <p>Produtos do Representante</p>
            </div>
            <div class="img-home">
                <img src="./img/suporte.png" alt="">
                <p>Suporte</p>
            </div>
        </div>
    </section>


    <!-- /home -->

    <!-- rodape -->

    <footer>
        <a href="https://github.com/Otavio1661" class="rodape">
            <div>
                <p> &copy; otavio.silva - <?php echo date('Y'); ?></p>
            </div>
        </a>
    </footer>

    <!-- /rodape -->

</body>
</html>