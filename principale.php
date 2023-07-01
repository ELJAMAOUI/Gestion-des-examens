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
     .sucess{ text-align: center;
     }
     .btn{
      height: 40px;
    box-shadow: 3px 4px grey;
     }
     .btn:hover{
       background-color:#ceb88c;
     }
    #pa{
      text-decoration: none;
    color: black;
    font-family: sans-serif;
    text-shadow: 0 0 black;
     }


     #hero {
  width: 100%;
  height:60vh;
  background: url("CSS/img/ensaa.jpg") top center;
  background-size: cover;
  position: relative;
  margin: -72px 0px 26px;
}

#hero:before {
  content: "";
  background: rgba(0, 0, 0, 0.6);
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}

#hero .container {
  padding-top: 72px;
  position: relative;
  text-align: center;
}

#hero h1 {
  margin: 20px 0 10px 0;
  font-size: 48px;
  font-weight: 700;
  line-height: 56px;
  color: #fff;
}

#hero h2 {
  color: #eee;
  margin-bottom: 40px;
  font-size: 24px;
}

#hero .play-btn {
  width: 94px;
  height: 94px;
  margin: 0 auto;
  background: radial-gradient(#009961 50%, rgba(0, 153, 97, 0.4) 52%);
  border-radius: 50%;
  display: block;
  overflow: hidden;
  position: relative;
}

#hero .play-btn::after {
  content: '';
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 100;
  transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
}

#hero .play-btn::before {
  content: '';
  position: absolute;
  width: 120px;
  height: 120px;
  -webkit-animation-delay: 0s;
  animation-delay: 0s;
  -webkit-animation: pulsate-btn 3s;
  animation: pulsate-btn 3s;
  -webkit-animation-direction: forwards;
  animation-direction: forwards;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-timing-function: steps;
  animation-timing-function: steps;
  opacity: 1;
  border-radius: 50%;
  border: 5px solid rgba(0, 153, 97, 0.7);
  top: -15%;
  left: -15%;
  background: rgba(198, 16, 0, 0);
}

#hero .play-btn:hover::after {
  border-left: 15px solid #009961;
  transform: scale(20);
}

#hero .play-btn:hover::before {
  content: '';
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border: none;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 200;
  -webkit-animation: none;
  animation: none;
  border-radius: 0;
}

@media (min-width: 1024px) {
  #hero {
    background-attachment: fixed;
  }
}

@media (max-width: 768px) {
  #hero h1 {
    font-size: 28px;
    line-height: 36px;
  }
  #hero h2 {
    font-size: 18px;
    line-height: 24px;
    margin-bottom: 30px;
  }
}

@-webkit-keyframes pulsate-btn {
  0% {
    transform: scale(0.6, 0.6);
    opacity: 1;
  }
  100% {
    transform: scale(1, 1);
    opacity: 0;
  }
}

@keyframes pulsate-btn {
  0% {
    transform: scale(0.6, 0.6);
    opacity: 1;
  }
  100% {
    transform: scale(1, 1);
    opacity: 0;
  }
}
section {
  padding: 80px 0;
  overflow: hidden;
}

.section-bg {
  background-color: #8fffd6;
}

.section-title {
  padding-bottom: 30px;
}

.section-title h2 {
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
}

.section-title h2::after {
  content: '';
  position: absolute;
  display: block;
  width: 50px;
  height: 3px;
  background: #009961;
  bottom: 0;
  left: 0;
}

.section-title p {
  margin-bottom: 0;
  color: #777777;
  font-size: 15px;
}

      </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    </ul>  </div>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <span class="bar"></span>
      </a>
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





        <?php
        include("connexion.php");
        $sql = "SELECT exam.Nom_exam, module.Nom_mdl, exam.date_debut, COUNT(DISTINCT salle.Nom_salle), COUNT(DISTINCT professeur.Nom_prof) FROM exam, module, salle, professeur, salle_exam
        WHERE salle.ID_salle = salle_exam.ID_salle AND professeur.ID_prof = salle_exam.ID_prof AND exam.ID_exam = salle_exam.ID_exam AND exam.ID_mdl = module.ID_mdl
       GROUP BY exam.Nom_exam, module.Nom_mdl";
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
       <th>Date de début</th>
       <th>Nombre des salles</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['Nom_exam']); ?></td>
       <td><?php echo htmlspecialchars($row['Nom_mdl']); ?></td>
       <td><?php echo htmlspecialchars($row['date_debut']); ?></td>
       <td><?php echo htmlspecialchars($row['COUNT(DISTINCT salle.Nom_salle)']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>

      </div>

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
