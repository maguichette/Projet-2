<!doctype html>
<html lang="en">
  <head>
    <title>Donnée</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <?php
      $serveur="localhost";
      $login="root";
      
      try
      {
          $connexion= new PDO("mysql:host=$serveur;dbname=quizz",$login,'');
          $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $reponse = $connexion->query('SELECT login, password, role FROM user');
          $reponse = $connexion->query('SELECT * FROM user');
              echo $reponse->rowCount();

          // echo'connexion à la base de donnée reussie';
        // $start=$connexion->prepare('INSERT INTO user VALUES (NULL,:PRENOM,:NOM,:LOGIN,:password,:ROLE,');
        // $start->bindValue(':prenom',$_POST["prenom"],PDO::PARAM_STR);
        // $start->bindValue(':nom',$_POST["nom"],PDO::PARAM_STR);
        // $start->bindValue(':password',$_POST["password"],PDO::PARAM_STR);
        // $start->bindValue(':confirmer password',$_POST["cpassword"],PDO::PARAM_STR);
      }
      
      ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>