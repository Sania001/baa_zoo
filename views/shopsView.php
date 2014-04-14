<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/system/ui/styles/style.css">
    <script type="text/javascript" src="/system/ui/js/jquery.min.js"></script>
    <link type="text/css" href="/ui/styles/tip-yellow.css"/>
    <script type="text/javascript" src="/system/ui/js/jquery.poshytip.js"></script>
    <script>
        $( document ).ready(function() {
            $('.tooltip').poshytip();
            $('#shop1').click(function(){
                if($('#shop_details1').css('display')=='none')
                $('#shop_details1').show();
               else
                    $('#shop_details1').hide();
            });
            $('#shop2').click(function(){
                if($('#shop_details12').css('display')=='none')
                    $('#shop_details12').show();
                else
                    $('#shop_details12').hide();
            });
            $('#shop3').click(function(){
                if($('#shop_details3').css('display')=='none')
                    $('#shop_details3').show();
                else
                    $('#shop_details3').hide();
            });
            $('#shop4').click(function(){
                if($('#shop_details4').css('display')=='none')
                    $('#shop_details4').show();
                else
                    $('#shop_details4').hide();
            });
            $('#shop5').click(function(){
                if($('#shop_details5').css('display')=='none')
                    $('#shop_details5').show();
                else
                    $('#shop_details5').hide();
            });
            $('#shop6').click(function(){
                if($('#shop_details6').css('display')=='none')
                    $('#shop_details6').show();
                else
                    $('#shop_details6').hide();
            });
        });
    </script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title><?php echo $title;  ?></title>

</head>
<body>
<section id="container">
    <header>
        <section>

        </section>
    </header>
    <section id="content">
        <section id="map">
            <section id="mapim">
        <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=syIxpqq0i74KZWdNR7TUrx5WQieXbjK0&width=750&height=350"></script>
            </section>
            <section class="shopblock">
                <a class="shopInfo" id="shop1">Зоомагазин на Рублевском</a> <span class="timecolor">пн-вс: 10.00-20.00</span>
                <a class="icons">
                <img class="tooltip" title="Самообслуживание"  src="/system/ui/images/zoo/1pas.jpg" alt="">
                <img class="tooltip" title="Ветоптека"  src="/system/ui/images/zoo/2pas.jpg" alt="">
                <img class="tooltip" title="Скидки"  src="/system/ui/images/zoo/3pas.jpg" alt="">
                <img class="tooltip" title="Животные"  src="/system/ui/images/zoo/4pas.jpg" alt="">
                <img class="tooltip" title="Аквариумистика"  src="/system/ui/images/zoo/5pas.jpg" alt="">
                </a>
                <div id="shop_details1" class="hidden_det" style="display:none;">
                    <div class="sd1">
                    <img src="/system/ui/images/zoo/logo.png" alt="">
                    </div>
                    <div class="sd2">
                        <table>
                            <tr>
                                <td>
                                    <b>Адрес:</b>
                                </td>
                                <td>
                                    Г. Витебск, Московский пр-т 86
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Время работы:</b>
                                </td>
                                <td>
                                    с 10.00 до 20.00 (без выходных)
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Телефоны:</b>
                                </td>
                                <td>
                                    +375 (33) 372-20-60<br/>
                                    +375 (29) 697-20-60<br/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <section class="shopblock">
                <a class="shopInfo" id="shop2">Зоомагазин на Юг-7 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> <span class="timecolor">пн-вс: 10.00-20.00</span>
                <a class="icons">
                    <img class="tooltip" title="Самообслуживание"  src="/system/ui/images/zoo/1pas.jpg" alt="">
                    <img class="tooltip" title="Ветоптека"  src="/system/ui/images/zoo/2pas.jpg" alt="">
                    <img class="tooltip" title="Скидки"  src="/system/ui/images/zoo/3pas.jpg" alt="">
                    <img class="tooltip" title="Животные"  src="/system/ui/images/zoo/4pas.jpg" alt="">
                    <img class="tooltip" title="Аквариумистика"  src="/system/ui/images/zoo/5pas.jpg" alt="">
                </a>
                <div  id="shop_details12" class="hidden_det"  style="display:none;">
                  <div class="sd1">
                        <img src="/system/ui/images/zoo/logo.png" alt="">
                    </div>
                    <div class="sd2">
                        <table>
                            <tr>
                                <td>
                                    <b>Адрес:</b>
                                </td>
                                <td>
                                    Г. Витебск, ул. Чкалова 47 корп 1
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Время работы:</b>
                                </td>
                                <td>
                                    с 10.00 до 20.00 (без выходных)
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Телефоны:</b>
                                </td>
                                <td>
                                    +375 (212) 25-50-34<br/>
                                    +375 (29) 196-20-60<br/>
                                    +375 (33) 373-20-60<br/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <section class="shopblock">
                <a class="shopInfo" id="shop3">Зоомагазин на Московском</a> <span class="timecolor">пн-вс: 10.00-20.00</span>
                <a class="icons">
                    <img class="tooltip" title="Самообслуживание"  src="/system/ui/images/zoo/1pas.jpg" alt="">
                    <img class="tooltip" title="Ветоптека"  src="/system/ui/images/zoo/2pas.jpg" alt="">
                    <img class="tooltip" title="Скидки"  src="/system/ui/images/zoo/3pas.jpg" alt="">
                    <img class="tooltip" title="Животные"  src="/system/ui/images/zoo/4pas.jpg" alt="">
                    <img class="tooltip" title="Аквариумистика"  src="/system/ui/images/zoo/5pas.jpg" alt="">
                </a>
                <div  id="shop_details3" class="hidden_det"  style="display:none;">
                    <div class="sd1">
                        <img src="/system/ui/images/zoo/logo.png" alt="">
                    </div>
                    <div class="sd2">
                        <table>
                            <tr>
                                <td>
                                    <b>Адрес:</b>
                                </td>
                                <td>
                                    Г. Витебск, Московский пр-т 30
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Время работы:</b>
                                </td>
                                <td>
                                    с 10.00 до 20.00 (без выходных)
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Телефоны:</b>
                                </td>
                                <td>
                                    +375 (33) 399-66-90<br/>
                                    +375 (212) 55-44-55<br/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <section class="shopblock">
                <a class="shopInfo" id="shop4">Зоомагазин на Фрунзе</a> <span class="timecolor">пн-вс: 10.00-20.00</span>
                <a class="icons">
                    <img class="tooltip" title="Самообслуживание"  src="/system/ui/images/zoo/1pas.jpg" alt="">
                    <img class="tooltip" title="Ветоптека"  src="/system/ui/images/zoo/2pas.jpg" alt="">
                    <img class="tooltip" title="Скидки"  src="/system/ui/images/zoo/3pas.jpg" alt="">
                    <img class="tooltip" title="Животные"  src="/system/ui/images/zoo/4pas.jpg" alt="">
                    <img class="tooltip" title="Аквариумистика"  src="/system/ui/images/zoo/5pas.jpg" alt="">
                </a>
                <div  id="shop_details4" class="hidden_det"  style="display:none;">
                    <div class="sd1">
                        <img src="/system/ui/images/zoo/logo.png" alt="">
                    </div>
                    <div class="sd2">
                        <table>
                            <tr>
                                <td>
                                    <b>Адрес:</b>
                                </td>
                                <td>
                                    Г. Витебск, пр-т Фрунзе 45
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Время работы:</b>
                                </td>
                                <td>
                                    с 10.00 до 20.00 (без выходных)
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Телефоны:</b>
                                </td>
                                <td>
                                    +375 (33) 346-20-60<br/>
                                    +375 (212) 55-44-40 <br/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <section class="shopblock">
                <a class="shopInfo" id="shop5">Зоомагазин на Медицинской</a> <span class="timecolor">пн-вс: 10.00-20.00</span>
                <a class="icons">
                    <img class="tooltip" title="Самообслуживание"  src="/system/ui/images/zoo/1pas.jpg" alt="">
                    <img class="tooltip" title="Ветоптека"  src="/system/ui/images/zoo/2pas.jpg" alt="">
                    <img class="tooltip" title="Скидки"  src="/system/ui/images/zoo/3pas.jpg" alt="">
                    <img class="tooltip" title="Животные"  src="/system/ui/images/zoo/4pas.jpg" alt="">
                    <img class="tooltip" title="Аквариумистика"  src="/system/ui/images/zoo/5pas.jpg" alt="">
                </a>
                <div  id="shop_details5" class="hidden_det"  style="display:none;">
                    <div class="sd1">
                        <img src="/system/ui/images/zoo/logo.png" alt="">
                    </div>
                    <div class="sd2">
                        <table>
                            <tr>
                                <td>
                                    <b>Адрес:</b>
                                </td>
                                <td>
                                    Г. Витебск, ул. Медицинская, 3<br/>
                                    Магазин «Веста» №152
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Время работы:</b>
                                </td>
                                <td>
                                    с 10.00 до 20.00 (без выходных)
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Телефоны:</b>
                                </td>
                                <td>
                                    +375 (33) 399-66-91<br/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <section class="shopblock">
                <a class="shopInfo" id="shop6">Зоомагазин на Гагарина</a> <span class="timecolor">пн-вс: 10.00-20.00</span>
                <a class="icons">
                    <img class="tooltip" title="Самообслуживание"  src="/system/ui/images/zoo/1pas.jpg" alt="">
                    <img class="tooltip" title="Ветоптека"  src="/system/ui/images/zoo/2pas.jpg" alt="">
                    <img class="tooltip" title="Скидки"  src="/system/ui/images/zoo/3pas.jpg" alt="">
                    <img class="tooltip" title="Животные"  src="/system/ui/images/zoo/4pas.jpg" alt="">
                    <img class="tooltip" title="Аквариумистика"  src="/system/ui/images/zoo/5pas.jpg" alt="">
                </a>
                <div  id="shop_details6" class="hidden_det"  style="display:none;">
                    <div class="sd1">
                        <img src="/system/ui/images/zoo/logo.png" alt="">
                    </div>
                    <div class="sd2">
                        <table>
                            <tr>
                                <td>
                                    <b>Адрес:</b>
                                </td>
                                <td>
                                    Г. Витебск. Ул. Гагарина 21 а
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Время работы:</b>
                                </td>
                                <td>
                                    с 10.00 до 20.00 (без выходных)
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Телефоны:</b>
                                </td>
                                <td>
                                    +375 (33) 399-66-93<br/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </section>
        <section id="leftmenu">

        </section>
    </section>
    <footer>

    </footer>

</section>
</body>
</html>
