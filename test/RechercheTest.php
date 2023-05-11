<?php
use PHPUnit\Framework\TestCase;

class RechercheTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        require_once('./src/Connexion.php');
        $this->conn = $cnnclocation;
    }

    public function testRechercheRetourneDesResultats()
    {
        $mc = 'NISSAN';
        $reqselect = "select * from automobile where MARQUE like '%$mc%'";
        $resultat = mysqli_query($this->conn, $reqselect);

        $this->assertNotNull($resultat);
        $this->assertGreaterThan(0, mysqli_num_rows($resultat));
    }

    public function testRechercheNeRetournePasDeResultats()
    {
        $mc = 'Xyz';
        $reqselect = "select * from automobile where MARQUE like '%$mc%'";
        $resultat = mysqli_query($this->conn, $reqselect);

        $this->assertNotNull($resultat);
        $this->assertEquals(0, mysqli_num_rows($resultat));
    }
}
