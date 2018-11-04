<?php

namespace dimidrol88\phpCurenciesMarker;

/**
 * 
 * Description of CurrencyMarker
 * Simple php class
 * @author dimidrol88
 */
class CurrencyMarker
{
    /**
     * 
     * @var array
     */
    public $curencies = [];

    /**
     * 
     * @var string - Separator of integer and decimal parts
     */
    protected $separator = '.';

    /**
     * 
     * @var string
     */
    protected $link = 'http://cbr.ru/scripts/XML_daily.asp?date_req=';

    /**
     *
     * @param string $date 
     * @param boolean $format - Use to format the exchange rate (true = rounding up, 2 decimal places)
     * @param string $separator - Separated currency
     */
    public function __construct($date = null, $format = true, $separator = '.')
    {
	$this->link = $this->getDate((string) $date);
	$this->separator = $separator;
	$this->curencies = $this->setСurrencies($format);
    }

    /**
     * 
     * return float | string
     */
    public function __get($charCode)
    {
	return (float) $this->curencies[(string) strtoupper($charCode)] ? (float) $this->curencies[(string) strtoupper($charCode)] : 'Курс валюты не найден! Проверьте символьный код!';
    }

    /**
     * 
     * @param boolean $format
     * @return array|false
     */
    private function setСurrencies($format)
    {
	$currencies = simplexml_load_file($this->link);
	foreach ($currencies->xpath('//Valute') as $currency) {
	    if (!$format) {
		$currencies[(string) $currency->CharCode] = (float) str_replace(',', $this->separator, $currency->Value);
	    } else {
		$currencies[(string) $currency->CharCode] = round((float) str_replace(',', $this->separator, $currency->Value), 2, PHP_ROUND_HALF_UP);
	    }
	}
	return $currencies ? $currencies : false;
    }

    /**
     * 
     * @param string $date
     * @return string
     */
    private function getDate($date)
    {
	return $date ? $this->link . $date : $this->link . (string) date("d/m/Y");
    }

}
