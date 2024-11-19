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

<!-- <script>

const inputBusca = document.getElementById('input-busca');
const tabelaFuncionarios = document.getElementById('tabela');

inputBusca.addEventListener('keyup', () => {
    let expressao = inputBusca.value;

    let linhas = tabelaFuncionarios.getElementsByTagName('tr');

    console.log(linhas)
    for (let posicao in linhas){
        if (true === isNaN(posicao)) {
            continue;
        }

        let conteudoDalinha = linhas[posicao].innerHTML;

        if (true === conteudoDalinha.includes(expressao)) {
            linhas[posicao].style.display = '';
        } else {
            linhas[posicao].style.display = 'none';
        }
    }
});

</script> -->



<!DOCTYPE html>
<html lang="br-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="./css/central_cliente1.css">

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
                <td>ID cliente</td>
                <td class="w105">Representante</td>
                <td class="w105">Nome do cliente</td>
                <td class="w150">E-mail</td>
                <td class="w105">Telefone</td>
                <td class="w105">CPF/CNPJ</td>
                <td class="w80">Estado do cliente</td>
                <td>Cidade</td>
                <td>Bairro</td>
                <td>Endereço do cliente</td>
                <td>Nº</td>
                <td>Genero</td>
                <td class="w80">EXCLUIR</td>
                <td class="w80">SALVAR</td>
            </tr>



            <?php
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>";
            ?>

<form action="central_cliente.php" id="cadastrar_cliente" method="POST">
                        <input type="hidden" name="UPDATE_formulario" value="cadastrar_cliente"><br>

                        <td> <input class="center" type="tel" value="<?php echo $row['id']; ?>" name="id"> </td>
                        <td> <input class="center" type="text" value="<?php echo $row['representante']; ?>" disabled> </td>
                        <td> <input class="center" type="text" value="<?php echo $row['cliente']; ?>" name="cliente"> </td>
                        <td> <input class="left" type="email" value="<?php echo $row['email']; ?>" name="email"> </td>
                        <td> <input class="left CLL" type="tel" value="<?php echo $row['telefone']; ?>" name="telefone"> </td>
                        <td> <input class="left CPF" type="tel" value="<?php echo $row['cpf_cnpj_cliente']; ?>" disabled> </td>
                        <td> <select class="center" id="li-select" name="uf">
                                <option value="<?php echo $row['uf']; ?>"><?php echo $row['uf']; ?></option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MS">MS</option>
                                <option value="MT">MT</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select> </td>
                        <td> <input class="left" type="text" value="<?php echo $row['cidade']; ?>" name="cidade"> </td>
                        <td> <input class="left" type="text" value="<?php echo $row['bairro']; ?>" name="bairro"> </td>
                        <td> <input class="left" type="text" value="<?php echo $row['rua_av']; ?>" name="rua_av"> </td>
                        <td> <input class="left" type="tel" value="<?php echo $row['nu']; ?>" name="nu"> </td>
                        <td> <input class="center" type="text" value="<?php echo $row['genero']; ?>"> </td>
                        <td> <input class="center excluir" type='checkbox' name="EXCLUIR"> </td> 
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