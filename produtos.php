<?php
session_start();
include('./php/config.php');


//----------------------- Nome do representante --------------------------------------------------
$sql = "SELECT c.usuario FROM cadastro c WHERE c.cpf_cnpj = '" . $_SESSION['cpf_cnpj'] . "'";

$result = $connect->query($sql);
$user_data = mysqli_fetch_assoc($result);
// echo '<pre>$user_data<br />'; var_dump($user_data); echo '</pre>';

//------------------------------------------------------------------------------------------------
$sql = "SELECT * FROM tabela_cliente c WHERE c.representante = '" . $user_data['usuario'] . "'";

$res = $connect->query($sql);

if (isset($_POST["EXCLUIR"])) {
    
    $sql = "DELETE FROM tabela_cliente WHERE id = " . $_REQUEST['id'] ;

    $res = $connect->query($sql);

}

if (isset($_POST["UPDATE_formulario"])) {
    // echo 'aki 1'; exit; 

    

    switch ($_POST["UPDATE_formulario"]) {
        case 'cadastrar_cliente':
            $id = $_POST['id'];
            $cliente = $_POST["cliente"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            $uf = $_POST["uf"];
            $cidade = $_POST["cidade"];
            $bairro = $_POST["bairro"];
            $rua_av = $_POST["rua_av"];
            $nu = $_POST["nu"];


            
    //  echo 'aki 2';exit;
            $sql = "UPDATE tabela_cliente SET 
                    cliente = '$cliente' , 
                    email = '$email', 
                    telefone = '$telefone', 
                    uf = '$uf', 
                    cidade = '$cidade', 
                    bairro = '$bairro', 
                    rua_av = '$rua_av', 
                    nu = '$nu'
                            WHERE id = '{$id}'";
                    
        // case 'excluir' :
        //     $EXCLUIR = $_POST
    //   echo$sql;exit;


            $res = $connect->query($sql);
            // echo 'aki 2';exit;

            if ($res == true) {
    //  echo 'aki 2';exit;

                echo "<script>location.href= 'central_cliente.php'</script>;";
    //  1echo 'aki 2';exit;

            }
    }


    
}


if (isset($_POST["pesquisar"]) && ($pesquisa = $_POST["pesquisa"]) ) {
        // print_r($_POST); die;
        // var_dump($user_data['usuario']);
$sql = "SELECT *
    FROM tabela_cliente c 
    WHERE c.representante = '". $user_data['usuario'] . "'
        AND c.id LIKE '%$pesquisa%'
        OR c.cliente LIKE '%$pesquisa%'
        OR c.email LIKE '%$pesquisa%'
        OR c.telefone LIKE '%$pesquisa%'
        OR c.cpf_cnpj_cliente LIKE '%$pesquisa%'
        OR c.uf LIKE '%$pesquisa%'
        OR c.cidade LIKE '%$pesquisa%'
        OR c.bairro LIKE '%$pesquisa%'
        OR c.rua_av LIKE '%$pesquisa%'
        OR c.nu LIKE '%$pesquisa%'
        OR c.genero LIKE '%$pesquisa%'";

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
    <link rel="stylesheet" href="./css/central_cliente2.css">

    <title>Home Gazin</title>
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

        <div id="div_pesquisa"> 
        <form action="central_cliente.php" id="pesquisar" method="POST">
            <input type="hidden" name="pesquisa" value="pesuisa">
            <input type="text" placeholder="Pesquisar.." name="pesquisa"> <input id="botao" type="submit" name="pesquisar" value=""></input>
            </form>
        </div>

    </header>

    <!-- /menu -->


    <section>
                
        <table id="tabela">
            <tr id="titulo">
                <td>ID</td>
                <td>Produto</td>
                <td>Categoria</td>
                <td>Numero interno</td>
                <td>Val. d. custo</td>
                <td>Valor d. venda</td>
                <td>Und. estoque</td>
            </tr>



            <?php
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>";
            ?>

<form action="central_cliente.php" id="cadastrar_cliente" method="POST">
                        <input type="hidden" name="UPDATE_formulario" value="cadastrar_cliente"><br>

                        <td> <input> </td>
                        <td> <input> </td>
                        <td> <input> </td>
                        <td> <input> </td>
                        <td> <input> </td>
                        <td> <input> </td>
                        <td> <input> </td>
                        <td><button type="submit" id="salvar" name="submit">SALVAR</button></td> 

                        <input type="hidden" name="UPDATE_formulario" value="cadastrar_cliente">
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

    <script>
        $('.CLL').mask('(00) 0000-0000');
        $('.CPF').mask('000.000.000-00');
    </script>

</body>

</html>