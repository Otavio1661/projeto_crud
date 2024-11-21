<?php 

    session_start();


    if (isset($_POST['submit']) && !empty($_POST['cpf_cnpj']) && !empty($_POST['senha']))
    {
        
        include_once('./php/config.php');
        $cpf_cnpj = $_POST['cpf_cnpj'];
        $senha = $_POST['senha'];


        $sql = "SELECT * FROM cadastro WHERE cpf_cnpj = '$cpf_cnpj' and senha = '$senha'";

        $result = $connect->query($sql);

        if (mysqli_num_rows($result) == 1)
        {
            $_SESSION['cpf_cnpj'] = $cpf_cnpj;
            header('Location: home.php');
        }
        if (mysqli_num_rows($result) == 0)
        {
            $erro_login = true; 
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
    <link rel="stylesheet" href="./css/index.css">

    <title>Logn Gazin</title>
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

    <!-- login -->

    <section id="center-vertical"> 
        <center>
            <div id="center-vertical2">
                <form id="menu-login" method="POST">
                    <ul id="ul-login">
                        <li >
                            <input class="li-login CPF" type="tel" placeholder="CPF/CNPJ" name="cpf_cnpj" required>
                        </li>
                        <li >
                            <input class="li-login" type="password" placeholder="Senha" name="senha" required>
                        </li>
                        <div id="erro-login">
                            Erro, E-mail ou Senha, incoreto(s)
                        </div>
                        <li >
                            <button id="button-login" type="submit" name="submit">Logar</button>
                        </li>
                        <li class="li-n-cadastro">
                            Não tem cadastro ainda? <a href="./cadastrar.php"><strong>Cadastrar!!</strong></a>
                        </li>
                    </ul>
                </form>
            </div>
        </center>
    </section>


    <!-- /login -->

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
        $('.CPF').mask('000.000.000-00');
    </script>

    <!-- Script JS para exibir erro de login -->
    <?php if (isset($erro_login) && $erro_login): ?>
        <script>
            // Exibe o erro de login
            var erro = document.getElementById('erro-login');
            erro.style.display = 'block';
        </script>
    <?php endif; ?>

</body>
</html>