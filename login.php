<?php

require_once('functions.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $err = array();
    
    $dbh = connectDB();
    
    if(!$me = userMatch($email,$password,$dbh)){
        $err['email'] = '不一致';
    }else{
        $err['email'] = '一致';
    }
    
    if(empty($err)){
        /*
        新しいセッションID
        
        プログラム
        */
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
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header class="header">
        
    </header>
    <section class="main_login">
        <?php echo $err['email'];?>
    <div class="position">
        <div class="title-style">
            <h2>LOGIN</h2>
        </div>
        <form class="login" action="" method="POST" enctype="multipart/form-data">
        <table align="center">
        <tr>
        <td><input type="text" name="email" placeholder="email"></td>
        </tr>
        <tr>
        <td><input type="password" name="password" value="" placeholder="password"></td>
        </table>
        <input type="submit" value="ログイン">
        <div class="regist"
             ><a href="signup.php"> 新規登録はこちら</a>
        </div>
        </form>
    </div>
    </section>

    <footer class="footer">
        © palmy site
    </footer>
</body>
</html>