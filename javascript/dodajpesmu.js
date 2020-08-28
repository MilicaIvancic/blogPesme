$(document).ready(function(){

	
	document.getElementById("naziv").focus();
	$('span').hide();
	

	document.getElementById("potvrdipesmu").addEventListener("click", proveri);


    var regPesma = /[a-zčćžšđ]{1,30}/;
    var regNaziv = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{1,30}/;

function proveri(){
	
var naziv=document.getElementById("naziv").value;
var korisnik=document.getElementById("korisnik");
var pesma=document.getElementById("pesma").value;
var korisnikpotvrda="";

//console.log(korisnik);
//console.log(pesma);


var nizGreske=[];

	for(var i=0; i<korisnik.length; i++){
        ///console.log(korisnik[i].checked);
        if(korisnik[i].selected){
            var korisnikpotvrda=korisnik[i].value;
            
        }
    }

    if(korisnikpotvrda==""){
		$('#spankorisnik').show();
        nizGreske.push("Morate odabrati korisnika .");
        
    }
    else
	{
		$('#spankorisnik').hide();
    }
    
    
	
	if(!regNaziv.test(naziv))
	{
		$("#naziv").addClass("crveniBorder");
		$('#spannaziv').show();
		nizGreske.push("Text nije dobro.");
	}
	else
	{
		$("#naziv").removeClass("crveniBorder");
		$('#spannaziv').hide();
    }
    
    if(!regPesma.test(pesma))
	{
		$("#pesma").addClass("crveniBorder");
		$('#spanpesma').show();
		nizGreske.push("Text nije dobro.");
	}
	else
	{
		$("#pesma").removeClass("crveniBorder");
		$('#spanpesma').hide();
	}
	
	
	// console.log(nizGreske);

	if(nizGreske.length != 0)
	{
		console.log(nizGreske);
	}
	else
	{
		saljiAjaxom();
		
	}

	function saljiAjaxom()
		{
		   $.ajax({
			  url: "php/dodajpesmu.php",
			  method: "post",
			  dataType: "json",
			  data:
			  {
				potvrdipesmu: "nesto",
                naziv: naziv,
                korisnikpotvrda: korisnikpotvrda,
                pesma: pesma
			  },
			  success: function(data)
			  {
				 alert(data.message);
			  },
			  error: function(xhr, status, errorMsg)
			  {
                 console.log(xhr);
				 if(xhr.status == 404)
				 {
					console.log("Stranica nije nadjena");
				 }
				 else if(xhr.status == 422)
				 {
					 var greske = "<ol>";
					 var feedback = JSON.parse(xhr.responseText);
					 for(var i in feedback)
					 {
						 greske += "<li>" + feedback[i] + "</li>";
					 }
					 greske += "</ol>";

					 console.log(greske);
				 }
				 else if(xhr.status == 409)
				 {
					 console.log("Uneti podaci vec postoje");
				 }
				 
				 else
				 {
					 console.log("Greska");
					 console.log(xhr)
					 //alerti(xhr.responseText);
				 }

			  }
			  
		   });
		};

	
	
		
};
});