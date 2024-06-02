<?php

session_start();

include_once("connection.php");

$data = $_POST;

if(!empty($data)) {
       //MODIFICAÇÔES NO BANCO
       print_r($data);
       //criar contato
       if ($data["type"] === "create") {
              /* se o tipo do POST for create, ele entrará nesse if (query de criação de novo contato no banco de dados)*/
              $name = $data["name"];
              $phone = $data["phone"];
              $observations = $data["observations"];
              $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";
              $stmt = $conn->prepare($query);
              $stmt->bindParam(":name", $name);
              $stmt->bindParam(":phone", $phone);
              $stmt->bindParam(":observations", $observations);

              try {
                     $stmt->execute();
                     $_SESSION["msg"] = "Contato criado com sucesso!";
                 } catch(PDOException $e) {
                     //erro na conexão
                     $error = $e->getMessage();
                     echo "Error: " . $error . "<br>";
                 }
              //APÓS A CRIAÇÃO DO CONTATO... REDIRECT HOME
              header("Location:../index.php");
       } else if ($data["type"] === "edit"){
            //edição de contato (caso a type do POST seja 'edit')
            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];
            $id = $data["id"];

            $query = "UPDATE contacts SET name = :name, phone = :phone, observations = :observations 
            WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":id", $id);
            
            try {
              $stmt->execute();
              $_SESSION["msg"] = "Contato atualizado com sucesso!";
          } catch(PDOException $e) {
              //erro na conexão
              $error = $e->getMessage();
              echo "Error: " . $error . "<br>";
          }
          //APÓS A EDIÇÃO DO CONTATO... REDIRECT HOME
          header("Location:../index.php");
       } else if ($data["type"] === "delete") {
              $id = $data["id"];
              $query = "DELETE FROM contacts WHERE id = :id";
              $stmt = $conn->prepare($query);
              $stmt->bindParam(":id", $id);
              try {
                     $stmt->execute();
                     $_SESSION["msg"] = "Contato removido com sucesso!";
                 } catch(PDOException $e) {
                     //erro na conexão
                     $error = $e->getMessage();
                     echo "Error: " . $error . "<br>";
                 }
              //APÓS A EDIÇÃO DO CONTATO... REDIRECT HOME
              header("Location:../index.php");
       }
} else {
       //SELEÇÂO DE DADOS
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
       }

       //FECHAR CONEXÃO
       $conn = null;






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