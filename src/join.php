<?php
/**
 * Created by PhpStorm.
 * User: rsalc
 * Date: 25.03.2019
 * Time: 20:08
 */

if (isset($_POST['register'])) {

    $person_id = $_POST['person'];
    $kurs_id = $_POST['kurse'];
    $table = 'kurse_personen';


    $checkquery = 'select * from ' . $table . ' where kur_id = :kurs_id and per_id = :person_id;';

    try {

        $stmt = $con->prepare($checkquery);

        $bindparam = [
            'kurs_id' => $kurs_id,
            'person_id' => $person_id
        ];

        $stmt->execute($bindparam);

        $test = $stmt->fetch(PDO::FETCH_NUM);

        if (empty($test)) {

            $query = 'insert into ' . $table . ' (kur_id, per_id, kupe_isLeader) VALUES (:kurs_id, :person_id, 0)';

            $stmt = $con->prepare($query);

            $stmt->execute($bindparam);

            echo 'Sie haben sich erfolgreich angemeldet!';

        } else {
            echo 'Sie haben sich bereits angemeldet!';
        }

        ?><a href="index.php?seite=join">Zurück zur Anmeldung</a><?php

    } catch (exception $e) {
        $e->getMessage();
    }

} elseif(isset($_POST['logoff'])){

    $person_id = $_POST['person'];
    $kurs_id = $_POST['kurse'];
    $table = 'kurse_personen';


    $checkquery = 'select * from ' . $table . ' where kur_id = :kurs_id and per_id = :person_id;';

    try {

        $stmt = $con->prepare($checkquery);

        $bindparam = [
            'kurs_id' => $kurs_id,
            'person_id' => $person_id
        ];

        $stmt->execute($bindparam);

        $test = $stmt->fetch(PDO::FETCH_NUM);

        if (!empty($test)) {

            $query = 'delete from ' . $table . ' WHERE kur_id = :kurs_id AND per_id = :person_id;';

            $stmt = $con->prepare($query);

            $stmt->execute($bindparam);

            echo 'Sie haben sich erfolgreich abgemeldet!';

        } else {
            echo 'Sie waren nicht angemeldet!';
        }

        ?><a href="index.php?seite=join">Zurück zur Anmeldung</a><?php

    } catch (exception $e) {
        $e->getMessage();
    }

} else{

    $query = 'select per_id, concat_ws(" ", per_nachname, per_vorname) from personen;';

    $stmt = $con->prepare($query);

    $stmt->execute();

    $query1 = 'select kur_id, concat_ws(" ", kur_bezeichnung, kur_start) from kurse;';

    $stmt1 = $con->prepare($query1);

    $stmt1->execute();


    ?>
    <form method="POST">
        <div class="container">
            <div class="row">
                <div class="six columns">
                    <h4>Kurs An- und Abmeldung</h4>
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="person">Kunde</label>
                    <select name="person" class="u-full-width" id="person">
                        <?php while ($row = $stmt->fetch(PDO::FETCH_NUM)): ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                    <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="kurse">Kurse</label>
                    <select name="kurse" class="u-full-width" id="kurse">
                        <?php while ($row1 = $stmt1->fetch(PDO::FETCH_NUM)): ?>
                            <option value="<?php echo $row1[0] ?>"><?php echo $row1[1] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <input class="button-primary" name="register" type="submit" value="Anmelden">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <input class="button-primary" name="logoff" type="submit" value="Abmelden">
                </div>
            </div>
        </div>
    </form>

<?php
}
