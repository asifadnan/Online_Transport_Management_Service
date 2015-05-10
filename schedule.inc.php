<form action="schedule.inc.php" method="GET">
Select a day you want schedule of:<br><br>
<input type="radio" name="day" value="1">Saturday<br>
<input type="radio" name="day" value="2">Sunday<br>
<input type="radio" name="day" value="3">Monday<br>
<input type="radio" name="day" value="4">Tuesday<br>
<input type="radio" name="day" value="5">Wednesday<br>
<input type="radio" name="day" value="6">Thursday<br>
<input type="radio" name="day" value="7">Friday<br><br>
<input type ="submit" value="Schedule">
</form>
<?php

require 'connect.inc.php';

if(isset($_GET['day'])&&!empty($_GET['day']))
{
 $a=$_GET['day'];
switch($a)
{
case '1':
$b='saturday';
break;
case '2':
$b='sunday';
break;
case '3':
$b='monday';
break;
case '4':
$b='tuesday';
break;
case '5':
$b='wednesday';
break;
case '6':
$b='thursday';
break;
case '7':
$b='friday';
break;
}
echo $b.' is selected.<br><br>';

$query="SELECT s.day,b.bus_name,s.dep_time,s.ret_time FROM bus b,schedule s WHERE b.bus_id=s.bus_id AND s.day='$b'";
if($query_run=mysql_query($query))
 { echo'
   <table border="1">
   <tr>
   <th>Day</th>
   <th>Bus Name</th>
   <th>Departure time</th>
   <th>Returning time</th>
   </tr>';

  while($row=mysql_fetch_assoc($query_run))
 { $day=$row['day'];
   $bus_name=$row['bus_name'];
   $dep_time=$row['dep_time'];
   $ret_time=$row['ret_time'];
 echo'<tr>
 <td>'.$day.'</td>
 <td>'.$bus_name.'</td>
 <td>'.$dep_time.'</td>
 <td>'.$ret_time.'</td>
 </tr>';
  }
$query="SELECT b.bus_name,s.dep_time,s.ret_time FROM bus b,schedule s WHERE b.bus_id=s.bus_id AND b.bus_id='9'";
if($query_run=mysql_query($query))
{
 $row=mysql_fetch_assoc($query_run);
 $bus_name=$row['bus_name'];
 $dep_time=$row['dep_time'];
 $ret_time=$row['ret_time'];
 if($a==7)
 $day='Friday';
 echo'<tr>
 <td>'.$day.'</td>
 <td>'.$bus_name.'</td>
 <td>'.$dep_time.'</td>
 <td>'.$ret_time.'</td>
 </tr>';
}

 echo'</table>';


}
}
echo '<br><a href="welcome.inc.php">HOME</a>';




?>