<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
} else {
    require_once("../conexao.php");
    $idAluno = $_GET['id'];
    $sqlSelect = "SELECT * FROM aluno WHERE id_aluno = '$idAluno'";
    $sqlAluno = mysqli_fetch_assoc(mysqli_query($sql, $sqlSelect));
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Aluno (ADM)</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloSaibaMais.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include_once "./includes/menuAdm.php"; ?>
    <main>
        <h1 id="title">Alunos</h1>
        <div id="container">
            <div class="mobileSeta">
                <a href="users.php">
                    <img id="voltar" src="./images/voltarseta.png" alt="Seta para voltar" />
                </a>
                <div id="foto">
                    <img src="../fotosPerfil/usuario.png" id="fotoPerfil" accept="./images/*">
                    <h1 id="nome_aluno"><b><?php $nome = explode(' ', $sqlAluno['nome_aluno']);
                                            if (empty($nome[1])) {
                                                $nome[1] = "";
                                            }
                                            echo $nome[0] . " " . $nome[1]; ?><b></h1>
                </div>
            </div>
            <div id="conteúdo">

                <div class="dado">
                    <h2 class="cont">Nome Completo:</h2>
                    <label id="valorInput" class="inputText" type="number"><?php echo $sqlAluno['nome_aluno'] ?></label>
                </div>

                <div class="dado">
                    <h2 class="cont">ID do Aluno:</h2>
                    <label id="valorInput" class="inputText" type="number"><?php echo $idAluno ?></label>
                </div>

                <div class="dado">
                    <h2 class="cont">Email:</h2>
                    <label id="valorInput" class="inputText" type="number"><?php echo $sqlAluno['email_aluno'] ?></label>
                </div>

                <?php
                function limpar_texto($str){ 
                    return preg_replace("/[^0-9]/", "", $str); 
                  }
                  
                  $telefoneFormatado = limpar_texto($sqlAluno['telefone_aluno']);

                if($sqlAluno['telefone_aluno'] != ""){
                    echo '<div class="dado">';
                    echo '<h2 class="cont">Telefone:</h2>';
                    echo '<label id="valorInput" class="inputText" type="tel">';
                    echo $sqlAluno['telefone_aluno'];
                    echo '<a href="https://api.whatsapp.com/send?phone=55'; echo $telefoneFormatado; echo '&amp;text=Olá, sou o '; echo $_SESSION['nome']; echo ', administrador da Makeasy English, gostaria de conversar." target="_blank" id="whatsappAluno">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 16 16">';
                    echo '<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" /></svg></a>';
                    echo '</label></div>';
                    
                }
                ?>

            <div id="divDesc">
                <p id="descTitulo" class="tituloForm">Descrição:</p>
                <textarea id="descInput" class="inputText" rows="5" name="bio" disabled><?php if(isset($sqlAluno['desc_aluno'])){echo $sqlAluno['desc_aluno'];} ?></textarea>
            </div>
            <div id="divDesvincularAluno">
                <button id="desvincularAluno"><a href="./includes/excluirAluno.php?id=<?php echo $idAluno?>">Excluir aluno</a></button>
            </div>
        </div>

    </main>
</body>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>
</html>