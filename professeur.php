<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
            #hero{  background: url("CSS/img/ensaa.jpg") top center;
            }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/css/menu.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/button.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/form.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/tableaux.css">
  
  </head>
  <body>
    <div class="sidebar">
      <div id="myLinks">
      <ul>
        <li> <a class="active" href="principale.php">Accueil</a></li>
         <li>   <a href="affectation.php">Affectations</a></li>
        <li>   <a href="exam.php">Exams</a></li>
          <li> <a href="module.php">Modules</a></li>
          <li> <a href="professeur.php">Professeurs</a></li>
          <li>  <a href="salle.php">Salles</a></li>
         <li>   <a href="logout.php">Déconnexion</a></li>
    </ul> </div>
    <section id="hero" class="d-flex flex-column justify-content-center">

   <div class="container">
     <div class="row justify-content-center">
       <div class="col-xl-8">
         <h1>École Nationale des Sciences Appliquées de Tétouan</h1>
       </div>
     </div>
   </div>
 </section>

      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <span class="bar"></span>
      </a>
    </div>
    <div class="content">
      <div class="titre">
        <h1>Liste des professeurs</h1>
      </div>
      <div class="btm">
        <button class="button button1" onclick="document.getElementById('id01').style.display='block'">Ajouter</button>
        <button class="button button1" onclick="document.getElementById('id02').style.display='block'">Modifier</button>
        <button class="button button1" onclick="document.getElementById('id03').style.display='block'">Supprimer</button>
      </div>
      <div>
        <?php
        include("connexion.php");
        $sql = "SELECT ID_prof, Nom_prof FROM professeur";
        $stmt = $conn->query($sql);

      if($stmt === false){
        die("Erreur");
      }
        ?>
      <table id="tableaux">
   <thead>
     <tr>
       <th>ID</th>
       <th>Nom</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['ID_prof']); ?></td>
       <td><?php echo htmlspecialchars($row['Nom_prof']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
      </div>
      <div id="id01" class="MDL">
        <form class="MDL-content animate" action="prof-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
            <label for="Nom_prof"><b>Professeur</b></label>
            <input type="text"  name="Nom_prof" required>
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button class="button button1 b1" type="submit" name="ajouter">Ajouter</button>
          </div>
        </form>
      </div>
      <div id="id02" class="MDL">
        <form class="MDL-content animate" action="prof-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
          <?php
        include("connexion.php");
        $sql4 = "SELECT Nom_prof, ID_prof FROM professeur ";
        $stmt4 = $conn->query($sql4);


      if($stmt4 === false){
        die("Erreur");
      }
        ?>
            <label for="ID_prof"><b>Professeur</b></label>
            <select name="ID_prof" required>
            <option value="0">Veuillez choisir le nom du professeur</option>
            <?php while($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row4['ID_prof'])?>" >
                <?php echo($row4['Nom_prof']) ?>
                </option>
              <?php endwhile; ?>
            </select>
            <label for="Nom_prof"><b>Le nouveau nom de professeur</b></label>
            <input type="text"  name="Nom_prof" required>
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button class="button button1 b1" type="submit" name="modifier">Modifier</button>
          </div>
        </form>
      </div>
      <div id="id03" class="MDL">
        <form class="MDL-content animate" action="prof-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
          <?php
        include("connexion.php");
        $sql3 = "SELECT Nom_prof, ID_prof FROM professeur ";
        $stmt3 = $conn->query($sql3);


      if($stmt3 === false){
        die("Erreur");
      }
        ?>
            <label for="ID_prof"><b>Professeur</b></label>
            <select name="ID_prof" required>
            <option value="0">Veuillez choisir le nom du professeur</option>
            <?php while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row3['ID_prof'])?>" >
                <?php echo($row3['Nom_prof']) ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button class="button button1 b1" type="submit" name="supprimer">Supprimer</button>
          </div>
        </form>
      </div>
    </div>
    <script>
      // Get the MDL
      var MDL1 = document.getElementById('id01');
      var MDL2 = document.getElementById('id02');
      var MDL3 = document.getElementById('id03');

      // When the user clicks anywhere outside of the MDL, close it
      window.onclick = function(event) {
        if (event.target == MDL1 ) {
          MDL1.style.display = "none";
        }
        else if (event.target == MDL2){
          MDL2.style.display = "none";
        }
        else if (event.target == MDL3){
          MDL3.style.display = "none";
        }
      }
    </script>
    <script>
      function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
          x.style.display = "none";
        } else {
          x.style.display = "block";
          }
        }
    </script>
  </body>
</html>
