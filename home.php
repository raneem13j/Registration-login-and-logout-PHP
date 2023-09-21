<?php include('config.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration and Login</title>
    <link rel= "stylesheet" href= "style.css">
</head>
<body>
<div id="response">
        <?php  
        if (isset($_POST['submit'])) {
            $fullName = $_POST['fullName'];
            $userName = $_POST['userName'];
            $password = sha1($_POST['passwor']); // Typo: should be 'password'
            $confirmPassword = $_POST['confirmPassword'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dateOfBirth = $_POST['dateOfBirth'];
        
            $sql = "INSERT INTO users(fullName, userName, passwor, confirmPassword, email, phone, dateOfBirth) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$fullName, $userName, $password, $confirmPassword, $email, $phone, $dateOfBirth]);
        
            if ($result) {
                echo "Successfully saved, login please";
            } else {
                echo "There were errors while saving the data.";
            }
        }
        ?>
    </div>
    <div class="left">
        <!-- Registration form goes here -->
        <h2>Registration</h2>
        <form action="home.php" method="post">
           
            <!-- Add registration form fields here -->
            <label>Full Name</label>
            <input type="text" name="fullName" id = "fullName" placeholder= "Full Name" required/>
            <label>Username</label>
            <input type="text" name="userName" id = "userName" placeholder= " Username" required/>
            <label>Password</label>
            <input type="password" name="passwor" id = "password" placeholder= "Password" required/>
            <label>Confirm Password</label>
            <input type="password" name="confirmPassword" id = "confirm" placeholder= "Confirm Password" required/>
            <label>Email</label>
            <input type="email" name="email" id = "email" placeholder= "Email" required/>
            <label>Phone</label>
            <input type="text" name="phone" id = "phone" placeholder= "Phone" required/>
            <label>Date of Birth</label>
            <input type="text" name="dateOfBirth" id = "DOB" placeholder= "Date of Birth" required/>
          

            <button type= "submit" id = "register" name="submit">submit</button>
      
        </form>
        
    </div>
    <div class="right">
        <!-- Login form goes here -->
        <h2>Login</h2>
        <form action="login.php" method="post">
        <?php if(isset($error)){ ?>
        <p class="error"><?php echo $error; ?></p>
        <?php } ?>
            <!-- Add login form fields here -->
            <label>Username</label>
            <input type="text" name="userName" placeholder= "Username" required/>
            <label>Password</label>
            <input type="password" name="password" placeholder= "Password"required/>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
 

</body>
</html>
