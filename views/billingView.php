<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="/system/ui/styles/style.css" />
    <link type="text/css" rel="stylesheet" href="/system/ui/styles/jquery.fancybox-1.3.4.css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script type="text/javascript" src="/system/ui/js/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="/system/ui/js/jquery.fancybox-1.3.4.js"></script>
    <script type="text/javascript" src="/system/ui/js/open.js"></script>
    <title>Биллинговая панель</title>
</head>
<body>
<section id="main_up">
    <section class="leftmenu">
        <input type="submit" value="Загрузчик" onclick="GoUpload_now()" name="GoUpload" /><br/>
        <input type="submit" value="В работе" onclick="GoInWork_now()" name="GoInWork" /><br/>
        <input type="submit" value="Биллинг" onclick="GoBilling_now()" name="GoBilling" /><br/>
        <input type="submit" value="Фотобаза" onclick="GoPhotoBase_now()" name="GoPhotoBase" /><br/>
        <input type="submit" value="Выйти" onclick="LogOut_now()" name="LogOut" /><br/>
        <?php echo $test; ?>
    </section>
    <h2>Биллинговая панель</h2>
    <br/><br/>
    <form id="hand" method="post" action="">
    <table id="billingPanel">
        <tr>
            <td>Имя работы</td>
            <td class="t_2">Фамилия</td>
            <td class="t_2">Имя</td>
            <td class="t_2">Отчество</td>
            <td>Дата утверждения</td>
            <td class="t_5">Успел/Не успел</td>
            <td class="t_5">Цена</td>
            <td><input type="checkbox" id="all" name="all" onclick=""/></td>
        </tr>
        <?php foreach($data as $row){ ?>
            <tr>
                <td class="t_3"><?php echo $row['name']; ?></td>
                <td class="t_2"><?php echo $row['second']; ?></td>
                <td class="t_2"><?php echo $row['aname']; ?></td>
                <td class="t_2"><?php echo $row['otch']; ?></td>
                <td><?php echo $row['conf']; ?></td>
                <td class="t_5"><?php echo $row['managed']; ?></td>
                <td class="t_5"><?php echo $row['price']; ?></td>
                <td><input type="checkbox" id="checker" name="check_<?php echo $row['id']; ?>" value="" /></td>
            </tr>
        <?php } ?>
    </table>
        <input type="submit"  name="page_next" value="Next"/>
        <input type="submit" name="page_pre" value="Prev"/>
        <input type="submit" name="setFilter" value="Применить фильтры"/>
        <input type="submit" name="summFilter" value="Общая сумма по фильтру"/><br/>
        Утверждены за период:<br/>
        От <input type="text" readonly="true" name="datepicker" id="datepicker" value="2013-10-01" /><br/>
        До <input type="text" readonly="true" name="datepicker2" id="datepicker2" value="<?php echo date("y.m.d"); ?>" /><br/>
        Фамилия Имя Отчество (доступен частичный ввод):<br/>
        <input type="text" id="getHandlerFamily" name="Fam_f" /><br/>
        <input type="text" id="getHandlerName" name="Name_f" /><br/>
        <input type="text" id="getHandlerOtch" name="Otch_f" /><br/>
    </form>
</section>
</body>
</html>