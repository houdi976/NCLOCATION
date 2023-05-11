<?php

use PHPUnit\Framework\TestCase;

class ConnexionTest extends TestCase {
    public function testConnexionReussie() {
      require_once('./src/Connexion.php');
      $this->assertEquals(null, mysqli_connect_errno());
    }
  }
  
?>
