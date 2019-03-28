<?php
/**
 * Created by PhpStorm.
 * User: rsalc
 * Date: 25.03.2019
 * Time: 20:47
 */

function ShowTable($stmt)
{
    $meta = [];

    echo '<div class="container"><div class="row"><div class="eight columns"><table><tr>';
    if ($stmt->columnCount() > 0){
        for($i = 0; $i < $stmt->columnCount(); $i++)
        {
            $meta[$i] = $stmt->getColumnMeta($i);
            echo '<th>' . $meta[$i]['name'] . '</th>';
        }
        echo '</tr>';
        while($row = $stmt->fetch(PDO::FETCH_NUM))
        {
            echo '<tr>';
            foreach ($row as $r)
            {
                echo '<td>'. $r . '</td>';
            }
            echo '</tr>';
        }
        echo '</table></div></div></div>';
    }

}