<?php
ob_start(); //без цього пише помилку Cannot modify header information

require('base/db.php');
require('article.php');


if($editor):


if (isset($_POST['submitedit'])) {

  try {
    $stmt = $conn->prepare('UPDATE content SET title = :title, short_desc = :short_desc, full_desc = :full_desc, timestamp = :timestamp WHERE id = :id;');

    // Обрізаємо усі теги у загловку.
    $stmt->bindParam(':id', $_GET['id']); 
    $stmt->bindParam(':title', strip_tags($_POST['title']));

    // Екрануємо теги у полях короткого та повного опису.
    $stmt->bindParam(':short_desc', htmlspecialchars($_POST['short_desc']));
    $stmt->bindParam(':full_desc', htmlspecialchars($_POST['full_desc']));

    // Беремо дату та час, переводимо у UNIX час.
    $date = "{$_POST['date']}  {$_POST['time']}";
    $stmt->bindParam(':timestamp', strtotime($date));
    // Виконуємо запит, результат запиту знаходиться у змінні $status.
    // Якщо $status рівне TRUE, тоді запит відбувся успішно.
    $status = $stmt->execute();
    header('Location: /');
  	   }
   catch(PDOException $e) {
    // Виводимо на екран помилку.
    print "ERROR: {$e->getMessage()}";
    // Закриваємо футер.
    require('base/footer.php');
    // Зупиняємо роботу скрипта.
    exit;
  						            }
								                }

    endif; 
?>


   <form action="" method="POST">

  <div class="field-item">
    <label for="title">Заголовок</label>
    <input type="text" name="title" id="title" required maxlength="255" required value="<?php print $article['title'];?>">
  </div>

  <div class="field-item">
    <label for="short_desc">Короткий зміст</label>
    <textarea name="short_desc" id="short_desc" required maxlength="600"><?php print $article['short_desc']; ?></textarea>
  </div>

  <div class="field-item">
    <label for="full_desc">Повний зміст</label>
    <textarea name="full_desc" id="full_desc" required> <?php print $article['full_desc']; ?></textarea>
  </div>

  <div class="field-item">
    <label for="date">День створення</label>
    <input type="date" name="date" id="date" required value="<?php print date('Y-m-d')?>">
    <label for="time">Час створення</label>
    <input type="time" name="time" id="time" required value="<?php print date('G:i')?>">
  </div>

  <input type="submit" name="submitedit" value="Зберегти зміни">

</form>
