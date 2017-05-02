<html >
<head>

    <title>
      Candidate Details 
    </title>
<style >

body {width=100%;}

  
div {
    width: 600px;
	margin-top: 20px;
    margin-bottom: 50px;
    margin-right: 100px;
    margin-left: 300px;
    padding: 10px;
	position : relative;
	height: 800px;
    border: 1px solid black;
	border-radius: 25px;
    
}
td {
font-family: Courier New,  Monospace;
  font-size: 16px;
  font-style: italic;
  font-weight: bold;
  color: #000000 ;
}
input[type=text] {
  width: 400px;
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
  width: 400px;
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
    font-size: 12px;
    margin: 1px 1px;
    cursor: pointer;
}


.error {color: #FF0000;
        font-size: 11px;}

</style>
</head>

<body style="background-color:silver;">

<div>
<p><font size="5" color=#000000 face= "Courier New"><b> Education Information </b></font></p>
    



<?php
// define variables and set to empty values
 $start1Err = $edlevel1Err = $grad1Err = $prg1Err = $inst1Err = $start2Err = $edlevel2Err = $grad2Err = $prg2Err = $inst2Err = "";
 $start1 = $edlevel1 = $grad1 = $prg1 = $inst1 = $start2 = $edlevel2 = $grad2 = $prg2 = $inst2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 if (empty($_POST["inst1"])) {
     $inst1Err = "Field Entry Mandatory";
   } else {
     $inst1 = test_input($_POST["inst1"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$inst1)) {
       $inst1Err = "Only letters and white space allowed"; 
     }
   }
  if (empty($_POST["inst2"])) {
     $inst2Err = "Field Entry Mandatory";
   } else {
     $inst2 = test_input($_POST["inst2"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$inst2)) {
       $inst2Err = "Only letters and white space allowed"; 
     }
   }
   if (empty($_POST["prg1"])) {
     $prg1Err = "Field Entry Mandatory";
   } else {
     $prg1 = test_input($_POST["prg1"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$prg1)) {
       $prg1Err = "Only letters and white space allowed"; 
     }
   }
if (empty($_POST["prg2"])) {
     $prg2Err = "Field Entry Mandatory";
   } else {
     $prg2 = test_input($_POST["prg2"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$prg2)) {
       $prg2Err = "Only letters and white space allowed"; 
     }
   }
 if($_POST) { 
        if(isset($_POST['edlevel1'])) { 
            if($_POST['edlevel1'] == 'none') { 
                $edlevel1Err = " Field Entry Mandatory "; 
            } 
			else {
			$edlevel1 = test_input($_POST["edlevel1"]);	
			}
        } 
    }  
 if($_POST) { 
        if(isset($_POST['edlevel2'])) { 
            if($_POST['edlevel2'] == 'none') { 
                $edlevel2Err = " Field Entry Mandatory "; 
            } 
			else {
			$edlevel2 = test_input($_POST["edlevel2"]);	
			}
        } 
    }  
   
   if (empty($_POST["start1"])) {
     $start1Err = "Field Entry Mandatory";
   } else {
     $start1 = test_input($_POST["start1"]);
         }
		 
		 
if (empty($_POST["start2"])) {
     $start2Err = "Field Entry Mandatory";
   } else {
     $start2 = test_input($_POST["start2"]);
         }
		 
if (empty($_POST["grad1"])) {
     $grad1Err = "Field Entry Mandatory";
   } else {
     $grad1 = test_input($_POST["grad1"]);
         }
if (empty($_POST["grad2"])) {
     $grad2Err = "Field Entry Mandatory";
   } else {
     $grad2 = test_input($_POST["grad2"]);
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
<tr> <td> Education 1 </td> </tr>
<tr class="blank_row" rowspan = "2"></tr><tr>
<tr>
  <td align="left">Institution: </td></tr><tr>
  <td align="left"><input type="text" name="inst1" value="<?php echo $inst1;?>" > </td> <td class="error"><?php echo $inst1Err;?></td> </tr>
 
  <td align="left"> Program:  </td></tr><tr>
  <td align="left"><input type="text" name="prg1" value="<?php echo $prg1;?>" > </td> <td class="error"><?php echo $prg1Err;?></td> 

  <tr><td align="left"> Education Level: </td></tr><tr>
  <td align="left"><select name="edlevel1" >
    <option value="none">Not Specified</option>
    <option value="No">None</option>
	<option value="High School Diploma/GED (>11 years)">High School Diploma/GED (>11 years)</option>
	<option value="Technical Diploma (>12 years)">Technical Diploma (>12 years)</option>
	<option value="Associate's Degree/College Diploma (>13 years)">Associate's Degree/College Diploma (>13 years)</option>
	<option value="Non-Degree Program (>14 years) ">Non-Degree Program (>14 years)</option>
	<option value="Bachelor's Degree (>16 years)">Bachelor's Degree (>16 years)</option>
	<option value="Master's Degree (>18 years)">Master's Degree (>18 years)</option>
	<option value="Doctorate Degree (>19 years)">Doctorate Degree (>19 years)</option>
	<option value="Higher Degree">Higher Degree</option>
	<option value="Other">Other</option>
	</select></td><td class="error"><?php echo $edlevel1Err;?></td></tr>
	
  <tr><td align="left">Start Date: 
  <input type="date" name="start1" value="<?php echo $start1;?>" > </td> <td class="error"><?php echo $start1Err;?></td> </tr>
 
  <td align="left"> Graduation Date:  
  <input type="date" name="grad1" value="<?php echo $grad1;?>" > </td> <td class="error"><?php echo $grad1Err;?></td> 
  </tr><tr class="blank_row" rowspan = "3"></tr>
  
  <tr> <td> Education 2 </td> </tr>
<tr class="blank_row" rowspan = "2"></tr><tr>
<tr>
  <td align="left">Institution: </td></tr><tr>
  <td align="left"><input type="text" name="inst2" value="<?php echo $inst2;?>" > </td> <td class="error"><?php echo $inst2Err;?></td> </tr>
  
  <td align="left"> Program:  </td></tr><tr>
  <td align="left"><input type="text" name="prg2" value="<?php echo $prg2;?>" > </td> <td class="error"><?php echo $prg2Err;?></td> 

  <tr><td align="left"> Education Level: </td></tr><tr>
  <td align="left"><select name="edlevel2" >
    <option value="none">Not Specified</option>
    <option value="No">None</option>
	<option value="High School Diploma/GED (>11 years)">High School Diploma/GED (>11 years)</option>
	<option value="Technical Diploma (>12 years)">Technical Diploma (>12 years)</option>
	<option value="Associate's Degree/College Diploma (>13 years)">Associate's Degree/College Diploma (>13 years)</option>
	<option value="Non-Degree Program (>14 years) ">Non-Degree Program (>14 years)</option>
	<option value="Bachelor's Degree (>16 years)">Bachelor's Degree (>16 years)</option>
	<option value="Master's Degree (>18 years)">Master's Degree (>18 years)</option>
	<option value="Doctorate Degree (>19 years)">Doctorate Degree (>19 years)</option>
	<option value="Higher Degree">Higher Degree</option>
	<option value="Other">Other</option>
	</select></td><td class="error"><?php echo $edlevel2Err;?></td></tr>
	
  <tr><td align="left">Start Date: 
  <input type="date" name="start2" value="<?php echo $start2;?>" > </td> <td class="error"><?php echo $start2Err;?></td> </tr>
 
  <td align="left"> Graduation Date:  
  <input type="date" name="grad2" value="<?php echo $grad2;?>" > </td> <td class="error"><?php echo $grad2Err;?></td> 
  </tr><tr class="blank_row" rowspan = "1"></tr>
  
  


  

</tr><tr class="blank_row"  rowspan = "2"></tr>
<tr><td align="center" colspan = "2"><input type="submit" name="next" class="button" value="Next" >
</tr>
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

if ( $inst1Err !="" || $inst2Err !="" || $prg2Err !="" || $prg1Err!="" || $edlevel1Err !="" || $edlevel2Err !="" ||
 $start1Err !="" || $start2Err!="" || $grad1Err !="" ||  $grad2Err !=""  )
{
?> <script>
        <?php echo " alert('Entry Response Results\\n\\nPlease Fix the Entries with errors to continue ');"; ?>
         
    </script> <?php 

}

else {

$inst1= $_POST['inst1'];
$inst2 = $_POST['inst2'];
$prg1 = $_POST['prg1'];
$prg2 = $_POST['prg2'];
$edlevel1 = $_POST['edlevel1'];
$edlevel2 = $_POST['edlevel2'];
$start1= $_POST['start1'];
$start2 = $_POST['start2'];
$grad1 = $_POST['grad1'];
$grad2 = $_POST['grad2'];


$sql = "INSERT INTO education (inst1, prg1, edlevel1, start1, grad1, inst2, prg2, edlevel2, start2,grad2) 
VALUES ('$inst1', '$prg1','$edlevel1', '$start1', '$grad1', '$inst2', '$prg2' , '$edlevel2', '$start2', '$grad2') ";

if ($conn->query($sql) === TRUE) {
             ?><script>
           <?php echo " alert('Data Saved\\n\\n Click OK to Continue ');"; ?>
         window.location = 'paste.php';
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
