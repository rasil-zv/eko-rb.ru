<?php
$login="admin"; //логин для входа в систему
$pass="smart_eko";//пароль для входа в систему
$numbers = array("yandex direct" => "73472588856", "seo" => "73472588072", "google advert" => "73472588032");// массив номеров название=>номер
?>
<?
//простая авторизация
if(strcmp($_GET['pass'], $pass)!=0){
    header('Location: /statforadmin/auth.php');
 }
 if(strcmp($_GET['login'], $login)!=0){
    header('Location: /statforadmin/auth.php');
}
?>      
<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Записи звонков</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom CSS -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Меню</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Статистика звонков</a>
            </div>
            <!-- /.navbar-header -->

  

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php?login=<?=$login?>&pass=<?=$pass?>"><i class="fa fa-dashboard fa-fw"></i> Общая статистика</a>
                        </li>
                        <li>
                            <a href="calls.php?login=<?=$login?>&pass=<?=$pass?>"><i class="fa fa-file-audio-o"></i> Записи звонков</a>
                        </li>
                        <li>
                            <a href="mail_stat.php?login=<?=$login?>&pass=<?=$pass?>"><i class="fa fa-envelope"></i> Статистика сообщений</a>
                        </li>
                        <li>
                            <a href="mail.php?login=<?=$login?>&pass=<?=$pass?>"><i class="fa fa-envelope-o"></i> Записи сообщений</a>
                        </li>
                        <!-- <li onclick="balance()">
                            <a href="#"><i class="fa fa-money fa-fw"></i> Баланс АТС</a>
                        </li>-->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
				<div class="row">	
					<div class="col-lg-12">
                        <div class="col-lg-2">    
                            <button class="btn btn-primary" style="margin-top: 20px;" onclick="show_mail_csv()">Скачать статистику</button>
                        </div>  						
					</div>
				</div>				
                <div class="row">				
                    <div class="col-lg-12">
                        <div id="cout">
                            <div class="row page-header">
                            <div class="col-lg-3">    
                                <b>Дата от</b><input id="date1" type="date" class="form-control">
                            </div>                           
							<div class="col-lg-3">    
                                <b>Дата до</b><input id="date2" type="date" class="form-control">
                            </div>
                            <div class="col-lg-2">    
                                <b>Выберите канал</b> <select class="form-control" id="date3">
                                    <option value="0">Все сообщения</option>
                                    <?foreach ( $numbers as $key => $value ):?>
                                        <option value="<?=$value?>"><?=$key?></option>
                                    <?endforeach;?>
                                </select>
                            </div>
                            <span id="date4" style="display: none;"><?foreach ( $numbers as $key => $value ):?><?=$value?>;<?endforeach;?></span>
                             <span id="date5" style="display: none;"><?foreach ( $numbers as $key => $value ):?><?=$key?>;<?endforeach;?></span>
                            <div class="col-lg-2">    
                                <button class="btn btn-primary" style="margin-top: 20px;" onclick="show_mail()">Показать статистику</button>
                            </div>    
                            </div>
                            <div id="cout1"></div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/functions.js"></script>
</body>
</html>
