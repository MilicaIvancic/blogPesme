window.onload= function(){

    $.ajax({
        method: 'GET',
        url: "slajder.php",
        dataType: 'json',
        //data: {
           // $generislajder
        //},
        success: function(podaci){
            alert(podaci);
            var slika=document.getElementById("slika1");
   
    var index=0;
    function slide(podaci)
    {
        console.log(slika);
        slika.setAttribute("src",podaci[index]);
        index++;
        if(index>=nizSlika.length)
        {
        index=0;
        }
    }
    setInterval(slide,2000);
    }
        ,
        error: function(xhr, statusTxt, error){
            var status = xhr.status;
            switch(status){
                case 500:
                    alert("Greska na serveru. Trenutno nije moguce izbrisati korisnika.");
                    break;
                case 404:
                    alert("Stranica nije pronadjena.");
                    break;
                default:
                    alert("Greska: " + status + " - " + statusTxt);
                    break;
            }
        }
    });
}
   