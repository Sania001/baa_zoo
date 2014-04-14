<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="/system/ui/styles/gallery.css" />
    <link type="text/css" rel="stylesheet" href="/system/ui/styles/style.css" />
    <link type="text/css" rel="stylesheet" href="/system/ui/styles/jquery.fancybox-1.3.4.css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script type="text/javascript" src="/system/ui/js/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="/system/ui/js/jquery.fancybox-1.3.4.js"></script>
    <script type="text/javascript" src="/system/ui/js/jquery.microgallery.js"></script>
    <script type="text/javascript" src="/system/ui/js/open.js"></script>
    <title>Фотобаза</title>
</head>
<body>
<section id="main_up">
    <section class="leftmenu">
        <input type="submit" value="Загрузчик" onclick="GoUpload_now()" name="GoUpload" /><br/>
        <input type="submit" value="В работе" onclick="GoInWork_now()" name="GoInWork" /><br/>
        <input type="submit" value="Биллинг" onclick="GoBilling_now()" name="GoBilling" /><br/>
        <input type="submit" value="Фотобаза" onclick="GoPhotoBase_now()" name="GoPhotoBase" /><br/>
        <input type="submit" value="Выйти" onclick="LogOut_now()" name="LogOut" /><br/>

    </section>
    <h2>Фотобаза</h2>
    <br/><br/>
    <form id="hand" method="post" action="">
        <section id="searchEngine">
            <span>Имена:</span><br/>
            <input type="text" name="nameS1"  /><br/>
            <input type="text" name="nameS2"  /><br/>
            <input type="text" name="nameS3"  /><br/>
            <input type="text" name="nameS4"  /><br/>
            <input type="text" name="nameS5"  /><br/>
            Тип файла для скачки:
            <select name="typeDownload">
                <option value="jpg">JPG</option>
                <option value="tiff">TIFF</option>
            </select><br/>
            <input type="submit" name="goSearch"/>
        </section>
    </form>
    <div id="content">
        <div id="mG3" class="microGallery">
            <?php foreach($data as $data) { ?>
                <img src="<?php echo $data['plocate'] ?>" alt="<?php echo $data['pname'] ?>"/>
            <?php } ?>
        </div>
    </div>

</section>
</body>
</html>