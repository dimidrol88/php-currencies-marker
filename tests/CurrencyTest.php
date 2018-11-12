<?php

namespace dimidrol88\сurrenciesMarker\tests;

use dimidrol88\сurrenciesMarker\CurrencyMarker;
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
