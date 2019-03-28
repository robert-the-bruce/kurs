<?php
/**
 * Created by PhpStorm.
 * User: rsalc
 * Date: 25.03.2019
 * Time: 20:07
 */

try {

    $query = 'select    kur_id as "Kursnummer",
                        kur_bezeichnung as "Kursname",
                        kur_preis as "Preis",
                        kur_start as "Starttermin",
                        concat_ws(" ", per_vorname, per_nachname) as Teilnehmer
                        from kurse
                        left join kurse_personen using(kur_id)
                        left join personen using(per_id);';

    $stmt = $con->prepare($query);

    $stmt->execute();

    ?>
    <div class="container">
        <div class="row">
            <div class="eleven columns">
                <h4>Willkommen in der Kursverwaltung</h4>
            </div>
        </div>
        <div class="row">
            <div class="eleven columns">
                <?php ShowTable($stmt)?>
            </div>
        </div>
    </div>
    <?php


} catch (exception $e) {
    $e->getMessage();
}




