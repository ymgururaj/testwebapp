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
	height: 750px;
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

textarea {
 
  border: 1px solid #000000 ;
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
<p><font size="5" color=#000000 face="Courier New"><b> profile Documents </b></font></p>
    



<?php
// define variables and set to empty values
 $resumeErr = $skillsErr =  "";
 $resume = $coverletter = $skills =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 if (empty($_POST["resume"])) {
     $resumeErr = "Field Entry Mandatory";
   } else {
     $resume= test_input($_POST["resume"]);
   }
  if (empty($_POST["skills"])) {
     $skillsErr = "Field Entry Mandatory";
   } else {
     $skills = test_input($_POST["skills"]);
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
<tr> <td> Paste your Resume Below: </td> </tr>
<tr class="blank_row" rowspan = "1"></tr><tr><td>
<textarea name="resume" rows="15" cols="80"> </textarea></td></tr>
<tr class="blank_row" rowspan = "2"></tr> 
<tr> <td> Paste your Cover Letter Below: </td> </tr>
<tr class="blank_row" rowspan = "1"></tr><tr><td>
<textarea name="coverletter" rows="10" cols="80"> </textarea></td></tr>
<tr class="blank_row" rowspan = "2"></tr>
<tr> <td> Skills: 
<textarea name="skills" rows="5" cols="80"> </textarea></td></tr>



  

</tr><tr class="blank_row"  rowspan = "2"></tr>
<tr><td align="center" colspan = "2"><input type="submit" name="submit" class="button" value="Submit" >
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

if (isset($_POST['submit'])) 
{

if ( $resumeErr !="" || $skillsErr !=""   )
{
?> <script>
        <?php echo " alert('Entry Response Results\\n\\nPlease Fix the Entries with errors to continue ');"; ?>
         
    </script> <?php 

}

else {

$resume= $_POST['resume'];
$coverletter = $_POST['coverletter'];
$skills = $_POST['skills'];



$sql = "INSERT INTO upload ( resume, coverletter,  skills) 
VALUES ('$resume', '$coverletter','$skills') ";

if ($conn->query($sql) === TRUE) {
             ?><script>
           <?php echo " alert('Data Saved\\n\\n Click OK to Continue ');"; ?>
         window.location = 'submit.html';
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
