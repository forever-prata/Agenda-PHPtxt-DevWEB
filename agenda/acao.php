<?php

echo "Dados enviados:<br>";
echo"<pre>";
var_dump($_GET);
echo"</pre>";

$data = DateTime::createFromFormat('Y-m-d', $_GET['nascimento']);
$datastatus = FALSE;
if($data && $data->format('Y-m-d') === $_GET['nascimento']){
    $datastatus = TRUE;
}

if (empty($_GET["nome"])) {
    echo "Nome inválido";
}elseif (empty($_GET["email"])) {
    echo "Email inválido";
}elseif ($_GET["idade"] < 0 or $_GET["idade"] > 120 or ! is_numeric($_GET["idade"])) {
    echo "Idade inválida";
}elseif ($datastatus == FALSE) {
    echo "Data inválida";
}elseif ($_GET["parente"]!= "1" and $_GET["parente"]!= "2") {
    echo "Parentesco inválido";
}elseif ($_GET["local"]!= "1" and $_GET["local"]!= "2"and $_GET["local"]!= "3") {
    echo "Local inválido";
}else{

    $nome =$_GET["nome"];
    $email =$_GET["email"];
    $idade =$_GET["idade"];
    $data =$_GET["nascimento"]; 
    $parente =$_GET["parente"];
    $local =$_GET["local"];

    $ess ="{ Nome: ".$nome." , Email: ".$email." , Idade: ".$idade." , Data: ".$data." , Parente: ".$parente." , Local: ".$local." }\n";

    $abre =@fopen("banco.txt","a+");
    $escreve =fwrite($abre, $ess);

}

?>