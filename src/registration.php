<?php
/**
 * Created by PhpStorm.
 * User: rsalc
 * Date: 25.03.2019
 * Time: 20:07
 */

if (isset($_POST['save'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $street = $_POST['street'];
    $plz = $_POST['plz'];
    $city = $_POST['city'];

    try {
        $query = 'insert into personen(per_vorname, per_nachname, per_strasse, per_plz, per_ort, fir_id, pea_id)
              values (:firstname, :lastname, :street, :plz, :city, 1, 1);';

        $bindparams = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'street' => $street,
            'plz' => $plz,
            'city' => $city
        ];

        $stmt = $con->prepare($query);
        $stmt->execute($bindparams);
        $id = $con->lastInsertId();

        foreach ($bindparams as $bindparam) {
            echo '<ul><li>' . $bindparam. '</li></ul>';
        }

        echo '<ul><li>Daten efasst</li></ul>';
        echo '<ul><li>KundenID = ' . $id . '</li></ul>';

    } catch (exception $e) {
        $e->getMessage();
    }

} else {

    ?>
    <form method="POST">
        <div class="container">
            <div class="row">
                <div class="six columns">
                    <label for="firstname">Vorname</label>
                    <input class="u-full-width" type="text" name="firstname" placeholder="Max" id="firstname">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="lastname">Nachname</label>
                    <input class="u-full-width" type="text" name="lastname" placeholder="Mustermann" id="lastname">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="street">Strasse</label>
                    <input class="u-full-width" type="text" name="street" placeholder="Strasse" id="street">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="plz">PLZ</label>
                    <input class="u-full-width" type="number" name="plz" placeholder="5550" id="plz">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="city">Ort</label>
                    <input class="u-full-width" type="text" name="city" placeholder="Radstadt" id="city">
                </div>
            </div>
            <div class="row">
            <input class="button-primary" type="submit" name="save" value="Speichern">
            </div>
        </div>
    </form>

<?php
}