<?php
session_start();
include('./php/config.php');


//----------------------- Nome do representante --------------------------------------------------
$sql = "SELECT c.usuario FROM cadastro c WHERE c.cpf_cnpj = '" . $_SESSION['cpf_cnpj'] . "'";

$result = $connect->query($sql);
$user_data = mysqli_fetch_assoc($result);
// echo '<pre>$user_data<br />'; var_dump($user_data); echo '</pre>';

//------------------------------------------------------------------------------------------------
$sql = "SELECT * FROM produtos c ";

$res = $connect->query($sql);


if (isset($_POST["EXCLUIR"])) {
    
    $sql = "DELETE FROM produtos WHERE produto = '" . $_POST['produto']. "'" ;
    $del = $connect->query($sql);

    echo "<script>location.href= 'produtos.php'</script>;";
  
}


if (isset($_POST["UPDATE_formulario"])) {
 
    switch ($_POST["UPDATE_formulario"]) {
        case 'cadastrar-produto':
            $produto = $_POST["produto"];
            $categoria = $_POST["categoria"];
            $n_interno = $_POST["n_interno"];
            $val_d_custo = $_POST["val_d_custo"];
            $val_d_venda = $_POST["val_d_venda"];
            $und_estoque = $_POST["und_estoque"];


            $sql = "UPDATE produtos SET
                    categoria = '$categoria', 
                    n_interno = '$n_interno', 
                    val_d_custo = '$val_d_custo', 
                    val_d_venda = '$val_d_venda', 
                    und_estoque = '$und_estoque' 
                            WHERE produto = '$produto'";
                    
            $res = $connect->query($sql);

            if ($res == true) {

                echo "<script>location.href= 'produtos.php'</script>;";

            }
    }

}


if (isset($_POST["pesquisar"]) && ($pesquisa = $_POST["pesquisa"]) ) {
        
// print_r($_POST); die;

$sql = "SELECT *
    FROM produtos c
    WHERE 
        c.id LIKE '%$pesquisa%' 
        OR c.produto LIKE '%$pesquisa%' 
        OR c.categoria LIKE '%$pesquisa%' 
        OR c.n_interno LIKE '%$pesquisa%' 
        OR c.val_d_custo LIKE '%$pesquisa%' 
        OR c.val_d_venda LIKE '%$pesquisa%'
        OR c.und_estoque LIKE '%$pesquisa%'";

        
$res = $connect->query($sql);
 
$return_data = mysqli_fetch_assoc($res);
// print_r($return_data);
$res = $connect->query($sql);
}


?>

<!DOCTYPE html>
<html lang="br-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="./css/produtos.css">

    <title>Produtos</title>
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
            <h2><a href="./home.php">Voltar</a></h2>
        </div>

        <div id="div_pesquisa"> 
            <h1>Produtos</h1>
        <form action="produtos.php" id="pesquisar" method="POST">
            <input type="hidden" name="pesquisa" value="pesquisa">
            <input type="text" placeholder="Pesquisar.." name="pesquisa"> <input id="botao" type="submit" name="pesquisar" value=""></input>
            </form>
        </div>

    </header>

    <!-- /menu -->


    <section>

        <div id="add"> 
            <a href="add_produto.php"><button>Adicionar</button></a>
        </div>
                
        <table id="tabela">
            <tr id="titulo">
                <td>ID</td>
                <td>Produto</td>
                <td>Categoria</td>
                <td>Numero interno</td>
                <td>Val. d. custo</td>
                <td>Valor d. venda</td>
                <td>Und. estoque</td>
                <td class="W80">EXCLUIR</td>
                <td class="W80">SALVAR</td>
            </tr>



            <?php
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>";
            ?>

<form action="produtos.php" id="cadastrar-produto" method="POST">
            <input type="hidden" name="UPDATE_formulario" value="cadastrar-produto"><br>

                        <td> <input value="<?php echo $row['id']; ?>" id="id" name="id" disabled> </td>
                        <td> <input value="<?php echo $row['produto']; ?>" type="text" name="produto" required> </td>
                        <td> <select name="categoria"><br>
                            <option ><?php echo $row['categoria']; ?></option>
                            <option value="eletro" required>Eletro</option>
                            <option value="industria" required>Indústria</option>
                        </select> </td>
                        <td> <input value="<?php echo $row['n_interno']; ?>" type="tel" name="n_interno" required><br> </td>
                        <td> <input value="<?php echo $row['val_d_custo']; ?>" type="tel" name="val_d_custo" required><br> </td>
                        <td>  <input value="<?php echo $row['val_d_venda']; ?>" type="tel" name="val_d_venda" required><br> </td>
                        <td>  <input value="<?php echo $row['und_estoque']; ?>" id="u_e_e" type="number" name="und_estoque" required><br> </td>
                        <td> <input class="excluir" type='checkbox' name="EXCLUIR"> </td> 
                        <td><button type="submit" id="salvar" name="submit">SALVAR</button></td> 

                        <input type="hidden" name="UPDATE_formulario" value="cadastrar-produto">
</form>

                    <?php
                        echo "</tr>";
                    }
                } 
                    ?>

        </table>
    </section>


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