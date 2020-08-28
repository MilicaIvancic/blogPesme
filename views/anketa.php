<?php
    $upit = "select * from anketa where aktivna = 1";
    $ankete = $konekcija->query($upit)->fetchAll();

    foreach($ankete as $anketa):
?>

<div class='marg' border=1>
    <?php static $brojac = 1; ?>
        <b><?= $brojac++ . ". " . $anketa->pitanje; ?></b>
        <br/>
        <br/>

            <?php 
                $id_a = $anketa->id_a;
                $rez2 = $konekcija->prepare('select * 
                from odgovor o inner join anketa_odgovor ao on o.id_odgovor = ao.id_odgovor 
                inner join anketa a on ao.id_anketa = a.id_a where id_a = :id');
                $rez2->bindParam(':id', $id_a);
                $rez2->execute();
                $odgovori = $rez2->fetchAll();

            ?>
            <select id="ddl<?= $anketa->id_a ?>">
                <?php foreach($odgovori as $odgovor): ?>
                <option value="<?= $odgovor->id_odgovor; ?>"><?= $odgovor->odgovor; ?></option>
            <?php endforeach; ?>
            </select>
        <br/>
        <br/>
        <input type='button' class='btnAnketa' value='Potvrdi' data-id='<?= $anketa->id_a; ?>'/>
        <script type="text/javascript" src="javascript/anketa.js"></script>
</div>
<br/>
<br/>
<div class="feedback<?=$anketa->id_a?>"></div>
<br/>
<br/>

    <?php endforeach; ?>