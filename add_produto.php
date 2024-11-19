<?php
session_start();
include('./php/config.php');

$dis = "none";

$sql = "SELECT c.usuario FROM cadastro c WHERE c.cpf_cnpj = '" . $_SESSION['cpf_cnpj'] . "'";
//echo '<pre>$sql<br />'; var_dump($sql); echo '</pre>';die;
$result = $connect->query($sql);
$user_data = mysqli_fetch_assoc($result);


if (isset($_POST["formulario_produto"])) {
        
        switch ($_POST["formulario_produto"]) {
            case 'cadastrar-produto':
                $produto = $_POST["produto"];
                $categoria = $_POST["categoria"];
                $n_interno = $_POST["n_interno"];
                $val_d_custo = $_POST["val_d_custo"];
                $val_d_venda = $_POST["val_d_venda"];
                $und_estoque = $_POST["und_estoque"];

                
                $sql = "INSERT INTO produtos (produto, categoria, n_interno, val_d_custo, val_d_venda, und_estoque)
                        VALUES ('{$produto}', '{$categoria}', '{$n_interno}', '{$val_d_custo}', '{$val_d_venda}', '{$und_estoque}')";

                $res = $connect->query($sql);

                if ($res == true) {
                    echo "<script>location.href= 'produtos.php'</script>;";
                } if ($res == 0) {
                
                    $dis = "block";
    
                }
        }
}
?>



<!DOCTYPE html>
<html lang="br-pt">

<head>

    <style>#erro_cadastro {
    color: red;
    font-size: 15px;
    margin-left: -2px;
    margin-top: -10px;
    margin-bottom: 10px;
    display: <?php echo $dis ?>;
    }</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/add_produto1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>ADD Produstos</title>
</head>

<body>

    <!-- menu -->

    <header id="menu">
    <div id="img_home">
            <img src="./img/logo-gazin.png" id="img-logo">
        </div>

        <div id="usuario_d_login">
            <img src="./img/login.svg" alt="">
            <h1>Perfil: <?php echo $user_data['usuario'] ?> </h1>
            <h2><a href="./home1.php">Voltar</a></h2>
        </div>

    </header>

    <!-- /menu -->

    <!-- add_produto -->

    <section>

            <center>
                <div id="add_produto">
                    <form action="add_produto.php" id="cadastrar_produto" method="POST">
                        <input type="hidden" name="formulario_produto" value="cadastrar-produto"><br>
                        <label for="">Produto</label>
                        <input type="text" name="produto" required><br>

                        <div id="erro_cadastro"> 
                            Produto já cadastrado!
                        </div>

                        <label for="">Categoria: </label>
                        <select name="categoria"><br>
                            <option >Selecionar</option>
                            <option value="eletro" required>Eletro</option>
                            <option value="industria" required>Indústria</option>
                        </select> <br>

                        <label for="">Numero interno</label>
                        <input type="tel" name="n_interno" required><br>

                        <label for="">Valor de custo</label>
                        <input type="tel" name="val_d_custo" required><br>

                        <label for="">Valor de venda</label>
                        <input type="tel" name="val_d_venda" required><br>

                        <label for="">Undade em estoque</label>
                        <input id="u_e_e" type="number" name="und_estoque" required><br>

                        <button type="submit">SALVAR</button>
                    </form>
                </div>
            </center>

    </section>


    <!-- /add_produto -->

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