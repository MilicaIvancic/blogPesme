$('.del').click(function(e){
        
    e.preventDefault();
    var iddel = $(this).attr('data-id');
    
    var x = confirm("Da li ste sigurni?");
    if(x)
    {
        $.ajax({
            url: "php/obrisiKorisnika.php",
            method: "post",
            data: {
                iddel: iddel
            },
            success: function(data)
            {
                alert("Korisnik uspesno obrisan!");
                window.location = "index.php?page=adminpanel";
            },
            error: function(xhr, status, errMsg)
            {
                alert("Doslo je do greske!");
            }

        })
    }
 
   
})



$('.delstatus').click(function(e){
        
    e.preventDefault();
    var iddel = $(this).attr('data-id');
    
    var x = confirm("Da li ste sigurni?");
    if(x)
    {
        $.ajax({
            url: "php/obrisiStatus.php",
            method: "post",
            data: {
                iddel: iddel
            },
            success: function(data)
            {
                alert("Uloga uspesno obrisan!");
                window.location = "index.php?page=adminpanel";
            },
            error: function(xhr, status, errMsg)
            {
                alert("Doslo je do greske!");
            }

        })
    }
 
   
})
$('.delmeni').click(function(e){
        
    e.preventDefault();
    var iddel = $(this).attr('data-id');
    
    var x = confirm("Da li ste sigurni?");
    if(x)
    {
        $.ajax({
            url: "php/obrisiMeni.php",
            method: "post",
            data: {
                iddel: iddel
            },
            success: function(data)
            {
                alert("Uloga uspesno obrisan!");
                window.location = "index.php?page=adminpanel";
            },
            error: function(xhr, status, errMsg)
            {
                alert("Doslo je do greske!");
            }

        })
    }
 
   
})

$('.delsliku').click(function(e){
        
    e.preventDefault();
    var iddel = $(this).attr('data-id');
    
    var x = confirm("Da li ste sigurni?");
    if(x)
    {
        $.ajax({
            url: "php/obrisiSliku.php",
            method: "post",
            data: {
                iddel: iddel
            },
            success: function(data)
            {
                alert("Uloga uspesno obrisan!");
                window.location = "index.php?page=adminpanel";
            },
            error: function(xhr, status, errMsg)
            {
                alert("Doslo je do greske!");
            }

        })
    }
 
   
})
$('.delkomentar').click(function(e){
        
    e.preventDefault();
    var iddel = $(this).attr('data-id');
    
    var x = confirm("Da li ste sigurni?");
    if(x)
    {
        $.ajax({
            url: "php/obrisiKomentar.php",
            method: "post",
            data: {
                iddel: iddel
            },
            success: function(data)
            {
                alert("Uloga uspesno obrisan!");
                window.location = "index.php?page=adminpanel";
            },
            error: function(xhr, status, errMsg)
            {
                alert("Doslo je do greske!");
            }

        })
    }
 
   
})
$('.delpesmu').click(function(e){
        
    e.preventDefault();
    var iddel = $(this).attr('data-id');
    
    var x = confirm("Da li ste sigurni?");
    if(x)
    {
        $.ajax({
            url: "php/obrisiPesmu.php",
            method: "post",
            data: {
                iddel: iddel
            },
            success: function(data)
            {
                alert("Uloga uspesno obrisan!");
                window.location = "index.php?page=korisnik";
            },
            error: function(xhr, status, errMsg)
            {
                alert("Doslo je do greske!");
            }

        })
    }
 
   
})

