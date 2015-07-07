<!DOCTYPE html>
<html>
        <head>
                <title>Робота 4</title>
                <link rel="stylesheet" href="/css/bootstrap.css">
                  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
                 <meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=UTF-8"/>

        </head>
        <body>
<center>
ex1<br>
<form role="form" action="4les.php" method="GET">
    <div class="form-group">
        <input type="number" class="form-control" name="number1" required>
        <select name="operator" class="form-control">
                <option>sqrt2</option>
                <option>pow2</option>
        </select>

        <input type="submit" class="btn btn-success" value="Порахувати">
    </div>
        <h2> Результат: </h2>
</form>

<?php
switch ($_GET['operator']) {
        case 'sqrt2':
                print sqrt ($_GET['number1']);
                break;
        case 'pow2':
                print pow ($_GET['number1'], 2);
                break;
}
?>

<br><br>
ex3-4<br>

<form action="4les.php" method="GET">
Кількість стовпців:
        <input type="number" class="form-control" name="col" required>
Кількість рядків:
        <input type="number" class="form-control" name="row" required>
        <br><input type="submit" class="btn btn-success" value="Зформувати таблицю">
        </form>

        <h2> Результат: </h2>

<div class="table-responsive">
     <table class="table" border = 2>
        <?php
for ($i = 1; $i <= ($_GET['row']); $i++) { 
       for ($j = 1; $j <= ($_GET['col']); $j++)          
                print "<td>".rand(0, 100) ."</td>";         
                print "</tr><tr>";   
        }

?>
 </tr></table> 
</div>



<br>
ex5<br>

<form action="4les.php" method="GET">
Кількість стовпців:
        <input type="number" class="form-control" name="col2" required>
Кількість рядків:
        <input type="number" class="form-control" name="row2" required>
        <br><input type="submit" class="btn btn-success" value="Зформувати таблицю">
       
       </form> 

        <h2> Результат: </h2>

<div class="table-responsive">
     <table class="table" border = 2>
        <?php
       
        $dataarray = array();
for ($i = 1; $i <= ($_GET['row2']); $i++) { 
       for ($j = 1; $j <= ($_GET['col2']); $j++)   

                print "<td>". '<input type="text" class="form" name="usrdata[i*j]">' ."</td>";   
                
                //$dataarray = array('key[i*j]' => $_GET['usrdata']);  
          $usrdata = htmlspecialchars(trim($_GET['usrdata[i*j]']));
           //array_push($dataarray, $_GET['usrdata[i*j]']);
          array_push($dataarray, $usrdata);
                  
                print "</tr><tr>";   
        }
        
?>
</tr></table>
</div> 

<form action="4les.php" method="GET">
<input type="submit" class="btn btn-warning" value="Побачити введені дані"><br>
 </form>

<div class="table-responsive">
         <table class="table" border = 2>
<?php
for ($i = 1; $i <= ($_GET['row2']); $i++) { 
       for ($j = 1; $j <= ($_GET['col2']); $j++)          
                print "<td>". $usrdata ."</td>";         
                print "</tr><tr>";   
        }
?>
 </tr></table> 
 </div> 

</center>

        </body>
</html>