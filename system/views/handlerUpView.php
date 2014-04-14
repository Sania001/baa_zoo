<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="/system/ui/styles/style.css" />
    <link type="text/css" rel="stylesheet" href="/system/ui/styles/jquery.fancybox-1.3.4.css" />
    <script type="text/javascript" src="/system/ui/js/jquery.min.js"></script>
    <script type="text/javascript" src="/system/ui/js/jquery.fancybox-1.3.4.js"></script>
    <script type="text/javascript" src="/system/ui/js/open.js"></script>
    <title>Менеджер загрузки</title>
</head>
<body>

<section id="main_up">
    <section class="leftmenu">
        <input type="button" value="Загрузчик" onclick="GoUpload_now()" name="GoUpload" /><br/>
        <input type="submit" value="В работе" onclick="GoInWork_now()" name="GoInWork" /><br/>
        <input type="submit" value="Биллинг" onclick="GoBilling_now()" name="GoBilling" /><br/>
        <input type="submit" value="Фотобаза" onclick="GoPhotoBase_now()" name="GoPhotoBase" /><br/>
        <input type="submit" value="Выйти" onclick="LogOut_now()" name="LogOut" /><br/>
    </section>
    <h2 style="text-align: left;">Загрузить фото</h2>

    <form name="upload" action="" method="post" enctype="multipart/form-data">
        <a id="pre_foto_up" href="<?php echo $path ?>">
            <img  id="foto_up" alt="" name="pre_up" src="<?php echo $path ?>" />
        </a><br/>
        <div class="fileform">
            <div class="selectbutton">Обзор</div>
            <input id="upload" type="file" name="upload"  />
        </div>
        <input type="submit" id="upload_ok" name="upload_ok" value="Загрузить">
    </form>
</section>
</body>
</html>