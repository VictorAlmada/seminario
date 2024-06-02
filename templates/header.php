<?php
    //incluir nesse arquivo os arquivos....
    include_once("config/connection.php");
    include_once("config/process.php");

    //limpa mensagens de notificação
    if(isset($_SESSION['msg'])) {
        $printMsg = $_SESSION['msg'];
        $_SESSION['msg'] = '';
    }
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- a tag 'header' é usada para organizar e estruturar o conteúdo de uma página web, 
        ajudando os navegadores e os motores de busca 
        a entenderem a hierarquia e o propósito do conteúdo. -->
    <header>
        <nav class="navbar navbnar-expand-lg navbar-dark bg-primary">
        <!-- imagem do logo -->
        <a class="navbar-brand" href="index.php">
            <img src="img/logo2.svg" alt="Agenda">
        </a>
        <!-- os outros links que compõem o cabeçalho -->
        <div>
            <div class="navbar-nav">
                <a class="nav-link active" id="home-link" href="index.php">Agenda</a>
                <a class="nav-link active" href="create.php">Adicionar Contato</a>
            </div>
        </div>
        </nav>
    </header>