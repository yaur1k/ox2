  <title>Робота 5</title>
                <link rel="stylesheet" href="/css/bootstrap.css">
                  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
                 <meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=UTF-8"/>
<?php
print "<br><br>"."ex2"."<br>";
 print '<form role="form" method="POST">
    <div class="form-group">
    Назва файлу <input name="file_name" class="form-control" type="text"><br>
     Пишіть тут текст <input name="texttofile" class="form-control" type="textarea"><br>
<input name="submit1" type="submit" value="Запиcати текст в файл">
</form>
    </div>';
    // Стрічка, яку будемо створювати.
$text = ($_POST['texttofile']);
 
// Відкриваємо файл, якщо його немає, тоді буде створюватися.
$fp = fopen($_POST['file_name'].".txt", "w+");
 
// Записуємо текст у файл.
fwrite($fp, $text);

// Закриваємо файл для вивільнення пам’яті.
fclose($fp);

if ( isset($_POST['submit1']) ) {
print ' <iframe src="/lolo.jpg" width="100%" height="100%" align="left">
    фрейм не підтримується!
 </iframe>';
}

?>
   