<?php
	
	$con=mysqli_connect("localhost","root","","db");
	if($con)
	{
		//echo"success";
	}
	else
	{
		echo"not success";
	}
?>
<?php
	
	$country=$_GET["country"];
	
	
	
	if($country!="")
	{
		$res=mysqli_query($con,"select * from state where cid=$country");
		
		echo"<select id='statedd' name='statedd' onChange='change_state()'>";
		while($row=mysqli_fetch_array($res))
		{
			echo"<option value='$row[sid]'>";
			echo $row['sname']; 
			echo"</option>";
		}
		echo"</select>";
	}
?>
