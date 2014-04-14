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
        <input type="button" value="Загрузчик" onclick="GoUpload_now()" name="GoUpload" /><br/>
        <input type="submit" value="В работе" onclick="GoInWork_now()" name="GoInWork" /><br/>
        <input type="submit" value="Биллинг" onclick="GoBilling_now()" name="GoBilling" /><br/>
        <input type="submit" value="Фотобаза" onclick="GoPhotoBase_now()" name="GoPhotoBase" /><br/>
        <input type="submit" value="Выйти" onclick="LogOut_now()" name="LogOut" /><br/>
    </section>
    <h2>Система управления работами</h2>
<form method="post" action="">
<table id="managerPanel">
    <tr>
        <td class="t_1">Превью</td>
        <td>Имя работы</td>
        <td class="t_3">ФИО автора</td>
        <td class="t_4">ФИО исполнителя</td>
        <td>Исходник загружен</td>
        <td class="t_5">Срок (дни)</td>
        <td class="t_3">Статус</td>
        <td>Комментарий</td>
        <td class="t_1">Превью обраб.</td>
        <td><input type="checkbox" id="all" name="all" onclick=""/></td>
    </tr>
    <?php foreach($data as $row){ ?>

    <tr <?php if(isset($row['red'])){echo 'class="'.$row['red'].'"';} ?>>
        <td id="t_1"><a id="pre_foto_up" href="<?php  echo $row['locate'];?>"><img alt=""  width="50" height="50" src=<?php echo $row['locate'];  ?>  /></td>
        <td class="t_3"><?php echo $row['iname']; ?></td>
        <td ><?php echo $row['iauthor']; ?></td>
        <td><select class="t_4" name="handler_<?php echo $row['iid']; ?>">
                <option value="<?php echo $row['handlerdata'] ?>"><?php echo $row['handlerdata'] ?></option>
                <option value="Нет исполнителя">Нет исполнителя</option>
           <?php  foreach ($handler as $handl){ ?>
               <option value="<?php echo $handl['uid']; ?>"><?php echo $handl['handler']; ?></option>
        <?php   } ?>
        </select></td>
        <td class="t_2"><?php echo $row['idate']; ?></td>
        <td class="t_5"><?php echo $row['time']; ?></td>
        <td class="t_3" ><select readonly="true" name="state_<?php echo $row['iid']; ?>">
               <option  value="<?php echo $row['state']; ?>"><?php echo $row['state']; ?></option>
                <option value="новый">новый</option>
                <option value="в работе">в работе</option>
                <option value="на проверку">на проверку</option>
                <option value="на доработке">на доработке</option>
                <option value="обработан">обработан</option>
            </select>
        </td>
        <td><textarea name="com_<?php echo $row['iid']; ?>"><?php echo $row['comment']; ?></textarea></td>
        <td id="t_1"><a id="pre_foto_up" href="<?php  echo $row['hlocate'];?>"><img alt=""  width="50" height="50" src=<?php echo $row['hlocate'];  ?>  /></td>
        <td><input type="checkbox" id="checker" name="check_<?php echo $row['iid']; ?>" value="" /></td>
    </tr>
    <?php } ?>
</table>
        <input type="submit"  name="page_next" value="Next"/>
        <input type="submit" name="page_pre" value="Prev"/>
        <input type="submit" name="setHandler" value="Назначить исполнителя "/>
        <input type="submit" name="setCommit" value="Изменить комментарий или статус">
        <input type="submit" name="delWork" value="Удалить">

    </form>
</section>
</body>
</html>