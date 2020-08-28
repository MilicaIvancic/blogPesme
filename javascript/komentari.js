$(document).ready(function(){
document.getElementById("potvrdi").addEventListener("click", proveri);

var regKomentar=/(.){5,500}/;

function proveri (){

    var komentar = $("#tbkomentar").val();
    var greske=[];
    var id=document.getElementById("skriveniId").value;

    if(!regKomentar.test(komentar)){
         greske.push("Komentar je prekratak ili predugacak");
    }
        if(greske.length!=0){
            console.log(greske);
        }
        else{
          saljiAjaxom();
        }

        function saljiAjaxom()
		{
		   $.ajax({
			  url: "php/obradaKomentara.php",
			  method: "post",
			  // server mora da vrati json, ali neki put upada u error ako se stavi dataType: "json", u tom slucaju samo obirsati dataType: json
			  dataType: "json",
			  // saljemo json
			  data:
			  {
				potvrdi: "nesto",
                tbkomentar: komentar,
                skriveniId: id
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
}

})