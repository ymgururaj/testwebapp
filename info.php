<html >
<head>

    <title>
      Candidate Details 
    </title>
<style >
hr {
    display: block;
    margin-top: 0px;
    margin-bottom: 2px;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 2px;
    border-color: #000000 ;
}


body {width=100%;}

  
div {
    width: 950px;
	margin-top: 50px;
    margin-bottom: 50px;
    margin-right: 100px;
    margin-left: 300px;
    padding: 10px;
	position : relative;
	height: 600px;
    border: 1px solid black;
	border-radius: 25px;
    
}
td {
font-family: Courier New,  Monospace;
  font-size: 18px;
  font-style: italic;
  font-weight: bold;
  color: #000000 ;
}
input[type=text] {
  width: 200px;
  display : block;
  border: 1px solid #000000 ;
  height: 30px;
}
input[type=date] {
  width: 200px;
  display : block;
  border: 1px solid #000000 ;
  height: 30px;
}

select {
  width: 200px;
  display : block;
  border: 1px solid #000000 ;
  height: 30px;
}

input[type=number] {
  width: 200px;
  display : block;
  border: 1px solid #000000;
  height: 30px;
}

input[type=radio] {
  transform: scale(2);
  padding: 10px;

   
}

input[type=checkbox] {
  transform: scale(2); 
}
.blank_row
{
    height: 15px !important; /* Overwrite any previous rules */
    background-color: #C0C0C0;
}

.button {
    background-color: #000000;
    border: 1px solid #A9A9A9;
    border-radius: 25px;
    color: white;
    padding: 10px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 1px 1px;
    cursor: pointer;
}


.error {color: #FF0000;
        font-size: 11px;}

</style>
</head>

<body style="background-color:silver;">

<div>
<p><font size="5" color=#000000 face= "Courier New"><b> General Questions  </b></font></p>
    



<?php
// define variables and set to empty values
 $empstatusrErr = $scheduleErr = $employedErr = $referredErr = $jobtypeErr = $joblevelErr = "";
 $empstatus =  $schedule = $empname = $jobtype = $joblevel = $employed = $joblevel = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
   if (!isset($_POST["empstatus"])) {
     $empstatusErr = "Selection Mandatory";
   } else {
     $empstatus = test_input($_POST["empstatus"]);
   }
if (!isset($_POST["employed"])) {
     $employedErr = "Selection Mandatory";
   } else {
     $employed = test_input($_POST["employed"]);
   }
   
 if (!isset($_POST["joblevel"])) {
     $joblevelErr = "Selection Mandatory";
   } else {
     $joblevel = test_input($_POST["joblevel"]);
   }

  if (!isset($_POST["referred"])) {
     $referredErr = "Selection Mandatory";
   } else {
     $referred = test_input($_POST["referred"]);
   } 

if (!isset($_POST["jobtype"])) {
     $jobtypeErr = "Selection Mandatory";
   } else {
     $jobtype = test_input($_POST["jobtype"]);
   }

if (!isset($_POST["schedule"])) {
     $scheduleErr = "Selection Mandatory";
   } else {
     $schedule = test_input($_POST["schedule"]);
   }
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>



<form   method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 

<table>

<tr><td align = "left" > Are you currently or have you ever been an employed or worked for our organization? </td>
<td align = "right"> <input type="radio" name="employed" <?php if (isset($employed) && $employed=="Yes") echo "checked";?> value="Yes"> Yes
<input type="radio" name="employed" <?php if (isset($employed) && $employed==" No") echo "checked";?> Value="No"> No </td>
<td class="error"><?php echo $employedErr;?></td></tr><tr class="blank_row"  rowspan = "2"></tr>
<tr><td align = "left" > Have you been referred by an current or past employee of our organization? </td>
<td align = "right"> <input type="radio" name="referred" <?php if (isset($referred) && $referred=="Yes") echo "checked";?> value="Yes"> Yes
 <input type="radio" name="referred" <?php if (isset($referred) && $referred==" No") echo "checked";?> Value="No"> No </td>
<td class="error"><?php echo $referredErr;?></td></tr><tr class="blank_row"  rowspan = "2"></tr>
<tr> <td align="left"> If Yes, Please provide the employee name: </td>
<td align="left"><input type="text" name="empname" value="<?php echo $empname;?>" > </td> <td class="error"><?php echo $empnameErr;?></td></tr>
<tr class="blank_row"  rowspan = "2"></tr>
</table>
<table>
<tr><td align = "left"> Employment Status: </td></tr>
<tr class="blank_row" rowspan = "1"></tr><tr>
<td align = "center"> <input type="radio" name="empstatus" <?php if (isset($empstatus) && $empstatus=="Regular") echo "checked";?> value="Regular"> Regular</td>
<td align = "Right"> <input type="radio" name="empstatus" <?php if (isset($empstatus) && $empstatus=="Temporary") echo "checked";?> Value="Temporary"> Temporary </td>
<td class="error"><?php echo $empstatusErr;?></td></tr><tr class="blank_row"  rowspan = "2"></tr>
<tr><td align = "left"> Job Type: </td></tr>
<tr class="blank_row" rowspan = "1"></tr><tr>
<td align = "center"> <input type="radio" name="jobtype" <?php if (isset($jobtype) && $jobtype=="Standard") echo "checked";?> value="Standard"> Standard</td>
<td align = "right"> <input type="radio" name="jobtype" <?php if (isset($jobtype) && $jobtype=="Internship")  echo "checked";?> Value="Internship"> Internship </td>
<td class="error"><?php echo $jobtypeErr;?></td></tr><tr class="blank_row" rowspan = "2"></tr>
<tr><td align = "left"> Schedule: </td></tr>
<tr class="blank_row" rowspan = "1"></tr><tr>
<td align = "center"> <input type="radio" name="schedule" <?php if (isset($schedule) && $schedule=="Part-time") echo "checked";?> value="Part-time"> Part-time</td>
<td align = "right"> <input type="radio" name="schedule" <?php if (isset($schedule) && $schedule=="Full-time") echo "checked";?> Value="Full-time"> Full-time </td>
<td class ="error"><?php echo $scheduleErr;?></td></tr><tr class="blank_row"  rowspan = "2"></tr>
<tr><td align = "left"> Job Level: </td></tr>
<tr class="blank_row" rowspan = "1"></tr><tr>
<td align = "center"> <input type="radio" name="joblevel" <?php if (isset($joblevel) && $joblevel=="Entry Level") echo "checked";?> value="Entry Level"> Entry Level</td>
<td align = "center"> <input type="radio" name="joblevel" <?php if (isset($joblevel) && $joblevel== "Manager") echo "checked";?> Value="Manager"> Manager </td>
<td align = "center"> <input type="radio" name="joblevel" <?php if (isset($joblevel) && $joblevel== "Director") echo "checked";?> Value="Director"> Director </td>
<td align = "center"> <input type="radio" name="joblevel" <?php if (isset($joblevel) && $joblevel== "Executive") echo "checked";?> Value="Executive"> Executive </td>
<td class ="error"><?php echo $joblevelErr;?></td></tr><tr class="blank_row"  rowspan = "2"></tr>

<tr>
<td class="blank_row" colspan = "2"></td>
<td align="left"><input type="submit" name="next" class="button" value="Next" ></tr>

</table>
</form>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "capstone";
$dbname = "webapp";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['next'])) 
{

if ( $employedErr !="" ||  $empstatusErr !="" || $referredErr!="" || $jobtypeErr !="" || $scheduleErr !="" ||  $joblevelErr !=""  )
{
?> <script>
        <?php echo " alert('Entry Response Results\\n\\nPlease Fix the Entries with errors to continue ');"; ?>
         
    </script> <?php 

}

else {

$employed= $_POST['employed'];
$referred = $_POST['referred'];
$empname = $_POST['empname'];
$empstatus = $_POST['empstatus'];
$jobtype = $_POST['jobtype'];
$schedule = $_POST['schedule'];
$joblevel = $_POST['joblevel'];



$sql = "INSERT INTO questions (employed, referred,  empname, empstatus, jobtype, schedule, joblevel) 
VALUES ('$employed', '$referred','$empname', '$empstatus', '$jobtype', '$schedule', '$joblevel') ";

if ($conn->query($sql) === TRUE) {
             ?><script>
           <?php echo " alert('Data Saved\\n\\n Click OK to Continue ');"; ?>
         window.location = 'edu.php';
    </script> <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
}
?>


</body>
</html>
