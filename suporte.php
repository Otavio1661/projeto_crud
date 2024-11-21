<?php
session_start();
include('./php/config.php');

// Usar $_POST para acessar o parâmetro "formulario"
if (isset($_POST["formulario"])) {
// echo 'aki 1'; exit; 
    
    switch ($_POST["formulario"]) {
        case 'enviar':
            $representante = $_POST["representante"];
            $cliente = $_POST["cliente"];
            $cpf_cnpj_cliente = $_POST["cpf_cnpj_cliente"];
            $problema = $_POST["problema"];
            // $area = $_POST["area"];

            $_SESSION['cpf_cnpj_cliente'] = $cpf_cnpj_cliente;

            // echo 'aki 2';exit;
            $sql = "INSERT INTO suporte (representante, cliente, cpf_cnpj_cliente, problema, area)
                    VALUES ('{$representante}', '{$cliente}','{$cpf_cnpj_cliente}','{$problema}','{$area}')";
            // print_r($sql);exit;
            $res = $connect->query($sql);

            if ($res == true) {
                echo "<script>location.href= 'home.php'</script>;";
                echo "<script>alert ('Envio efetivado')</script>;";
            } if ($res == 0) {
                
                echo "<script>location.href= 'suporte.php'</script>;";
                echo "<script>alert ('Erro ao enviar, verificar os dados')</script>;";
            
            }

            break;
        default:
            // Caso o formulário não seja o esperado
            echo "<script>alert('Formulário não encontrado');</script>";
    }
}


$sql = "SELECT c.usuario FROM cadastro c WHERE c.cpf_cnpj = '" . $_SESSION['cpf_cnpj'] . "'";
    // echo '<pre>$sql<br />'; var_dump($sql); echo '</pre>';
    $result = $connect->query($sql);
    $user_data = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="br-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="./estilo.js" type="text/javascript" defer></script>
    <link rel="stylesheet" href="./css/suporte.css">

    <title>Suporte</title>
</head>
<body>

    <!-- menu -->

    <header id="menu">
        <div id="img_home">
            <img src="./img/logo-gazin.png" id="img-logo">
        </div>
        <div id="estou_aqui">
            <h1> >> Suporte << </h1>
        </div>
        <div id="usuario_d_login">
            <img src="./img/login.svg" alt="">
            <h1>Perfil: <?php echo $user_data['usuario'] ?> </h1>
            <h2><a href="./home.php">Voltar</a></h2>
        </div>


    </header>

    <!-- /menu -->

    <!-- cadastro -->

    <section id="center-vertical"> 
        <center>
            <div id="center-vertical2">
                <form action="suporte.php" id="menu-enviar" method="POST">
                            <input type="hidden" name="formulario" value="enviar">
                    <ul id="ul-enviar">
                    <li >
                            <input class="li-enviar2" type="text" value="<?php echo $user_data['usuario'] ?>" name="representante"  placeholder="Nome representante - <?php echo $user_data['usuario'] ?>" required>
                        </li> 
                        <li >
                            <input class="li-enviar2" type="text" placeholder="Nome do clienter" name="cliente" required>
                        </li>     
                    </ul>
                    <ul id="ul-enviar2">                  
                        <li >
                            <input class="li-enviar_cpf CPF" type="tel" placeholder="CPF/CNPJ - cliente" name="cpf_cnpj_cliente" required>
                        </li>
                        <li >
                            <textarea  class="li-enviar_texto" type="text" name="problema" required>Texto..</textarea>
                        </li>

                        <li id="box-enviar" required>
                                <input class="li-enviar-box" type="radio" name="area" value="eletro" required>
                                <label>Eletro</label>
                            
                                <input class="li-enviar-box" type="radio" name="area" value="industria" required>
                                <label>Industria</label>
                        </li>

                        <li >
                            <button id="button-enviar" type="submit">Enviar</button>
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