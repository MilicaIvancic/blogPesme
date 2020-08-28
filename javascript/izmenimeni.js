$(document).ready(function(){

	
	document.getElementById("href").focus();
	$('span').hide();
	
	
	
	document.getElementById("izmenimeni").addEventListener("click", proveri);


var regNaziv = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9}(\s[a-zčćžšđ]{2,9})?$/;
var regHref = /[^\s]/;







function proveri(){
	

var naziv=document.getElementById("naziv").value;
var href=document.getElementById("href").value;
var hidden = document.getElementById("skriveno").value;

var nizGreske=[];



if(!regHref.test(href))
	{
		$("#href").addClass("crveniBorder");
		$('#spanhref').show();
		nizGreske.push("href nije dobro.");
	}
	else
	{
		$("#href").removeClass("crveniBorder");
		$('#spanhref').hide();
		
		
	}
	
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
			  url: "php/izmenimeni.php",
			  method: "post",
			  // server mora da vrati json, ali neki put upada u error ako se stavi dataType: "json", u tom slucaju samo obirsati dataType: json
			  dataType: "json",
			  // saljemo json
			  data:
			  {
                izmenimeni: "nesto",
                hidden: hidden,
				naziv: naziv,
				href: href

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