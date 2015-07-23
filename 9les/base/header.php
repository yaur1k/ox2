<?php
// Початок буферу.
ob_start();
// Початок або продовження сесії.
session_start();
// Створюємо змінну $editor, у якій міститься інформація про роль користувача на сайті.
$editor = (bool) $_SESSION['login'];

// Якщо раніше заголовок сторінки не був заданий, тоді ми його задаємо.
if (!isset($page_title)) {
  $page_title = 'Blog site';
}

?>
<!-- Виводимо основну структуру сайту. -->
<!DOCTYPE html>
<html>
<head>
  <title><?php print $page_title; ?></title>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link rel="stylesheet" href="styles.css" type="text/css">

  <!-- CSS files -->
</head>
<body>









<?php
$user = array(
  // Логін, з яким можна зайти на сайт.
  'name' => 'admin',
  // пароль "123", але ми його не зберігаємо у відкритому вигляді, ми вписуємо тільки хеш md5.
  'pass' => '202cb962ac59075b964b07152d234b70',
);


// Якщо запис у користувача про сесію вже є, тоді пропонуємо йому розлогінитися.
// Тобто вийти з сайту.
if (!empty($_SESSION['login'])) {
  print 'Ви вже залоговані на сайті.';
  print '<a href="/logout.php">Вийти</a>';
}

// Якщо користувач відправляє форму, тоді аналізуємо дані з POST.
if (!empty($_POST['name']) && !empty($_POST['pass'])) {

  // Якщо доступи вірні, тоді робимо відповідний запис у сесії.
  if ($_POST['name'] == $user['name'] && md5($_POST['pass']) == $user['pass']) {
    $_SESSION['login'] = TRUE;
    // Направляємо користувача на головну сторінку.
    header('Location: /');
  }

}
?>








<!-- Будуємо меню сайту. -->
<div class="header" style="width:50%;margin:0 auto;border:1px solid black;background-color:gray;">
  <ul class="main-menu">
    <li><a href="/">Головна сторінка<a></li>
    <?php if ($editor): ?>
      <li><a href="/add.php">Додати статтю<a></li>
      <li><a href="/logout.php">Вихід<a></li>
    <?php endif; ?>
    <?php if (!$editor): ?>
     <!--  <li><a href="/login.php">Вхід<a></li> -->
<div class="container">

  <a id="modal_trigger" href="#modal" id="login_form" class="btn">Вхід</a>


  <div id="modal" class="popupContainer" style="display:none;">
    <header class="popupHeader">
      <span class="header_title">Сторінка входу</span>
      <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>


    <section class="popupBody">

<div  class="action_btns">
<div class="one_half"><a href="#" id="login_form" class="btn">Ввести логін/пароль</a></div>
</div>

    

      <!-- Username & Password Login form -->
      <div class="user_login">
        <form>
          <label>Email / Username</label>
          <input type="text" name="name" id="name"/>
          <br />

          <label>Password</label>
          <input type="password" name="pass"/>
          <br />

            <div class="action_btns">
            <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
            <div class="one_half last"><a href="base/header.php" class="btn btn_red">Login</a></div>
          </div>
        </form>

        </div>

      </div>
    </section>
  </div>
</div>

  </ul>
</div>

<script type="text/javascript">
  $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

  $(function(){
    // Calling Login Form
    $("#login_form").click(function(){
      $(".social_login").hide();
      $(".user_login").show();
      return false;
    });

    // Calling Register Form
    $("#register_form").click(function(){
      $(".social_login").hide();
      $(".user_register").show();
      $(".header_title").text('Register');
      return false;
    });

    // Going back to Social Forms
    $(".back_btn").click(function(){
      $(".user_login").hide();
      $(".user_register").hide();
      $(".social_login").show();
      $(".header_title").text('Login');
      return false;
    });

  })
</script>


    <?php endif; ?>



<!-- Якщо користувач немає запису у сесії, тоді виводимо йому форму. -->



<?php

// Підключаємо футер сайту.
//require('base/footer.php');
?>







