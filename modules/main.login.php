<?php
class logining{
    function isLoggedin(){
        if (isset($_REQUEST['logout'])){
                logining::logout();
        } else {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])){
                logining::checklogin($_SESSION['username'],$_SESSION['password']);
            } elseif (isset($_REQUEST['username']) && isset($_REQUEST['password'])){
                logining::checklogin($_REQUEST['username'],$_REQUEST['password']);
            } else {
                logining::login();
            }
        }
    }
    function checklogin($name,$password){
		global $PDO;
		$pdo = new PDO('mysql:host=localhost;dbname=paitorocxon', $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD']);

		$name = mysql_real_escape_string($name);
		$password = mysql_real_escape_string($password);
		
		$sql = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
		
		//$sql="SELECT * FROM users WHERE username='$name' and password='$password'";
		
		$executed = $sql->execute(array($name, $password));
		
		if($executed){	
			$row = $sql->fetch();
			$IS_VALID = 0;
			
			if ($row['username'] == $name && $row['password'] == $password) {
				$IS_VALID = 1;
			}
		   
			
			if ($IS_VALID == 1){
				$_SESSION['username'] = $name;
				$_SESSION['password'] = $password;
				$_SESSION['dir'] = getcwd();
				
			} else {
				logining::login();
			}
		}
	}
    function login(){
        $_SESSION = array();
        $_SESSION['username'] = NULL;
        $_SESSION['password'] = NULL;
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        #session_destroy();
                $lastusername = '';
                $autofocus = '';
                $message = '';
                if (isset($_REQUEST['username'])){
                    $autofocus='autofocus';
                    $lastusername = $_REQUEST['username'];
                    $message = '<font color="#F00">Username or Password incorrect</font><br>';
                }
                die('
                <form action=""  method="POST">'.$message.'
                <input type="text" name="username" placeholder="Username" value="'.$lastusername.'"><br>
                <br><input type="password" name="password" placeholder="Password" '.$autofocus.'><br>
                <input type="submit" value="Login">
                </form>'
                );
    }
    function logout(){
        $_SESSION = array();
        $_SESSION['username'] = NULL;
        $_SESSION['password'] = NULL;
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        #session_destroy();
        die('<meta http-equiv="refresh" content="0; url=./" />');
    }
}


