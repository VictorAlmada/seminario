<!-- adicionando o cabeçalho (header.php) -->
<?php
include_once("templates/header.php");

?>
<!-- CORPO  -->

<div class="container">
    <?php include_once("templates/backbtn.html") ?>
    <h1 id="main-title">Criar Contato</h1>
    <form id="create-form" action="config/process.php" method="POST">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name">Nome do Contato:</label>
            <!-- bootstrap  -->
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone do Contato:</label>
            <!-- bootstrap  -->
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone" required>
        </div>
        <div class="form-group">
            <label for="observations">Observações:</label>
            <!-- bootstrap  -->
            <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Digite as observações" rows="3"></textarea>
        </div>
        <!-- bootstrap  -->
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<!-- adicionando o rodapé (footer.php) -->
<?php
include_once("templates/footer.php");

?>