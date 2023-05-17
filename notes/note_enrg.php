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
//Si l'utilisateur n'est pas connecté, on le ramène à la page index
if (!isset($_SESSION['id'])) {
	header('Location: login_user.php?action=redirect');
	exit();
}
?>
<?php  
//insertion des notes de controle
$matricule=@$_POST['matricule'];
$matiere=@$_POST['matiere'];
$controle=@$_POST['controle'];
if(isset($_POST['bcontrole'])&&!empty($matricule)){
$rq=mysqli_query($conn,"insert into note(matricule,matiere,controle) values('$matricule','$matiere','$controle')");
if($rq){
$mess='<b class="succes">Insertion réussie !</b>';
}
else
$mess="<b class='erreur'>Impossible d'insérer !</b>";
}

?>

<?php  
//insertion des notes d'examen
$examen=@$_POST['examen'];
if(isset($_POST['bexamen'])&&!empty($matricule)){
$rq=mysqli_query($conn,"update note set examen='$examen' where matricule='$matricule' and matiere='$matiere'");
if($rq){
$mess='<b class="succes">Insertion réussie !</b>';
}
else
$mess="<b class='erreur'>Impossible d'insérer !</b>";
}

?>

<?php  
//insertion des notes de tp
$tp=@$_POST['tp'];
if(isset($_POST['btp'])&&!empty($matricule)){
$rq=mysqli_query($conn,"update note set tp='$tp' where matricule='$matricule' and matiere='$matiere'");
if($rq){
$mess='<b class="succes">Insertion réussie !</b>';
}
else
$mess="<b class='erreur'>Impossible d'insérer !</b>";
}

?>

<?php 
//supprimer notes
if(isset($_POST['bsupp'])&&!empty($matricule)){
$rq=mysqli_query($conn,"delete from note  where matricule='$matricule' and matiere='$matiere'");
if($rq){
$mess='<b class="succes">Suppréssion réussie !</b>';
}
else
$mess="<b class='erreur'>Impossible de supprimer !</b>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>chcode_appli</title>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="cssfile2.css">
</head>

<body style="background-color:coral">
	<div align="center">
	<br><a style=" color:blue" href="index.php?action=deconn">DECONNEXION</a></br>
  <a style=" color:blue" href="Note.php">NOTES</a><br><br>
	   <h2>ENREGISTREMENT DES NOTES :</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
  <table align="">
  
     <tr ><td></td><td> <?php print $mess;?></td></tr>
    <tr><td></td><td><strong >Matricule :</strong></td></tr>
   <tr><td></td><td><input type="text" name="matricule" class="champ" size="25"  ></td></tr>
   <tr><td></td><td><strong>Matière :</strong></td></tr>
   <tr><td></td><td><select name="matiere" id="matiere"  >
        <option value="WEB">WebClient</option>
        <option  value="FR">Francais</option>
        <option  value="RES">Reseau</option>


     </select></td></tr>
   <tr><td></td><td><strong>Controle :</strong></td></tr>
   <tr><td></td><td><input type="text" name="controle" class="champ" size="25"></td></tr>
   <tr><td></td><td><strong>Examen :</strong></td></tr>
   <tr><td></td><td><input type="text" name="examen" class="champ" size="25"></td></tr>
   <tr><td></td><td><strong>TP :</strong></td></tr>
   <tr><td></td><td><input type="text" name="tp" class="champ" size="25"></td></tr>
   <tr><td></td><td><input type="submit" name="bcontrole" value="Enregistrer note controle" class="bouton" ></td></tr>
   <tr><td></td><td><input type="submit" name="bexamen" value="Enregistrer note examen " class="bouton" ></td></tr>
   <tr><td></td><td><input type="submit" name="btp" value="Enregistrer note tp " class="bouton" ></td></tr>
   <tr><td></td><td><input type="submit" name="bsupp" value="Suppréssion" class="bouton" ></td></tr>
  </table>
  </form>
  <h2>Recherche de notes par matière :</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
  <table align="">
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
  <?php 
  //liste des notes
  if(isset($_POST['brech'])){
  $sql=mysqli_query($conn,"select * from note where matiere='$matiere'");
  print'<table border="4" class="tab" style="border-color:white; color: black;"><tr><th>Matricule</th><th>Matiere</th><th>Controle</th><th>Examen</th><th>TP</th></tr>';
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
	
	</div>
</body>
</html>