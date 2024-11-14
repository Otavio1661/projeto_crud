<?php
session_start();
include('./php/config.php');


$sql = "SELECT * FROM cadastro c WHERE c.cpf_cnpj = '" . $_SESSION['cpf_cnpj'] . "'";

    $result = $connect->query($sql);
    $user_data = mysqli_fetch_assoc($result);

if (isset($_POST["UPDATE_formulario"])) {
// echo 'aki 1'; exit; 
    switch ($_POST["UPDATE_formulario"]) {
        case 'cadastrar':
            $id = $user_data['id'];
            $usuario = $_POST["usuario"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            $uf = $_POST["uf"];
            $cidade = $_POST["cidade"];
            $bairro = $_POST["bairro"];
            $rua_av = $_POST["rua_av"];
            $nu = $_POST["nu"];

            // echo 'aki 2';exit;
            $sql = "UPDATE cadastro SET 
            usuario = '$usuario' , 
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
                echo "<script>location.href= 'home1.php'</script>;";
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
    <link rel="stylesheet" href="./css/dados_representante2.css">


    <title>Cadastro cliente</title>
</head>
<body>

    <!-- menu -->

    <header id="menu">
        <div id="img_home">
            <img src="./img/logo-gazin.png" id="img-logo">
        </div>
        
            <div id="usuario_d_login">
                <h1><a href="./home1.php">Voltar</a></h1>
            </div>

        <div>

            

        </div>
    </header>

    <!-- /menu -->

    <!-- cadastro -->

    <section id="center-vertical"> 
        <center>
            <div id="center-vertical2">
                <form action="dados_representante.php" id="menu-cadastro" method="POST">
                            <input type="hidden" name="UPDATE_formulario" value="cadastrar">
                    <ul id="ul-cadastro">
                    <li >
                            <input class="li-cadastro" type="text" value="<?php echo $user_data['usuario'] ?>" name="usuario" placeholder="Nome representante" required>
                        </li>                     
                        <li >                       
                            <input class="li-cadastro" type="email" value="<?php echo $user_data['email'] ?>" placeholder="E-mail" name="email" required>
                        </li>  
                        <li >                       
                            <input class="li-cadastro" type="text" value=" Senha: - solicitar no suporte - " placeholder="E-mail" disabled required>
                        </li>                      
                        <li >
                            <input class="li-cadastro CLL" type="tel" value="<?php echo $user_data['telefone'] ?>" maxlength="15" placeholder="(99) 9999-9999" name="telefone" required>
                        </li>
                        </li>
                        <li >
                            <input class="li-cadastro" type="tel" value="CFF/CNPJ - <?php echo $user_data['cpf_cnpj'] ?> - solicitar no suporte" placeholder="CPF/CNPJ" disabled required>
                        </li>
                        <li>
                            <div id="selecao_uf">
                                <p>Estado do cliente:</p>
                                <br>
                                    <select id="li-select" name="uf">
                                        <option>Estado: <?php echo $user_data['uf'] ?></option>
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
                                    </select>
                            </div>
                        </li>
                        <li>
                        <input class="li-cadastro-cidade" type="text" placeholder="Cidade: <?php echo $user_data['cidade'] ?>" name="cidade" required>
                        
                        <input class="li-cadastro-bairro" type="text" placeholder="Bairro: <?php echo $user_data['bairro'] ?>" name="bairro" required>
                        </li>
                        <li>
                        <input class="li-cadastro-rua" type="text" placeholder="Rua/Av: <?php echo $user_data['rua_av'] ?>" name="rua_av" required>

                        <input class="li-cadastro-nu" type="tel" placeholder="Nº:<?php echo $user_data['nu'] ?>" name="nu" required>
                        </li>
                        <li >
                            <button id="button-cadastro" type="submit">Salvar</button>
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