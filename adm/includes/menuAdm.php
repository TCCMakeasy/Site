<link rel="stylesheet" type="text/css" href="./styles/estiloMenuAdmin.css">
<aside id="menu">
    <img src="./images/logo.png" alt="Logo da empresa" id="logo">
    <div id="fotoMenu">
        <img src="./fotosPerfil/nathan.png" alt="Imagem de usuário" id="imgUsuario">
        <p class="nomeAluno" id="nomeMenuAluno">Nathan</p>
    </div>
    <div id="scroll">
        <nav>
            <ul>
                <li>
                    <a href="./infos.php" class="navButton">Informações</a>
                </li>
                <li>
                    <a href="./adm_cronograma.php" class="navButton">Horário</a>
                </li>
                <li>
                    <a href="./natan_alunos.php" class="navButton">Alunos</a>
                </li>
                <li>
                    <a href="" class="navButton">Usuários</a>
                </li>
                <li>
                    <a id="openNotify" class="navButton">Mensagens</a>
                </li>
                <li>
                    <a href="./adm_financeiro.php" class="navButton">Financeiro</a>
                </li>
                <li>
                    <a href="" class="navButton">Denúncias</a>
                </li>
                <li>
                    <a href="" class="navButton" id="sair">Sair</a>
                </li>
            </ul>
        </nav>
        <footer>
            <p>Makeasy 2023 | Desenvolvido por TDE</p>
            <div class="redesSociais">
                <a href="https://www.facebook.com/makeasy.ingles" target="_blank" id="facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/makeasy_english/?hl=pt-br" target="_blank" id="instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg>
                </a>
                <a href="https://www.youtube.com/channel/UCSczU7ZgeiB4kLUizU46eOw" target="_blank" id="youtube">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-youtube" viewBox="0 0 16 16">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                    </svg>
                </a>
                <a href="https://api.whatsapp.com/send?phone=5511951456142&amp;text=Ol%C3%A1%2C%20estava%20vendo%20o%20site%20de%20voc%C3%AAs%20e%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es." target="_blank" id="whatsapp">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                    </svg>
                </a>
            </div>
        </footer>
    </div>
</aside>
<header id="mobile-menu">
    <div class="menu-container">
        <button id="abrirFecharMenu" onclick="menuShow()">
            <svg width="38" height="29" viewBox="0 0 38 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M35 23.5617C35.7704 23.562 36.5112 23.8117 37.0688 24.2591C37.6264 24.7065 37.958 25.3173 37.995 25.9648C38.0321 26.6124 37.7716 27.2471 37.2677 27.7375C36.7637 28.2278 36.0548 28.5363 35.288 28.5988L35 28.6106H3C2.22957 28.6103 1.48881 28.3606 0.931227 27.9132C0.373643 27.4658 0.041976 26.855 0.00495148 26.2075C-0.032073 25.5599 0.228384 24.9252 0.732351 24.4348C1.23632 23.9444 1.94516 23.636 2.712 23.5735L3 23.5617H35ZM35 11.7808C35.7956 11.7808 36.5587 12.0468 37.1213 12.5202C37.6839 12.9937 38 13.6358 38 14.3053C38 14.9748 37.6839 15.6169 37.1213 16.0904C36.5587 16.5638 35.7956 16.8298 35 16.8298H3C2.20435 16.8298 1.44129 16.5638 0.87868 16.0904C0.316071 15.6169 0 14.9748 0 14.3053C0 13.6358 0.316071 12.9937 0.87868 12.5202C1.44129 12.0468 2.20435 11.7808 3 11.7808H35ZM35 0C35.7956 0 36.5587 0.26597 37.1213 0.739399C37.6839 1.21283 38 1.85494 38 2.52447C38 3.194 37.6839 3.8361 37.1213 4.30953C36.5587 4.78296 35.7956 5.04893 35 5.04893H3C2.20435 5.04893 1.44129 4.78296 0.87868 4.30953C0.316071 3.8361 0 3.194 0 2.52447C0 1.85494 0.316071 1.21283 0.87868 0.739399C1.44129 0.26597 2.20435 0 3 0H35Z" fill="white" />
            </svg>
        </button>
        <h1 id="titleResponsive"></h1>
        <button class="notification" id="openNotifyMobile">
            <svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 22.6667V24H0V22.6667L2.66667 20V12C2.66667 7.86667 5.37333 4.22667 9.33333 3.05333V2.66667C9.33333 1.95942 9.61429 1.28115 10.1144 0.781048C10.6145 0.280951 11.2928 0 12 0C12.7072 0 13.3855 0.280951 13.8856 0.781048C14.3857 1.28115 14.6667 1.95942 14.6667 2.66667V3.05333C18.6267 4.22667 21.3333 7.86667 21.3333 12V20L24 22.6667ZM14.6667 25.3333C14.6667 26.0406 14.3857 26.7189 13.8856 27.219C13.3855 27.719 12.7072 28 12 28C11.2928 28 10.6145 27.719 10.1144 27.219C9.61429 26.7189 9.33333 26.0406 9.33333 25.3333" fill="white" />
            </svg>
        </button>
    </div>
</header>