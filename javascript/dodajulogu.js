$(document).ready(function(){

	
	document.getElementById("naziv").focus();
	$('span').hide();
	

	document.getElementById("potvrdiulogu").addEventListener("click", proveri);


var regNaziv = /[a-zčćžšđ]{2,9}(\s[a-zčćžšđ]{2,9})?$/;

function proveri(){
	
var naziv=document.getElementById("naziv").value;
var nizGreske=[];

	
	if(!regNaziv.test(naziv))
	{
		$("#naziv").addClass("crveniBorder");
		$('#spannaziv').show();
		nizGreske.push("naziv nije dobro.");
	}
	else
	{
		$("#naziv").removeClass("crveniBorder");
		$('#spannaziv').hide();
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
			  url: "php/dodajulogu.php",
			  method: "post",
			  dataType: "json",
			  data:
			  {
				potvrdiulogu: "nesto",
				naziv: naziv
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