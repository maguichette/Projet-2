<div id="scrollzone" class="col" style="height: 200px; overflow: scroll;">
    <table class="table table-bordered text-center">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Score</th>
            
            <th scope="col"colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>
</div>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->    
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div class="form-group">
        <label >firstname</label>
        <input type="text" id="firstname"class="form-control">
        </div>
        <div class="form-group">
        <label >lastname</label>
        <input type="text" id="lastname"class="form-control">
        </div>
      </div>
      <div class="modal-footer">
      <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script src="../Js/jquery-3.5.1.js"></script>
<script>

  $(document).ready(function(){

    let offset= 0;
    let tbody= $('#tbody');
    $.ajax({
        url:'../Data/liste.php',
        type: 'post',
        dataType: 'json',
        data:{
            limit: 3,
            offset: offset
        },
        success: function (data) {
            showData(data, tbody);
            offset+=3;
        }
    });

    // Fonction qui affiche les joueurs dans la page

    function showData(data, tbody) {
        $.each(data, (indice, user)=> {
            tbody.append(`<tr id=>
              <td>${user.prenom}</td>
                <td>${user.nom}</td>
                <td>${user.score}</td>
                
                <td><button type="button" class="btn btn-outline-primary"id="mdf" data-toggle="modal" data-target="#myModal">Modify</button></td>
                <td><button type="button" class="btn btn-outline-danger" id="dlt">Delete</button></td>
            </tr>`);
        })
    }

  });

  // Fonction qui permet la pagination par scroll

  const scrollzone= $('#scrollzone');
  scrollzone.scroll(function () {
      const st= scrollzone[0].scrollTop;
      const sh= scrollzone[0].scrollHeight;
      const ch= scrollzone[0].clientHeight;
      if (sh-st<= ch){
          $.ajax({
              type:'post',
              url:'../Data/liste.php',
              data:{
                  limit: 3,
                  offset: offset
              },
              dataType: 'JSON',
              success: function (data) {
                  showData(data, tbody);
                  offset+=3;
              }
          });
      }
  });

  // Fonction qui permet de supprimer un joueur

  $(document).on('click','#dlt',function () {
            if (confirm("veux-tu supprimer cette ligne?")){ // demande une confirmation 
                $(this).parents("tr").remove(); // récupère le div parent à supprimer
                let login= $(this).parents('tr').find('td').eq(3).html(); // supprime le td du tr parent selectionné comportant le login
               
                $.ajax({
                    type:'post',
                    url:'../Data/delete_joueur.php',
                    dataType:'html',
                    data:{
                        login: login
                    },
                    success:function (data) {
                        alert(data);
                        if (data==="ok"){
                            alert('Successful deletion');
                        }
                    }
                });
            }
        });
        //ajouter une valeur dans le champ de saisie
       $(document).on("click",'#mdf', function() {
    var firstname= $(this).parents('tr').find('td').eq(0).html();
    var lastname= $(this).parents('tr').find('td').eq(1).html();
$('#firstname').val(firstname);
$('#lastname').val(lastname);
$('#mymodal').modal(toggle);
// créer un événement pour obtenir les données des champs et mettre à jour la base de données
// $('#save').click(function(){
  // var identifiant =$(this).attr('id' )
// let firstname=$('#firstname').val();
// let lastname=$('#lastname').val();
$.ajax({
  type:'post',
  url:'../Data/edit-joueur.php',
  data:{
     firstname:firstname,
     lastname:lastname,
    },
    dataType:'html',
    success:function (data) {
        if (data=="ok") {
            alert('Modification carried out successfully');
            
        }
        else{
            alert('error');
        }
    
    
    }
});
});


</script>