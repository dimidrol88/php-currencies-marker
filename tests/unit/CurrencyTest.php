<?php

namespace dimidrol88\сurrenciesMarker\tests\unit;

use dimidrol88\сurrenciesMarker\CurrencyMarker;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    /**
     *
     * @var CurrencyMarker 
     */
    private $marker;

    public function setUp()
    {
	$this->marker = new CurrencyMarker();
    }

    public function tearDown()
    {
	unset($this->marker);
    }

    public function testConnection()
    {
	$this->assertTrue($this->marker->checkConnection());
    }

    /**
     * @depends testConnection
     */
    public function testList()
    {
	$this->assertNotEmpty($this->marker->getCurrenciesList());
    }

    /**
     * @depends testConnection
     */
    public function testCurrency()
    {
	$this->assertNotEmpty($this->marker->usd, 'No usd');
	$this->assertNotEmpty($this->marker->eur, 'No eur');
	$this->assertNotEmpty($this->marker->nok, 'No nok');
    }

}