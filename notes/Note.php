<?php 

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
$matricule=@$_POST['matricule'];
$matiere=@$_POST['matiere'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>chcode_appli</title>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="cssfile2.css">
</head>

<?php
 session_start();
 if($_SESSION['username'] !== ""){
 $user = $_SESSION['username'];
 // afficher un message
 echo " <font color=black> Bonjour  <font color=white>$user </font>, vous êtes</font> <font color=lime>connecté </font>";
 }
 ?>
<body style="background-color:coral">
<div align="center" >
	<a style=" color:blue" href="login_user.php">ENREGISTREMENT DES NOTES</a><br><br>
	<h2>Recherche de notes par numéro de matricule et matière :</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
  <table align="">
    <tr><td></td><td><strong >Matricule :</strong></td></tr>
   <tr><td></td><td><input type="text" name="matricule" class="champ" size="25"  ></td></tr>
   <tr><td></td><td><strong>Matière :</strong></td></tr>
   <tr><td></td><td><select name="matiere" id="matiere"  >
        <option  value="WEB">WebClient</option>
        <option  value="FR">Francais</option>
        <option  value="RES">Reseau</option>

     </select></td></tr>
   <tr><td></td><td><input type="submit" name="brech" value="Chercher" class="bouton" ></td></tr>
  </table>
  </form>
  <br>
  <h2>Recherche de notes par numéro de matricule (relevé de notes d'un étudiant) :</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
  <table align="">
    <tr><td></td><td><strong >Matricule :</strong></td></tr>
   <tr><td></td><td><input type="text" name="matricule" class="champ" size="25"  ></td></tr>
   <tr><td></td><td><input type="submit" name="brech2" value="Chercher" class="bouton" ></td></tr>
  </table>
  </form>
  <br>
  <?php 
  //liste des notes 1
  if(isset($_POST['brech'])){
  $sql=mysqli_query($conn,"select * from note where matricule='$matricule' and matiere='$matiere'");
  print'<table border="4"  class="tab" style="border-color:white; color: black;"><tr><th>Matricule</th><th>Matiere</th><th>Controle</th><th>Examen</th><th>TP</th></tr>';
  while($rst2=mysqli_fetch_assoc($sql)){
	 print"<tr>";
	         echo"<td>".$rst2['matricule']."</td>";
	         echo"<td>".$rst2['matiere']."</td>";
	         echo"<td>".$rst2['controle']."</td>";
	         echo"<td>".$rst2['examen']."</td>";
	         echo"<td>".$rst2['tp']."</td>";
	         print"</tr>";
	}
	  print'</table>';
	  }
  
  ?>
  
  <?php 
  //liste des notes 2
  if(isset($_POST['brech2'])){
  $sql=mysqli_query($conn,"select * from note where matricule='$matricule'");
  print'<table border="4" class="tab" style="border-color:white; color: black;" ><tr><th>Matricule</th><th>Matiere</th><th>Controle</th><th>Examen</th><th>TP</th></tr>';
  while($rst2=mysqli_fetch_assoc($sql)){
	 print"<tr>";
	         echo"<td>".$rst2['matricule']."</td>";
	         echo"<td>".$rst2['matiere']."</td>";
	         echo"<td>".$rst2['controle']."</td>";
	         echo"<td>".$rst2['examen']."</td>";
	         echo"<td>".$rst2['tp']."</td>";
	         print"</tr>";
	}
	  print'</table>';
	
	  }
  
  ?>
	<div align="center">
	<a style="color: blue" href="index.php?action=deconn">DECONNEXION</a>
	</div>
</body>
</html>