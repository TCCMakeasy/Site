<?php
header("Access-Control-Allow-Origin: *");
header('Cache-Control: no-cache, must-revalidate'); 
header("Content-Type: text/plain; charset=UTF-8");
header("HTTP/1.1 200 OK");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../libs/PHPMailer/src/Exception.php';
require '../../libs/PHPMailer/src/PHPMailer.php';
require '../../libs/PHPMailer/src/SMTP.php';
require_once '../../conexao.php';
$dados = file_get_contents("php://input");
$dados = json_decode($dados);
$customer = $dados->Customer;
$nome = $customer->full_name;
$email = $customer->email;
$senha = bin2hex(random_bytes(3));
$senhaBD = password_hash($senha, PASSWORD_DEFAULT);
$inseri = "INSERT INTO professor(email_professor, nome_professor, senha_professor) VALUES ('".$email."', '".$nome."', '".$senhaBD."')";
$verify = mysqli_query($sql, $inseri) or die($sql);
if($verify){
$token = md5(rand(0, 9999) . rand(0, 9999) . rand(0, 9999) . rand(0, 9999));
    function curl_get_contents($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    $subject = 'Sua nova conta Makeasy foi criado';
    $url = 'https://sistema.makeasyenglish.com.br/professor/includes/email_cad.php?nome=' . $nome . '&token=' . $token . '&email=' . $email . '';
    $url = str_replace(' ','+', $url);
    $message = curl_get_contents($url);
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tccmakeasy@gmail.com';                     //SMTP username
        $mail->Password   = 'xlqg jlel unza ogig';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->CharSet    =  'UTF-8';

        //Recipients
        $mail->setFrom('tccmakeasy@gmail.com', 'Makeasy');
        $mail->addAddress($email, $nome);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        $mailSender = true;
    } catch (Exception $e) {
        $mailSender = false;
        echo $e;
    }

    if ($mailSender) {
        $sendBD = $sql->query("INSERT INTO recupera (token_recupera, email_recupera) VALUES ('$token', '$email')");
        if($sendBD){
            
            echo "<script>alert('Email enviado com sucesso!');window.location.href='../login.php';</script>";
        }else {
            echo "<script>alert('Erro. Tente novamente mais tarde');window.location.href='../login.php';</script>";
        }
       
    } else {
        echo "<script>alert('Erro ao enviar email!');window.location.href='../login.php';</script>";
    }

}else{
    echo "Deu errado";
}
?>