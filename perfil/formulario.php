<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "Solicitação via post! \o/";
    
}else if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(!empty($_GET['nome'])){
        foreach($_GET as $chave => $valor){
            echo "<p>$chave: $valor</p>";
        }
    }else{
        echo "Campo nome é obrigatório";
    }
} # CRIAR OBJETO PESSOA E ALIMENTAR COM INFORMAÇÕES VINDAS DO FORMULÁRIO

?>