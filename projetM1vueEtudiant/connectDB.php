<?php

$link = mysqli_connect('localhost:8889', 'root', 'root', 'universite') or die ('Connection non effectué');

function CloseCon($db){
    mysqli_close($db);
}

?>