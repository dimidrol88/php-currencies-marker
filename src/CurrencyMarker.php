<?php

namespace dimidrol88\сurrenciesMarker;

/**
 * 
 * Description of CurrencyMarker
 * Simple php class
 * 
 * @author dimidrol88
 */
class CurrencyMarker
{
    /**
     * 
     * @var array
     */
    public $currencies = [];

    /**
     * 
     * @var string - Separator of integer and decimal parts
     */
    protected $separator = '.';

    /**
     * 
     * @var string
     */
    protected $link = "http://cbr.ru/scripts/XML_daily.asp?date_req=";

    /**
     *
     * @var array
     */
    protected $replace = ['.', ',', '\\', '%', ':'];

    /**
     *
     * @param string $date 
     * @param boolean $format - Use to format the exchange rate (true = rounding up, 2 decimal places)
     * @param string $separator - Separated currency
     */
    public function __construct($date = null, $format = true, $separator = '.')
    {
	$this->link = $this->link . $this->getDate($date);
	$this->separator = $separator;
	$this->upload($format);
    }

    /**
     * 
     * return float | string
     */
    public function __get(string $charCode): string
    {
	return $this->currencies[strtoupper($charCode)] ? $this->currencies[strtoupper($charCode)] : "Курс валюты {$charCode} не найден! Проверьте символьный код!";
    }

    /**
     * 
     * @return array
     */
    public function getCurrenciesList(): array
    {
	$response = [];
	if ($this->checkConnection()) {
	    $response = array_keys($this->currencies);
	}
	return $response;
    }

    public function checkConnection(): bool
    {
	return $this->currencies ? true : false;
    }

    private function upload(bool $format): void
    {
	try {
	    $currencies = simplexml_load_file($this->link);
	    foreach ($currencies->xpath('Valute') as $currency) {
		if (!$format) {
		    $this->currencies[(string) $currency->CharCode] = (float) str_replace(',', $this->separator, $currency->Value);
		} else {
		    $this->currencies[(string) $currency->CharCode] = round((float) str_replace(',', $this->separator, $currency->Value), 2, PHP_ROUND_HALF_UP);
		}
	    }
	} catch (Exception $ex) {
	    echo 'Произошла ошибка при загрузке: ', $ex->getMessage(), "\n";
	}
    }

    private function getDate($date): string
    {
	return $date ? (string) str_replace($this->replace, '/', $date) : (string) date("d/m/Y");
    }

}
