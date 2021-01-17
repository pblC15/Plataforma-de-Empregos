<?php 

function reduzindoTexto($texto){
    
    $qtd = strlen($texto);

    if($qtd > 200){
        
        $reduzido = substr($texto, 0, 200);

        return $reduzido;

    }else {

        return $texto;
    }

}

?>

