<?php
      require_once "header.php";
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
    <link rel="stylesheet" href="page-connexion.css">
</head>
<body class="h-75">
  <body>
 
  <div class="container h-100 ">
         <div class="row h-100 d-flex align-items-center justify-content-center">
           <div class="col-lg-9">
         <form  id="form" style="background-color:rgb(164, 69, 69); border-top-left-radius:30px; border-bottom-right-radius:30px; box-shadow:10px 10px 10px 10px rgba(0, 0, 0, 0.85);" class="form  w-100 mt-1" enctype="multipart-form-data">
        
         <h1 class="text-center text-white  mt-2" style='font-size:20px;'>Inscription</h1> 
        <div class="form-group mb-5">
          <div class="row">
            <div class="col-5">
            <input type="text" id="prenom" placeholder="Prenom" name='prenom' class="form-control ml-1 "style=" border-radius:30px;font-size:15px;width:100%">
            <small class="login text-light" id="prenom_error"></small>
            </div>
            <div class="col-6 " >
            <div class=" avatar image float-right ">
            <img src="/..IMG/<?php $_SESSION['avatar']; ?>" class="img-responsive rounded-circle " id="img" alt="">
            </div>
          </div>
          <p class="error" text-danger></p>
        </div>
        <div class="form-group mb-5">
        <div class="row">
            <div class="col-5">
            <input type="text" id="nom" placeholder="Nom" name="nom" class="form-control mt-5 ml-1" style=" border-radius:30px;font-size:15px;width:100%">
            <small class="login text-light" id="nom_error"></small>
            </div>
            
            </div>
            </div>
            <p class="error" text-danger></p>
        </div>
        <div class="form-group mb-5">
        <div class="row">
            <div class="col-5">
            <input type="text" id="login" name="login" placeholder="login" class="form-control ml-1  mt-2 " style=" border-radius:30px;font-size:15px;width:100%">
            <small class="login text-light" id="login_error"></small>
            </div>
            <small class="login text-light" id="login_error"></small>
            <div class="col-6">
        
            <input type="file" name="file"class="btn bg-light float-right " onchange = " image (this) "   style="color:#A44545;"></input> 
        </div>
           
           
            </div>
            <p class="error" text-danger></p>
        </div>
        <div class="form-group mb-5">
        <div class="row">
            <div class="col-5">
            <input type="text" id="password" name="password" placeholder="password" class="form-control  ml-1" style=" border-radius:30px;font-size:15px;width:100%">
            <small class="login text-light" id="password_error"></small>
            <input type="hidden" name="role" value="joueur">
            </div>
            
            
            </div>
           
        </div>
        <div class="form-group mb-5">
        <div class="row">
            <div class="col-5">
            <input type="text" id="cpassword" name="cpassword" placeholder="confirmer password" class="form-control ml-1 " style=" border-radius:30px;font-size:15px;width:100%">
            <small class="login text-light" id="cpassword_error"></small>
            </div>
            <div class="col-6">
            <button type="button" id="submit"  class="btn  float-right bg-light" style="color:#A44545">créer compte</button>
            </div>
            
            </div>
            
        </div>
        
         </form>
        
        </div>
         </div>
         </div>
       </div> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="../Js/jquery-3.5.1.js"></script>
    <script>
   $(document).ready(function(){
        //Change la couleur de fond du champ en bleu dès qu'il a les focus
    $("input").focus(function(){
        $(this).css("background-color", "lightBlue");
    });

    //Change la couleur de fond du champ en blanc dès qu'il perd les focus
    $("input").blur(function(){
        $(this).css("background-color", "white");
    });
       // requete ajax
       $("#submit").click(function(){
        let formulaire= document.getElementById('form');
        let fd= new FormData(formulaire);
          $.ajax({
               url:'../Data/inscription.php',
                type:'post',
                data:fd,
                processData:false,
                contentType:false, 
                success:function(data){
                alert(data)
                if(data==="reussi"){
                 window.location.replace("../index.php");
                } 
            } 
             });
     })
    })

  // Validations formulaire
   $("#prenom_error").hide();
  $("#nom_error").hide();
   $("#login_error").hide();
$("#password_error").hide();
$("#cpassword_error").hide();

var error_prenom = false;
var error_nom = false;
var error_login = false;
var error_password = false;
var error_cpassword = false;


// Functions
function check_prenom() {
    var prenom_length = $("#prenom").val().length;
    if(prenom_length < 1) {
        $("#prenom_error").html("champ obligatoire");
        $("#prenom_error").show();
        error_prenom = true;
    }else {
        $("#prenom_error").hide();
    }
}
function check_nom() {
    var nom_length = $("#nom").val().length;
    if(nom_length < 1) {
        $("#nom_error").html("champ obligatoire");
        $("#nom_error").show();
        error_nom= true;
    }else {
        $("#nom_error").hide();
    }
}

function check_login() {
    var login_length = $("#login").val().length;
    if(login_length < 1) {
        $("#login_error").html("champ obligatoire");
        $("#login_error").show();
        error_login = true;
    }else {
        $("#login_error").hide();
    }
}

function check_password() {
    var password_length = $("#password").val().length;
    if(password_length < 1) {
        $("#password_error").html("champ obligatoire");
        $("#password_error").show();
        error_pwd = true;
    }else {
        $("#password_error").hide();
    }
}
function check_cpassword() {
    var cpassword_length = $("#cpassword").val().length;
    if(cpassword_length < 1) {
        $("#cpassword_error").html("champ obligatoire");
        $("#cpassword_error").show();
        error_cpassword = true;
    }else {
        $("#cpassword_error").hide();
    }
}

// Events
$("#prenom").focusout(function() {
    check_prenom();
});

$("#nom").focusout(function() {
    check_nom();
});

$("#login").focusout(function() {
    check_login();
});

$("#password").focusout(function() {
    check_password();
});
$("#cpassword").focusout(function() {
    check_cpassword();
});

$("#form").submit(function() {
    error_prenom = false;
    error_nom = false;
    error_login = false;
    error_password = false;
    error_cpassword = false;

    check_prenom();
    check_nom();
    check_login();
    check_password();
    check_cpassword();
    if(error_prenom == false && error_nom == false && error_login == false && error_password == false && error_cpassword == false) {
        return true;
    }else {
        return false;
    }
});

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>