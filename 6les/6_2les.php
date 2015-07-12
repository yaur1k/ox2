  <title>Робота 6</title>
                <link rel="stylesheet" href="/css/bootstrap.css">
                  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
                 <meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=UTF-8"/>
<?php

print 'Checking exist of Users<br>';

print '<form role="form" action="6_2les.php" method="POST">
    <div class="form-group">
    Користувач <input name="username" class="form-control" type="text"><br>
     Пароль <input name="password" class="form-control" type="password"><br>
<input name="submit" type="submit" class="btn-default" value="Додати користувача в базу">
</form>
    </div>';
$usrdata = htmlspecialchars(trim($_POST['username']));
$password = md5(htmlspecialchars(trim($_POST['password'])));              

$u='root';
$p=NULL;

try {
 $conn = new PDO('mysql:host=localhost;dbname=6lesdb', $u, $p);

 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//ok mysql: INSERT INTO `Users` (`Name`, `Password`) VALUES
//('admin112', 'c328dfgdf');
 //+
 //INSERT INTO Users (Name, Password) VALUES
//('admin11111111111', 'sdddddddc328dfgdf');


//OK// $stmt = $conn->prepare('SELECT Name FROM Users WHERE Name = :usrdata;');
// $stmt->execute(array(
//     ':usrdata'   => $usrdata, ));

$stmt = $conn->prepare('SELECT Name FROM Users WHERE Name = :usrdata;');
$stmt->bindParam(':usrdata', $usrdata, PDO::PARAM_INT);
$stmt->execute();

if ( ($row = $stmt->fetch(PDO::FETCH_ASSOC)) != NULL ) {
   // print($row);
    print '<span class="btn-info">Такий користувач вже є</span>';
                                                       }

 else {
$stmt = $conn->prepare('INSERT INTO Users (Name, Password) VALUES (:usrdata, :password);');
$stmt->execute(array(

    ':usrdata'   => $usrdata,
    ':password' => $password ));
print '<span class="btn-success">Додано нового користувача</span>';
      }
 
   } 

     catch(PDOException $e) {
    print 'ERROR: ' . $e->getMessage(); }


?>
   