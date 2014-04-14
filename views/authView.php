<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <link type="text/css" rel="stylesheet" href="/system/ui/styles/style.css" />
            <title>Авторизация</title>
        </head>
<body>
    <div id="container_login">
        <img id="main_back_l" src="/system/ui/images/main_login.png">
        <img id="main_head_l" src="/system/ui/images/h_login.png">
        <img id="in_base_l" src="/system/ui/images/input_base.png">
        <form method="post" action=""  name="auth_form">
        <span id="h_tit_l">АВТОРИЗАЦИЯ</span><br/>
            <input type="text" id="login_ko" name="login_ko" placeholder="введите логин"/><br/>
            <input type="password" id="pass_ko" name="pass_ko" placeholder="введите пароль"><br/>
            <img id="cap_ko_img" src="/cap/" />
            <input type="text" id="cap_ko" name="cap_ko"  placeholder="введите капчу" />
            <input type="submit" id="accept_ko" name="accept_ko" value="Войти"/>
            <input type="submit" id="go_ko" name="go_ko" value="Перейти к регистрации"/>
        </form>

    </div>
    <span><?php echo $c; ?></span>
</body>
    </html>