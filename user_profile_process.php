
<?php
  include "session_user.php";
?>

<?php
  include "connection.php";
?>

<?php
    
    if($_POST["submit"]=="SUBMIT"){

          if($_POST["password"]==$_POST["cpassword"]){

                    // sql to insert entry
                      $a=$_GET['id'];
                      $name=$_POST["name"];
                      $no_tel=$_POST["no_tel"];
                      $email=$_POST["email"];
                      $block=$_POST["block"];
                      $password=$_POST["password"];

                      $sql7= "UPDATE user SET name='".$name."', no_tel='".$no_tel."', email='".$email."', block='".$block."' WHERE username='".$a."'";
                    if ($link->query($sql7)== TRUE) 
                    {
                        echo"<script>alert('Update Successfully.')</script>";
                            echo"<script>setTimeout(\"location.href='homepage_user.php';\",10);</script>";
                      
                    }
                    else
                    {
                      echo"<script>alert('Update Unsuccessfully! Try Again.')</script>";
                          echo"<script>setTimeout(\"location.href='user_profile.php?id=".$a."';\",10);</script>";
                    } 
          }else{

                echo"<script>alert('Password Is Not Match! Try Again.')</script>";
                echo"<script>setTimeout(\"location.href='user_profile.php?id=".$a."';\",10);</script>";
          }
    }elseif($_POST["cancel"]=="CANCEL"){

      echo"<script>setTimeout(\"location.href='user_homepage.php?';\",10);</script>";
    }
  $link->close(); 
?>
