<?php
/**
 * Created by PhpStorm.
 * User: rsalc
 * Date: 25.03.2019
 * Time: 20:07
 */

try {

    $query = 'select * from kurse;';

    $stmt = $con->prepare($query);

    $stmt->execute();

    showTable($stmt);



} catch (exception $e) {
    $e->getMessage();
}