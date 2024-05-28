<?php

session_start();

include_once("connection.php");

$id;
if(!empty($_GET)) {
       $id = $_GET["id"];
}
//retorna o dado de um contato
if (!empty($id)) {
       $query = "SELECT * FROM contacts WHERE id = :id";
       $stmt = $conn->prepare($query);
       $stmt->bindParam(":id", $id);
       $stmt->execute();
       $contact = $stmt->fetch();

} else {
       $contacts = [];

       //retorna todos os contatos
       $query = "SELECT * FROM contacts";

       $stmt = $conn->prepare($query);
       $stmt->execute();
       $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}





/*
Prepara e executa uma consulta SQL para selecionar todos os registros da tabela "contacts" no banco de dados;

 - $query: Contém a string SQL que representa a consulta a ser executada.
 - $stmt: É o objeto de declaração (statement) preparado pelo PDO para executar a consulta. 
        Ele é preparado utilizando o método prepare() do objeto de conexão $conn.
 - $stmt->execute();: Executa a consulta preparada.
 - $contacts = $stmt->fetchAll();: Obtém todas as linhas resultantes da 
        consulta e as armazena na variável $contacts como um array. 
        Cada elemento do array representa uma 
        linha da tabela "contacts" do banco de dados.

Após essas operações, a variável $contacts 
conterá todos os registros da tabela "contacts", 
prontos para serem utilizados no restante do código PHP.
*/