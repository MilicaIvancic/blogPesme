$(document).ready(function(){

	
	document.getElementById("tbime").focus();
	$('span').hide();
	
	
	
	document.getElementById("btnpotvrdi").addEventListener("click", proveri);


var regIme = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9})?$/;
var regPrezime = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9})?$/;
var regPasword = /^(.){8,20}$/;
var regNadimak=/^[A-Z][A-Za-z]{2,15}$/;
var regMail=/^[a-z0-9]([a-z0-9\.\_]{2,40})+\@([a-z]{2,8}\.)+(com|rs)$/;





function proveri(){
	var ime1=document.getElementById("tbime").value;

var prezime1=document.getElementById("tbprezime").value;
var email=document.getElementById("tbmail").value;

var pasword1=document.getElementById("tbpassword").value;

var nadimak=document.getElementById("tbnadimak").value;
var nizGreske=[];
var radio=document.getElementsByClassName("radio_polja");
var izabraniRb="";
console.log(radio);


 // ----- radio buttoni ----- //
// ----- radio buttoni ----- //
for(var i=0; i<radio.length; i++)
{
   if(radio[i].checked)
   {
	  izabraniRb = radio[i].value;
	  break;
   }
}
if(izabraniRb == "")
{
   nizGreske.push("Pol mora biti izabran.");
   $('#pol').show();
}
else {
	$('#pol').hide();
}

if(!regIme.test(ime1))
	{
		$("#tbime").addClass("crveniBorder");
		$('#ime').show();
		//nizGreske.push("Ime nije dobro.");
	}
	else
	{
		$("#tbime").removeClass("crveniBorder");
		$('#ime').hide();
		
		
	}
	
	if(!regPrezime.test(prezime1))
	{
		$("#tbprezime").addClass("crveniBorder");
		$('#prezime').show();
		nizGreske.push("Prezime nije dobro.");
	}
	else
	{
		$("#tbprezime").removeClass("crveniBorder");
		$('#prezime').hide();
	}
	
	
	if(!regPasword.test(pasword1))
	{
		$("#tbpassword").addClass("crveniBorder");
		$('#password').show();
		nizGreske.push("Lozinka nije dobra.");
	}
	else
	{
		$("#tbpassword").removeClass("crveniBorder");
		$('#password').hide();
	}
	if(!regMail.test(email))
	{
		$("#tbmail").addClass("crveniBorder");
		$('#email').show();
		nizGreske.push("E-mail nije dobar.");
	}
	else
	{
		$("#tbmail").removeClass("crveniBorder");
		$('#email').hide();
		
	}
	if(!regNadimak.test(nadimak))
	{
		$("#tbnadimak").addClass("crveniBorder");
		$('#nadimak').show();
		nizGreske.push("Nadimak nije dobar.");
	}
	else
	{
		$("#tbnadimak").removeClass("crveniBorder");
		$('#nadimak').hide();
		
		
	}
	 console.log(nizGreske);

	if(nizGreske.length != 0)
	{
		//$('#ispisigreske').show();
	}
	else
	{
		saljiAjaxom();
		
	}

	function saljiAjaxom()
		{
		   $.ajax({
			  url: "php/obrada.php",
			  method: "post",
			  // server mora da vrati json, ali neki put upada u error ako se stavi dataType: "json", u tom slucaju samo obirsati dataType: json
			  dataType: "json",
			  // saljemo json
			  data:
			  {
				btnpotvrdi: "nesto",
				tbime: ime1,
				tbprezime: prezime1,
				tbmail: email,
				tbpassword: pasword1,
				izabraniRb: izabraniRb,
				tbnadimak: nadimak
				 // $_POST["btnPotvrdi" => "trange frange", "tbImePrezime" => "Mladen Petrovic"]
			  },
			  success: function(data)
			  {
				  // data je ono sto vraca server, u ovom slucaju json..
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
		}

	
	
		
};
});