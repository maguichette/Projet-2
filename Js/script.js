// validation page connexion
$("#login_error").hide();
$("#password_error").hide();

var error_login = false;
var error_password = false;

// Functions

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

// Events

$("#login").focusout(function() {
    check_login();
});

$("#password").focusout(function() {
    check_password();
});

$("#form").submit(function() {
    error_login = false;
    error_password = false;

    check_login();
    check_password();

    if(error_login == false && error_password == false) {
        return true;
    }else {
        return false;
    }
});

// page admin
//chargement des pages
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
// validation inscription admin
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
  
