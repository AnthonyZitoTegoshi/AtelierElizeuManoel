<?php

require_once(__DIR__ . "/etc/conf.php");
require_once(__DIR__ . "/etc/autoload.php");

$isValidEmail = TRUE;
$isValidPassword = TRUE;
$isValidLogin = FALSE;

$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

$sentForm = isset($_POST["email"]) && isset($_POST["password"]);


if ($sentForm) {
    $isValidEmail = InputHelper::isValidEmail($email);
    $isValidPassword = InputHelper::isValidPassword($password);



    if ($isValidEmail && $isValidPassword) {
        $connection = new DatabaseConnection();
        $userDao = new UserDao();
        $userDao->setComplement("WHERE " . $userDao->getFields()[2] . " = \"$email\"");
        $result = $connection->query($userDao->readQuery(array($userDao->getFields()[0])));
        
        if (count($result) == 1) {
            $userId = $result[0][0];
            $hashedPassword = HashHelper::encrypt($password, $userId);
            $userDao->setComplement("WHERE " . $userDao->getFields()[2] . " = \"$email\" AND " . $userDao->getFields()[3] . " = \"$hashedPassword\"");
            if (count($connection->query($userDao->readQuery())) == 1) {
                // !change: Não permitir mais de um token pro mesmo usuário
                //$userDao->setComplement("WHERE". $userDao->getFields()[4]. " = \"\"")
                $tokenId = GenerateHelper::randomId();
                $token = GenerateHelper::randomToken();
                $hashedToken = HashHelper::encrypt($token, substr($token, 0, 12));
                $expireDate = new DateTime();
                $expireInterval = new DateInterval("P3D");
                $expireDate->add($expireInterval);
                $loginModel = new LoginModel($tokenId, $userId, $hashedToken, $expireDate->format(ConstantsHelper::getDefaultDateTimeFormat()));
                $loginDao = new LoginDao($loginModel->getValues());
                if ($connection->query($loginDao->createQuery())) {
                    setcookie("TOKEN", $token, time() + 60 * 60 * 24 * 3, $_SESSION["CONFIGURATION"]->getCookiesPath(), $_SESSION["CONFIGURATION"]->getCookiesDomain(), $_SERVER["HTTP_HOST"] == "localhost" ? FALSE : TRUE);
                    header("Location: " . $_SESSION["CONFIGURATION"]->getRootPath());
                }
                $isValidLogin = TRUE;
                
            }
        }
    }
} else {
    // !change: Fazer ficar reutilizável aqui
    if (isset($_COOKIE["TOKEN"])) {
        $token = $_COOKIE["TOKEN"];
        $hashedToken = HashHelper::encrypt($token, substr($token, 0, 12));
        $connection = new DatabaseConnection();
        $loginDao = new LoginDao();
        $loginDao->setComplement("WHERE " . $loginDao->getFields()[2] . " = \"$hashedToken\"");
        $result = $connection->query($loginDao->readQuery(array($loginDao->getFields()[3])));
        if (count($result) == 1) {
            $expireDate = DateTime::createFromFormat(ConstantsHelper::getDefaultDateTimeFormat(), $result[0][0]);
            if (DateTimeHelper::compare($expireDate, new DateTime()) >= 0) {
                header("Location: " . $_SESSION["CONFIGURATION"]->getRootPath());
            }
            $isValidLogin = TRUE;
        }
    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/structure.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="shortcut icon" href="./assets/img/atelier_logo_tiny.svg" type="image/svg+xml">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Atelier Elizeu Manoel - Login</title>
</head>
<body style="overflow: hidden;">
    <span class="r mcenter ccenter w12 h12" id="loading-screen">
        <img src="./assets/img/loading.gif" style="height: 8rem;" draggable="false">
    </span>
    <main id="login-main-banner" class="c mcenter ccenter w12">
        <section class="c p4 mcenter ccenter cstart-lmd w12 w8-lmd w7-hmd w6-llg w5-hlg ovisible">
            <div class="c mcenter ccenter g2 wauto hauto">
                <a class="i w12 bgLight main-menu-link" style="border-radius: 20px;" href="<?=$_SESSION["CONFIGURATION"]->getRootPath() . "/#home"?>"><img class="i w12" style="height: 4rem;" src="./assets/img/atelier_logo.svg" alt="Atelier Elizeu Manoel"></a>
                <form class="c p4 mcenter ccenter g4 w12 hauto bgLight" style="border-radius: 20px;" action="<?=$_SESSION["CONFIGURATION"]->getRootPath() . "/login.php"?>" method="POST">
                    <div class="c mcenter ccenter w12 hauto">
                        <svg xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M9.417 29.083q2.458-1.75 5.062-2.729 2.604-.979 5.521-.979t5.542.979q2.625.979 5.083 2.729Q32.333 27 33.104 24.75q.771-2.25.771-4.75 0-5.875-4-9.875t-9.875-4q-5.875 0-9.875 4t-4 9.875q0 2.5.792 4.75.791 2.25 2.5 4.333ZM20 21.375q-2.417 0-4.083-1.667-1.667-1.666-1.667-4.083 0-2.417 1.667-4.083Q17.583 9.875 20 9.875q2.417 0 4.083 1.667 1.667 1.666 1.667 4.083 0 2.458-1.667 4.104-1.666 1.646-4.083 1.646Zm0 15.292q-3.417 0-6.458-1.313-3.042-1.312-5.313-3.583t-3.583-5.292Q3.333 23.458 3.333 20t1.313-6.479Q5.958 10.5 8.229 8.229t5.292-3.583Q16.542 3.333 20 3.333t6.479 1.313q3.021 1.312 5.292 3.583t3.583 5.292q1.313 3.021 1.313 6.479 0 3.417-1.313 6.458-1.312 3.042-3.583 5.313t-5.292 3.583Q23.458 36.667 20 36.667Zm0-2.792q2.25 0 4.375-.646t4.083-2.187q-1.958-1.375-4.083-2.125T20 28.167q-2.25 0-4.375.75t-4.083 2.125q1.958 1.541 4.083 2.187 2.125.646 4.375.646Zm0-15.25q1.292 0 2.125-.833.833-.834.833-2.167 0-1.292-.833-2.125T20 12.667q-1.292 0-2.125.833t-.833 2.125q0 1.333.833 2.167.833.833 2.125.833Zm0-3Zm0 15.417Z"/></svg>
                        <p class="text-info" style="text-indent: 0;">LOGIN</p>
                    </div>
                    <div class="error" style="display: <?= $sentForm && $isValidEmail && $isValidPassword && !$isValidLogin ? "block": "none" ?>">Email e/ou senha inválidos!</div>
                    <label class="r mcenter ccenter g1 w12 hauto <?=$isValidEmail ? "text-input-wrapper" : "text-input-wrapper-error"?>" for="email">
                        <svg class="i wauto hauto ovisible" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.5 16q-.625 0-1.062-.438Q2 15.125 2 14.5v-9q0-.625.438-1.062Q2.875 4 3.5 4h13q.625 0 1.062.438Q18 4.875 18 5.5v9q0 .625-.438 1.062Q17.125 16 16.5 16Zm6.5-5L3.5 7.271V14.5h13V7.271Zm0-1.771L16.5 5.5h-13ZM3.5 7.271V5.5v9Z"/></svg>
                        <input class="i text-input" type="email" name="email" id="email" placeholder="Email" value="<?=$email?>" required tabindex="1">
                    </label>
                    <div class="error" id="email-error">E-mail inválido</div>
                    <div class="error" id="email-required">E-mail é obrigatório</div>
                    
                    <div class="c mcenter cend g1 w12 hauto ovisible">
                        <label class="r mcenter ccenter g1 w12 hauto <?=$isValidPassword ? "text-input-wrapper" : "text-input-wrapper-error"?>" for="password">
                            <svg class="i wauto hauto ovisible" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 15v-1.5h16V15Zm.896-4.917-1.292-.75.604-1.041H1v-1.5h1.208L1.604 5.75 2.896 5 3.5 6.042 4.104 5l1.292.75-.604 1.042H6v1.5H4.792l.604 1.041-1.292.75L3.5 9.042Zm6.5 0-1.292-.75.604-1.041H7.5v-1.5h1.208L8.104 5.75 9.396 5 10 6.042 10.604 5l1.292.75-.604 1.042H12.5v1.5h-1.208l.604 1.041-1.292.75L10 9.042Zm6.5 0-1.292-.75.604-1.041H14v-1.5h1.208l-.604-1.042L15.896 5l.604 1.042L17.104 5l1.292.75-.604 1.042H19v1.5h-1.208l.604 1.041-1.292.75-.604-1.041Z"/></svg>
                            <input class="i text-input" type="password" name="password" id="password" placeholder="Senha" required tabindex="2">
                        </label>
                        <a class="i wauto hauto ovisible forgot-password-link" href="<?=$_SESSION["CONFIGURATION"]->getRootPath() . "/#home"?>" tabindex="4">Esqueci minha senha</a>
                    </div>
                    <input class="i submit-button" type="submit" value="Login" tabindex="3">
                </form>
            </div>
        </section>
    </main>
    <script src="./assets/js/main.js"></script>
</body>
</html>