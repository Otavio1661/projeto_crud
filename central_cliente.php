<?php 
session_start();

include('./php/config.php');

    $sql = "SELECT c.usuario FROM cadastro c WHERE c.cpf_cnpj = '" . $_SESSION['cpf_cnpj'] . "'";
    // echo '<pre>$sql<br />'; var_dump($sql); echo '</pre>';
    $result = $connect->query($sql);
    $user_data = mysqli_fetch_assoc($result);
    // TESTE 
    // echo '<pre>$user_data<br />'; var_dump($user_data['cliente']); echo '</pre>';
    $sql = "SELECT * FROM tabela_cliente c WHERE c.representante = '" . $user_data['usuario'] . "'";

    $result = $connect->query($sql);
    
    if (isset($_POST['submit']) == true) {
        header('Location: home1.php');
    }

?>



<!DOCTYPE html>
<html lang="br-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./estilo.js" type="text/javascript" defer></script>
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
                <img src="./img/login.svg" alt=""> <h1>Perfil: <? echo $user_data['usuario'] ?> </h1>
                <h2><a href="./home1.php">Voltar</a></h2>
            </div>

       
    </header>

    <!-- /menu -->


    <section> 
        
    <table id="tabela">
    <tr>
        <td>ID cliente</td>
        <td>Representante</td>
        <td>Nome do clienter</td>
        <td>E-mail</td>
        <td>Telefone</td>
        <td>CPF/CNPJ</td>
        <td>Estado do cliente</td>
        <td>Cidade</td>
        <td>Bairro</td>
        <td>Endereço do cliente</td>
        <td>Nº</td>
        <td>Genero</td>
        <td>Ação</td>
    </tr>
        <?
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['representante'] . "</td>";
                    echo "<td>" . $row['cliente'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['telefone'] . "</td>";
                    echo "<td>" . $row['cpf_cnpj_cliente'] . "</td>";
                    echo "<td>" . $row['uf'] . "</td>";
                    echo "<td>" . $row['cidade'] . "</td>";
                    echo "<td>" . $row['bairro'] . "</td>";
                    echo "<td>" . $row['rua_av'] . "</td>";
                    echo "<td>" . $row['nu'] . "</td>";
                    echo "<td>" . $row['genero'] . "</td>";
                    echo `<td> <input type="submit"> </td>`;
                    
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