<?php
/* Este código PHP estabelece uma conexão 
com um banco de dados MySQL utilizando a extensão PDO (PHP Data Objects), 
que fornece uma interface orientada a objetos 
para trabalhar com bancos de dados. */

$host = "localhost";
$dbname = "agenda";
$user = "root";
$pass = "";
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // ativar modo de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // parar o software e exibir o erro caso algum problema aconteça nas chamadas do banco
} catch(PDOException $e) {
    //erro na conexão
    $error = $e->getMessage();
    echo "Error: " . $error . "<br>";
}
?>