<?php

require_once "./etc/conf.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/structure.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Atelier Elizeu Manoel</title>
</head>
<body style="overflow: hidden;">
    <span class="r mcenter ccenter w12 h12" id="loading-screen">
        <img src="./assets/img/loading.gif" style="height: 8rem;" draggable="false">
    </span>
    <nav class="c mcenter ccenter w12 hmin" id="main-menu">
        <div class="r mbetween ccenter w11-lmd w10-hmd w9-llg w8-hlg ns">
            <a class="i wmax main-menu-link" href="<?="$ROOT_PATH/#home"?>"><img class="i wauto" style="height: 4rem;" src="./assets/img/atelier_logo.svg" alt="Atelier Elizeu Manoel"></a>
            <ul class="r mend ccenter wauto retractable-menu">
                <li class="i wmax"><a class="i wmax main-menu-link hover-line-bottom retractable-menu-option" href="<?="$ROOT_PATH/#atelier"?>">ATELIER</a></li>
                <li class="i wmax"><a class="i wmax main-menu-link hover-line-bottom retractable-menu-option" href="<?="$ROOT_PATH/#projects"?>">PROJETOS</a></li>
                <li class="i wmax"><a class="i wmax main-menu-link hover-line-bottom retractable-menu-option" href="<?="$ROOT_PATH/#home"?>">SERVIÇOS</a></li>
                <li class="i wmax"><a class="i wmax main-menu-link hover-line-bottom retractable-menu-option" href="<?="$ROOT_PATH/#home"?>">CONTATO</a></li>
                <li class="i wmax"><a class="i wmax main-menu-link hover-line-bottom retractable-menu-option" href="<?="$ROOT_PATH/login.php"?>">LOGIN</a></li>
                <button class="main-menu-link retractable-menu-retractor" data-toggle="retracted-main-menu-lsm" data-alternate="true" title="Menu de links">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M5 30v-2.792h30V30Zm0-8.625v-2.75h30v2.75Zm0-8.583V10h30v2.792Z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" style="transform: rotate(180deg);"><path d="M5 30v-2.792h21.667V30Zm28.042-2-8-8.042 8-8 1.958 2-6.042 6 6.084 6.084ZM5 21.333v-2.791h16.667v2.791Zm0-8.541V10h21.667v2.792Z"/></svg>
                </button>
            </ul>
        </div>
        <div class="i s" id="retracted-main-menu-lsm" style="display: none;">
            <div class="r mend ccenter wauto" style="min-height: calc(4rem + 40px);">
                <button class="main-menu-link" style="cursor: pointer" title="Menu de links">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" style="transform: rotate(180deg);"><path d="M5 30v-2.792h21.667V30Zm28.042-2-8-8.042 8-8 1.958 2-6.042 6 6.084 6.084ZM5 21.333v-2.791h16.667v2.791Zm0-8.541V10h21.667v2.792Z"/></svg>
                </button>
            </div>
            <div class="c mcenter ccenter hmin">
                <li class="i w12"><a class="r mend ccenter w12 main-menu-link text-right" href="<?="$ROOT_PATH/#atelier"?>">ATELIER<span style="padding-left: 10px;"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10 17q-1-.667-2.135-1.083Q6.729 15.5 5.5 15.5q-.792 0-1.583.156-.792.156-1.521.469-.5.208-.948-.073Q1 15.771 1 15.229V4.75q0-.292.156-.542.156-.25.427-.375.917-.416 1.907-.625Q4.479 3 5.5 3q1.188 0 2.333.281 1.146.281 2.167.844V15.25q1.062-.562 2.188-.906Q13.312 14 14.5 14q.771 0 1.521.135.75.136 1.479.365v-11q.229.083.458.156.23.073.459.177.271.146.427.386.156.239.156.531v10.479q0 .521-.448.813-.448.291-.948.083-.75-.292-1.531-.458-.781-.167-1.573-.167-1.229 0-2.365.417Q11 16.333 10 17Zm1.5-4V5L16 1v8Zm-3 1.417V5.229q-.708-.396-1.49-.562Q6.229 4.5 5.417 4.5q-.75 0-1.49.167-.739.166-1.427.479v9.271q.708-.229 1.448-.323T5.417 14q.791 0 1.562.094t1.521.323Zm0 0V5.229Z"/></svg></span></a></li>
                <li class="i w12"><a class="r mend ccenter w12 main-menu-link text-right" href="<?="$ROOT_PATH/#projects"?>">PROJETOS<span style="padding-left: 10px;"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.75 7.5h12.5l-.792-2H4.542Zm6.25-1ZM14 9H5.771L5.5 10.5h8.771ZM3 16l1.271-7H3q-.542 0-.854-.448-.313-.448-.084-.927l1.209-3q.125-.292.375-.458Q3.896 4 4.208 4h11.584q.312 0 .562.167.25.166.375.458l1.209 3q.229.479-.084.927Q17.542 9 17 9h-1.5l1.271 7h-1.5l-.729-4H5.229L4.5 16Z"/></svg></span></a></li>
                <li class="i w12"><a class="r mend ccenter w12 main-menu-link text-right" href="<?="$ROOT_PATH/#home"?>">SERVIÇOS<span style="padding-left: 10px;"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3 16V8.5q0-.625.438-1.062Q3.875 7 4.5 7h2V5.5q0-.625.438-1.062Q7.375 4 8 4h4q.625 0 1.062.438.438.437.438 1.062V7h2q.625 0 1.062.438Q17 7.875 17 8.5V16Zm1.5-1.5h11v-2.25h-1.271V13h-1.5v-.75H7.292V13h-1.5v-.75H4.5Zm0-6v2.25h1.292V10h1.5v.75h5.437V10h1.5v.75H15.5V8.5h-11ZM8 7h4V5.5H8Z"/></svg></span></a></li>
                <li class="i w12"><a class="r mend ccenter w12 main-menu-link text-right" href="<?="$ROOT_PATH/#home"?>">CONTATO<span style="padding-left: 10px;"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15.896 16.979q-2.563-.208-4.834-1.281-2.27-1.073-3.989-2.802-1.719-1.729-2.802-4T3 4.062q-.042-.437.26-.76T4 2.979h2.833q.355 0 .615.209.26.208.344.562l.5 2.229q.041.25-.021.5-.063.25-.25.438L6 8.958q.875 1.584 2.146 2.854Q9.417 13.083 11 13.958l2.062-2q.209-.208.459-.26.25-.052.479-.01l2.229.479q.354.083.563.354.208.271.208.625v2.833q0 .563-.396.792-.396.229-.708.208ZM5.312 7.5l1.459-1.458-.354-1.563H4.542q.104.792.291 1.542.188.75.479 1.479Zm7.167 7.167q.729.291 1.49.468.76.177 1.531.282v-1.875l-1.562-.334ZM5.312 7.5Zm7.167 7.167Z"/></svg></span></a></li>
                <li class="i w12"><a class="r mend ccenter w12 main-menu-link text-right" href="<?="$ROOT_PATH/login.php"?>">LOGIN<span style="padding-left: 10px;"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10 17v-1.5h5.5v-11H10V3h5.5q.625 0 1.062.438Q17 3.875 17 4.5v11q0 .625-.438 1.062Q16.125 17 15.5 17Zm-1.5-3.5-1.062-1.062 1.687-1.688H3v-1.5h6.125L7.438 7.562 8.5 6.5 12 10Z"/></svg></a></li>
            </div>
        </div>
        <div class="i s" id="retracted-main-menu-lmd" style="display: none;">
            <div class="c mcenter ccenter w12 hmin">
                <li class="i w12"><a class="i w12 main-menu-link hover-color-change text-center" href="<?="$ROOT_PATH/#atelier"?>">ATELIER</a></li>
                <li class="i w12"><a class="i w12 main-menu-link hover-color-change text-center" href="<?="$ROOT_PATH/#projects"?>">PROJETOS</a></li>
                <li class="i w12"><a class="i w12 main-menu-link hover-color-change text-center" href="<?="$ROOT_PATH/#home"?>">SERVIÇOS</a></li>
                <li class="i w12"><a class="i w12 main-menu-link hover-color-change text-center" href="<?="$ROOT_PATH/#home"?>">CONTATO</a></li>
                <li class="i w12"><a class="i w12 main-menu-link hover-color-change text-center" href="<?="$ROOT_PATH/login.php"?>">LOGIN</a></li>
            </div>
        </div>
    </nav>
    <span class="marker" id="home"></span>
    <header class="c mcenter ccenter w12 ns" id="main-banner">
        <span style="min-height: calc(4rem + 40px);"></span>
        <div class="c p4 mcenter ccenter g4 w12 ns">
            <img src="./assets/img/Asset-104.png" style="height: 8rem;">
            <h2 class="text-center light">ATELIER ELIZEU MANOEL</h2>
            <button class="btn-banner">Contato</button>
        </div>
    </header>
    <span class="marker" id="atelier"></span>
    <section class="c mcenter ccenter w12 hmin bgLight">
        <div class="c p4 mcenter ccenter g4 w12 w11-lmd w10-hmd w9-llg w8-hlg ns">
            <div class="c r-lmd mcenter ccenter g4 w12">
                <img class="i w12 w6-lmd hauto ns text-center" style="max-width: 32rem;" src="./assets/img/atelier/preset_violin.webp" alt="(Foto do Elizeu Manoel trabalhando)">
                <h2 class="i w12 wmax-lmd hauto title ns">Elizeu Manoel, Luthier Brasileiro</h2>
            </div>
            <p class="text-info">O artesanato tradicional do violino em Cremona e nossa paixão pela excelência ressoam entre as paredes da oficina de Andrea Varazzani, onde o barulho das goivas, raspadores, limas, formões, aviões, as cores da madeira, os aromas da tinta fresca se misturam em uma maravilhosa síntese e assim, paixão, dedicação e cura dão forma ao informe.</p>
            <p class="text-info">Tanta habilidade, trabalho duro, meticulosidade, virtuosismo, tornam-se o artesanato de Andrea Varazzani, inspirando e homenageando a arte refinada dos sons. A música é como uma fênix, que levanta seu vôo com leveza e ousadia e com as asas o ímpeto agrada aos deuses e aos homens. Essa mesma arte nos faz sentir uma alegria emocional curta que sobe e desce...</p>
        </div>
    </section>
    <section class="c mcenter ccenter w12 hmin bgDark">
        <div class="c p4 mcenter ccenter g4 w12 w11-lmd w10-hmd w9-llg w8-hlg hauto ns">
            <p class="text-info light" style="font-style: italic;">&ldquo;Ofereço diversos serviços na lutheria, visando obter um excelente resultado, com o uso dos mais sofisticados materiais, ao entender o propósito do músico com seu instrumento, tanto na criação quanto nos ajustes deste.&rdquo;</p>
            <p class="text-info light" style="text-indent: 0;">&mdash; Elizeu Manoel da Silva &mdash;</p>
        </div>
    </section>
    <span class="marker" id="projects"></span>
    <section class="c mcenter ccenter w12 hmin bgLight">
        <div class="r mbetween cstretch w12 w11-lmd w10-hmd w9-llg w8-hlg carousel">
            <button class="i wmin hauto ns carousel-previous-button" title="Anterior">
                <svg xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M27.083 36.667 10.417 20 27.083 3.333l2.542 2.584L15.542 20l14.083 14.083Z"/></svg>
            </button>
            <div class="i wauto s carousel-display" data-focused-item="0">
                <ul class="r mevenly ccenter wmax">
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto card">
                            <img class="i w12 hauto ns text-center" src="./assets/img/atelier/preset_violin.webp" alt="" draggable="false">
                        </div>
                    </li>
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto card">
                            <img class="i w12 hauto ns text-center" src="./assets/img/atelier/between_violin.webp" alt="" draggable="false">
                        </div>
                    </li>
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto card">
                            <img class="i w12 hauto ns text-center" src="./assets/img/atelier/voluta_violin.webp" alt="" draggable="false">
                        </div>
                    </li>
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto card">
                            <img class="i w12 hauto ns text-center" src="./assets/img/atelier/preset_violin.webp" alt="" draggable="false">
                        </div>
                    </li>
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto card">
                            <img class="i w12 hauto ns text-center" src="./assets/img/atelier/between_violin.webp" alt="" draggable="false">
                        </div>
                    </li>
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto card">
                            <img class="i w12 hauto ns text-center" src="./assets/img/atelier/voluta_violin.webp" alt="" draggable="false">
                        </div>
                    </li>
                </ul>
            </div>
            <button class="i wmin hauto ns carousel-next-button" title="Próximo">
                <svg xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="m12.917 36.625-2.542-2.583 14.083-14.084L10.375 5.833l2.542-2.541 16.666 16.666Z"/></svg>
            </button>
        </div>
    </section>
    <section class="i">
        <ul class="r maround ccenter">
            <li class="c card-symbol ccenter">
                <img src="./assets/img/target.webp" alt="target" class="w8">
                <h3>Missão</h3>
                <p>Nossa missão é fazer a satisfação do nosso cliente entregando um produto com
                    classe e que supra quaisquer necessidades que ele tenha com seu instrumento,
                    assim, além de ser assíduo com os prazos, nunca deixaremos de escutar as
                    observações que o cliente queira fazer para que a experiência dele seja a melhor em
                    nossa Lutheria</p>
            </li>
            <li class="c card-symbol ccenter">
                <img src="./assets/img/view_1.webp" alt="black_eye" srcset="" class="w8">
                </h3>Visão</h3>
                <p>Tornar a Lutheria conhecida, inspirando a ascensão de músicos em todo o Brasil</p>
            </li>
            <li class="c card-symbol ccenter">
                <img src="./assets/img/diamond.webp" alt="diamond" srcset="" class="w8">
                </h3>Valores</h3>
                <p>Trabalhamos com excelência para entregar resultados. Estamos sempre agindo em função da sua necessidade, entregando no prazo e focando sempre na melhoria da empresa com o intuito de entregar um serviço de qualidade.
                    Além disso, alguns dos nossos valores mais estritos são a autenticidade e a transparência com o cliente, as quais devem garantir ao cliente total confiança no nosso trabalho.
                    
                    Entregas no prazo
                    Focando sempre na melhora da empresa para entregar um serviço de alta qualidade
                    Autenticidade com o cliente</p>
            </li>
        </ul>
    </section>

    <!-------------------------------------------------------SERVIÇOS--------------------------------------------------->

    <section>
        <div></div>
    </section>


    <!-------------------------------------------------------CONTATOS--------------------------------------------------->

    <section>
        <div class="r mcenter ccenter"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1118.6813634462094!2d-46.54722453538345!3d-23.46625868680038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef5719bad7fe1%3A0xca2fd76155a45ced!2sR.%20Jaboticabeira%2C%2052%20-%20Vila%20Sirena%2C%20Guarulhos%20-%20SP%2C%2007051-070!5e1!3m2!1spt-BR!2sbr!4v1662776367692!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    </section>



    <!-------------------------------------------------------RODAPÉ----------------------------------------------------->

    <footer class="i">
        <section class="r ccenter mevenly" style="background-color: cyan;">
            <div class="r w2" style="background-color: red; height: 200px;">
                <div class="c mstart w12" style="background-color: pink;">
                    <img src="./assets/img/atelier_logo.svg" alt="logo-Atelier" class="w10">
                    <p class="r ">
                        Ofereço diversos serviços na lutheria, visando obter um excelente resultado, com o
                        uso dos mais sofisticados materiais, ao entender o propósito do músico com seu
                        instrumento, tanto na criação quanto nos ajustes deste.
                    </p>
                </div>
                
            </div>
            <div class="c w2 gap-1 p-footer" style="background-color: green; height: 200px;">
                <h3 class="r mcenter ccenter">REGISTER NOW</h3>
                <div class="r ccenter mcenter gap-1">
                    <input type="text" placeholder="Please enter your e-mail" >
                    <input type="button" value="Sign Up">
                </div>
                
            </div>
            <div class="r w2" style="background-color: blue; height: 200px;">
                <div class="c gap-1">
                    <h3>Links da Página</h3>
                    <ul class="c gap-1">
                        <li><a href="">ATELIER</a></li>
                        <li><a href="">PROJETOS</a></li>
                        <li><a href="">SERVIÇOS</a></li>
                        <li><a href="">CONTATO</a></li>
                        <li><a href="">LOGIN</a></li>
                    </ul>
                </div>
            </div>
            <div class="r w2" style="background-color: purple; height: 200px;">
                <div class="c gap-1">
                    <h3>CONTACT US</h3>
                    <div class="r ccenter gap-1">
                        <img src="./assets/img/phone-call-min.png" alt="" class="icon-footer">
                        <p>(11) 98787-0977</p>
                    </div>
                    <div class="r ccenter gap-1">
                        <img src="./assets/img/email-min.png" alt="" class="icon-footer">
                        <p>atelierElizeuManoel@outlook.com</p>
                    </div>
                    <div class="r ccenter gap-1">
                        <img src="./assets/img/home-min.png" alt="" class="icon-footer">
                        <p>Rua Jaboticabeiras, 52 - Vila Sirena 07051-070</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="r ccenter maround w12 " style="background-color: orange; height: 100px;">
            <div>
                <p>Copyright <a href="https://projetos.talentosdoifsp.gru.br/tea/" target="blank">TEA Web Systems</a> &copy; 2022</p>
            </div>
            <div>
                <aside class="r mcenter ccenter gap-2">
                    <img src="./assets/img/facebook-min.png" alt="facebook"  class="icon-footer-large">
                    <img src="./assets/img/linkedin-min.png" alt="linkedin"  class="icon-footer-large">
                    <img src="./assets/img/instagram-min.png" alt="instagram"  class="icon-footer-large">
                    <img src="./assets/img/tiktok-min.png" alt="tiktok"  class="icon-footer-large">
                </aside>
            </div>
        </section>
    </footer>
    <a class="whatsapp-button" href="https://api.whatsapp.com/send?phone=5511960995554&text=Boa%20tarde!%20Gostaria%20de%20mais%20informações" target="_blank" title="Contato por Whatsapp">
        <img class="i" src="./assets/img/whatsapp_logo.png" alt="Whatsapp">
    </a>
    <script src="./assets/js/main.js"></script>
</body>
</html>