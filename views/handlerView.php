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

<section id="main_up_man">
    <section class="leftmenu">
        <input type="submit" value="Загрузчик" onclick="GoUpload_now()" name="GoUpload" /><br/>
        <input type="submit" value="В работе" onclick="GoInWork_now()" name="GoInWork" /><br/>
        <input type="submit" value="Биллинг" onclick="GoBilling_now()" name="GoBilling" /><br/>
        <input type="submit" value="Фотобаза" onclick="GoPhotoBase_now()" name="GoPhotoBase" /><br/>
        <input type="submit" value="Выйти" onclick="LogOut_now()" name="LogOut" /><br/>
    </section>
    <form id="hand" method="post" action="">
    <h2>Панель обработчика</h2>
    <table id="handlerPanel">
        <tr>
            <td id="t_1">Превью</td>
            <td>Имя работы</td>
            <td>Срок (дни)</td>
            <td>Статус</td>
            <td>Превью JPG</td>
            <td>Превью TIFF</td>
            <td>Скачать исходник</td>
            <td>Загрузить JPG</td>
            <td>Загрузить TIFF</td>
            <td><input type="checkbox" id="all" name="all"/></td>
        </tr>
        <?php foreach($data as $row){ ?>
        <tr>
            <td id="t_1"><a id="pre_foto_up" href="<?php  echo $row['prevSource'];?>"><img alt="" id="prevS"  width="50" height="50" src=<?php echo $row['prevSource'];  ?>  /></a></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><?php echo $row['state']; ?></td>
            <td class="t_10"><a id="pre_foto_up" href="<?php  echo $row['hlocate'];?>"><img alt=""  width="50" height="50" src="<?php echo $row['hlocate'];  ?>"  /></td>
            <td class="t_10"><a id="pre_foto_up" href="<?php  echo $row['hlocatetiff'];?>"><img alt=""  width="50" height="50" src="<?php echo $row['hlocatetiff'];  ?>"  /></td>
            <td><input type="submit" value="Скачать" name="Download_<?php echo $row['id']; ?>"/></td>
            <td><a id="download_jpg" href="/uploader/jpgUpload/">Загрузить</a> <input id="goUploadJPG"  type="submit"  name="upload_<?php echo $row['id']; ?>" value="Выбрать"/></td>
            <td><a id="download_tiff" href="/uploader/tiffUpload/">Загрузить</a> <input id="goUploadTIFF"  type="submit"  name="upload_<?php echo $row['id']; ?>" value="Выбрать"/></td>
            <td><input type="checkbox" id="checker" name="check_<?php echo $row['id']; ?>"/></td>
        </tr>
        <?php }?>
    </table>
        <input type="submit"  name="page_next" value="Next"/>
        <input type="submit" name="page_pre" value="Prev"/>
        <input type="submit" name="sendTocheck"/>

</section>
</form>
</body>
</html>