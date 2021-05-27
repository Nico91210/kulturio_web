

$(document).ready(function(){
    $("#form_update").hide()
      $("#btn_form_update").click(function(){
        $("#form_update").show()		
      });
});

$(document).ready(function(){
    $("#mdp_oublie").hide()
      $("#btn_mdp_oublie").click(function(){
        $("#mdp_oublie").show()		
      });
});

function deletqr(id)
	{
		$.ajax({
		type:"GET",
		url:"../bdd/kulturio/delete_questions_reponses.php",
        data:"id="+id,
		success:function(data)
		{
			// Version 2
			
            document.location.href="../kulturio/questions_reponses.php"
                        
		},
		error : function()
		{
			alert('Erreur du script PHP');
		}
		});		
    }
    
function deletqr_sampl(num)
	{
		$.ajax({
		type:"GET",
		url:"../bdd/sampl/delete_questions_reponses_sampl.php",
        data:"num="+num,
		success:function(data)
		{
			// Version 2
			
            document.location.href="../sampl/add.php"
                        
		},
		error : function()
		{
			alert('Erreur du script PHP');
		}
		});		
    }
    


$(document).ready(function(){
    $('#search_user').keyup(function(){
        $("#resultat").html('')
        var utilisateur = $(this).val();
        if(utilisateur != ""){
            $.ajax({
                type:"GET",
                url:"bdd/amis/recherche_amis.php",
                data:"user=" + encodeURIComponent(utilisateur),
                success:function(data){
                    if(data != ""){
                        $("#resultat").append(data);
                        }else{
                        document.getElementById("resultat").innerHTML = "<div>Aucun Utilisateur</div>"
                    }
                }
            });
        }
        100});
});


$(document).ready(function(){
    $('#search_question').keyup(function(){
        $("#resultat_question").html('')
        var question = $(this).val();
        if(question != ""){
            $.ajax({
                type:"GET",
                url:"../bdd/sampl/recherche_questions.php",
                data:"question=" + encodeURIComponent(question),
                success:function(data){
                    if(data != ""){
                        $("#resultat_question").append(data);
                        }else{
                        document.getElementById("resultat_question").innerHTML = "<div>Aucune question</div>"
                    }
                }
            });
        }
        100});
});

function desactiver() {
    var bouton = document.getElementById('desacSubmit');
    bouton.disabled = "disabled";
    bouton.value="Envoi...";
}

function desactiver_time() {
    var bouton = document.getElementById('go');
    bouton.disabled = "disabled";
    bouton.value="Envoi...";
}