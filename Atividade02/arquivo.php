<?php 

if(isset($_POST['acao'])){
    $tipos_permitidos_img =['jpg','jpeg','png','bmp','pdf'];
    $tipos_permitidos_pdf =['pdf'];
    $extensao_img = pathinfo($_FILES['arquivo_img']['name'], PATHINFO_EXTENSION);
    $extensao_pdf = pathinfo($_FILES['arquivo_pdf']['name'], PATHINFO_EXTENSION);
    //array img.
    if(in_array($extensao_img,$tipos_permitidos_img)){
        $pasta = "conteudo/";
        $temporario_img = $_FILES['arquivo_img']['tmp_name'];
        
        $novo_nome = uniqid().".$extensao_img";
        
        
        
        
        //upload do arquivo img.
        if(move_uploaded_file($temporario_img, $pasta.$novo_nome)){
            echo "<p>Upload enviado!</p>";
            echo "<img src ='./conteudo/$novo_nome.'";
            echo '<br>';
        }else{
            echo "<p>Erro!</p>";
        }//fim do upload img.
        
    }else{
        echo "<p>Este tipo de arquivo não pode ser enviado!</p>";
    }//fim do array img.
    
     //inicio do array pdf.
    if(in_array($extensao_pdf, $tipos_permitidos_pdf)){
        $temporario_pdf = $_FILES['arquivo_pdf']['tmp_name'];
        $pasta = "conteudo/";   
        
        $novo_nome_pdf = uniqid().".$extensao_pdf";
        //upload de arquivo pdf.
        if(move_uploaded_file($temporario_pdf, $pasta.$novo_nome_pdf)){
            echo "<p>Upload enviado!</p>";
            echo "<a href='./conteudo/$novo_nome_pdf'>Seu PDF</a>";
        }else{
            echo "<p>Erro!</p>";
        }//fim do upload PDF.
    }else{
        echo "<p>Este tipo de arquivo não pode ser enviado!</p>";
    }//fim do array pdf.
    
}//fim do isset.


?>
