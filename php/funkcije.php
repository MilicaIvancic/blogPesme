<?php
# 3 - Funkcija za izvrsanje bilo kog SELECT upita

function selectFunkcija($upit){
    global $konekcija;

    $rezultat = $konekcija->query($upit)->fetchAll();
    
    return $rezultat;
}
?>