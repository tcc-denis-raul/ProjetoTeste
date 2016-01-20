<?php
class MainTest extends PHPUnit_Framework_TestCase
{
    protected $backupGlobals = false;
    protected function setUp()
    {
        $GLOBALS['dolar'] = "2.0";
    }
    public function testPossuiCaracteristicaNumber()
    {
        $a   = new Funcoes();
        $vet = array(2, 3, 4);
        $this->assertEquals(1, $a->possuiCaracteristica($vet, 2));
        $this->assertEquals(0, $a->possuiCaracteristica($vet, 5));
    }
    public function testPossuiCaracteristicaString()
    {
        $a   = new Funcoes();
        $vet = array("test", "al", "cont");
        $this->assertEquals(1, $a->possuiCaracteristica($vet, "cont"));
        $this->assertEquals(0, $a->possuiCaracteristica($vet, "naotem"));
    }

    public function testFaixaPrecoRealAte30Validos()
    {
        $a   = new Funcoes();
        $vet = array(0.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "ate30", "real"));
        $this->assertEquals(1, $a->faixaPreco($vet, "ate30", "real"));
        $vet = array(30.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "ate30", "real"));
        $vet = array(32.0, -1.0, 29.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "ate30", "real"));
    }
    public function testFaixaPrecoRealAte30Invalidos()
    {
        $a   = new Funcoes();
        $vet = array(-1.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "ate30", "real"));
        $vet = array(32.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "ate30", "real"));
        $vet = array(32.0, 34.0, 67.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "ate30", "real"));
    }

    public function testFaixaPrecoReal31a60Validos()
    {
        $a   = new Funcoes();
        $vet = array(31.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "31a60", "real"));
        $vet = array(55.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "31a60", "real"));
        $vet = array(50.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "31a60", "real"));
        $vet = array(62.0, 30.0, 53.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "31a60", "real"));
    }
    public function testFaixaPrecoReal31a60Invalidos()
    {
        $a   = new Funcoes();
        $vet = array(30.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "31a60", "real"));
        $vet = array(61.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "31a60", "real"));
        $vet = array(29.0, 64.0, 67.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "31a60", "real"));
    }

    public function testFaixaPrecoReal61a100Validos()
    {
        $a   = new Funcoes();
        $vet = array(61.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "61a100", "real"));
        $vet = array(88.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "61a100", "real"));
        $vet = array(100.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "61a100", "real"));
        $vet = array(101.0, 60.0, 77.1);
        $this->assertEquals(1, $a->faixaPreco($vet, "61a100", "real"));
    }
    public function testFaixaPrecoReal61a100Invalidos()
    {
        $a   = new Funcoes();
        $vet = array(60.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "61a100", "real"));
        $vet = array(100.5);
        $this->assertEquals(0, $a->faixaPreco($vet, "61a100", "real"));
        $vet = array(59.9, 101.0, 100.1);
        $this->assertEquals(0, $a->faixaPreco($vet, "61a100", "real"));
    }

    public function testFaixaPrecoReal101a150Validos()
    {
        $a   = new Funcoes();
        $vet = array(101.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "101a150", "real"));
        $vet = array(101.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "101a150", "real"));
        $vet = array(150.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "101a150", "real"));
        $vet = array(150.1, 100.9, 120.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "101a150", "real"));
    }
    public function testFaixaPrecoReal101a150Invalidos()
    {
        $a   = new Funcoes();
        $vet = array(100.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "101a150", "real"));
        $vet = array(150.5);
        $this->assertEquals(0, $a->faixaPreco($vet, "101a150", "real"));
        $vet = array(100.9, 151.0, 156.1);
        $this->assertEquals(0, $a->faixaPreco($vet, "101a150", "real"));
    }

    public function testFaixaPrecoReal151maisValidos()
    {
        $a   = new Funcoes();
        $vet = array(151.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "151mais", "real"));
        $vet = array(155.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "151mais", "real"));
        $vet = array(150.1, 158.8);
        $this->assertEquals(1, $a->faixaPreco($vet, "151mais", "real"));
    }
    public function testFaixaPrecoReal151maisInvalidos()
    {
        $a   = new Funcoes();
        $vet = array(100.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "151mais", "real"));
        $vet = array(100.9, 149.0, 56.1);
        $this->assertEquals(0, $a->faixaPreco($vet, "151mais", "real"));
    }

    public function testFaixaPrecoDolarAte30Validos()
    {
        $a   = new Funcoes();
        $vet = array(0.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "ate30", "dolar"));
        $vet = array(14.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "ate30", "dolar"));
        $vet = array(15.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "ate30", "dolar"));
        $vet = array(16.0, -1.0, 11.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "ate30", "dolar"));
    }
    public function testFaixaPrecoDolarAte30Invalidos()
    {
        $a   = new Funcoes();
        $vet = array(-1.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "ate30", "dolar"));
        $vet = array(16.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "ate30", "dolar"));
        $vet = array(32.0, 34.0, 67.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "ate30", "dolar"));
    }

    //
    public function testFaixaPrecoDolar31a60Validos()
    {
        $a   = new Funcoes();
        $vet = array(15.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "31a60", "dolar"));
        $vet = array(16.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "31a60", "dolar"));
        $vet = array(30.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "31a60", "dolar"));
        $vet = array(32.0, 2.0, 18.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "31a60", "dolar"));
    }
    public function testFaixaPrecoDolar31a60Invalidos()
    {
        $a   = new Funcoes();
        $vet = array(4.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "31a60", "dolar"));
        $vet = array(31.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "31a60", "dolar"));
        $vet = array(14.0, 31.0, 55.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "31a60", "dolar"));
    }

    public function testFaixaPrecoDolar61a100Validos()
    {
        $a   = new Funcoes();
        $vet = array(30.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "61a100", "dolar"));
        $vet = array(32.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "61a100", "dolar"));
        $vet = array(50.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "61a100", "dolar"));
        $vet = array(51.0, 29.0, 33.1);
        $this->assertEquals(1, $a->faixaPreco($vet, "61a100", "dolar"));
    }
    public function testFaixaPrecoDolar61a100Invalidos()
    {
        $a   = new Funcoes();
        $vet = array(29.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "61a100", "dolar"));
        $vet = array(55.5);
        $this->assertEquals(0, $a->faixaPreco($vet, "61a100", "dolar"));
        $vet = array(59.9, 29.0, 100.1);
        $this->assertEquals(0, $a->faixaPreco($vet, "61a100", "dolar"));
    }

    public function testFaixaPrecoDolar101a150Validos()
    {
        $a   = new Funcoes();
        $vet = array(50.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "101a150", "dolar"));
        $vet = array(55.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "101a150", "dolar"));
        $vet = array(75.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "101a150", "dolar"));
        $vet = array(49.1, 75.9, 65.0);
        $this->assertEquals(1, $a->faixaPreco($vet, "101a150", "dolar"));
    }
    public function testFaixaPrecoDolarl101a150Invalidos()
    {
        $a   = new Funcoes();
        $vet = array(29.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "101a150", "dolar"));
        $vet = array(88.5);
        $this->assertEquals(0, $a->faixaPreco($vet, "101a150", "dolar"));
        $vet = array(100.9, 29.0, 156.1);
        $this->assertEquals(0, $a->faixaPreco($vet, "101a150", "dolar"));
    }

    public function testFaixaPrecoDolar151maisValidos()
    {
        $a   = new Funcoes();
        $vet = array(75.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "151mais", "dolar"));
        $vet = array(155.5);
        $this->assertEquals(1, $a->faixaPreco($vet, "151mais", "dolar"));
        $vet = array(70.1, 158.8);
        $this->assertEquals(1, $a->faixaPreco($vet, "151mais", "dolar"));
    }
    public function testFaixaPrecoDolar151maisInvalidos()
    {
        $a   = new Funcoes();
        $vet = array(20.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "151mais", "dolar"));
        $vet = array(20.9, 75.0);
        $this->assertEquals(0, $a->faixaPreco($vet, "151mais", "dolar"));
    }
}
