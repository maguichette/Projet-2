<?php
  session_start();
  require_once "Pages/header.php";
      ?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      
      <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
      <link rel="stylesheet" href="page-connexion.css">
  </head>  
  <body class="h-75">
   
         

         
         <div class="container h-100 ">
         <div class="row h-100 d-flex align-items-center justify-content-center">
           <div class="col-lg-6">
        
         <form method='post' id="form" style="background-color:rgb(164, 69, 69); border-top-left-radius:30px; border-bottom-right-radius:30px; box-shadow:5px 10px 10px rgba(0, 0, 0, 0.85);" class="form p-4 w-100">
         <?php
                    if(isset($message)){
                        echo '<small class="text-danger">'.$message.'</small>';
                    }
                ?>
        <div class="form-group mb-5">
          <div class="row">
            <div class="col-11">
            <input type="text" id="login" placeholder="login" name="login" class="form-control float-left "style=" border-radius:30px;font-size:30px;">
            </div>
         
        <span class="iconify  mt-2" data-icon="ant-design:user-outlined" data-inline="false" style="color: #ffffff;  width:30px;height:40px"></span>
          </div>
          <small class="login text-light" id="login_error"></small>
        </div>
        <div class="form-group mb-5">
        <div class="row">
            <div class="col-11">
            <input type="password" id="password" placeholder="password" name="password" class="form-control " style=" border-radius:30px;font-size:30px;">
            </div>
            
            <span class="iconify mt-2" data-icon="uil:padlock" data-inline="false" style="color: #ffffff;width:30px;height:40px"></span>
            </div>
            <small class="login text-light" id="password_error"></small>
        </div>
        <a href="Pages/inscription-joueur.php" class="text-white">S'inscrire pour jouer</a>
        <button type="button" name='ok' id="submit" class="btn float-right bg-white "style="color:#A44545; font-size:20px ;">connexion</button>
        
         </form>
         </div>
         </div>
       </div> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>

<script src="Js/jquery-3.5.1.js"></script>
  <script>
 $(document).ready(function(){
    //Change la couleur de fond du champ en bleu dès qu'il a les focus
    $("input").focus(function(){
        $(this).css("background-color", "Pink");
    });

    //Change la couleur de fond du champ en blanc dès qu'il perd les focus
    $("input").blur(function(){
        $(this).css("background-color", "white");
    });
     $("#submit").click(function(){
        let login= $('#login').val();
         let password= $('#password').val();
          $.ajax({
               url:'Data/login.php',
                type:'post',
                 data:{
                      username:login,
                       mdp:password
                     }, success:function(data){ 
                         if(data==="OK"){
                              window.location.replace("Pages/QUIZZ.php");
                             } 
                            } 
             });
     })
 })
  </script>