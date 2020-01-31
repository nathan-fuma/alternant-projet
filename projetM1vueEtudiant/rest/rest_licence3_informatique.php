<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 02/12/2019
 * Time: 14:11
 */
require('../connectDB.php');

$query = mysqli_query($link, "SELECT count(categorie_apprentissage.categorie) As con, categorie.nom FROM categorie_apprentissage
JOIN apprentissage ON categorie_apprentissage.apprentissage=apprentissage.id
JOIN categorie ON categorie_apprentissage.categorie=categorie.id
WHERE apprentissage.formation=2 
GROUP BY categorie.nom ORDER BY categorie.nom;") or die(mysqli_error($sql));





CloseCon($link);

$categories =[];

while ($row2 = mysqli_fetch_array($query)) {
    array_push($categories, $row2['con']);
}

echo json_encode($categories);
