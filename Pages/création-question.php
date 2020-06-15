
  <?php
  require_once "../Data/db.php";
    if (isset($_POST['ok'])) {
        $question = "";
        $point = "";
        $typrep = "";
        $reponses = [];
        $message = "";
    }
    $numinput = 0;
    if (isset($_POST['text']) && isset($_POST['number']) && isset($_POST['typreponse'])) {
        $numinput = $_POST['numinput'];
        $question = $_POST['text'];
        $point = $_POST['number'];
        $typrep = $_POST['typreponse'];
        $nbInput = count($_POST) - 5;
        for ($i = 0; $i < $nbInput; $i++) {
            if ($_POST['typreponse'] == "choix multiple") {
                if (isset($_POST['reponse' . ($i + 1) . ''])) {
                    if (isset($_POST['checkbox' . ($i + 1) . ''])) {
                        $reponses[$i]['reponse'] = $_POST['reponse' . ($i + 1) . ''];
                        $reponses[$i]['valide'] = "true";
                    } else {
                        $reponses[$i]['reponse'] = $_POST['reponse' . ($i + 1) . ''];
                        $reponses[$i]['valide'] = "false";
                    }
                }
            }
            if ($_POST['typreponse'] == "choix simple") {
                if (isset($_POST['reponse' . ($i + 1) . ''])) {
                    if ($_POST['radio'] ==="value".($i + 1)."") {
                        $reponses[$i]['reponse'] = $_POST['reponse' . ($i + 1) . ''];
                        $reponses[$i]['valide'] = "true";
                    } else {
                    
                        $reponses[$i]['reponse'] = $_POST['reponse' . ($i + 1) . ''];
                        $reponses[$i]['valide'] = "false";
                    }
                }
            }
        }
        if ($_POST['typreponse'] == "choix texte") {
        if (isset($_POST['reponse'])) {
                $reponses[$i]['reponse'] = $_POST['reponse'];
                $reponses[$i]['valide'] = "true";
            }
    }
    
    }
    $req=$connect->prepare('INSERT INTO question SET text=?,typreponse=?,number=?,reponse=?;true=?');
    // $req->execute->($question,$point,$typrep,$reponses);
    // if($req){

    // }
?>
 <form action="" method="post"   id = "form-connexion" >
  <div class="container bg-light w-100 h-100 "style="  box-shadow:10px 10px 10px 10px rgba(0, 0, 0, 0.85);">
<h2 class="text-danger">PARAMETRER VOTRE QUESTION</h2>
<div class="container-white "style="background-color:#ffff;height:450px;border:1px solid #A44545;">

<div class="form-group mb-5"id="inputs">
 <div class="row">
<div class="col-11">
<textarea name="text" id="input" error="error-1" class=" form-control w-50 float-left ml-2 " cols="30"placeholder="QUESTION" rows="4"style="background-color:rgba(128, 128, 128, 0.308);border:1px solid #A44545;border-radius:10px"></textarea>
<small class="text text-danger" id="text_error"></small>
<input type="number" placeholder="Nbr de points"id="input" error="error-2" name="number" class="number float-right mr-2 "style="height:50px;background-color:rgba(128, 128, 128, 0.308);border:1px solid #A44545">
<small class="number text-danger" id="number_error"></small>
    </div>
    </div>
    </div>
    <div class="form-group mb-5"id="inputs">
 <div class="row">
<div class="col-11">
    <select class="form-control w-50 float-left ml-2 mt-2 "id="input" error="error-3" onchange="onAddTexte()"  name="typreponse"style="background-color:rgba(128, 128, 128, 0.308);border:1px solid #A44545;border-radius:10px">
    <option selected>type de réponse</option>
    <option value="choix simple">choix simple</option>
    <option value="choix multiple">choix multiple</option>
    <option value="choix texte">choix texte</option>
  </select>
  <small class="typreponse text-danger" id="typreponse_error"></small>
  <button type="submit" class="bouton-greenimage ml-2 mt-2" onclick="onAddInput()"><img src="../Images\ic-ajout-réponse.png " alt="" ></button>
  </form>
</div>
</div>
</div>
<div class="form-group mb-5">
 <div class="row">
<div class="col-11">
<input type="text" placeholder="reponse" name="reponse" class="form-control w-50 float-left ml-2 mt-2"style="height:50px;background-color:rgba(128, 128, 128, 0.308);border:1px solid #A44545;border-radius:10px">
<small class="reponse text-danger" id="reponse_error"></small>
</div> 
</div> 
</div>
<input type="hidden" name="numinput" id="hidden">
<button type="submit" class="enregistrer float-right text-light  mr-3" style="background-color:#A44545" name="ok">ENREGISTRER</button> 
</div>
<p class="error" text-danger></p>
</form>

</div>
</div>
   
 <script src="../Js/jquery-3.5.1.js"></script>
<script>
//  $(document).ready(function(){
//      $('#form-connexion').submit(function(e){
//          e.preventDefault();
//          alert('ok')
//      })
//      $.ajax({
//          url:"../Data/question.php",
//          type:"post",
//          dataType:"json",
//          data:{
//             tpr:typreponse,
//             nbr:number,
//             text:text,
//             rps:reponse
//          }, 
//          success:function(data){ 
//              if(data==="réussi")
//              window.location.replace("QUIZZ.php");
//          }
//      })
     $("#text_error").hide();
  $("#number_error").hide();
   $("#typreponse_error").hide();
$("#reponse_error").hide();


var error_text = false;
var error_number = false;
var error_typreponse = false;
var error_reponse = false;



// Functions
function check_text() {
    var text_length = $("#text").val().length;
    if(text_length < 1) {
        $("#text_error").html("champ obligatoire");
        $("#text_error").show();
        error_text = true;
    }else {
        $("#text_error").hide();
    }
}
function check_number() {
    var number_length = $("#number").val().length;
    if(number_length < 1) {
        $("#number_error").html("champ obligatoire");
        $("#number_error").show();
        error_number= true;
    }else {
        $("#number_error").hide();
    }
}

function check_typreponse() {
    var typreponse_length = $("#typreponse").val().length;
    if(typreponse_length < 1) {
        $("#typreponse_error").html("champ obligatoire");
        $("#typreponse_error").show();
        error_typreponse = true;
    }else {
        $("#typreponse_error").hide();
    }
}

function check_reponse() {
    var reponse_length = $("#reponse").val().length;
    if(reponse_length < 1) {
        $("#reponse_error").html("champ obligatoire");
        $("#reponse_error").show();
        error_reponse = true;
    }else {
        $("#reponse_error").hide();
    }
}


// Events
$("#text").focusout(function() {
    check_text();
});

$("#number").focusout(function() {
    check_number();
});

$("#typreponse").focusout(function() {
    check_typreponse();
});

$("#reponse").focusout(function() {
    check_reponse();
});


$("#form-connexion").submit(function() {
    error_text = false;
    error_number = false;
    error_typreponse = false;
    error_reponse = false;
    

    check_text();
    check_number();
    check_typreponse();
    check_reponse();
    if(error_text == false && error_number == false && error_typreponse == false && error_reponse == false) {
        return true;
    }else {
        return false;
    }
});

// const inputs = document.getElementsByClassName("error");
//         for (input of inputs) {
//             input.addEventListener("keyup", function(e) {
//                 if (e.target.hasAttribute("error")) {
//                     var idDivError = e.target.getAttribute("error");
//                     document.getElementById(idDivError).innerText = ""
//                 }
//             })
//         }
//         document.getElementById("form-connexion").addEventListener("submit", function(e) {
//             const fields = document.getElementsByClassName("error");
//             var error = false;
//             for (field of fields) {
//                 if (field.hasAttribute("error")) {
//                     var idDivError = field.getAttribute("error");
//                     if (!field.value) {
//                         document.getElementById(idDivError).innerText = " Ce champ est obligatoire"
//                         error = true
//                     }

//                 }
//             }
//             if (error) {
//                 e.preventDefault();

//             }
//             return false;
//         })
//         let nbrRow = 0;

//         function onAddInput() {


//             var select = document.getElementById('valeur');
//             var divInputs = document.getElementById('inputs');
//             var newInput = document.createElement('div');
//             newInput.setAttribute('class', 'row');
//             newInput.setAttribute('id', 'row_' + nbrRow);
//             if (select.options[select.selectedIndex].value === "choix multiple") {
//                 newInput.innerHTML = `
//   <input type="text" class="champ-deux error" error="error-${4+nbrRow}" name="reponse${nbrRow}">
//                 <input type="checkbox" name="checkbox${nbrRow}" id=" ">
//                 <button type="button" class="bouton-red" onclick='onDeleteInput(${nbrRow})'> <img src="/..Images/ic-supprimer.png" alt=""></button>
//                 <div class="error" id="error-${4+nbrRow}"></div>
             
//   `;
//                 divInputs.appendChild(newInput);
//             } else if (select.options[select.selectedIndex].value === "choix simple") {
//                 newInput.innerHTML = `
//   <input type="text" class="champ-deux error" error="error-${4+nbrRow}" name="reponse${nbrRow}">
//                 <input type="radio" name="radio" value="value${nbrRow}" >
//                 <button type="button" class="bouton-red"  onclick='onDeleteInput(${nbrRow})'> <img src="/..Images/ic-supprimer.png" alt=""></button>
//                 <div class="error" id="error-${4+nbrRow}"></div>
//   `;
//                 divInputs.appendChild(newInput);
//             }

//             document.getElementById('hidden').setAttribute("value", "" + nbrRow + "");
//             nbrRow++;

//         }

//         function onAddTexte() {

//             nbrRow++;
//             var select = document.getElementById('valeur');
//             var divInputs = document.getElementById('inputs');
//             var newInput = document.createElement('div');
//             newInput.setAttribute('class', 'row');
//             newInput.setAttribute('id', 'row_' + nbrRow);
//             if (select.options[select.selectedIndex].value === "choix texte") {
//                 newInput.innerHTML = `
//  <input type="text" class="champ-deux error" error="error-4" name="reponse">
//     <button type="button" class="bouton-red" onclick='onDeleteInput(${nbrRow})'> <img src="/..Images/ic-supprimer.png" alt=""></button>
//     <div class="error" id="error-4"></div>
            
//  `;
//                 divInputs.appendChild(newInput);
//             }
//         }

//         function onDeleteInput(n) {
//             let target = document.getElementById('row_' + n);
//             target.remove();
//         }

//         function fadeOut(idTarget) {
//             let target = document.getElementById(idTarget);
//             let effect = setInterval(function() {
//                 if (!target.style.opacity) {
//                     target.style.opacity = 1;
//                 }
//                 if (target.style.opacity > 0) {
//                     target.style.opacity -= 0.1;
//                 } else {
//                     clearInterval(effect);
//                 }
//             }, 200)
//         }
//         // setTimeout(() => {
//         //     document.getElementById("message").innerHTML = '';

//         // }, 2000);
// });

     </script>
 
