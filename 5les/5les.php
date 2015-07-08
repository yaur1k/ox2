<!DOCTYPE html>
<html>
        <head>
                <title>Робота 5</title>
                <link rel="stylesheet" href="/css/bootstrap.css">
                  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
                 <meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=UTF-8"/>

        </head>
        <body>

ex1<br>
<?php
   // header('HTTP/1.1 200 OK');
   //   header('Location: http://localhost'.$redirect_url);
   
session_start();

$_login = "admin";
$_password = "1";
 
if ($_login == ($_POST['login']) && $_password == ($_POST['password'])) { 
            $_SESSION["is_auth"] = true; //авторизований користувач
            $_SESSION["login"] = $login; //запис логіна в сесію
           //$redirect_url = '/logok.php';
print " Welcome! ". ($_POST['login']);
echo "<br><a href='?is_exit=1'>Вийти</a>";
            
//IF YOU LOGGINED I SHOW FOR YOU EX 2
print "<br><br>"."ex2"."<br>";
 print '<form role="form" method="GET">
    <div class="form-group">
    Назва файлу <input name="file_name" class="form-control" type="text"><br>
     Пишіть тут текст <input name="texttofile" class="form-control" type="textarea"><br>
<input name="submit1" type="submit" value="Запиcати текст в файл">
</form>
    </div>';
    if ( isset($_GET['submit1']) ) {
    // Стрічка, яку будемо створювати.
$text = ($_GET['texttofile']);
 
// Відкриваємо файл, якщо його немає, тоді буде створюватися.
$fp = fopen($_GET['file_name'].".txt", "w+");
 
// Записуємо текст у файл.
fwrite($fp, $text);

// Закриваємо файл для вивільнення пам’яті.
fclose($fp);

//if ( isset($_GET['submit1']) ) {
print ' <iframe src="/lolo.jpg" width="100%" height="100%" align="left">
    фрейм не підтримується!
 </iframe>'; }
             //return true;          
       // }

        else { 
            $_SESSION["is_auth"] = false;
            print " Not loggined, wrong username or password! ";
            print '<form role="form" action="5les.php" method="POST">
    <div class="form-group">
     Логін <input name="login" class="form-control" type="text"><br>
Пароль <input name="password" class="form-control" type="password"><br>

<input name="submit" type="submit" value="Увійти">
</form>
    </div>';
            return false; 
        }

        if (isset($_GET["is_exit"])) { //якщо натиснута кнопка виходу
        if ($_GET["is_exit"] == 1) {
        $_SESSION = array(); //очистка сесії
        session_destroy(); //знищення сесії
      }}
?>  



           </body>
</html>