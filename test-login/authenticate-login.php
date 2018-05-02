<?
//not yet working
require('connectToDb.php');

if(isset($_POST['user-id']) and isset($_POST['password'])) {
    
    $username = $_POST['user-id'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM `users` WHERE user_name='$username' and user_pass='$password'";
    
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    $count = mysqli_num_rows($result);
    
    echo $query;

# if ($count == 1){   
#     echo "Login Successful!";
#       echo "<script type='text/javascript'>alert('Login Successful!!')</script>";
    
#    }else {
#       echo "<script type='text/javascript'>alert('Login Failed!')</script>";
#   }
    
}

?>