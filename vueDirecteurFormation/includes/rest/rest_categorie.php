<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 02/12/2019
 * Time: 14:11
 */
require('../connectDB.php');

$query2 = mysqli_query($link, "SELECT DISTINCT categorie.nom FROM categorie 
JOIN categorie_apprentissage ON categorie.id=categorie_apprentissage.categorie
JOIN apprentissage ON categorie_apprentissage.apprentissage=apprentissage.id
WHERE apprentissage.formation = 1 ORDER BY categorie.nom;") or die(mysqli_error($sql));





CloseCon($link);

$categories =[];

while ($row = mysqli_fetch_array($query2)) {
    array_push($categories, $row['nom']);
}

echo json_encode($categories);

