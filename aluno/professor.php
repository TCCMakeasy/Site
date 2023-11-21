<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
} else if ($_GET['id'] != $_SESSION['id_professor']) {
    $_SESSION['msg'] = "Você não pode acessar esse perfil";
    header("Location: ../aluno/infos.php");
} else {
    require_once("../conexao.php");
    $idProfessor = $_GET['id'];
    $infosProfessor = "SELECT nome_professor, email_professor, bio_professor, valor_professor, nota_professor, telefone_professor, foto_professor FROM professor WHERE id_professor = '$idProfessor'";
    $resultInfosProfessor = mysqli_query($sql, $infosProfessor);
    $infosProfessor = mysqli_fetch_assoc($resultInfosProfessor);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do professor</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloSaibaMais.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>
<script> 
    const alerta = () => alert("<?php if(isset($_SESSION['msg'])) {echo $_SESSION['msg'];}?>");
</script>
<body <?php if(isset($_SESSION['msg'])) { echo 'onload="alerta()"';} ?>>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <?php include_once "./includes/menuAluno.php"; ?>
    <main>
        <h1 id="title">Informações do professor</h1>
        <div id="container">
            <div class="mobileSeta">
                <a onclick="goBack()" style="cursor:pointer;">
                    <img id="voltar" src="./images/voltarseta.png" alt="Seta para voltar" />
                </a>
                <div id="questions">
                    <a id="notaProfessor"><?php echo $infosProfessor['nota_professor'] ?>/5⭐</a>
                    <a>Preço: R$<?php echo $infosProfessor['valor_professor'] ?></a>
                    <a id="report"><img id="reportimg" src="./images/denuncia.svg" style="vertical-align: bottom;" alt="denunciar">Problemas com o professor?</a>
                </div>
                <div id="foto">
                    <img src="../fotosPerfil/<?php echo $infosProfessor['foto_professor'] ?>" id="fotoPerfil">
                    <h1 id="nomeProfessor"><b><?php $nome = explode(' ', $infosProfessor['nome_professor']);
                                                if (empty($nome[1])) {
                                                    $nome[1] = "";
                                                }
                                                echo $nome[0] . " " . $nome[1]; ?><b></h1>
                    <a id="notaProfessorMobile">⭐<?php echo $infosProfessor['nota_professor'] ?>/5</a>
                </div>

            </div>
            <div id="conteúdo">

                <div class="dado">
                    <h2 class="cont">Nome Completo:</h2>
                    <label id="valorInput" class="inputText" type="number"><?php echo $infosProfessor['nome_professor'] ?></label>
                </div>

                <div class="dado">
                    <h2 class="cont">Email:</h2>
                    <label id="valorInput" class="inputText" type="number"><?php echo $infosProfessor['email_professor'] ?></label>
                </div>

                <?php
                function limpar_texto($str)
                {
                    return preg_replace("/[^0-9]/", "", $str);
                }

                $telefoneFormatado = limpar_texto($infosProfessor['telefone_professor']);

                if ($infosProfessor['telefone_professor'] != "") {
                    echo '<div class="dado">';
                    echo '<h2 class="cont">Telefone:</h2>';
                    echo '<label id="valorInput" class="inputText" type="tel">';
                    echo $infosProfessor['telefone_professor'];
                    echo '<a href="https://api.whatsapp.com/send?phone=55';
                    echo $telefoneFormatado;
                    echo '&amp;text=Olá, sou o ';
                    echo $_SESSION['nome'];
                    echo ', seu professor da Makeasy English, gostaria de conversar." target="_blank" id="whatsappProfessor">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 0.095rem;" width="16" height="16" fill="white" viewBox="0 0 16 16">';
                    echo '<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" /></svg></a>';
                    echo '</label></div>';
                }
                ?>

            </div>

            <div id="divDesc">
                <p id="descTitulo" class="tituloForm">Descrição:</p>
                <textarea id="descInput" class="inputText" rows="5" name="bio" disabled><?php if (isset($infosProfessor['bio_professor'])) {
                                                                                            echo $infosProfessor['bio_professor'];
                                                                                        } ?></textarea>
            </div>

            <div id="avaliarProfessor">
                <h1 style="font-size: 1.3rem;">Avalie o professor</h1>
                <div class="rating">
                    <input type="radio" name="rating" id="estrela-5" class="openAvalia">
                    <label for="estrela-5"></label>
                    <input type="radio" name="rating" id="estrela-4" class="openAvalia">
                    <label for="estrela-4"></label>
                    <input type="radio" name="rating" id="estrela-3" class="openAvalia">
                    <label for="estrela-3"></label>
                    <input type="radio" name="rating" id="estrela-2" class="openAvalia">
                    <label for="estrela-2"></label>
                    <input type="radio" name="rating" id="estrela-1" class="openAvalia">
                    <label for="estrela-1"></label>
                </div>
            </div>

            <div id="avaliacoes">
                <h1 style="font-size: 1.3rem;">Avaliações</h1>
                <p>
                    <span><?php echo $infosProfessor['nota_professor'] ?>/5⭐</span>
                    <span><?php $conta = "SELECT COUNT(nota_avalia) FROM avalia WHERE id_professor = '" . $_SESSION['id_professor'] . "'";
                            $verifica_conta = mysqli_query($sql, $conta);
                            if ($verifica_conta) {
                                $conta2 = mysqli_fetch_assoc($verifica_conta);
                                $conta2 = $conta2['COUNT(nota_avalia)'];
                                echo $conta2;
                            }
                            ?> Avaliações</span>
                </p>
                <?php
                $aval = "SELECT * FROM avalia WHERE id_professor = " . $_SESSION['id_professor'] . "";
                $veri_aval = mysqli_query($sql, $aval);
                while ($row_aval = mysqli_fetch_assoc($veri_aval)) {
                    $requisit_nome = "SELECT nome_aluno FROM aluno WHERE id_aluno = '" . $row_aval['id_aluno'] . "'";
                    $verify_nome = mysqli_query($sql, $requisit_nome);
                    $result_nome = mysqli_fetch_assoc($verify_nome);
                    if (!isset($result_nome["nome_aluno"])) {
                        $nome = "Conta deletada";
                    }else{
                        $nome = $result_nome['nome_aluno'];
                    }
                    $requisit = "SELECT nota_avalia, desc_avalia FROM avalia WHERE id_aluno = '" . $row_aval['id_aluno'] . "'";
                    $verify = mysqli_query($sql, $requisit);
                    $result = mysqli_fetch_assoc($verify);
                    $nota = $result['nota_avalia'];
                    $desc = $result['desc_avalia'];
                    echo '<div id="avaliacao">';
                    echo '<h3>' . $nome . '</h3>';
                    echo '<div class="avaliaçãoDiv">';
                    echo '<p><span>' . $nota . '/5⭐: </span>';
                    echo '<span>' . $desc . '</span>';
                    echo '</p>';
                    if ($nome == $_SESSION['nome']) {
                        echo '<a id="apagarAvalia" href="./includes/apagarAval.php">';
                        echo '<svg width="24" height="29" viewBox="0 0 24 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.39687 22.1562H10.3556V7.91293H7.39687V22.1562ZM13.3144 22.1562H16.2731V7.91293H13.3144V22.1562ZM1.47938 28.4866V4.74776H0V1.58259H7.39687V0H16.2731V1.58259H23.67V4.74776H22.1906V28.4866H1.47938Z" fill="black" />
                        </svg>';
                        echo '</a>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
                ?>

            </div>
            <div id="divDesvincularProfessor">
                <button id="desvincularProfessor"><a href="./includes/desvincular.php?id=<?php echo $_SESSION['id'] ?>">Desvincular-se</a></button>
            </div>
        </div>
    </main>
</body>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php";
include_once "includes/modalAvalia.php";
include_once "includes/modalDenuncia.php";
unset($_SESSION['msg']);
?>

</html>