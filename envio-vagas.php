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
if((isset($_POST['f_email_e']) && !empty(trim($_POST['f_email_e']))) && (isset($_POST['f_nome_e']) && !empty(trim($_POST['f_nome_e'])))){

    //Obtendo os valores passados no formulário e colocando dentro de uma variável usando operador térnario
    $nome = $_POST['f_nome_e'];
    $email = $_POST['f_email_e'];
    $tipo_vaga = $_POST['f_tipo_e'];
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
    $mail->addAddress($email);//Quem recebe

    //Contéudo do email enviado
    $mail->isHTML(true);//Envia o contéudo como HTML
    $mail->Subject = "Vagas GoolbeeEmpregos";
    $mail->Body    = "Boa tarde $nome<br>
                      Agora você receberá email de vagas a qual você escolheu.<br>
                      Data/Hora: $data";

    //Verifica se o email foi enviado, se foi enviado ele exibe uma mensagem de sucesso
    if($mail->send()){

        header('Location: emailSucesso2.php?tipo='.$tipo_vaga);

    }else {//Se o email não foi enviado ele da uma mensagem de erro

        echo "<br>Erro ao enviar o Email, Tente Novamente mais Tarde!";

    }
//Se o email e a mensagem não foram preenchidos ou abriu o arquivo direto pela url envio.php sem preencher os campo, exibe uma mensagem de erro  
}else {

    echo "Email não enviado: Informe o Email e/ou a Mensagem!";

}
