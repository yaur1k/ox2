<?php
//ex1 вивід ф-ції у форматі 1..b, де b - число в аргументі.
$b=9;
function test_function($b) {
                global $a;
                print $a;
}
       for ($a >= 0; $a <= $b; $a++) {
test_function($b);
       }

       print "<br>"; 
 
 //ex2 multiplicate table
print "<table border = 7>";
print "<tr>";
for ($i = 1; $i <= 10; $i++) {      
	for ($j = 1; $j <= 10; $j++)          
		print "<td>".($i*$j)."</td>";         
	if ($i != 10) print "</tr><tr>";    };


print "</tr>";
print "</table>";

print "</br>";

//ex3 function first-fifth

function ff($c) {
	//global $c;
	switch ($c) {
        case 1:
                print "first";
                break;
         case 2:
                        print "second";
                        break;
         case 3:
                        print "third";
                        break;
          case 4:
                        print "fourth";
                        break;
          case 5:
                        print "fifth";
                        break;
                default:
                        print "default";
      
}}
$c = ff(4);
print $c;

//v2

echo '<br>';

function ff1($c) {
if ($c==1) {return "first";}
if ($c==2) {return "second";}
if ($c==3) {return "third";}
if ($c==4) {return "fourth";}
if ($c==5) {return "fifth";}
}
$c = ff1(3);
print $c;

?>
      
