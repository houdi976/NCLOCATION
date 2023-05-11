<?php
require_once 'Connexion.php';

use PHPUnit\Framework\TestCase;

class SupprimerTest extends TestCase
{
    public function testsupp()
    {
        global $cnnclocation;
        $supCar = BD04; // remplacez 123 par une valeur d'essai valide
        $reqDelete = "DELETE FROM automobile WHERE Immatriculation =" . $supCar;
        $resultat = mysqli_query($cnnclocation, $reqDelete);
        $this->assertTrue($resultat, "La suppression a échoué");
    }
}