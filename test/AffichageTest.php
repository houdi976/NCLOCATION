<?php

use PHPUnit\Framework\TestCase;


class AffichageTest extends TestCase {
  public function testRequeteSQL() {
    require_once('./src/Connexion.php');
  

        // Get the result set from your database query
    $resultat = mysqli_query($cnnclocation, "SELECT * FROM automobile where MARQUE like 'NiSSAN' ");

    // Check that the result set is not empty
    $this->assertNotEmpty($resultat);

    // Check that the number of rows returned is as expected
    $this->assertEquals(1, mysqli_num_rows($resultat));

  }
}

?>
