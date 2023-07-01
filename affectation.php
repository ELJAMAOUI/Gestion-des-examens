<?php

  session_start();

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
    </ul>
      </div>
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
        <h1>Les affectations</h1>
      </div>
      <div class="btm">
        <button class="button button1" onclick="document.getElementById('id01').style.display='block'">Ajouter</button>
        <button class="button button1" onclick="document.getElementById('id02').style.display='block'">Modifier</button>
        <button class="button button1" onclick="document.getElementById('id03').style.display='block'">Supprimer</button>
      </div>
      <div>
        <?php
        include("connexion.php");
        $sql = "SELECT exam.Nom_exam, module.Nom_mdl, salle.Nom_salle, professeur.Nom_prof FROM exam, module, salle, professeur, salle_exam
        WHERE salle.ID_salle = salle_exam.ID_salle AND professeur.ID_prof = salle_exam.ID_prof AND exam.ID_exam = salle_exam.ID_exam AND exam.ID_mdl = module.ID_mdl";
        $stmt = $conn->query($sql);

      if($stmt === false){
        die("Erreur");
      }
        ?>
      <table id="tableaux">
   <thead>
     <tr>
       <th>Exam</th>
       <th>Module</th>
       <th>Salle</th>
       <th>Professeur</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['Nom_exam']); ?></td>
       <td><?php echo htmlspecialchars($row['Nom_mdl']); ?></td>
       <td><?php echo htmlspecialchars($row['Nom_salle']); ?></td>
       <td><?php echo htmlspecialchars($row['Nom_prof']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
      </div>
      <div id="id01" class="MDL">
        <form class="MDL-content animate" action="affect-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
          <?php
        include("connexion.php");
        $sql1 = "SELECT exam.ID_exam, exam.Nom_exam, exam.ID_mdl, module.Nom_mdl FROM exam, module WHERE exam.ID_mdl = module.ID_mdl ";
        $stmt1 = $conn->query($sql1);

      if($stmt1 === false){
        die("Erreur");
      }
        ?>
            <label for="ID_exam"><b>Exam</b></label>
            <select name="ID_exam" required>
            <option value="0">Veuillez choisir le nom d'exam</option>
            <?php while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row1['ID_exam'])?>" >
                <?php echo($row1['Nom_exam']) ?> <?php echo($row1['Nom_mdl']) ?>
                </option>
              <?php endwhile; ?>
            </select>
            <?php
        include("connexion.php");
        $sql2 = "SELECT Nom_salle, ID_salle FROM salle ";
        $stmt2 = $conn->query($sql2);


      if($stmt2 === false){
        die("Erreur");
      }
        ?>
            <label for="ID_salle"><b>Salle</b></label>
            <select name="ID_salle" required>
            <option value="0">Veuillez choisir la salle</option>
            <?php while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row2['ID_salle'])?>" >
                <?php echo($row2['Nom_salle']) ?>
                </option>
              <?php endwhile; ?>
            </select>
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
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button class="button button1 b1" type="submit" name="ajouter">Ajouter</button>
          </div>
        </form>
      </div>
      <div id="id02" class="MDL">
        <form class="MDL-content animate" action="affect-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
          <?php
        include("connexion.php");
        $sql5 = "SELECT salle_exam.ID_affect, exam.Nom_exam, module.Nom_mdl, salle.Nom_salle, professeur.Nom_prof FROM exam, module, salle, professeur, salle_exam
        WHERE salle.ID_salle = salle_exam.ID_salle AND professeur.ID_prof = salle_exam.ID_prof AND exam.ID_exam = salle_exam.ID_exam AND exam.ID_mdl = module.ID_mdl";
        $stmt5 = $conn->query($sql5);

      if($stmt5 === false){
        die("Erreur");
      }
        ?>
            <label for="ID_affect"><b>Affectation</b></label>
            <select name="ID_affect" required>
            <option value="0">Veuillez choisir l'affectation</option>
            <?php while($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row5['ID_affect'])?>" >
                <?php echo($row5['Nom_exam']) ?> <?php echo($row5['Nom_mdl']) ?> <?php echo($row5['Nom_salle']) ?> <?php echo($row5['Nom_prof']) ?>
                </option>
              <?php endwhile; ?>
            </select>
            <?php
        include("connexion.php");
        $sql6 = "SELECT exam.ID_exam, exam.Nom_exam, exam.ID_mdl, module.Nom_mdl FROM exam, module WHERE exam.ID_mdl = module.ID_mdl ";
        $stmt6 = $conn->query($sql6);

      if($stmt6 === false){
        die("Erreur");
      }
        ?>
            <label for="ID_exam"><b>Exam</b></label>
            <select name="ID_exam" required>
            <option value="0">Veuillez choisir le nom d'exam</option>
            <?php while($row6 = $stmt6->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row6['ID_exam'])?>" >
                <?php echo($row6['Nom_exam']) ?> <?php echo($row6['Nom_mdl']) ?>
                </option>
              <?php endwhile; ?>
            </select>
            <?php
        include("connexion.php");
        $sql7 = "SELECT Nom_salle, ID_salle FROM salle ";
        $stmt7 = $conn->query($sql7);


      if($stmt7 === false){
        die("Erreur");
      }
        ?>
            <label for="ID_salle"><b>Salle</b></label>
            <select name="ID_salle" required>
            <option value="0">Veuillez choisir la salle</option>
            <?php while($row7 = $stmt7->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row7['ID_salle'])?>" >
                <?php echo($row7['Nom_salle']) ?>
                </option>
              <?php endwhile; ?>
            </select>
            <?php
        include("connexion.php");
        $sql8 = "SELECT Nom_prof, ID_prof FROM professeur ";
        $stmt8 = $conn->query($sql8);


      if($stmt8 === false){
        die("Erreur");
      }
        ?>
            <label for="ID_prof"><b>Professeur</b></label>
            <select name="ID_prof" required>
            <option value="0">Veuillez choisir le nom du professeur</option>
            <?php while($row8 = $stmt8->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row8['ID_prof'])?>" >
                <?php echo($row8['Nom_prof']) ?>
                </option>
              <?php endwhile; ?>
            </select>


          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button class="button button1 b1" type="submit" name="modifier">Modifier</button>
          </div>
        </form>
      </div>
      <div id="id03" class="MDL">
        <form class="MDL-content animate" action="affect-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
          <?php
        include("connexion.php");
        $sql3 = "SELECT salle_exam.ID_affect, exam.Nom_exam, module.Nom_mdl, salle.Nom_salle, professeur.Nom_prof FROM exam, module, salle, professeur, salle_exam
        WHERE salle.ID_salle = salle_exam.ID_salle AND professeur.ID_prof = salle_exam.ID_prof AND exam.ID_exam = salle_exam.ID_exam AND exam.ID_mdl = module.ID_mdl";
        $stmt3 = $conn->query($sql3);

      if($stmt3 === false){
        die("Erreur");
      }
        ?>
            <label for="ID_affect"><b>Affectation</b></label>
            <select name="ID_affect" required>
            <option value="0">Veuillez choisir l'affectation</option>
            <?php while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row3['ID_affect'])?>" >
                <?php echo($row3['Nom_exam']) ?> <?php echo($row3['Nom_mdl']) ?> <?php echo($row3['Nom_salle']) ?> <?php echo($row3['Nom_prof']) ?>
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
