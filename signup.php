<?php
require_once('functions.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    
    $err = array();
    
    if($password1 != $password2){
        $err['password2'] = 'password ';
    }
    
    if(empty($err)){
        $dbh = connectDB();
        if(isset($_POST["submit"])){
            $stmt = $dbh->prepare("insert into users (name,email,password) values (:name,:email,:password)");
            $params = array(":name"=>$username,":email"=>$email,":password"=>hashpass($password1));
            $stmt->execute($params);
        }
        header("Location: index.html");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lnag="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>Palmy</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <header class="header">
        
    </header>
    <section class="regist">
    <?php echo $err['password2'];?>
    <div class="position">
        <div class="title-style">
            <h2>アカウント登録</h2>
        </div>
        <form class="login" action="signup.php" method="POST" enctype="multipart/form-data">
            <table align="center">
            <tr>
            <td><input type="text" name="username" value="<?php echo h($username);?>" placeholder="user name"></td>
            </tr>
            <tr>
            <td><input type="text" name="email" value="<?php echo h($email);?>" placeholder="mail address"></td>
            </tr>
            <tr>
            <td><input type="password" name="password1" value="" placeholder="password"></td>
            </tr>
            <tr>
            <td><input type="password" name="password2" placeholder="Confirm Password"></td>
            </tr>
            </table>
            <input type="submit" name="submit" value="登録する">   
            <div class="text-back">
			    <a href="index.html">home</a>
            </div>
			</form>
    </div>
    </section>

    <footer class="footer">
        © palmy site
    </footer>
</body>
</html>