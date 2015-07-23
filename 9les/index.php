<?php

// Підключаємо хедер сайту.
require('base/header.php');
// Підключаємо файл БД, адже нам необхідно вибрати статті.
require('base/db.php');


try {
  // Вибираємо усі з необхідними полями статті та поміщаємо їх у змінну $articles.
  $stmt = $conn->prepare('SELECT id, title, short_desc, timestamp FROM content ORDER BY timestamp DESC LIMIT 0,10');
  $stmt->execute();
  $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  // Виводимо на екран помилку.
  print "ERROR: {$e->getMessage()}";
  // Закриваємо футер.
  require('base/footer.php');
  // Зупиняємо роботу скрипта.
  exit;
}

?>
<!-- Вітальне повідомленя на головній сторінці. -->
<h1> Welcome to blog site!</h1>

<script src="http://unslider.com/unslider.min.js"></script>

         <a href="#" class="unslider-arrow prev">Попередній слайд</a>
<a href="#" class="unslider-arrow next">Наступний слайд</a>

<div class="banner">
      <ul>
        <li style="background-image: url('http://rjoomla.ru/images/materials/Parallax4.jpg');"></li>
        <li style="background-image: url('http://www.rudebox.org.ua/wp-content/uploads/2013/02/%D0%A1%D0%BE%D0%B7%D0%B4%D0%B0%D0%B5%D0%BC-%D0%BF%D1%80%D0%BE%D1%81%D1%82%D0%BE%D0%B9-%D1%81%D0%BB%D0%B0%D0%B9%D0%B4%D0%B5%D1%80-%D0%B4%D0%BB%D1%8F-%D1%81%D0%B0%D0%B9%D1%82%D0%B0-%D0%BD%D0%B0-jQuery-RUDEBOX1.jpg');"></li>
        <li style="background-image: url('http://pcvector.net/uploads/posts/2011-05/thumbs/1306521785_nivo_slider.jpg');"></li>
       </ul>
</div>
     
    <script>
      $(document).ready(function(){
        $('.banner').unslider({
          speed: 300,               //  The speed to animate each slide (in milliseconds)
          delay: 5000,              //  The delay between slide animations (in milliseconds)
          keys: true,               //  Enable keyboard (left, right) arrow shortcuts
          dots: false,               //  Display dot navigation
          fluid: false              //  Support responsive design. May break non-responsive designs
        });
      });
    </script>



<!-- And the JavaScript -->
<script>
    var unslider = $('.banner').unslider();
    
    $('.unslider-arrow').click(function() {
        var fn = this.className.split(' ')[1];
        
        //  Either do unslider.data('unslider').next() or .prev() depending on the className
        unslider.data('unslider')[fn]();
    });
</script>

<!-- Виводимо статті у тегах -->
<div class="articles-list">

  <?php if (empty($articles)): ?>
    <!-- У випадку, якщо статтей немає - виводимо повідомлення. -->
    Статті відсутні.
  <?php endif; ?>
  <?php foreach ($articles as $article): ?>
    <div class="article-item">

      <h2><a href="/article.php?id=<?php print $article['id']; ?>"><?php print $article['title']; ?></a></h2>

      <div class="description">
        <?php print $article['short_desc']; ?>
      </div>

      <div class="info">
        <div class="timestamp">
          <!-- Вивід відформатованої дати створення. -->
          <?php print date('d/m/Y G:i', $article['timestamp']); ?>
        </div>
        <div class="links">
          <a href="/article.php?id=<?php print $article['id']; ?>">Читати далі</a>
          <!-- Посилання доступні тільки для редактора. -->
          <? if($editor): ?>
            <a href="/edit.php?id=<?php print $article['id']; ?>">Редагувати</a>
            <a href="/delete.php?id=<?php print $article['id']; ?>">Видалити</a>
          <? endif; ?>
        </div>
      </div>

    </div>
    <hr>
  <?php endforeach; ?>

  <div class="pager">
    <!-- Пейджер на розробці. -->
    Pager this!
  </div>

</div>

<?php
// Підключаємо футер сайту.
require('base/footer.php');
?>
