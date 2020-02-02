<!DOCTYPE html>
<?php

include 'connect_to_database.php';


?>
    <html>
    <!--META DATA-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="Images/cnms_favicon.jpg" type="image/gif" sizes="16x16">
    <!--META DATA ENDS HERE-->

    <!--CSS LINKS-->
    <link href="local_stylesheet/style.css" rel="stylesheet">
    <link href="local_stylesheet/style_user.css" rel="stylesheet">
    <link href="fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!--CSS LINKS ENDS HERE-->

    <!--TITLE-->
    <title>Food Nutritional Value</title>
    <!--TITLE ENDS HERE-->

    <!--JQUERY-->
    <script src="jquery/jquery.js">
    </script>

    <head>
        <title>Food Nutritional Value</title>
    </head>
    <style type="text/css">
        .image {
            margin-left: 25%;
            margin-top: 2%;
        }
    </style>

    <body>
        <div id="mySidenav" class="user_sidenav">

            <div class="user_profile">




                <div class="guest_responsive_menu">


                    <p style="margin-left:80px;">Guest</p>



                </div>



            </div>

            <div class="user_menu">

                <ul>

                <li ><i class="active_hover"></i><span  class="fa fa-home "></span> <a href="home_guest.php">Home</a></li>
<li ><span  class="fa  fa-table "></span> <a href="guest_table.php">Table</a></li>
<li><span  class="fa  fa-table "></span> <a href="bmi_guest.php">BMI Chart</a></li>
<li><span  class="fa  fa-male "></span> <a href="calories_guest1.php">Calories Intake</a></li>
<li class="active"><span  class="fa  fa-table "></span> <a href="nutrition.php">Food Nutrition value</a></li>


                </ul>
            </div>


            <div class="user_removesidenav">
                <a onclick="closeNav()"><span class="fa fa-eye-slash" ></span>Hide Sidebar</a>
            </div>
        </div>

        <div id="main">

            <div class="user_topbar">

                <div class="topbar_menu_logo">
                    <a href="#" onclick="openNav()"> <span class="fa fa-bars fa-lg"></span></a><img src="Images/small_CNSLogowhite.png">
                </div>

                <div class="topbar_menu_user_name">
                  

                    <a href="index.php"><span class=" fa fa-power-off"></span></a>
                   



                </div>




            </div>
            <h1 style="text-align: center;">Calories Values for different Food Items</h1>
	<table class="table" cellpadding="0" cellspacing="0" border="0" style="width: 60%;margin-left: 20%;margin-top: 2%;margin-bottom: 5%;">

<thead>
<tr>
<th style="text-align: center;font-size: 20px;">Food item</th>
<th style="text-align: center;font-size: 20px;">Calorie Value</th>
</tr>
</thead>
<tr>
	<td style="text-align: center;">Almonds </td>
	<td style="text-align: center;">132 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Celery Raw</td>
	<td style="text-align: center;">8 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Celery Baked</td>
	<td style="text-align: center;">14 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Apple</td>
	<td style="text-align: center;">48 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Rotini</td>
	<td style="text-align: center;">290 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Bread</td>
	<td style="text-align: center;">83 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">White Rice Steamed (.5cup)</td>
	<td style="text-align: center;">100 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Brown Rice (.25 Cup)</td>
	<td style="text-align: center;">170 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Jute</td>
	<td style="text-align: center;">5 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Yogurt (1 cup)</td>
	<td style="text-align: center;">154 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Milk (1 cup)</td>
	<td style="text-align: center;">149 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Banana </td>
	<td style="text-align: center;">105 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Chocolate Bar (1 ounce)</td>
	<td style="text-align: center;">210 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Dark Chocolate (1 ounce)</td>
	<td style="text-align: center;">140 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Noodles (.25 cup)</td>
	<td style="text-align: center;">123 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Spinach (.5 cup)</td>
	<td style="text-align: center;">33 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Walnuts</td>
	<td style="text-align: center;">193 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Paneer Raw (1 ounce)</td>
	<td style="text-align: center;">95 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Channa Dal (.5 cup)</td>
	<td style="text-align: center;">350 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Spinach Dal (.5 cup)</td>
	<td style="text-align: center;">115 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Chicken Breast</td>
	<td style="text-align: center;">142 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Chicken Wing</td>
	<td style="text-align: center;">99 Cal</td>
</tr>
<tr>
	<td style="text-align: center;">Cashew</td>
	<td style="text-align: center;">188 Cal</td>
</tr>
                    <script>
                        function openNav() {
                            document.getElementById("mySidenav").style.width = "250px";
                            document.getElementById("main").style.marginLeft = "250px";
                            document.getElementById("mainfooter").style.marginLeft = "250px";


                        }

                        function closeNav() {
                            document.getElementById("mySidenav").style.width = "0";
                            document.getElementById("main").style.marginLeft = "0";
                            document.getElementById("mainfooter").style.marginLeft = "0";


                        }



                        var viewportwidth;
                        var viewportheight;

                        // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight

                        if (typeof window.innerWidth != 'undefined') {
                            viewportwidth = window.innerWidth,
                                viewportheight = window.innerHeight
                        }

                        // IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
                        else if (typeof document.documentElement != 'undefined' &&
                            typeof document.documentElement.clientWidth !=
                            'undefined' && document.documentElement.clientWidth != 0) {
                            viewportwidth = document.documentElement.clientWidth,
                                viewportheight = document.documentElement.clientHeight
                        }

                        // older versions of IE
                        else {
                            viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
                                viewportheight = document.getElementsByTagName('body')[0].clientHeight
                        }


                        /* document.write(viewportwidth + ' ' + viewportheight);*/

                        var viewportwidth_min = 300;
                        var viewportwidth_max = 500;


                        var viewportheight_min = 300;
                        var viewportheight_max = 700;

                        if (viewportwidth_min <= viewportwidth && viewportwidth <= viewportwidth_max && viewportheight_min <= viewportheight && viewportheight <= viewportheight_max) {



                            function openNav() {
                                document.getElementById("mySidenav").style.width = "400px";
                                document.getElementById("main").style.marginLeft = "400px";
                                document.getElementById("mainfooter").style.marginLeft = "400px";



                                document.getElementById("main").style.display = "none";
                                document.getElementById("mainfooter").style.display = "none";



                            }

                            function closeNav() {
                                document.getElementById("mySidenav").style.width = "0";
                                document.getElementById("main").style.marginLeft = "0";
                                document.getElementById("mainfooter").style.marginLeft = "0";

                                document.getElementById("main").style.display = "block";
                                document.getElementById("mainfooter").style.display = "block";

                            }


                        }
                    </script>
    </body>

    </html>