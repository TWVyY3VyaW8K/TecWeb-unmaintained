<?php
	require_once "DbConnector.php";
//pass per account admin AdminIsHere

	session_start();
	$pwd= htmlspecialchars($_POST["pwd"], ENT_QUOTES, "UTF-8");//cleaning the input
	$usr= htmlspecialchars($_POST["usr"], ENT_QUOTES, "UTF-8");
	$name= htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");//cleaning the input
	$surname= htmlspecialchars($_POST["surname"], ENT_QUOTES, "UTF-8");
	if($_POST['usr']==$_SESSION['Username']){
		//connecting to db
		$myDb= new DbConnector();
		$myDb->openDBConnection();
		$pwd=password_hash($pwd,PASSWORD_BCRYPT);
		if($myDb->connected){

			$result = $myDb->doQuery("UPDATE artisti SET Password='$pwd', Nome='$name', Cognome='$surname' where Username ='$usr'");//excecute query
			if($result === TRUE){//if inserted

				echo "New updates saved correctly";
				$_SESSION["isLogged"] = "true";
				$_SESSION["Username"] = $usr;

			}else{
				echo 'Error. Try Again';
			}
		}
		else
			echo "Connection Error";
		$myDb->disconnect();
	}else{
		echo "Nice try!! But you can't do it ";
	}
?>
