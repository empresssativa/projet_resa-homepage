<?php

require "header.php";

require "function.php";

$p=new Connection('project_resa','localhost','root','') ;
if (isset($_POST["submit"])) {
    $lastname=$_POST['lastname'];
    $firstname=$_POST['firstname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
    if (!empty($_POST["lastname"])&&!empty($_POST["firstname"])&&!empty($_POST["phone"])&&!empty($_POST["email"])&&!empty($_POST["password"]))
    {
        $p->insertData($lastname,$firstname,$phone, $email, $password);
            ?><br>
            <div class="container">
                <div class="col-sm-12 section-title text-center mb-2">
                    <h3>
                        <?php echo 'Registered successfully, please connect in homepage '.'<a href="index.php">Here.</a>';  ?>
                    </h3>
                </div>
            </div>
            <hr><?php
            
        }else{
            echo 'there are an probleme';
    }
}



?>


<?php

require "footer.php";

?>