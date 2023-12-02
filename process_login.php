<?php
if(isset($_POST['user']) && isset($_POST['pass'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    try{
        $conn = new PDO("mysql:host=localhost;dbname=btth01_cse485", "root", "");
        $sql = "SELECT * FROM users WHERE username = :user";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $row = $stmt->fetch();
            $pass_saved = $row['password'];
            if(password_verify($pass, $pass_saved)){
                header("Location: admin/index.php");
                exit(); 
            } else {
                $error = "Password invalid";
                header("Location: login.php?error=$error");
                exit();
            }
        } else {
            $error = "Username not found";
            header("Location: login.php?error=$error");
            exit();
        }
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}
?>
