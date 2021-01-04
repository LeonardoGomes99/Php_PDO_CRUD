<?php
//===========CONEXÃO==============//
try{
    $pdo = new PDO("mysql:dbname=basic_pdo_database;host=localhost",
    "root","");

    echo "Conectado";

}catch(PDOException $e){
    echo "Erro no banco de dados".$e->getMessage();
}catch(PDOException $e){
    echo "Erro Genérico: ".$e->getMessage();
}
//===========INSERT==============//
//TRUNCATE TABLE usuario ->Resetar o ID do Auto-Increment
$res = $pdo->prepare("INSERT INTO usuario(nome,email,senha)
VALUES(:n,:e,:s)");
$res->bindValue(":n", "Leo");
$res->bindValue(":e", "Leo@gmail.com");
$res->bindValue(":s", "Leo123");
$res->execute();
//==============DELETE=============//
$res = $pdo->prepare("DELETE FROM usuario WHERE id = :id");
$id = 2;
$res->bindValue(":id", $id);
$res->execute();
//==============UPDATE============//
$res = $pdo->prepare("UPDATE usuario SET email = :e WHERE id = :id");
$res-> bindValue(":e", "Leozera@gmail.com");
$res->bindValue(":id", 1);
$res->execute();
//----------------READ==============//
$res = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");
$res->bindValue(":id",4);
$res->execute();
$resultado = $res->fetch();
//$resultado = $res->fetchAll(); --> Quando For + de 1 valor

print_r($resultado);


?>