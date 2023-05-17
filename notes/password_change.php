<?php 
/*include_once('conn.php');*/
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notedb";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
$mess='';
$mess2='';
$mess3='';
?>
<?php 
$log1=@$_POST['login'];
$log2=@$_POST['nlogin'];
$pass1=@$_POST['password'];
$pass2=@$_POST['npassword'];
$cpass=@$_POST['cpassword'];
if(isset($_POST['bval'])){
$mrq=mysqli_query($conn,"select * from secret");
while($rsu=mysqli_fetch_assoc($mrq)){
   
  if($log1==$rsu['login'] && $pass1==$rsu['password']){
  mysqli_query($conn,"update secret set login='$log2',password='$pass2' where login='$log1' and password='$pass1'");
  $mess='<b class="succes">Changement réussie !</b>';
  }
  else
   $mess="<b class='erreur'>Autorisation refusée !!</b>";
}

}

?>
<?php  

?>

<html>
<head>
	<title>chcode_appli</title>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="cssfile2.css">
</head>
<style>
  #a{text-align: center; color: blue;} 
</style>
<body style="background-color:coral">
<hr>
<a href="index.php">NOTES</a><br><br>
	<div align="center">
	<h2 >CHANGEMENT DE MOT DE PASSE</h2>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
  <table align="">
   <tr><td></td><td><?php print $mess;?></td></tr>
   <tr><td></td><td><strong >ANCIEN NOM D'UTILISATEUR :</strong></td></tr>
   <tr><td></td><td><input type="text" name="login" class="champ" size="25"  ></td></tr>
   <tr><td></td><td><strong >ANCIEN MOT DE PASSE :</strong></td></tr>
   <tr><td></td><td><input type="password" name="password" class="champ" size="25"  ></td></tr>
   <tr><td></td><td><strong >NOUVEAU NOM D'UTILISATEUR :</strong></td></tr>
   <tr><td></td><td><input type="password" name="nlogin" class="champ" size="25"  ></td></tr>
   <tr><td></td><td><strong >NOUVEAU MOT DE PASSE :</strong></td></tr>
   <tr><td></td><td><input type="text" name="npassword" class="champ" size="25"  ></td></tr>
   
   <tr><td></td><td><input type="submit" name="bval" value="Valider" class="bouton" ></td></tr>
  </table>
  </form>
	</div>
	<hr >
</body>
</html>