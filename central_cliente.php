<?php 
session_start();

include('./php/config.php');

    $sql = "SELECT c.usuario FROM cadastro c WHERE c.cpf_cnpj = '" . $_SESSION['cpf_cnpj'] . "'";
    // echo '<pre>$sql<br />'; var_dump($sql); echo '</pre>';
    $res = $connect->query($sql);
    $user_data = mysqli_fetch_assoc($res);
    // TESTE 
    // echo '<pre>$user_data<br />'; var_dump($user_data['cliente']); echo '</pre>';
    $sql = "SELECT * FROM tabela_cliente c WHERE c.representante = '" . $user_data['usuario'] . "'";
    
    $res = $connect->query($sql);

// print_r($res); die;

    if (isset($_POST["UPDATE_formulario"])) {
        // echo 'aki 1'; exit; 

        


            switch ($_POST["UPDATE_formulario"]) {
                case 'cadastrar_cliente':
                    $id = $user_data['id'];
                    $cliente = $_POST["cliente"];
                    $email = $_POST["email"];
                    $telefone = $_POST["telefone"];
                    $uf = $_POST["uf"];
                    $cidade = $_POST["cidade"];
                    $bairro = $_POST["bairro"];
                    $rua_av = $_POST["rua_av"];
                    $nu = $_POST["nu"];
        
                    print_r($_POST); die;

                    // echo 'aki 2';exit;
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
        
                    // print_r($sql);exit;
                    $res = $connect->query($sql);
        
                    if ($res = true) {
                        echo "<script>location.href= 'central_cliente.php'</script>;";
                    }
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
    <script src="./estilo.js" type="text/javascript" defer></script>
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
                <img src="./img/login.svg" alt=""> <h1>Perfil: <?php echo $user_data['usuario'] ?> </h1>
                <h2><a href="./home1.php">Voltar</a></h2>
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
    </tr>

    <form action="central_cliente.php" id="cadastrar_cliente" method="POST"></form>    
    <input type="hidden" name="UPDATE_formulario" value="cadastrar_cliente">

        <?php
        if ($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                echo "<tr>";
                    ?>
                    <td> <input class="center" type="tel" value="<?php echo $row['id']; ?>"> </td>
                    <td> <input class="center" type="text" value="<?php echo $row['representante']; ?>" disabled> </td>
                    <td> <input class="center" type="text" value="<?php echo $row['cliente']; ?>"> </td>
                    <td> <input class="left" type="email" value="<?php echo $row['email']; ?>"> </td>
                    <td> <input class="left CLL" type="tel" value="<?php echo $row['telefone']; ?>"> </td>
                    <td> <input class="left CPF" type="tel" value="<?php echo $row['cpf_cnpj_cliente']; ?>" disabled> </td>
                    <td> <select class="center" id="li-select" name="uf">
                                        <option value="<?php echo $row['uf']; ?>"><?php echo $row['uf']; ?></option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espirito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select> </td>
                    <td> <input class="left" type="text" value="<?php echo $row['cidade']; ?>"> </td>
                    <td> <input class="left" type="text" value="<?php echo $row['bairro']; ?>"> </td>
                    <td> <input class="left" type="text" value="<?php echo $row['rua_av']; ?>"> </td>
                    <td> <input class="left" type="tel" value="<?php echo $row['nu']; ?>"> </td>
                    <td> <input class="center" type="text" value="<?php echo $row['genero']; ?>"> </td> 
                    <!-- <td> <input class="center excluir" type='checkbox' name="EXCLUIR"> </td> -->
                     
                    <div id="salvar">
                        <input type="submit" value="SALVAR">
                    </div>

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