<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic2";
$con = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// Exécution de la requête SQL
$sql="INSERT INTO `tbl_patients`(`DOB`) VALUES ('2023-01-01')";

 if ($con->query($sql) === TRUE) {
    echo "Nouvelle ligne insérée avec succès";
  } else {
    echo "Erreur: " . $sql . "<br>" . $con->error;
  }



  
 $con->close();
?>



