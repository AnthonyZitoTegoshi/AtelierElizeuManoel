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
    <div class="marker" id="home"></div>
    <header class="c mcenter ccenter w12 ns" id="main-banner">
        <span style="min-height: calc(4rem + 40px);"></span>
        <div class="c p4 mcenter ccenter g4 w12 ns">
            <div class="bgLight" style="height: 8rem; width: 8rem; border-radius: 100%;" >
                <p></p>
            </div>
            <!--<img src="./assets/img/Asset-104.png" style="height: 8rem;">-->
            <h2 class="text-center light">ATELIER ELIZEU MANOEL</h2>
            <a class="btn-banner" href="#contact">Contato</a>
        </div>
    </header>
    <div class="marker" id="atelier"></div>
    <section class="c mcenter ccenter g4 w12 hmin bgLight">
        <div class="c r-lmd p4 mcenter ccenter cstart-lmd g4 w12 w11-lmd w10-hmd w8-llg w6-hlg ns">
            <img class="i w12 w6-lmd hauto ns text-center" style="max-width: 32rem;" src="./assets/img/atelier/look_violin.webp" alt="(Foto do Elizeu Manoel trabalhando)">
            <div class="c mcenter ccenter g4 w12 w6-lmd hauto">
                <h2 class="i w12 hauto title">Atelier Elizeu Manoel</h2>
                <p class="text-info">Refinamento e classe: os motivos que encontrei para a excelência do meu trabalho. Procuro ser um especialista onde atuo, principalmente na criação e ajustes de violinos, violoncellos e violas. Venho me aperfeiçoando no ramo da lutheria há mais de 5 anos e, muito provavelmente, a consistência e o amor pelo trabalho têm me feito um dos melhores que conheço na cidade.</p>
            </div>
        </div>
        <div class="c r-lmd p4 mcenter ccenter cstart-lmd g4 w12 w11-lmd w10-hmd w8-llg w6-hlg ns">
            <div class="c mcenter ccenter g4 o2 o1-lmd w12 w6-lmd hauto">
                <h2 class="i w12 hauto title">Honra de servir à música</h2>
                <p class="text-info">Atenção, meticulosidade, inspiração, harmonia... É como se a música fosse um guia, um caminho na minha vida. E ser responsável pela criação dos instrumentos que a produzem é, definitivamente, é a maior honra que poderia ter. Este sou eu, preparado para solucionar qualquer problema que você tenha no seu instrumento...</p>
            </div>
            <img class="i o1 o2-lmd w12 w6-lmd hauto ns text-center" style="max-width: 32rem;" src="./assets/img/atelier/voluta_violin.webp" alt="(Foto do Elizeu Manoel trabalhando)">
        </div>
    </section>
    <section class="c mcenter ccenter w12 hmin bgDark">
        <div class="c p4 mcenter ccenter g4 w12 w11-lmd w10-hmd w8-llg w6-hlg hauto ns">
            <p class="text-info light" style="font-style: italic;">&ldquo;Visando a excelência, ofereço os mais variados serviços na lutheria com o uso dos mais sofisticados materiais. Reconheço o propósito do músico com seu instrumento e estou disposto a colaborar tanto com a criação quanto com os ajustes necessários nessa jornada.&rdquo;</p>
            <p class="text-info light">&mdash; Elizeu Manoel da Silva &mdash;</p>
        </div>
    </section>
    <div class="marker" id="projects"></div>
    <div class="marker" id="services"></div>
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
                            <a class="btn-card" href="#contact" draggable="false">CONTRATAR</a>
                        </div>
                    </li>
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto ns card">
                        <img class="i w12 hauto ns text-center" src="./assets/img/atelier/between_violin.webp" alt="" draggable="false">
                            <p class="i text-info p2">Serviço 2</p>
                            <a class="btn-card" href="#contact" draggable="false">CONTRATAR</a>
                        </div>
                    </li>
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto ns card">
                        <img class="i w12 hauto ns text-center" src="./assets/img/atelier/between_violin.webp" alt="" draggable="false">
                            <p class="i text-info p2">Serviço 3</p>
                            <a class="btn-card" href="#contact" draggable="false">CONTRATAR</a>
                        </div>
                    </li>
                    <li class="carousel-item" style="width: 16rem;">
                        <div class="c mcenter ccenter wauto hauto ns card">
                        <img class="i w12 hauto ns text-center" src="./assets/img/atelier/between_violin.webp" alt="" draggable="false">
                            <p class="i text-info p2">Serviço 4</p>
                            <a class="btn-card" href="#contact" draggable="false">CONTRATAR</a>
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
    <div class="marker" id="contact"></div>
    <section class="c mcenter ccenter w12 hauto bgLight">
        <div class="c p4 r-lmd mcenter ccenter cstretch-lmd g4 w12 w11-lmd w10-hmd w8-llg w6-hlg hauto">
            <div class="c mbetween ccenter g4 w12 w6-lmd hauto">
                <h2 class="c mcenter ccenter w12 hauto ns"><img class="i wauto" style="height: 4rem;" src="./assets/img/atelier_logo.svg" alt="Atelier Elizeu Manoel"></h2>
                <hr class="i w12 hauto dark">
                <div class="c mcenter ccenter g2 w12 hauto ns">
                    <h3 class="i w12 hauto title-slin">Whatsapp</h3>
                    <p class="r mstart ccenter g2 w12 hauto text-info"><svg class="i wauto hauto" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15.896 16.979q-2.563-.208-4.834-1.281-2.27-1.073-3.989-2.802-1.719-1.729-2.802-4T3 4.062q-.042-.437.26-.76T4 2.979h2.833q.355 0 .615.209.26.208.344.562l.5 2.229q.041.25-.021.5-.063.25-.25.438L6 8.958q.875 1.584 2.146 2.854Q9.417 13.083 11 13.958l2.062-2q.209-.208.459-.26.25-.052.479-.01l2.229.479q.354.083.563.354.208.271.208.625v2.833q0 .563-.396.792-.396.229-.708.208ZM5.312 7.5l1.459-1.458-.354-1.563H4.542q.104.792.291 1.542.188.75.479 1.479Zm7.167 7.167q.729.291 1.49.468.76.177 1.531.282v-1.875l-1.562-.334ZM5.312 7.5Zm7.167 7.167Z"/></svg>(11) 96099-5554</p>
                    <p class="r mstart ccenter g2 w12 hauto text-info"><svg class="i wauto hauto" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.5 16q-.625 0-1.062-.438Q2 15.125 2 14.5v-9q0-.625.438-1.062Q2.875 4 3.5 4h13q.625 0 1.062.438Q18 4.875 18 5.5v9q0 .625-.438 1.062Q17.125 16 16.5 16Zm6.5-5L3.5 7.271V14.5h13V7.271Zm0-1.771L16.5 5.5h-13ZM3.5 7.271V5.5v9Z"/></svg>atelierelizeumanoel@gmail.com</p>
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
                <p class="i w12 hauto ns text-info text-center"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10 10.042q.708 0 1.208-.5t.5-1.209q0-.708-.5-1.208T10 6.625q-.708 0-1.208.5t-.5 1.208q0 .709.5 1.209.5.5 1.208.5ZM10 16q2.521-2.312 3.719-4.177 1.198-1.865 1.198-3.323 0-2.271-1.417-3.677-1.417-1.406-3.5-1.406T6.5 4.823Q5.083 6.229 5.083 8.5q0 1.458 1.198 3.323T10 16Zm0 2.333q-3.354-2.895-5.01-5.312Q3.333 10.604 3.333 8.5q0-3.146 2-4.99 2-1.843 4.667-1.843t4.667 1.843q2 1.844 2 4.99 0 2.104-1.657 4.521-1.656 2.417-5.01 5.312ZM10 8.5Z"/></svg>Rua Jaboticabeiras, 52 - Vila Sirena 07051-070 - Guarulhos/SP</p>
                <iframe class="i" style="border:0; min-height: 450px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1118.6813634462094!2d-46.54722453538345!3d-23.46625868680038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef5719bad7fe1%3A0xca2fd76155a45ced!2sR.%20Jaboticabeira%2C%2052%20-%20Vila%20Sirena%2C%20Guarulhos%20-%20SP%2C%2007051-070!5e1!3m2!1spt-BR!2sbr!4v1662776367692!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-------------------------------------------------------RODAPÉ----------------------------------------------------->
    <footer class="c mcenter ccenter w12 hauto bgDark" id="main-footer">
    <section class="r-hmd c-lsm ccenter-lsm mevenly-lsm bgDark w12-lsm " >
        <div class="r w2-hmd w12-lsm w6-lmd" style="height: 300px;">
                <div class="c-lsm mstart ccenter w12 p-footer" >
                    <a class="i wmax hauto main-menu-link" href="#home"><img class="i wauto" style="height: 4rem;" src="./assets/img/atelier_logo_light.svg" alt="Atelier Elizeu Manoel"></a>
                    <p class="r no-overflow text-info-alter">&ldquo;Visando a excelência, ofereço os mais variados serviços na lutheria com o uso dos mais sofisticados materiais. Reconheço o propósito do músico com seu instrumento e estou disposto a colaborar tanto com a criação quanto com os ajustes necessários nessa jornada.&rdquo;</p>
                </div>
            </div>
            <div class="c w3-hmd w12-lsm gap-3 p-footer ccenter-lsm mcenter-lsm mstart-hmd " style="height: 200px;">
                <h3 class="r mcenter ccenter title-alter no-overflow">REGISTER NOW</h3>
                <div class="c-lsm r-lmd ccenter mcenter g2-lmd g3-lsm">
                    <input class="sign input-min" type="text" placeholder="Please enter your e-mail" >
                    <input class="button-sign bgLight btn-min"type="button" value="Sign Up">
                </div>
            </div>
            <div class="r w2-hmd w12-lsm p-footer p4-lsm p1-hmd " style="height: 300px;" >
                <div class="c w12-lsm ccenter-lsm cstart-hmd m-top">
                    <h3 class="r-lsm m-b-footer title-alter mcenter-lsm mstart-hmd">MENU LINKS</h3>
                    <ul class="c gap-2 no-overflow">
                        <li><a class="link-footer" href="#atelier">ATELIER</a></li>
                        <li><a class="link-footer" href="#projects">PROJETOS</a></li>
                        <li><a class="link-footer" href="#services">SERVIÇOS</a></li>
                        <li><a class="link-footer" href="#contact">CONTATO</a></li>
                        <li><a class="link-footer" href="<?="$ROOT_PATH/login.php"?>">LOGIN</a></li>
                    </ul>
                </div>
            </div>
            <div class="r w4-hmd w3-llg w12-lsm p-footer p4-lsm p1-hmd p4-lmd mcenter-lmd ccenter-hsm mcenter-hsm" >
                <div class="c-lsm gap-3 w12-lmd ccenter-lmd c-hmd  ">
                    <h3 class="r mcenter ccenter title-alter ">CONTACT US</h3>
                    <section class="c-lsm mcenter-lsm g3-lsm">
                        <div class="r ccenter gap-1 ">
                            <svg class="i wauto hauto" xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="light"><path d="M15.896 16.979q-2.563-.208-4.834-1.281-2.27-1.073-3.989-2.802-1.719-1.729-2.802-4T3 4.062q-.042-.437.26-.76T4 2.979h2.833q.355 0 .615.209.26.208.344.562l.5 2.229q.041.25-.021.5-.063.25-.25.438L6 8.958q.875 1.584 2.146 2.854Q9.417 13.083 11 13.958l2.062-2q.209-.208.459-.26.25-.052.479-.01l2.229.479q.354.083.563.354.208.271.208.625v2.833q0 .563-.396.792-.396.229-.708.208ZM5.312 7.5l1.459-1.458-.354-1.563H4.542q.104.792.291 1.542.188.75.479 1.479Zm7.167 7.167q.729.291 1.49.468.76.177 1.531.282v-1.875l-1.562-.334ZM5.312 7.5Zm7.167 7.167Z"/></svg>
                            <p class="text-info-alter">(11) 96099-5554</p>
                        </div>
                        <div class="r ccenter gap-1 ">
                            <svg class="i wauto hauto" xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="light"><path d="M3.5 16q-.625 0-1.062-.438Q2 15.125 2 14.5v-9q0-.625.438-1.062Q2.875 4 3.5 4h13q.625 0 1.062.438Q18 4.875 18 5.5v9q0 .625-.438 1.062Q17.125 16 16.5 16Zm6.5-5L3.5 7.271V14.5h13V7.271Zm0-1.771L16.5 5.5h-13ZM3.5 7.271V5.5v9Z"/></svg>
                            <p class="text-info-alter">atelierelizeumanoel@gmail.com</p>
                        </div>
                        <div class="r ccenter gap-1 ">
                            <svg class="i wauto hauto" xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="light"><path d="M10 10.042q.708 0 1.208-.5t.5-1.209q0-.708-.5-1.208T10 6.625q-.708 0-1.208.5t-.5 1.208q0 .709.5 1.209.5.5 1.208.5ZM10 16q2.521-2.312 3.719-4.177 1.198-1.865 1.198-3.323 0-2.271-1.417-3.677-1.417-1.406-3.5-1.406T6.5 4.823Q5.083 6.229 5.083 8.5q0 1.458 1.198 3.323T10 16Zm0 2.333q-3.354-2.895-5.01-5.312Q3.333 10.604 3.333 8.5q0-3.146 2-4.99 2-1.843 4.667-1.843t4.667 1.843q2 1.844 2 4.99 0 2.104-1.657 4.521-1.656 2.417-5.01 5.312ZM10 8.5Z"/></svg>
                            <p class="text-info-alter">Rua Jaboticabeiras, 52 - Vila Sirena 07051-070 - Guarulhos/SP</p>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <section class="c mcenter ccenter w12 hauto blur-effect">
            <div class="c r-lmd p4 mcenter mbetween-lmd ccenter g4 w12 w11-lmd w10-hmd w8-llg w6-hlg hauto">
                <p class="i wauto hauto o2 o1-lmd text-info text-center light">Copyright <a class="text-info-alter" href="https://projetos.talentosdoifsp.gru.br/tea/" target="blank">TEA</a> &copy; 2022 (icons by <a class="text-info-alter" href="https://icons8.com/" target="blank">ICONS8</a>)</p>
                <aside class="r mcenter ccenter g2 wauto hauto wrap o1 o2-lmd">
                    <a target="blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 30 30" fill="light"><path d="M15,3C8.373,3,3,8.373,3,15c0,6.016,4.432,10.984,10.206,11.852V18.18h-2.969v-3.154h2.969v-2.099c0-3.475,1.693-5,4.581-5 c1.383,0,2.115,0.103,2.461,0.149v2.753h-1.97c-1.226,0-1.654,1.163-1.654,2.473v1.724h3.593L19.73,18.18h-3.106v8.697 C22.481,26.083,27,21.075,27,15C27,8.373,21.627,3,15,3z"></path></svg></a>
                    <a target="blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 30 30" fill="light"><path d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M10.496,8.403 c0.842,0,1.403,0.561,1.403,1.309c0,0.748-0.561,1.309-1.496,1.309C9.561,11.022,9,10.46,9,9.712C9,8.964,9.561,8.403,10.496,8.403z M12,20H9v-8h3V20z M22,20h-2.824v-4.372c0-1.209-0.753-1.488-1.035-1.488s-1.224,0.186-1.224,1.488c0,0.186,0,4.372,0,4.372H14v-8 h2.918v1.116C17.294,12.465,18.047,12,19.459,12C20.871,12,22,13.116,22,15.628V20z"></path></svg></a>
                    <a target="blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 30 30" fill="light"><path d="M 15 2 C 7.832 2 2 7.832 2 15 C 2 22.168 7.832 28 15 28 C 22.168 28 28 22.168 28 15 C 28 7.832 22.168 2 15 2 z M 11.666016 6 L 18.332031 6 C 21.457031 6 24 8.5420156 24 11.666016 L 24 18.332031 C 24 21.457031 21.457984 24 18.333984 24 L 11.667969 24 C 8.5429688 24 6 21.457984 6 18.333984 L 6 11.667969 C 6 8.5429688 8.5420156 6 11.666016 6 z M 11.666016 8 C 9.6450156 8 8 9.6459688 8 11.667969 L 8 18.333984 C 8 20.354984 9.6459688 22 11.667969 22 L 18.333984 22 C 20.354984 22 22 20.354031 22 18.332031 L 22 11.666016 C 22 9.6450156 20.354031 8 18.332031 8 L 11.666016 8 z M 19.667969 9.6660156 C 20.035969 9.6660156 20.333984 9.9640312 20.333984 10.332031 C 20.333984 10.700031 20.035969 11 19.667969 11 C 19.299969 11 19 10.700031 19 10.332031 C 19 9.9640312 19.299969 9.6660156 19.667969 9.6660156 z M 15 10 C 17.757 10 20 12.243 20 15 C 20 17.757 17.757 20 15 20 C 12.243 20 10 17.757 10 15 C 10 12.243 12.243 10 15 10 z M 15 12 A 3 3 0 0 0 15 18 A 3 3 0 0 0 15 12 z"></path></svg></a>
                    <a target="blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 30 30" fill="light"><path d="M24,4H6C4.895,4,4,4.895,4,6v18c0,1.105,0.895,2,2,2h18c1.105,0,2-0.895,2-2V6C26,4.895,25.104,4,24,4z M22.689,13.474 c-0.13,0.012-0.261,0.02-0.393,0.02c-1.495,0-2.809-0.768-3.574-1.931c0,3.049,0,6.519,0,6.577c0,2.685-2.177,4.861-4.861,4.861 C11.177,23,9,20.823,9,18.139c0-2.685,2.177-4.861,4.861-4.861c0.102,0,0.201,0.009,0.3,0.015v2.396c-0.1-0.012-0.197-0.03-0.3-0.03 c-1.37,0-2.481,1.111-2.481,2.481s1.11,2.481,2.481,2.481c1.371,0,2.581-1.08,2.581-2.45c0-0.055,0.024-11.17,0.024-11.17h2.289 c0.215,2.047,1.868,3.663,3.934,3.811V13.474z"></path></svg></a>
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