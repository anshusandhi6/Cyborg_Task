<?php

$server="localhost";
$user="root";
$password="";
$db="registration1";


$con=mysqli_connect($server,$user,$password,$db);


if($con){
?>
<script >
	
alert("Connection Successful");

</script>



<?php
}
else
{
	?>
	<script >
	
alert("Connection Un Successful");

</script>
<?php
}
?>