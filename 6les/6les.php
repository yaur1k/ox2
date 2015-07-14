  <title>Робота 6</title>
                <link rel="stylesheet" href="/css/bootstrap.css">
                  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
                 <meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=UTF-8"/>
<?php

print 'Doing table and columns<br>';
try {
 $conn = new PDO('mysql:host=localhost;dbname=6lesdb', root, NULL);

 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $data = $conn->query('CREATE TABLE Users (
  UID int NOT NULL AUTO_INCREMENT,
  Name varchar(255),
  Password varchar(255),
  PRIMARY KEY(UID) );');
 
foreach($data as $row) {
print_r($row); }
     } 

     catch(PDOException $e) {
    print 'ERROR: ' . $e->getMessage(); }



?>
   