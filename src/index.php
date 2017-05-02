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

for {
  margin: auto;
  position : relative;
  width: 500px;
  height: 620px;
  line-height: 24px;
  text-decoration: none;
  border-radius: 25px;
  padding: 10px;
  border: 3px solid #193B9B;
  border: inset 3px solid #193B9B;
  white-space: nowrap;
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
	height: 400px;
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
<p><font size="5" color=#000000 face= "Courier New"><b> Personal Information  </b></font></p>
    



<?php
// define variables and set to empty values
$firstnameErr = $address1Err = $address2Err = $lastnameErr = $cityErr = $stateErr = $emailErr = $empstatusrErr = $scheduleErr = $phoneErr = $countryErr = $postalcodeErr = $jobtypeErr = "";
$firstname = $address1 = $address2 = $lastname = $city = $state = $email = $empstatus = $phone = $country = $schedule = $postalcode = $jobtype = $joblevel = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["postalcode"])) {
     $postalcodeErr = "Field Entry Mandatory";
   } else {
     $postalcode = test_input($_POST["postalcode"]);
     // check if postalcode only contains numbers
     if (!preg_match("/^[0-9- ]*$/",$postalcode)) {
       $postalcodeErr = "Only numbers and white space allowed"; 
     }
   }




   if (empty($_POST["firstname"])) {
     $firstnameErr = "Field Entry Mandatory";
   } else {
     $firstname = test_input($_POST["firstname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
       $firstnameErr = "Only letters and white space allowed"; 
     }
   }
   

   if (empty($_POST["lastname"])) {
     $lastnameErr = "Field Entry Mandatory";
   } else {
     $lastname = test_input($_POST["lastname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
       $lastnameErr = "Only letters and white space allowed"; 
     }
   }
     
   
   if (empty($_POST["address1"])) {
     $address1Err = "Field Entry Mandatory";
   } else {
     $address1 = test_input($_POST["address1"]);
     // check if name only contains letters, characters and whitespace
     if (!preg_match("/^[a-zA-Z0-9 ]*$/",$address1)) {
       $address1Err = "Only letters, characters and white space allowed"; 
    }
   }


   if (empty($_POST["address2"])) {
     $address2 = "";
   } else {
     $address2 = test_input($_POST["address2"]);
        }


   if (empty($_POST["city"])) {
     $cityErr = "Field Entry Mandatory";
   } else {
     $city = test_input($_POST["city"]);
     // check if city only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
       $cityErr = "Only letters and white space allowed"; 
      }
     }
   
  if($_POST) { 
        if(isset($_POST['state'])) { 
            if($_POST['state'] == 'none') { 
                $stateErr = " Field Entry Mandatory "; 
            } 
			else {
			$state = test_input($_POST["state"]);	
			}
        } 
    } 
if($_POST) { 
        if(isset($_POST['country'])) { 
            if($_POST['country'] == 'none') { 
                $countryErr = " Field Entry Mandatory "; 
            } 
			else {
			$country = test_input($_POST["country"]);	
			}
           } 
    } 
if (empty($_POST["phone"])) {
     $phoneErr = "Field Entry Mandatory";
   } else {
     $phone = test_input($_POST["phone"]);
     // check if city only contains letters and whitespace
     if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
       $phoneErr = "Enter phone as xxx-xxx-xxxx"; 
      }
     }
if (empty($_POST["email"])) {
     $emailErr = "Field Entry Mandatory";
   } else {
     $email = test_input($_POST["email"]);
     // check if city only contains letters and whitespace
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Enter Valid Email"; 
      }
     }

}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>



<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

<table>

<tr>
  <td align="right">First name: </td>
  <td align="left"><input type="text" name="firstname" value="<?php echo $firstname;?>" > </td> <td class="error"><?php echo $firstnameErr;?></td> 
  <td align="right"> Last name:  </td>
  <td align="left"><input type="text" name="lastname" value="<?php echo $lastname;?>" > </td> <td class="error"><?php echo $lastnameErr;?></td> 
</tr><tr class="blank_row" rowspan = "2">
</tr><tr>
  <td align="right"> StreetAddress: </td>
  <td align="left"><input type="text" name="address1" value="<?php echo $address1;?>" > </td> <td class="error"><?php echo $address1Err;?></td> 
  <td align="right"> Address(Line2): </td>
  <td align="left"><input type="text" name="address2" value="<?php echo $address2;?>" > </td> <td class="error"><?php echo $address2Err;?></td> 
</tr><tr class="blank_row" rowspan = "2">
</tr><tr>
  <td align="right"> City: </td>
  <td align="left"><input type="text" name="city" value="<?php echo $city;?>" > </td> <td class="error"><?php echo $cityErr;?></td> 
  <td align="right"> Postal Code: </td>
  <td align="left"><input type="text" name="postalcode" value="<?php echo $postalcode;?>" > </td><td class="error"> <?php echo $postalcodeErr;?></td> 
</tr><tr class="blank_row" rowspan = "2"></tr><tr>
  <td align="right"> State: </td>
  <td align="left"><select name="state" >
        <option value="none">Select</option>
        <option value="NY">New York</option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select></td><td class="error"><?php echo $stateErr;?></td>
  <td align="right"> Country: </td>
  <td align="left"><select name="country" >
          <option value="none">Select</option>
          <option value="Afghanistan">Afghanistan</option> 
          <option value="Albania">Albania</option> 
          <option value="Algeria">Algeria</option> 
          <option value="American Samoa">American Samoa</option> 
          <option value="Andorra">Andorra</option> 
          <option value="Angola">Angola</option> 
          <option value="Anguilla">Anguilla</option> 
          <option value="Antarctica">Antarctica</option> 
          <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
          <option value="Argentina">Argentina</option> 
          <option value="Armenia">Armenia</option> 
          <option value="Aruba">Aruba</option> 
          <option value="Australia">Australia</option> 
          <option value="Austria">Austria</option> 
          <option value="Azerbaijan">Azerbaijan</option> 
          <option value="Bahamas">Bahamas</option> 
          <option value="Bahrain">Bahrain</option> 
          <option value="Bangladesh">Bangladesh</option> 
          <option value="Barbados">Barbados</option> 
          <option value="Belarus">Belarus</option> 
          <option value="Belgium">Belgium</option> 
          <option value="Belize">Belize</option> 
          <option value="Benin">Benin</option> 
          <option value="Bermuda">Bermuda</option> 
          <option value="Bhutan">Bhutan</option> 
          <option value="Bolivia">Bolivia</option> 
          <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option> 
          <option value="Botswana">Botswana</option> 
          <option value="Bouvet Island">Bouvet Island</option> 
          <option value="Brazil">Brazil</option> 
          <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
          <option value="Brunei Darussalam">Brunei Darussalam</option> 
          <option value="Bulgaria">Bulgaria</option> 
          <option value="Burkina Faso">Burkina Faso</option> 
          <option value="Burundi">Burundi</option> 
          <option value="Cambodia">Cambodia</option> 
          <option value="Cameroon">Cameroon</option> 
          <option value="Canada">Canada</option> 
          <option value="Cape Verde">Cape Verde</option> 
          <option value="Cayman Islands">Cayman Islands</option> 
          <option value="Central African Republic">Central African Republic</option> 
          <option value="Chad">Chad</option> 
          <option value="Chile">Chile</option> 
          <option value="China">China</option> 
          <option value="Christmas Island">Christmas Island</option> 
          <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
          <option value="Colombia">Colombia</option> 
          <option value="Comoros">Comoros</option> 
          <option value="Congo">Congo</option> 
          <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option> 
          <option value="Cook Islands">Cook Islands</option> 
          <option value="Costa Rica">Costa Rica</option> 
          <option value="Cote d'Ivoire">Cote d'Ivoire</option> 
          <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option> 
          <option value="Cuba">Cuba</option> 
          <option value="Cyprus">Cyprus</option> 
          <option value="Czech Republic">Czech Republic</option> 
          <option value="Denmark">Denmark</option> 
          <option value="Djibouti">Djibouti</option> 
          <option value="Dominica">Dominica</option> 
          <option value="Dominican Republic">Dominican Republic</option> 
          <option value="East Timor">East Timor</option> 
          <option value="Ecuador">Ecuador</option> 
          <option value="Egypt">Egypt</option> 
          <option value="El Salvador">El Salvador</option> 
          <option value="Equatorial Guniea">Equatorial Guinea</option> 
          <option value="Eritrea">Eritrea</option> 
          <option value="Estonia">Estonia</option> 
          <option value="Ethiopia">Ethiopia</option> 
          <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
          <option value="Faroe Islands">Faroe Islands</option> 
          <option value="Fiji">Fiji</option> 
          <option value="Finland">Finland</option> 
          <option value="France">France</option> 
          <option value="France, Metropolitan">France, Metropolitan</option> 
          <option value="French Guiana">French Guiana</option> 
          <option value="French Polynesia">French Polynesia</option> 
          <option value="French Southern Territories">French Southern Territories</option> 
          <option value="Gabon">Gabon</option> 
          <option value="Gambia">Gambia</option> 
          <option value="Georgia">Georgia</option> 
          <option value="Germany">Germany</option> 
          <option value="Ghana">Ghana</option> 
          <option value="Gibraltar">Gibraltar</option> 
          <option value="Greece">Greece</option> 
          <option value="Greenland">Greenland</option> 
          <option value="Grenada">Grenada</option> 
          <option value="Guadeloupe">Guadeloupe</option> 
          <option value="Guam">Guam</option> 
          <option value="Guatemala">Guatemala</option> 
          <option value="Guineaa">Guinea</option> 
          <option value="Guinea-Bissau">Guinea-Bissau</option> 
          <option value="Guyana">Guyana</option> 
          <option value="Haiti">Haiti</option> 
          <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option> 
          <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
          <option value="Honduras">Honduras</option> 
          <option value="Hong Kong">Hong Kong</option> 
          <option value="Hungary">Hungary</option> 
          <option value="Iceland">Iceland</option> 
          <option value="India">India</option> 
          <option value="Indonesia">Indonesia</option> 
          <option value="Iran">Iran (Islamic Republic of)</option> 
          <option value="Iraq">Iraq</option> 
          <option value="Ireland">Ireland</option> 
          <option value="Israel">Israel</option> 
          <option value="Italy">Italy</option> 
          <option value="Jamaica">Jamaica</option> 
          <option value="Japan">Japan</option> 
          <option value="Jordan">Jordan</option> 
          <option value="Kazakhstan">Kazakhstan</option> 
          <option value="Kenya">Kenya</option> 
          <option value="Kiribati">Kiribati</option> 
          <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
          <option value="Korea, Repulic of">Korea, Republic of</option> 
          <option value="Kuwait">Kuwait</option> 
          <option value="Kyrgyzstan">Kyrgyzstan</option> 
          <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
          <option value="Latvia">Latvia</option> 
          <option value="Lebanon">Lebanon</option> 
          <option value="Lesotho">Lesotho</option> 
          <option value="Liberia" >Liberia</option> 
          <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
          <option value="Liechtenstein">Liechtenstein</option> 
          <option value="Lithuania">Lithuania</option> 
          <option value="Luxembourg">Luxembourg</option> 
          <option value="Macau">Macau</option> 
          <option value="Macedonia">Macedonia</option> 
          <option value="Madagascar">Madagascar</option> 
          <option value="Malawi">Malawi</option> 
          <option value="Malaysia">Malaysia</option> 
          <option value="Maldives">Maldives</option> 
          <option value="Mali">Mali</option> 
          <option value="Malta">Malta</option> 
          <option value="Marshall Islands">Marshall Islands</option> 
          <option value="Martinique">Martinique</option> 
          <option value="Mauritania">Mauritania</option> 
          <option value="Mauritius">Mauritius</option> 
          <option value="Mayotte">Mayotte</option> 
          <option value="Mexico">Mexico</option> 
          <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
          <option value="Moldova, Republic of">Moldova, Republic of</option> 
          <option value="Monaco">Monaco</option> 
          <option value="Mongolia">Mongolia</option> 
          <option value="Montserrat">Montserrat</option> 
          <option value="Morocco">Morocco</option> 
          <option value="Mozambique">Mozambique</option> 
          <option value="Myanmar">Myanmar</option> 
          <option value="Namibia">Namibia</option> 
          <option value="Nauru">Nauru</option> 
          <option value="Nepal">Nepal</option> 
          <option value="Netherlands">Netherlands</option> 
          <option value="Netherlands Antilles">Netherlands Antilles</option> 
          <option value="New Caledonia">New Caledonia</option> 
          <option value="New Zealand">New Zealand</option> 
          <option value="Nicaragua">Nicaragua</option> 
          <option value="Niger">Niger</option> 
          <option value="Nigeria">Nigeria</option> 
          <option value="Niue">Niue</option> 
          <option value="Norfolk">Norfolk Island</option> 
          <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
          <option value="Norway">Norway</option> 
          <option value="Oman">Oman</option> 
          <option value="Pakistan">Pakistan</option> 
          <option value="Palau">Palau</option> 
          <option value="Panama">Panama</option> 
          <option value="Papua New Guinea">Papua New Guinea</option> 
          <option value="Paraguay">Paraguay</option> 
          <option value="Peru">Peru</option> 
          <option value="Philippines">Philippines</option> 
          <option value="Pitcairn">Pitcairn</option> 
          <option value="Poland">Poland</option> 
          <option value="Portugal">Portugal</option> 
          <option value="Puerto Rico">Puerto Rico</option> 
          <option value="Qatar">Qatar</option> 
          <option value="Reunion">Reunion</option> 
          <option value="Romania">Romania</option> 
          <option value="Russian Federation">Russian Federation</option> 
          <option value="Rwanda">Rwanda</option> 
          <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
          <option value="Saint Lucia">Saint LUCIA</option> 
          <option value="saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option> 
          <option value="Samoa">Samoa</option> 
          <option value="San Marino">San Marino</option> 
          <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
          <option value="Saudi Arabia">Saudi Arabia</option> 
          <option value="Senegal">Senegal</option> 
          <option value="Seychelles">Seychelles</option> 
          <option value="Sierra Leone">Sierra Leone</option> 
          <option value="Singapore">Singapore</option> 
          <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option> 
          <option value="Slovenia">Slovenia</option> 
          <option value="Solomon Islands">Solomon Islands</option> 
          <option value="Somalia">Somalia</option> 
          <option value="South Africa">South Africa</option> 
          <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option> 
          <option value="Spain">Spain</option> 
          <option value="Sri Lanka">Sri Lanka</option> 
          <option value="St. Helena">St. Helena</option> 
          <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option> 
          <option value="Sudan">Sudan</option> 
          <option value="Suriname">Suriname</option> 
          <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option> 
          <option value="Swaziland">Swaziland</option> 
          <option value="Sweden">Sweden</option> 
          <option value="Switzerland">Switzerland</option> 
          <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
          <option value="Taiwan">Taiwan, Province of China</option> 
          <option value="Tajikistan">Tajikistan</option> 
          <option value="Tanzania">Tanzania, United Republic of</option> 
          <option value="Thailand">Thailand</option> 
          <option value="Togo">Togo</option> 
          <option value="Tokelau">Tokelau</option> 
          <option value="Tonga">Tonga</option> 
          <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
          <option value="Tunisia">Tunisia</option> 
          <option value="Turkey">Turkey</option> 
          <option value="Turkmenistan">Turkmenistan</option> 
          <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
          <option value="Tuvalu">Tuvalu</option> 
          <option value="Uganda">Uganda</option> 
          <option value="Ukraine">Ukraine</option> 
          <option value="United Arab Emirates">United Arab Emirates</option> 
          <option value="United Kingdom">United Kingdom</option> 
          <option value="United States" >United States</option> 
          <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
          <option value="Uruguay">Uruguay</option> 
          <option value="Uzbekistan">Uzbekistan</option> 
          <option value="Vanuatu">Vanuatu</option> 
          <option value="Venezuela">Venezuela</option> 
          <option value="Viet Nam">Viet Nam</option> 
          <option value="Virgin Islands (British)">Virgin Islands (British)</option> 
          <option value="Virgin Islands">Virgin Islands (U.S.)</option> 
          <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option> 
          <option value="Western Sahara">Western Sahara</option> 
          <option value="Yemen">Yemen</option> 
          <option value="Yugoslavia">Yugoslavia</option> 
          <option value="Zambia">Zambia</option> 
          <option value="Zimbabwe">Zimbabwe</option> 
        </select> <td class="error"><?php echo $countryErr;?></td>
</tr><tr class="blank_row" rowspan = "2"></tr><tr>
  <td align="right"> Phone: </td>
  <td align="left"><input type="text" name="phone" value="<?php echo $phone;?>" > </td> <td class="error"><?php echo $phoneErr;?></td> 
  <td align="right"> Email: </td>
  <td align="left"><input type="text" name="email" value="<?php echo $email;?>" > </td> <td class="error"><?php echo $emailErr;?></td> 
</tr><tr class="blank_row"  rowspan = "2"></tr>


<tr>
<td class="blank_row" colspan = "2"></td>
<td align="right"><input type="submit" name="next" class="button" value="Next"  ></td>


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

if ( $firstnameErr !="" || $address1Err !="" || $address2Err !="" || $lastnameErr!="" || $cityErr !="" || $stateErr !="" ||
 $phoneErr !="" || $emailErr!="" || $countryErr !="" ||  $postalcodeErr !=""  )
{
?> <script>
        <?php echo " alert('Entry Response Results\\n\\nPlease Fix the Entries with errors to continue ');"; ?>
         
    </script> <?php 

}

else {

$firstname= $_POST['firstname'];
$lastname = $_POST['lastname'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$postalcode = $_POST['postalcode'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$country = $_POST['country'];


$sql = "INSERT INTO personal (firstname, lastname,  address1, address2, city, state, postalcode, country,  phone, email) 
VALUES ('$firstname', '$lastname','$address1', '$address2', '$city', '$state', '$postalcode' , '$country', '$phone', '$email') ";

if ($conn->query($sql) === TRUE) {
           ?> <script>
           <?php echo " alert('Data Saved\\n\\n Click OK to go to Next Page ');"; ?>
         window.location = 'info.php';
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
