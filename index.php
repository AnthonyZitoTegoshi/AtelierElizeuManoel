<?php

require_once "./etc/conf.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?="$ROOT_PATH/assets/css/reset.css"?>">
    <link rel="stylesheet" href="<?="$ROOT_PATH/assets/css/structure.css"?>">
    <link rel="stylesheet" href="<?="$ROOT_PATH/assets/css/main.css"?>">
    <link rel="shortcut icon" href="<?="$ROOT_PATH/assets/img/atelier_logo_tiny.svg"?>" type="image/svg+xml">
    <title>Atelier Elizeu Manoel</title>
</head>
<body style="overflow: hidden;">
    <span class="r mcenter ccenter w12 h12" id="loading-screen">
        <img src="./assets/img/loading.gif" style="height: 8rem;" draggable="false">
    </span>
    <nav class="c mcenter ccenter w12 hmin" id="main-menu">
        <div class="r mbetween ccenter w11-lmd w10-hmd w9-llg w8-hlg ns">
            <a class="i wmax main-menu-link" href="#home"><img class="i wauto" style="height: 4rem;" src="./assets/img/atelier_logo.svg" alt="Atelier Elizeu Manoel"></a>
            <ul class="r mend ccenter wauto retractable-menu">
                <li class="i wmax"><a class="i wmax main-menu-link hover-line-bottom retractable-menu-option" href="#atelier">ATELIER</a></li>
                <!--<li class="i wmax"><a class="i wmax main-menu-link hover-line-bottom retractable-menu-option" href="#projects">PROJETOS</a></li>-->
                <li class="i wmax"><a class="i wmax main-menu-link hover-line-bottom retractable-menu-option" href="#services">SERVIÇOS</a></li>
                <li class="i wmax"><a class="i wmax main-menu-link hover-line-bottom retractable-menu-option" href="#contact">CONTATO</a></li>
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
                <li class="i w12"><a class="r mend ccenter g2 w12 main-menu-link text-right" href="#atelier">ATELIER<span class="i wauto hauto"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10 17q-1-.667-2.135-1.083Q6.729 15.5 5.5 15.5q-.792 0-1.583.156-.792.156-1.521.469-.5.208-.948-.073Q1 15.771 1 15.229V4.75q0-.292.156-.542.156-.25.427-.375.917-.416 1.907-.625Q4.479 3 5.5 3q1.188 0 2.333.281 1.146.281 2.167.844V15.25q1.062-.562 2.188-.906Q13.312 14 14.5 14q.771 0 1.521.135.75.136 1.479.365v-11q.229.083.458.156.23.073.459.177.271.146.427.386.156.239.156.531v10.479q0 .521-.448.813-.448.291-.948.083-.75-.292-1.531-.458-.781-.167-1.573-.167-1.229 0-2.365.417Q11 16.333 10 17Zm1.5-4V5L16 1v8Zm-3 1.417V5.229q-.708-.396-1.49-.562Q6.229 4.5 5.417 4.5q-.75 0-1.49.167-.739.166-1.427.479v9.271q.708-.229 1.448-.323T5.417 14q.791 0 1.562.094t1.521.323Zm0 0V5.229Z"/></svg></span></a></li>
                <!--<li class="i w12"><a class="r mend ccenter g2 w12 main-menu-link text-right" href="#projects">PROJETOS<span class="i wauto hauto"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.75 7.5h12.5l-.792-2H4.542Zm6.25-1ZM14 9H5.771L5.5 10.5h8.771ZM3 16l1.271-7H3q-.542 0-.854-.448-.313-.448-.084-.927l1.209-3q.125-.292.375-.458Q3.896 4 4.208 4h11.584q.312 0 .562.167.25.166.375.458l1.209 3q.229.479-.084.927Q17.542 9 17 9h-1.5l1.271 7h-1.5l-.729-4H5.229L4.5 16Z"/></svg></a</span>></li>-->
                <li class="i w12"><a class="r mend ccenter g2 w12 main-menu-link text-right" href="#services">SERVIÇOS<span class="i wauto hauto"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3 16V8.5q0-.625.438-1.062Q3.875 7 4.5 7h2V5.5q0-.625.438-1.062Q7.375 4 8 4h4q.625 0 1.062.438.438.437.438 1.062V7h2q.625 0 1.062.438Q17 7.875 17 8.5V16Zm1.5-1.5h11v-2.25h-1.271V13h-1.5v-.75H7.292V13h-1.5v-.75H4.5Zm0-6v2.25h1.292V10h1.5v.75h5.437V10h1.5v.75H15.5V8.5h-11ZM8 7h4V5.5H8Z"/></svg></span></a></li>
                <li class="i w12"><a class="r mend ccenter g2 w12 main-menu-link text-right" href="#contact">CONTATO<span class="i wauto hauto"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15.896 16.979q-2.563-.208-4.834-1.281-2.27-1.073-3.989-2.802-1.719-1.729-2.802-4T3 4.062q-.042-.437.26-.76T4 2.979h2.833q.355 0 .615.209.26.208.344.562l.5 2.229q.041.25-.021.5-.063.25-.25.438L6 8.958q.875 1.584 2.146 2.854Q9.417 13.083 11 13.958l2.062-2q.209-.208.459-.26.25-.052.479-.01l2.229.479q.354.083.563.354.208.271.208.625v2.833q0 .563-.396.792-.396.229-.708.208ZM5.312 7.5l1.459-1.458-.354-1.563H4.542q.104.792.291 1.542.188.75.479 1.479Zm7.167 7.167q.729.291 1.49.468.76.177 1.531.282v-1.875l-1.562-.334ZM5.312 7.5Zm7.167 7.167Z"/></svg></span></a></li>
                <li class="i w12"><a class="r mend ccenter g2 w12 main-menu-link text-right" href="<?="$ROOT_PATH/login.php"?>">LOGIN<span class="i wauto hauto"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10 17v-1.5h5.5v-11H10V3h5.5q.625 0 1.062.438Q17 3.875 17 4.5v11q0 .625-.438 1.062Q16.125 17 15.5 17Zm-1.5-3.5-1.062-1.062 1.687-1.688H3v-1.5h6.125L7.438 7.562 8.5 6.5 12 10Z"/></svg></span></a></li>
            </div>
        </div>
        <div class="i s" id="retracted-main-menu-lmd" style="display: none;">
            <div class="c mcenter ccenter w12 hmin">
                <li class="i w12"><a class="i w12 main-menu-link hover-color-change text-center" href="#atelier">ATELIER</a></li>
                <!--<li class="i w12"><a class="i w12 main-menu-link hover-color-change text-center" href="#projects">PROJETOS</a></li>-->
                <li class="i w12"><a class="i w12 main-menu-link hover-color-change text-center" href="#services">SERVIÇOS</a></li>
                <li class="i w12"><a class="i w12 main-menu-link hover-color-change text-center" href="#contact">CONTATO</a></li>
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
            <a class="btn-banner" href="#contact">Contato</a>
        </div>
    </header>
    <span class="marker" id="atelier"></span>
    <section class="c mcenter ccenter g4 w12 hmin bgLight">
        <div class="c r-lmd p4 mcenter ccenter cstart-lmd g4 w12 w11-lmd w10-hmd w8-llg w6-hlg ns">
            <img class="i w12 w6-lmd hauto ns text-center" style="max-width: 32rem;" src="./assets/img/atelier/look_violin.webp" alt="(Foto do Elizeu Manoel trabalhando)">
            <div class="c mcenter ccenter g4 w12 w6-lmd hauto">
                <h2 class="i w12 hauto title">Título 1</h2>
                <p class="text-info">Pellentesque eleifend velit ac magna cursus, eu vestibulum augue posuere. Integer elementum at eros nec faucibus. Nunc et ligula commodo, semper est et, dignissim justo. Nunc dignissim porttitor vehicula. Pellentesque finibus, eros sed gravida tincidunt, nibh augue mattis tellus, id lobortis lacus velit vitae orci. Morbi sit amet ornare lectus. Nunc vestibulum in justo id fermentum. Integer sodales magna eget vehicula mollis. Fusce ligula risus, dignissim in pulvinar ac, efficitur nec neque.</p>
            </div>
        </div>
        <div class="c r-lmd p4 mcenter ccenter cstart-lmd g4 w12 w11-lmd w10-hmd w8-llg w6-hlg ns">
            <div class="c mcenter ccenter g4 o2 o1-lmd w12 w6-lmd hauto">
                <h2 class="i w12 hauto title">Título 2</h2>
                <p class="text-info">Suspendisse eros elit, placerat at rutrum sed, accumsan non nibh. Suspendisse viverra erat lectus, et condimentum libero tincidunt at. Nunc bibendum, purus tempor ultrices pharetra, orci metus efficitur mauris, non imperdiet ex justo sit amet nisl. Nullam rhoncus ipsum id bibendum tristique. Nullam sed mauris quis mauris hendrerit imperdiet. Donec mattis at nunc nec bibendum. Nulla elementum nunc eget erat cursus consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque finibus est diam, ac sollicitudin nisi malesuada vitae. Aliquam suscipit mi vel felis mattis egestas. Integer scelerisque rhoncus malesuada. Nunc sit amet ligula quam. Vivamus vestibulum vestibulum blandit.</p>
            </div>
            <img class="i o1 o2-lmd w12 w6-lmd hauto ns text-center" style="max-width: 32rem;" src="./assets/img/atelier/voluta_violin.webp" alt="(Foto do Elizeu Manoel trabalhando)">
        </div>
    </section>
    <section class="c mcenter ccenter w12 hmin bgDark">
        <div class="c p4 mcenter ccenter g4 w12 w11-lmd w10-hmd w8-llg w6-hlg hauto ns">
            <p class="text-info light" style="font-style: italic;">&ldquo;Ofereço diversos serviços na lutheria, visando obter um excelente resultado, com o uso dos mais sofisticados materiais, ao entender o propósito do músico com seu instrumento, tanto na criação quanto nos ajustes deste.&rdquo;</p>
            <p class="text-info light">&mdash; Elizeu Manoel da Silva &mdash;</p>
        </div>
    </section>
    <span class="marker" id="projects"></span>
    <span class="marker" id="services"></span>
    <section class="c mcenter ccenter w12 hmin bgLight">
        <div class="r mbetween cstretch w12 w11-lmd w10-hmd w8-llg w6-hlg carousel">
            <button class="i wmin hauto ns carousel-previous-button" title="Anterior">
                <svg xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M27.083 36.667 10.417 20 27.083 3.333l2.542 2.584L15.542 20l14.083 14.083Z"/></svg>
            </button>
            <div class="i w12 hauto s carousel-display" data-focused-item="0">
                <ul class="r mevenly ccenter wmax" style="min-width: 100%;">
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto ns card">
                        <img class="i w12 hauto ns text-center" src="./assets/img/atelier/between_violin.webp" alt="" draggable="false">
                            <p class="i text-info p2">Serviço 1</p>
                            <a class="btn-card" href="#contact">CONTRATAR</a>
                        </div>
                    </li>
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto ns card">
                        <img class="i w12 hauto ns text-center" src="./assets/img/atelier/between_violin.webp" alt="" draggable="false">
                            <p class="i text-info p2">Serviço 2</p>
                            <a class="btn-card" href="#contact">CONTRATAR</a>
                        </div>
                    </li>
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto ns card">
                        <img class="i w12 hauto ns text-center" src="./assets/img/atelier/between_violin.webp" alt="" draggable="false">
                            <p class="i text-info p2">Serviço 3</p>
                            <a class="btn-card" href="#contact">CONTRATAR</a>
                        </div>
                    </li>
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto ns card">
                        <img class="i w12 hauto ns text-center" src="./assets/img/atelier/between_violin.webp" alt="" draggable="false">
                            <p class="i text-info p2">Serviço 4</p>
                            <a class="btn-card" href="#contact">CONTRATAR</a>
                        </div>
                    </li>
                </ul>
            </div>
            <button class="i wmin hauto ns carousel-next-button" title="Próximo">
                <svg xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="m12.917 36.625-2.542-2.583 14.083-14.084L10.375 5.833l2.542-2.541 16.666 16.666Z"/></svg>
            </button>
        </div>
    </section>
    <!--<section class="i">
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
    </section>-->
    <span class="marker" id="contact"></span>
    <section class="c mcenter ccenter w12 hauto bgLight">
        <div class="c p4 r-lmd mcenter ccenter cstretch-lmd g4 w12 w11-lmd w10-hmd w8-llg w6-hlg hauto">
            <div class="c mbetween ccenter g4 w12 w6-lmd hauto">
                <h2 class="c mcenter ccenter w12 hauto ns"><img class="i wauto" style="height: 4rem;" src="./assets/img/atelier_logo.svg" alt="Atelier Elizeu Manoel"></h2>
                <hr class="i w12 hauto dark">
                <div class="c mcenter ccenter g2 w12 hauto ns">
                    <h3 class="i w12 hauto title-slin">Whatsapp</h3>
                    <p class="r mstart ccenter g2 w12 hauto text-info"><svg class="i wauto hauto" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15.896 16.979q-2.563-.208-4.834-1.281-2.27-1.073-3.989-2.802-1.719-1.729-2.802-4T3 4.062q-.042-.437.26-.76T4 2.979h2.833q.355 0 .615.209.26.208.344.562l.5 2.229q.041.25-.021.5-.063.25-.25.438L6 8.958q.875 1.584 2.146 2.854Q9.417 13.083 11 13.958l2.062-2q.209-.208.459-.26.25-.052.479-.01l2.229.479q.354.083.563.354.208.271.208.625v2.833q0 .563-.396.792-.396.229-.708.208ZM5.312 7.5l1.459-1.458-.354-1.563H4.542q.104.792.291 1.542.188.75.479 1.479Zm7.167 7.167q.729.291 1.49.468.76.177 1.531.282v-1.875l-1.562-.334ZM5.312 7.5Zm7.167 7.167Z"/></svg>(11) 98787-0977</p>
                    <p class="r mstart ccenter g2 w12 hauto text-info"><svg class="i wauto hauto" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.5 16q-.625 0-1.062-.438Q2 15.125 2 14.5v-9q0-.625.438-1.062Q2.875 4 3.5 4h13q.625 0 1.062.438Q18 4.875 18 5.5v9q0 .625-.438 1.062Q17.125 16 16.5 16Zm6.5-5L3.5 7.271V14.5h13V7.271Zm0-1.771L16.5 5.5h-13ZM3.5 7.271V5.5v9Z"/></svg>atelierElizeuManoel@outlook.com</p>
                </div>
                <hr class="i w12 hauto dark">
                <div class="c mcenter ccenter g2 w12 hauto ns">
                    <h3 class="i w12 hauto title-slin">Horário de Funcionamento</h3>
                    <p class="r mstart ccenter g2 w12 hauto text-info"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.75 11.5q-.312 0-.531-.219Q6 11.062 6 10.75q0-.312.219-.531Q6.438 10 6.75 10q.312 0 .531.219.219.219.219.531 0 .312-.219.531-.219.219-.531.219Zm3.25 0q-.312 0-.531-.219-.219-.219-.219-.531 0-.312.219-.531Q9.688 10 10 10q.312 0 .531.219.219.219.219.531 0 .312-.219.531-.219.219-.531.219Zm3.25 0q-.312 0-.531-.219-.219-.219-.219-.531 0-.312.219-.531.219-.219.531-.219.312 0 .531.219.219.219.219.531 0 .312-.219.531-.219.219-.531.219ZM4.5 18q-.625 0-1.062-.448Q3 17.104 3 16.5v-11q0-.604.438-1.052Q3.875 4 4.5 4H6V2h1.5v2h5V2H14v2h1.5q.625 0 1.062.448Q17 4.896 17 5.5v11q0 .604-.438 1.052Q16.125 18 15.5 18Zm0-1.5h11V9h-11v7.5Zm0-9h11v-2h-11Zm0 0v-2 2Z"/></svg>Segunda a sexta, das 8h às 17h</p>
                    <p class="r mstart ccenter g2 w12 hauto text-info"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.75 11.5q-.312 0-.531-.219Q6 11.062 6 10.75q0-.312.219-.531Q6.438 10 6.75 10q.312 0 .531.219.219.219.219.531 0 .312-.219.531-.219.219-.531.219Zm3.25 0q-.312 0-.531-.219-.219-.219-.219-.531 0-.312.219-.531Q9.688 10 10 10q.312 0 .531.219.219.219.219.531 0 .312-.219.531-.219.219-.531.219Zm3.25 0q-.312 0-.531-.219-.219-.219-.219-.531 0-.312.219-.531.219-.219.531-.219.312 0 .531.219.219.219.219.531 0 .312-.219.531-.219.219-.531.219ZM4.5 18q-.625 0-1.062-.448Q3 17.104 3 16.5v-11q0-.604.438-1.052Q3.875 4 4.5 4H6V2h1.5v2h5V2H14v2h1.5q.625 0 1.062.448Q17 4.896 17 5.5v11q0 .604-.438 1.052Q16.125 18 15.5 18Zm0-1.5h11V9h-11v7.5Zm0-9h11v-2h-11Zm0 0v-2 2Z"/></svg>Sábado, das 9h às 12h</p>
                </div>
                <hr class="i w12 hauto dark">
            </div>
            <div class="c mcenter ccenter g4 w12 w6-lmd hauto">
                <p class="i w12 hauto ns text-info text-center"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10 10.042q.708 0 1.208-.5t.5-1.209q0-.708-.5-1.208T10 6.625q-.708 0-1.208.5t-.5 1.208q0 .709.5 1.209.5.5 1.208.5ZM10 16q2.521-2.312 3.719-4.177 1.198-1.865 1.198-3.323 0-2.271-1.417-3.677-1.417-1.406-3.5-1.406T6.5 4.823Q5.083 6.229 5.083 8.5q0 1.458 1.198 3.323T10 16Zm0 2.333q-3.354-2.895-5.01-5.312Q3.333 10.604 3.333 8.5q0-3.146 2-4.99 2-1.843 4.667-1.843t4.667 1.843q2 1.844 2 4.99 0 2.104-1.657 4.521-1.656 2.417-5.01 5.312ZM10 8.5Z"/></svg> Rua Jaboticabeiras, 52 - Vila Sirena 07051-070 Guarulhos/SP</p>
                <iframe class="i" style="border:0; min-height: 450px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1118.6813634462094!2d-46.54722453538345!3d-23.46625868680038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef5719bad7fe1%3A0xca2fd76155a45ced!2sR.%20Jaboticabeira%2C%2052%20-%20Vila%20Sirena%2C%20Guarulhos%20-%20SP%2C%2007051-070!5e1!3m2!1spt-BR!2sbr!4v1662776367692!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-------------------------------------------------------RODAPÉ----------------------------------------------------->
    <footer class="i" id="main-footer">
        <section class="r-hmd c-lsm ccenter-lsm mevenly-lsm bgDark w12-lsm " >
            <div class="r w2-hmd w12-lsm " style="height: 300px;">
                <div class="c mstart w12 p-footer" >
                    <img src="./assets/img/atelier_logo.svg" alt="logo-Atelier" class="w10 w12-lsm">
                    <p class="r no-overflow text-info-alter">
                        Ofereço diversos serviços na lutheria, visando obter um excelente resultado, com o
                        uso dos mais sofisticados materiais, ao entender o propósito do músico com seu
                        instrumento, tanto na criação quanto nos ajustes deste.
                    </p> 
                </div>
            </div>
            <div class="c w3-hmd w12-lsm gap-1 p-footer ccenter-lsm mcenter-lsm mstart-hmd " style="height: 200px;">
                <h3 class="r mcenter ccenter title-alter">REGISTER NOW</h3>
                <div class="r ccenter mcenter gap-1">
                    <input class="sign" type="text" placeholder="Please enter your e-mail" >
                    <input class="button-sign" type="button" value="Sign Up">
                </div>
            </div>
            <div class="r w2-hmd w12-lsm p-footer " >
                <div class="c w12-lsm ccenter-lsm cstart-hmd ">
                    <h3 class="r-lsm m-b-footer title-alter mcenter-lsm mstart-hmd">MENU LINKS</h3>
                    <ul class="c gap-2 no-overflow ">
                        <li><a class="link-footer" href="#atelier">ATELIER</a></li>
                        <li><a class="link-footer" href="#projects">PROJETOS</a></li>
                        <li><a class="link-footer" href="#services">SERVIÇOS</a></li>
                        <li><a class="link-footer" href="#contact">CONTATO</a></li>
                        <li><a class="link-footer" href="<?="$ROOT_PATH/login.php"?>">LOGIN</a></li>
                    </ul>
                </div>
            </div>
            <div class="r w3-hmd w12-lsm p-footer " >
                <div class="c gap-3 ">
                    <h3 class="r mcenter ccenter title-alter">CONTACT US</h3>
                    <div class="r ccenter gap-1 text-info-alter">
                        <img src="./assets/img/phone-call-min.png" alt="" class="icon-footer">
                        <p>(11) 98787-0977</p>
                    </div>
                    <div class="r ccenter gap-1 text-info-alter">
                        <img src="./assets/img/email-min.png" alt="" class="icon-footer">
                        <p>atelierElizeuManoel@outlook.com</p>
                    </div>
                    <div class="r ccenter gap-1 text-info-alter">
                        <img src="./assets/img/home-min.png" alt="" class="icon-footer">
                        <p>Rua Jaboticabeiras, 52 - Vila Sirena 07051-070</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="r ccenter maround w12-lsm bgDark blur-effect " style="height: 100px;">
            <div>
                <p class="text-info-alter">© 2022 Copyright: <span class="title-alter">TEA</span> </p>
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
    <a class="whatsapp-button" id="whatsapp-button" href="https://api.whatsapp.com/send?phone=5511960995554&text=Boa%20tarde!%20Gostaria%20de%20mais%20informações" target="_blank" title="Contato por Whatsapp">
        <img class="i" src="./assets/img/whatsapp_logo.png" alt="Whatsapp">
    </a>
    <script src="./assets/js/main.js"></script>
</body>
</html>