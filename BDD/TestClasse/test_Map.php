<?php 

include("../../header.php");
include("../../BDD/Map.php");

    $Map = new Map(1, $Bdd);
    echo $Map->getNomMap();

    echo "<p>MapSuivante</p>".'<a href = "'.$Map->mapSuivante()->getIdMap().'">'.$Map->mapSuivante()->getNomMap().'</a>';
    echo "<p>MapPrecedente</p>".'<a href = "'.$Map->mapPrecedente()->getIdMap().'">'.$Map->mapPrecedente()->getNomMap().'</a>';

    // Map?id=$Map->mapSuivante()->getIdMap()

?>