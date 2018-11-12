<?php

namespace tests\unit;

use dimidrol88\phpCurrenciesMarker\CurrencyMarker;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    /**
     *
     * @var type 
     */
    private $marker;

    public function setUp()
    {
	$this->marker = new CurrencyMarker();
    }

    public function testGetConnection()
    {
	$this->assertTrue(true);
    }

}
