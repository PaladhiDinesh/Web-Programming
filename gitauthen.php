<?php include "session.php"; ?>         
<?php  
if(isset($_GET['code']))
    {
            $code = $_GET['code'];
            $post = http_build_query(array(
                'client_id' => 'dafdedcc9f75c7e7242f',
                'redirect_url' => 'redirect_url',
                'client_secret' => 'c93d176f9425de2048f9d2c868e534347a620f8a',
                'code' => $code,
            ));

            $context = stream_context_create(
                array(
                    "http" => array(
                        "method" => "POST",
                        'header'=> "Content-type: application/x-www-form-urlencoded\r\n" .
                                    "Content-Length: ". strlen($post) . "\r\n".
                                    "Accept: application/json" ,  
                        "content" => $post,
                    )
                )
            );

            $json_data = file_get_contents("https://github.com/login/oauth/access_token", false, $context);
            $r = json_decode($json_data , true);
            $access_token = $r['access_token'];
            $scope = $r['scope']; 

            /*- Get User Details -*/
            $url = "https://api.github.com/user?access_token=".$access_token."";
            $options  = array('http' => array('user_agent'=> $_SERVER['HTTP_USER_AGENT']));
            $context  = stream_context_create($options);
            $data = file_get_contents($url, false, $context); 
            $user_data  = json_decode($data, true);
            $username = $user_data['login'];
            echo $username;
                $query = "SELECT * from login_details where admin='$username'";
                $result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            /*- Get User e-mail Details -*/                
            $url = "https://api.github.com/user/emails?access_token=".$access_token."";
            $options  = array('http' => array('user_agent'=> $_SERVER['HTTP_USER_AGENT']));
            $context  = stream_context_create($options);
            $emails =  file_get_contents($url, false, $context);
            $email_data = json_decode($emails, true);
            $email_id = $email_data[0]['email'];
            $email_primary = $email_data[0]['primary'];
            $email_verified = $email_data[0]['verified'];

            if ($result->num_rows > 0){
                $_SESSION['login_user']=$row['user_id'];
                $_SESSION['login_name']=$row['admin'];
                $_SESSION['admin_value']=$row['admin_rights'];
               $_SESSION['emailid']=$row['emailid'];
                 $_SESSION['checkgit']=$row['checkgit'];
                header('Location:main_home.php');
                }
                else
                {
                    $query="INSERT INTO login_details(admin,password,emailid,checkgit) VALUES 

('$username','defaultpass','$email_id',1)";

                    $result = mysqli_query($connection,$query) or die("Failed to query database".mysql_error());
                    $query2="SELECT * from login_details where admin='$username'";
                    $result2 = mysqli_query($connection,$query2) or die("Failed to query database".mysql_error());
                    $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);

                    
                    if ($result2->num_rows > 0){
                        $_SESSION['login_user']=$row['user_id'];
                        $_SESSION['login_name']=$row['admin'];
                        $_SESSION['admin_value']=$row['admin_rights'];
                         $_SESSION['emailid']=$row['emailid'];
                        $_SESSION['checkgit']=$row['checkgit'];
                        header('Location:main_home.php');
                        }
                        else
                        { 
                            echo "fail";
                        } 

                }
    }
    ?>
