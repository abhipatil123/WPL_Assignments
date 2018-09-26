<html>
    <head>
        <title>Login </title>
    </head>

    <body>
        <?php
            session_start();

            //Variables
            $emailPattern = "/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3}$/";
            $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/";
            $usersName = $_POST['username'];
            $eMail = $_POST['email'];
            $passWord = $_POST['password'];

            if(empty($usersName)||empty($eMail)||empty($passWord)){
                header("Location: login.html");
                exit();
            } 
            else
            {
                if((!preg_match($emailPattern, $eMail)) || 
                  (!preg_match($passwordPattern, $passWord)))
                {
                    header("Location: login.html");
                    exit();
                }

                $_SESSION["username"] = $usersName;
                $_SESSION["email"] = $eMail;
                $_SESSION["password"] = $passWord;
                header("Location: welcome.php");
                exit();
            }
        ?>    
    </body>
</html>