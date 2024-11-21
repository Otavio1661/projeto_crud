<?php
session_start();

include('./php/config.php');

$sql = "SELECT c.usuario FROM cadastro c WHERE c.cpf_cnpj = '" . $_SESSION['cpf_cnpj'] . "'";
//echo '<pre>$sql<br />'; var_dump($sql); echo '</pre>';die;
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
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 JS (jQuery não é necessário) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./css/home1.css">


    <title>Home Gazin</title>
</head>

<body>

    <!-- menu -->

    <header id="menu">

        <div id="img_home">
            <img src="./img/logo-gazin.png" id="img-logo">
        </div>

        <div id="estou_aqui">
            <h1> >> HOME << </h1>
        </div>

        <div id="usuario_d_login">

            <img src="./img/login.svg" alt="">
            <h1> Perfil: <?php echo $user_data['usuario'] ?> </h1>

            <a class="dropdown-item " href="#" onclick="confirmLogout()">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </div>

    </header>

    <!-- /menu -->

    <!-- home -->

    <section>
        <div id="marge">
            <a href="./cadastrar_cliente.php">
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
            <a href="./dados_representante.php">
                <div class="img-home">
                    <img src="./img/dados-ps.png" alt="">
                    <p>Dados do Representante</p>
                </div>
            </a>
            <div class="img-home">
                <img src="./img/compras.png" alt="">
                <p>Vendas</p>
            </div>
            <a href="./produtos.php">
                <div class="img-home">
                    <img src="./img/produtos.png" alt="">
                    <p>Produtos</p>
                </div>
            </a>
            <a href="./suporte.php">
                <div class="img-home">
                    <img src="./img/suporte.png" alt="">
                    <p>Suporte</p>
                </div>
            </a>
        </div>
    </section>


    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirmação de Logout</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> Tem certeza que deseja sair? </div>
                <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button> <a href="./index.php" class="btn btn-danger">Sair</a> </div>
            </div>
        </div>
    </div>


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
    <script>
        function index() {
            window.location(index.php);
        }

        function sair() {
            swal("REALMENTE DESEJA SAIR?", "'Sim' para continuar, se não 'Cancelar' ", "");
        }

        function confirmLogout() {
            var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
            logoutModal.show();
        }

    </script>

    

</body>

</html>