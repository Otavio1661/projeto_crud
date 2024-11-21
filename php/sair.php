<?php
session_start();
unset($_SESSION['cpf_cnpj']);
unset($_SESSION['senha']);
header("Location: ../index.php");