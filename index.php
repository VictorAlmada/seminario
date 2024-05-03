<!-- adicionando o cabeçalho (header.php) -->
<?php
include_once("templates/header.php");

?>
<!-- CORPO  -->

<div class="container">
    <!-- mensagem de sessão -->
    <?php if(isset($printMsg) && $printMsg != "") { ?>
        <p id="msg"><?= $printMsg ?></p>
    <?php } ?>
    <!-- titulo -->
    <h1 id="main-title">Minha Agenda</h1>
    <!-- verificando se há contatos na agenda -->
    <?php if(count($contacts) > 0) { ?>
        <!-- caso haja contatos -->
        <!-- crio a tabela -->
        <table class="table" id="contacts-table">
            <!--  dentro da tabela crio um cabeçalho -->
            <thead>
                <tr>
                    <!-- itens do cabeçalho -->
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <!-- após o cabeçalho crio o corpo (ou seja os dados que vão vir do banco)-->
            <tbody>
                <?php foreach($contacts as $contact) { ?>
                    <tr>
                        <!-- apresento os dados id, nome e phone -->
                        <td scope="row"><?= $contact["id"] ?></td>
                        <td scope="row"><?= $contact["name"] ?></td>
                        <td scope="row"><?= $contact["phone"] ?></td>
                        <!-- após os dados coloco os icones de visualizar, editar e remover -->
                        <td class="actions">
                            <a href="#"><i class="fas fa-eye check-icon"></i></a>
                            <a href="#"><i class="far fa-edit edit-icon"></i></a>
                            <button type="submit"><i class="fas fa-times delete-icon"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php }  else { ?>
        <!-- caso não haja contatos na agenda -->
        <p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="create.php">clique aqui para adicionar</a>.</p>
    <?php } ?>
</div>



<!-- adicionando o rodapé (footer.php) -->
<?php
include_once("templates/footer.php");

?>