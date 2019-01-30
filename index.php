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
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
    </head>
    
    <body>
    	<form action="#" method="post">
        	<table>
            	<tr>
                	<th>Employee Name</th>
                    <td><input type="text" name="ename"/></td>
                </tr>
                  
                
                </tr>	
            	<tr>
                	<th>Select Country</th>
                    <td><select id="countrydd" name="countrydd" onChange="change_country()">
                    		<option>--Select Country--</option>
                            <?php
								$res=mysqli_query($con,"select * from country");
								while($row=mysqli_fetch_array($res))
								{
									
							?>
                            
            				<option value="<?php echo $row["cid"];?>"><?php echo $row["cname"]; ?></option>
                            <?php
								}
							?>
                            </select>
                     </td>
                 </tr>
                 <tr>
                 	<th>Select State</th>
                    <td>
                    	<div id="state">
                    	<select id="statedd" name="statedd">
                        	<option> --Select State--</option>
                         </select>
                         </div>
                    </td>
                  </tr>
                  <tr>
                 	<th>Select District</th>
                    <td>
                    	<div id="district">
                    	<select id="districtdd" name="districtdd">
                        	<option> --Select District--</option>
                         </select>
                         </div>
                    </td>
                  </tr>
                  
              </table>
              <input type="submit" name="submit"/>
                        
        </form>
        
        <script type="text/javascript">
			function change_country()
			{
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET","ajax.php?country=" + document.getElementById("countrydd").value,false);
					xmlhttp.send(null);
					document.getElementById("state").innerHTML=xmlhttp.responseText;
			}
			function change_state()
			{
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET","ajax2.php?state=" + document.getElementById("statedd").value,false);
					xmlhttp.send(null);
					document.getElementById("district").innerHTML=xmlhttp.responseText;
					
			}
		</script>
    </body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$name=$_POST['ename'];
		$country=$_POST['countrydd'];
		$state=$_POST['statedd'];
		$dis=$_POST['districtdd'];
		//echo $country;
		mysqli_query($con,"INSERT INTO `employ`(`ename`, `cname`, `sname`, `dname`) VALUES ('".$name."','".$country."','".$state."','".$dis."')");
		
		echo"success";
		//$sql="insert into employ('ename','cname','sname','dname') values ('".$name."','".$country."','".$state."','".$dis."')";
		//mysqli_query($con,$sql);
	}

?>
