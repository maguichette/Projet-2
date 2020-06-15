<?php
session_start();
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../page-connexion.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body class="h-75">

    <body>

        <div class="row-fluid p-3 col-md-12 text-white" style="background-color:#A44545">
            <img src="../Images/logo-QuizzSA.png" alt="" class="img-responsive float-left" style="width:80px; height:80px">
            <button class="btn bg-light float-right" style="color:rgb(164, 69, 69);">Deconnexion</button>
            <h1 class="text-center mt-2">Le Plaisir de Jouer</h1>

        </div>

        <div class="container-fluid  ">
            <div class="row h-100 d-flex  justify-content-start">
                <div class="col-sm-4">
                    <div class="white  w-100 mt-3 h-100  " style=" height:100%;">
                        <div class="header_white w-100  " style="background-color:#A44545;height:25%;">
                            <div class=" avatar image float-left">
                                <img src="..IMG/<?php $_SESSION['avatar']; ?><?php $_SESSION['name'] ?>" class="img-responsive rounded-circle " id="img" alt="">
                                  <div class="container-pnom"><?php $_SESSION['prenom']; ?></div> 
                                  <div class="container-nom"><?php $_SESSION['nom']; ?></div>   
                            </div>
                           
                 </div>
                        <div class="white_header ">
                            <div class="list-group mb-5 w-100 p-4" style="background-color:white; ">
                                <a href="liste-question" class="charge list-group-item list-group-item-action h-10 ">
                                    Liste questions
                                    <img src="../Images/ic-liste.png " alt="" class="image float-right">
                                </a>

                                <a href="création-admin" class="charge list-group-item list-group-item-action ">
                                    créer admin
                                    <img src="../Images/ic-ajout-active.png " alt="" class="image float-right">

                                </a>
                                <a href="liste-joueur" class="charge list-group-item list-group-item-action ">
                                    liste joueur
                                    <img src=" ../Images/ic-liste.png " alt="" class="image float-right">
                                </a>
                                <a href="création-question" class=" charge list-group-item list-group-item-action ">
                                    création question
                                    <img src="../Images/ic-ajout.png " alt="" class="image float-right">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chargement" class="container col-7  mt-2 " style="background-color:rgb(164, 69, 69);height:500px;" ></div>
            </div>
        </div>
       

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script>
        $('a').click(function(e) {
            e.preventDefault();
            let page = $(this).attr('href');
            $.ajax({
                method: "POST",
                url: "QUIZZ.php",
                data: {},
                success: function(res) {
                    console.log('success');
                    $('#chargement').load(page + '.php');


                }
            })
            return true;
        });
        </script>
    </body>

</html>