<?php
//Define um fusio horario para data
date_default_timezone_set("America/Sao_paulo");

// Importando o namespace das class
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Carregando o autoload do composer
require 'vendor/autoload.php';

//Verifica se os campos email e mensagem foram setados e se é diferente de vazio removendo os espaços com trim()     
if((isset($_POST['f_email']) && !empty(trim($_POST['f_email']))) && (isset($_POST['f_mensagem']) && !empty(trim($_POST['f_mensagem'])))){

    //Obtendo os valores passados no formulário e colocando dentro de uma variável usando operador térnario
    $nome = !empty($_POST['f_nome']) ? $_POST['f_nome'] : "Não Informado";
    $email = $_POST['f_email'];//Usando a função trim() para tirar os espaços
    $assunto =!empty($_POST['f_assunto']) ? utf8_decode($_POST['f_assunto']) : "Não Informado";
    $mensagem = $_POST['f_mensagem'];//Usando a função trim() para tirar os espaços
    $data = date("d-m-Y H:i:s");//Data atual de acordo com o sistema operacional 

    //Instanciando a class PHPMailer e passando parametro True para habilitar as Exceptions
    $mail = new PHPMailer();

    //Configurando Server para fazer a comunicação com o gmail
    $mail->isSMTP();                                            //Está dizendo que vai usar protocolo SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Está dizendo qual servidor de email irá usar, no caso Gmail
    $mail->SMTPAuth   = true;                                   //Habilitando autenticação SMTP
    $mail->Username   = 'pablreis@gmail.com';                   //Configurando email que vai ser usado para enviar mensagens 
    $mail->Password   = 'pablo3563971';                             //Senha do email
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Habilitando criptografia TLS
    $mail->Port       = 587;                                    //Porta para se concetar com o protocoloca SMTP

    //Destinatario
    $mail->setFrom('pablreis@gmail.com');//Quem enviar
    $mail->addAddress('pablreis@gmail.com');//Quem recebe

    //Contéudo 
    $mail->isHTML(true);//Envia o contéudo como HTML
    $mail->Subject = $assunto;
    $mail->Body    = "Nome: $nome<br>
                      Email: $email<br>
                      Mensagem: $mensagem<br>
                      Data/Hora: $data";

    //Verifica se o email foi enviado, se foi enviado ele exibe uma mensagem de sucesso
    if($mail->send()){

        header('Location: emailSucesso.php');

    }else {//Se o email não foi enviado ele da uma mensagem de erro

        echo "<br>Erro ao enviar o Email, Tente Novamente mais Tarde!";

    }
//Se o email e a mensagem não foram preenchidos ou abriu o arquivo direto pela url envio.php sem preencher os campo, exibe uma mensagem de erro  
}else {

    echo "Email não enviado: Informe o Email e/ou a Mensagem!";

}
