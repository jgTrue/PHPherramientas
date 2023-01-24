<?php
use PHPUnit\Framework\TestCase;
include_once('./Pasteleria.php');

class PasteleriaTest extends TestCase{
    public function testCreatePasteleria(){
        $pasteleria = new Pasteleria('PalmeraChocolate');
        $this->assertSame('PalmeraChocolate', $pasteleria->getNombre());
        $this->assertNotSame('aChocolate', $pasteleria->getNombre());
    }
}