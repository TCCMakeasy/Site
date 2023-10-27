<?php

    $email = 'davisousap1223@gmail.com';

    mail($email, 'Recuperar senha',
    '<html> <h1>Toque no botão abaixo para mudar sua senha</h1>
    <a href="nova_senha.php">Mudar senha</a>"');

?>