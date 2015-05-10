<p style="font-size:38px;">Pease select a field on which you want information on.
<form action="info.php" method="GET">
Select a field:<select name="field">
              <option value="x">select</option>
              <option value="b">Bus</option>
              <option value="s">Staff</option>
              <option value="bs">Bus,Staff</option>
              </select><br><br><br>
<input type ="submit" value="INFO">
</form></p>

<?php
require 'connect.inc.php';

if(isset($_GET['field'])&&!empty($_GET['field']))
{$a=$_GET['field'];
if($a=='b')
{echo 'bus selected<br>';
$query="SELECT bus_id,bus_name,no_seats,reg_no FROM bus";
if($query_run=mysql_query($query))
 { echo'
   <table border="1">
   <tr>
   <th>Bus id</th>
   <th>Bus Name</th>
   <th>No.of Seats</th>
   <th>Registration No.</th>
   </tr>';

  while($row=mysql_fetch_assoc($query_run))
 { $bus_id=$row['bus_id'];
   $bus_name=$row['bus_name'];
   $no_seats=$row['no_seats'];
   $reg_no=$row['reg_no'];
 echo'<tr>
 <td>'.$bus_id.'</td>
 <td>'.$bus_name.'</td>
 <td>'.$no_seats.'</td>
 <td>'.$reg_no.'</td>
 </tr>';
  }
 echo'</table>';

}
}

else if($a=='s')
{echo 'staff selected<br>';
 echo'
   <table border="1">
   <tr>
   <th>Staff id</th>
   <th>Staff Name</th>
   <th>Post</th>
   <th>Phone Number</th>
   </tr>';
$query1="SELECT driver_id,driver_name,post,phone_number FROM driver";
$query2="SELECT staff_id,staff_name,post,phone_number FROM staff";
if($query_run1=mysql_query($query1))
 {
 while($row1=mysql_fetch_assoc($query_run1))
 { $driver_id=$row1['driver_id'];
   $driver_name=$row1['driver_name'];
   $post=$row1['post'];
   $phone_number=$row1['phone_number'];
 echo'<tr>
 <td>'.$driver_id.'</td>
 <td>'.$driver_name.'</td>
 <td>'.$post.'</td>
 <td>'.$phone_number.'</td>
 </tr>';
  }

//echo'</table>';

}
if($query_run2=mysql_query($query2))
 {
 while($row2=mysql_fetch_assoc($query_run2))
 { $staff_id=$row2['staff_id'];
   $staff_name=$row2['staff_name'];
   $post=$row2['post'];
   $phone_number=$row2['phone_number'];
 echo'<tr>
 <td>'.$staff_id.'</td>
 <td>'.$staff_name.'</td>
 <td>' .$post.'</td>
 <td>' .$phone_number.'</td>
 </tr>';
  }
 }

echo'</table>';


}

else if($a=='bs')
{echo 'bus & staff selected<br>';
$query="SELECT b.bus_id,b.bus_name,d.driver_name,s.staff_name FROM bus b,driver d,staff s WHERE d.driver_id=b.driver_id AND s.staff_id=b.staff_id";
if($query_run=mysql_query($query))
 { echo'
   <table border="1">
   <tr>
   <th>Bus id</th>
   <th>Bus Name</th>
   <th>Driver Name</th>
   <th>Staff Name</th>
   </tr>';

  while($row=mysql_fetch_assoc($query_run))
 { $bus_id=$row['bus_id'];
   $bus_name=$row['bus_name'];
   $driver_name=$row['driver_name'];
   $staff_name=$row['staff_name'];
 echo'<tr>
 <td>'.$bus_id.'</td>
 <td>'.$bus_name.'</td>
 <td>'.$driver_name.'</td>
 <td>'.$staff_name.'</td>
 </tr>';
  }
 echo'</table>';

}
}






else
echo 'Plese select one.';
}
echo '<br><a href="welcome.inc.php">HOME</a>';
?>