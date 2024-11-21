<?php
session_start();
include('./php/config.php');
    $dis = "none";
// Usar $_POST para acessar o parâmetro "formulario"
if (isset($_POST["formulario"])) {
// echo 'aki 1'; exit; 
    
    switch ($_POST["formulario"]) {
        case 'cadastrar-cliente':
            $representante = $_POST["representante"];
            $cliente = $_POST["cliente"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            $cpf_cnpj_cliente = $_POST["cpf_cnpj_cliente"];
            $uf = $_POST["uf"];
            $cidade = $_POST["cidade"];
            $bairro = $_POST["bairro"];
            $rua_av = $_POST["rua_av"];
            $nu = $_POST["nu"];
            $genero = $_POST["genero"];

            $_SESSION['cpf_cnpj_cliente'] = $cpf_cnpj_cliente;

            // echo 'aki 2';exit;
            $sql = "INSERT INTO tabela_cliente (representante, cliente, email, telefone, cpf_cnpj_cliente, uf, cidade, bairro, rua_av, nu, genero)
                    VALUES ('{$representante}', '{$cliente}', '{$email}', '{$telefone}', '{$cpf_cnpj_cliente}', '{$uf}', '{$cidade}', '{$bairro}', '{$rua_av}', '{$nu}', '{$genero}')";
            // print_r($sql);exit;
            $res = $connect->query($sql);

            if ($res == true) {
                echo "<script>location.href= 'home.php'</script>;";
            } if ($res == 0) {
                
                $dis = "block";

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
    <link rel="stylesheet" href="./css/cadastrar_cliente.css">

    <style>
    #erro_cadastro {
    color: red;
    font-size: 15px;
    margin-left: -2px;
    margin-top: -20px;
    margin-bottom: 10px;
    display: <?php echo $dis ?>;}
    </style>

    <title>Cadastro cliente</title>
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

        <div id="estou_aqui"> 
        <h1>>> Cadastro cliente <<</h1>
        </div>

    </header>

    <!-- /menu -->

    <!-- cadastro -->

    <section id="center-vertical"> 
        <center>
            <div id="center-vertical2">
                <form action="cadastrar_cliente.php" id="menu-cadastro" method="POST">
                            <input type="hidden" name="formulario" value="cadastrar-cliente">
                    <ul id="ul-cadastro">
                    <li >
                            <input class="li-cadastro" type="text" value="<?php echo $user_data['usuario'] ?>" name="representante"  placeholder="Nome representante - <?php echo $user_data['usuario'] ?>" required>
                        </li> 
                        <li >
                            <input class="li-cadastro" type="text" placeholder="Nome do clienter" name="cliente" required>
                        </li>                       
                        <li >                       
                            <input class="li-cadastro" type="email" placeholder="E-mail" name="email" required>
                        </li>                       
                        <li >
                            <input class="li-cadastro CLL" type="tel" maxlength="15" placeholder="(99) 9999-9999" name="telefone" required>
                        </li>
                        </li>
                        <li >
                            <input class="li-cadastro CPF" type="tel" placeholder="CPF/CNPJ" name="cpf_cnpj_cliente" required>
                        </li>
                        <div id="erro_cadastro"> 
                            CPF/CNPJ já cadastrado  
                        </div>
                        <li>
                            <div id="selecao_uf">
                                <p>Estado do cliente:</p>
                                <br>
                                    <select id="li-select" name="uf">
                                        <option>...</option>
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
                        <input class="li-cadastro-cidade" type="text" placeholder="Cidade" name="cidade" required>
                        
                        <input class="li-cadastro-bairro" type="text" placeholder="Bairro" name="bairro" required>
                        </li>
                        <li>
                        <input class="li-cadastro-rua" type="text" placeholder="Endereço do cliente" name="rua_av" required>

                        <input class="li-cadastro-nu" type="tel" placeholder="Nº" name="nu" required>
                        </li>
                        <div id="box-cadastro">
                            <li>
                                <input class="li-cadastro-box" type="radio" value="Homem" name="genero" required>
                                <label>Homem</label>
                            
                                <input class="li-cadastro-box" type="radio" value="Mulher" name="genero" required>
                                <label>Mulher</label>
                            </li>
                        </div>

                        <li >
                            <button id="button-cadastro" type="submit">Cadastrar</button>
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