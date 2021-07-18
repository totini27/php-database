 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Sign-Up</title>
 </head>
 <body>

 	<h1>Sign-Up Form for Database I/O:</h1>

 	<?php


      include 'dbinsert.php';


 	$signupSuccess = $signupFailed = "";
  $flag = false;
  $isvalid = true;
  $usernameErr = "";


 	if ($_SERVER['REQUEST_METHOD'] === "POST")
 	{


 		if($_POST['Password'] != $_POST['PasswordAgain'])
 		{	
 			$failed = "Password dose not match";
 		}
 		else
 		{
 			 

            // empty validation for required field
            if(empty($Firstname=basic_validation($_POST['Firstname']))) $flag = true;
            if(empty($Lastname=basic_validation($_POST['Lastname']))) $flag = true;
            if(empty($Gender=basic_validation($_POST['Gender']))) $flag = true;
            if(empty($DOB=basic_validation($_POST['DOB']))) $flag = true;
            if(empty($religion=basic_validation($_POST['Religion']))) $flag = true;
            if(empty($Email=basic_validation($_POST['Email']))) $flag = true;
            if(empty($Username=basic_validation($_POST['Username']))) $flag = true;
            if(empty($Password=basic_validation($_POST['Password']))) $flag = true;

            $phone = basic_validation($_POST['phone']);
            $presentAddress = basic_validation($_POST['presentaddress']);
            $permanentAddress = basic_validation($_POST['Permanentaddress']);
            $website = basic_validation($_POST['linked']);


             if($flag)
               $signupFailed = "Field can not be empty.";
             else
             {
               


               if(strlen($Firstname) > 50)
                  {
                    $usernameErr = "Firstname max character is 50.";
                    $isvalid = false;
                  }
               if(strlen($Lastname) > 50)
                  {
                    $usernameErr = "Lastname max character is 50.";
                    $isvalid = false;
                  }
                if(strlen($Gender) > 50)
                  {
                    $usernameErr = "Gender max character is 50.";
                    $isvalid = false;
                  }
               if(strlen($DOB) > 50)
                  {
                    $usernameErr = "DOB max character is 50.";
                    $isvalid = false;
                  }
                if(strlen($phone) > 50)
                  {
                    $usernameErr = "phone max character is 50.";
                    $isvalid = false;
                  }
               if(strlen($Email) > 50)
                  {
                    $usernameErr = "Email max character is 50.";
                    $isvalid = false;
                  }
                if(strlen($username) > 50)
                  {
                    $usernameErr = "Username max character is 50.";
                    $isvalid = false;
                  }
               if(strlen($Password) > 50)
                  {
                    $usernameErr = "Password max character is 50.";
                    $isvalid = false;
                  }
                if(strlen($religion) > 50)
                  {
                    $usernameErr = "Religion max character is 50.";
                    $isvalid = false;
                  }
               if(strlen($presentAddress) > 100)
                  {
                    $usernameErr = "presentAddress max character is 50.";
                    $isvalid = false;
                  }
                if(strlen($permanentAddress) > 100)
                  {
                    $usernameErr = "permanentAddress max character is 50.";
                    $isvalid = false;
                  }
               if(strlen($website) > 50)
                  {
                    $usernameErr = "website max character is 50.";
                    $isvalid = false;
                  }


                  if(isvalid)
                  {
                    $res = register($Firstname, $Lastname, $Gender, $DOB, $religion, $presentAddress, $permanentAddress, $phone, $Email, $website, $Username, $Password);

                    if($res) 
                     {
                        $signupSuccess = "Sign-Up succesfull. Please log-in";
                     }
                     else
                      $signupFailed = "Error while saving.";
                  }
            }

        }
    }

		// validate input
    function basic_validation($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }


    ?>


    <form action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF'])); ?>" method = "POST">



        <fieldset>
           <legend>Basic Information:</legend>

      <table>
       <tbody>

         <tr>
           <td><label for="fname">First Name:<span style="color: red"><?php echo "*"; ?></span></label></td>
           <td><input type="text" id="fname" name="Firstname"  ></td>
        </tr>

         <tr>
           <td><label for="lname">Last name:<span style="color: red"><?php echo "*"; ?></span> </label></td>
           <td><input type="text" id="lname" name="Lastname"  ></td>
        </tr>


           <tr>
           <td> Select Gender:<span style="color: red"><?php echo "*"; ?></span></td>
           <td><input type="radio" id="Male" name="Gender" value="Male"  >
           <label for="Male">Male</label>  
           

         
           <input type="radio" id="Female" name="Gender" value="Female"> 
           <label for="Female">Female</label> 
        

         
           <input type="radio" id="Other" name="Gender" value="Other"> 
           <label for="Other">Other</label></td>
           </tr>


         <tr>
           <td><label for="DOB">DOB:<span style="color: red"><?php echo "*"; ?></span></label></td>
           <td><input type="date" id="DOB" name="DOB"  ></td>
        </tr>

         <tr>
           <td>Religion:</td>
           <td><select name="Religion" > 
             <!--  <option value="" name="" ></option>  -->
              <option value="islam" name="Religion" >islam</option> 
              <option value="hindu" name="Religion" >hindu</option> 
              <option value="christian" name="Religion" >christian</option> 
          </select></td>
       </tr>

       </tbody>
    </table>

      </fieldset>
      <br><br><br>




      <fieldset>
        <legend>Contact Information:</legend>


        <table>
           <tbody>

              <tr>
                 <td><label for="presentaddress">presentaddress:</label></td>
                 <td><textarea id="presentaddress" name="presentaddress" rows="2" cols="20"></textarea></td>
              </tr>

              <tr>
                <td><label for="Permanentaddress">Permanentaddress:</label></td>
                <td><textarea id="Permanentaddress" name="Permanentaddress" rows="2" cols="20"></textarea></td>
             </tr>


             <tr>
               <td><label for="phone">phone:<span style="color: blue"><?php echo "*"; ?> </label></span>
               <td><input type="tel" id="phone" name="phone" ></td>
              </tr>

              <tr>
                <td><label for="Email">Email:<span style="color: blue"><?php echo "*"; ?></span> </label></td>
                <td><input type="Email" id="Email" name="Email"  ></td>
             </tr>

             <tr>
                <td><label for="linked">Personal Website linked : </label></td>
                <td><input type="url" id="linked" name="linked"></td>
             </tr>
          </tbody>
       </table>


    </fieldset>


      <br><br><br>


      <fieldset>
        <legend>Account Information:</legend>

        <table>
         <tbody>

            <tr>
              <td><label for="Username">Username:<span style="color: red"><?php echo "*"; ?></span></label></td>
              <td><input type="text" id="Username" name="Username" placeholder="Username"  ></td>
           </tr>

           <tr>
             <td><label for="Password">Password:<span style="color: red"><?php echo "*"; ?></span></label></td>
             <td><input type="Password" id="Password" name="Password" placeholder="Enter Password"  >
              <span style="color: red"><?php echo $failed; ?></span></td>
           </tr>

           <tr>
             <td><label for="PasswordAgain">Password:<span style="color: red"><?php echo "*"; ?></span></label></td>
             <td><input type="Password" id="PasswordAgain" name="PasswordAgain" placeholder="Re-Enter Password"  ></td>
          </tr>

       </tbody>
    </table>



 </fieldset>

      <br>
      <input type="submit" value="Sign-up">

      <span style="color: blue"><?php echo $signupFailed; ?></span>
      <span style="color: blue"><?php echo $usernameErr; ?></span>
      <span style="color: yellow"><?php echo "<br><br><br>click here to <a href = 'login.php'>login</a>" ?></span>


  </form>

</body>
</html>