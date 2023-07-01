<!DOCTYPE html>
<html>
<head>

  <style>
body{
    margin: 0;
    padding: 0;
    background: url(CSS/img/background.jpg);
    background-size: cover;
    font-family: sans-serif;
  background-size: cover;
    /* background-repeat: no-repeat; */


}

.loginbox{
    width: 320px;
    height: 360px;
    background: #000;
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}

.avatar{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}

h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}

.loginbox p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.loginbox input{
    width: 100%;
    margin-bottom: 20px;
}

.loginbox input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.loginbox input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #fb2525;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.loginbox input[type="submit"]:hover
{
    cursor: pointer;
    background: #ffc107;
    color: #000;
}
.loginbox a{
    text-decoration: none;
    font-size: 12px;
    line-height: 20px;
    color: darkgrey;
}

.loginbox a:hover
{
    color: #ffc107;
}



  </style>
  <title>S'identifier</title>
	<meta charset="UTF-8">

</head>
<body>
<div class="full-height">
  <form action="./verification.php" method="post">
    <div class="bienvenu">
      <?php
        if(isset($_GET['erreur'])){
          $err = $_GET['erreur'];
        if($err==1 || $err==2)
          echo "<span style='color:red;text-align:center;font-size:14px;' >Utilisateur ou mot de passe incorrect</span>";
        }
        ?>

    <div class="loginbox">
    <img src="CSS/img/avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form>
         <label for="username">  <p>Username</p></label>
            <input type="text" name="username" placeholder="Enter Username">
           <label for="password"> <p>Password</p></label>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" value="Login">

        </form>

    </div>



  </form>
</div>
</body>
</html>
