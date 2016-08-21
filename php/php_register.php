<?php
include 'config.php';
include 'checksession.php';
  
    $db = mysqli_connect($server, $u_name, $dbpass, $dbname);
    
    $username = $_POST['username'];
    mysqli_real_escape_string($db, $username);
    $password = $_POST['password'];
    $password = $db->real_escape_string($password);
    $mobile = $_POST['mobile'];
    $mobile = $db->real_escape_string($mobile);
    $email = $_POST['email'];
    $email = $db->real_escape_string($email);


if(isset($_POST['submit']))
{
    $search = "SELECT * FROM user where username = '{$username}'";
    $results = mysqli_query($db, $search);
    $row = mysqli_fetch_assoc($results);
    if ($row == true)
    {
        header("Location: ../register.php?error=01");
    }


    else
        {
            $username = $db->real_escape_string($username);

            if($sql = $db->prepare("INSERT INTO user (username, password, mobile, email) VALUES (?, ?, ?, ?);"))
            {
                $sql->bind_param("ssss", $_POST['username'], $_POST['password'], $_POST['mobile'], $_POST['email']);
                if($sql->execute())
                	{  
                        $sql->close();
                        $db->close();

                        echo 
                        '
                        <script type="text/javascript">
                        alert("Successfully Registered");
                        location = "../index.php";
                        </script>
                        ';
                	}
                else
                    header("Location: ../register.php?error=02");
            }
        }    
}

?>