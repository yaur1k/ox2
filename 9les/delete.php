<?php
ob_start(); //без цього пише помилку Cannot modify header information

require('base/db.php');
require('article.php');
if($editor): //щоб хтось не зайшов на деліт пхп і не видалив статті 
print "Ви дійсно бажаєте видалити саттю: ".$article['title'] ."?";
?>
<form action="" method="POST">
  <input type="submit" name="submitdel" value="Так, видалити статтю!">
</form>

<?php

  if ( isset($_POST["submitdel"])) 			{

  try {
    $stmt = $conn->prepare('DELETE FROM db1.content WHERE content.id = :id;');
	$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);	
  	$stmt->execute();
    header('Location: /');
 
  	  } 
  	 catch(PDOException $e) {
    // Виводимо на екран помилку.
    print "ERROR: {$e->getMessage()}";
    // Закриваємо футер.
    require('base/footer.php');
    // Зупиняємо роботу скрипта.
    exit;
							} 				}
																	
endif; 
?>






