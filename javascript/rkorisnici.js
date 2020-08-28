$(document).ready(function(){

	
	document.getElementById("tbime1").focus();
	$('span').hide();
	
	
	
	document.getElementById("btnpotvrdi1").addEventListener("click", proveri);


var regIme = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9})?$/;
var regPrezime = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9})?$/;
var regPasword = /^(.){8,20}$/;
var regNadimak=/^[A-Z][A-Za-z]{2,15}$/;
var regMail=/^[a-z][a-z0-9\.\_]{2,40}\@([a-z]{3,8}\.)com$/;






function proveri(){
	var ime1=document.getElementById("tbime1").value;

var prezime1=document.getElementById("tbprezime1").value;
var email=document.getElementById("tbmail1").value;

var pasword1=document.getElementById("tbpassword1").value;

var nadimak=document.getElementById("tbnadimak1").value;
var nizGreske=[];
var radio=document.getElementsByClassName("radio_polja");
var aktivan=document.getElementsByClassName("radio_aktivan");
var ulogai=document.getElementById("uloga");
var izabraniaktivan="";
var izabraniRb="";
var uloga="";
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
   $('#pol3').show();
}
else {
	$('#pol3').hide();
}
///ovo je za status
for(var i=0; i<aktivan.length; i++)
{
   if(aktivan[i].checked)
   {
    izabraniaktivan = aktivan[i].value;
	  break;
   }
}
if(izabraniaktivan == "")
{
   nizGreske.push("Pol mora biti izabran.");
   $('#pol2').show();
}
else {
    $('#pol2').hide();
   
}
///ovo je za id uloga
for(var i=0; i<ulogai.length; i++)
{
   if(ulogai[i].selected)
   {
    uloga = ulogai[i].value;
	  break;
   }
}
if(uloga == "")
{
   nizGreske.push("Uloga mora biti izabrana.");
   $('#pol4').show();
}
else {
    $('#pol4').hide();
    
}

if(!regIme.test(ime1))
	{
		$("#tbime1").addClass("crveniBorder");
		$('#ime1').show();
		//nizGreske.push("Ime nije dobro.");
	}
	else
	{
		$("#tbime1").removeClass("crveniBorder");
		$('#ime1').hide();
		
		
	}
	
	if(!regPrezime.test(prezime1))
	{
		$("#tbprezime1").addClass("crveniBorder");
		$('#prezime1').show();
		nizGreske.push("Prezime nije dobro.");
	}
	else
	{
		$("#tbprezime1").removeClass("crveniBorder");
		$('#prezime1').hide();
	}
	
	
	if(!regPasword.test(pasword1))
	{
		$("#tbpassword1").addClass("crveniBorder");
		$('#password1').show();
		nizGreske.push("Lozinka nije dobra.");
	}
	else
	{
		$("#tbpassword1").removeClass("crveniBorder");
		$('#password1').hide();
    }
    
	if(!regMail.test(email))
	{
		$("#tbmail1").addClass("crveniBorder");
		$('#email1').show();
		nizGreske.push("E-mail nije dobar.");
	}
	else
	{
		$("#tbmail1").removeClass("crveniBorder");
		$('#email1').hide();
		
	}
	if(!regNadimak.test(nadimak))
	{
		$("#tbnadimak1").addClass("crveniBorder");
		$('#nadimak1').show();
		nizGreske.push("Nadimak nije dobar.");
	}
	else
	{
		$("#tbnadimak1").removeClass("crveniBorder");
		$('#nadimak1').hide();
		
		
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
			  url: "php/korinikobrada.php",
			  method: "post",
			  // server mora da vrati json, ali neki put upada u error ako se stavi dataType: "json", u tom slucaju samo obirsati dataType: json
			  dataType: "json",
			  // saljemo json
			  data:
			  {
				btnpotvrdi1: "nesto",
				tbime: ime1,
				tbprezime: prezime1,
				tbmail: email,
				tbpassword: pasword1,
				izabraniRb: izabraniRb,
                tbnadimak: nadimak,
                izabraniaktivan: izabraniaktivan,
                
                uloga:uloga

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
		};

	
	
		
};
});