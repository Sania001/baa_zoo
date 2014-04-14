<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="/system/ui/styles/style.css" />
    <link type="text/css" rel="stylesheet" href="/system/ui/styles/jquery.fancybox-1.3.4.css" />
    <script type="text/javascript" src="/system/ui/js/jquery.min.js"></script>
    <script type="text/javascript" src="/system/ui/js/jquery.fancybox-1.3.4.js"></script>
    <script type="text/javascript" src="/system/ui/js/jquery.blockUI.js"></script>
    <script type="text/javascript" src="/system/ui/js/function.js"></script>
    <script type="text/javascript" src="/system/ui/js/open.js"></script>
    <title>Регистрация</title>
</head>
<body>
<section id="main_up">
    <h2>Регистрация</h2>
    <div id="growlUI" style="display:block; font-weight: bold; color:white;">
        <?php echo $data; ?>
    </div>
    <div id="regPlace">
    <form method="post" action="/reg/">
        <!--<span>Имя:</span> --><input id="name_r" name="name_r"  placeholder="введите имя"/><br/>
        <!--<span>Фамилия:</span> --><input id="fam_r" name="fam_r" placeholder="введите фамилию"/><br/>
        <!--<span>Отчество:</span> --><input id="otch_r" name="otch_r" placeholder="введите отчество"/><br/>
        <!--<span>Логин:</span>--> <input id="login_r" name="login_r" placeholder="введите логин"/><br/>
        <!--<span>Пароль:</span> --><input id="pass_r" name="pass_r" placeholder="введите пароль"/><br/>
        <!--<span>Повторить пароль:</span>--> <input id="checkpass_r" placeholder="подтвердите пароль" name="checkpass_r"/><br/>
        <img id="cap_img_r" src="/cap/" /><br/>
        <!-- <span>Ответ: </span>--><input id="cap_r" name="cap_r" placeholder="введите данные на картинки"/><br/>
        <!--<span>Роль:</span>--><select id="role_r" name="role_r">
            <option value=""></option>
            <option value="ko_agent_photografer">Фотограф</option>
            <option value="ko_agent_handler">Обработчик</option>
        </select><br/>
        <input type="submit" id="reg_r"  id="1" onclick="Work()" value="Зарегистрироваться" name="reg_r"/>
    </form>
    </div>
</section>
</body>
</html>