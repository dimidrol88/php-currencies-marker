# php-currencies-marker
Простой php class для получения курсов валют с сайта cbr.ru
## Старт

### Установка через composer
```
$ composer require dimidrol88/php-currencies-marker
```

## Использование
### Получения котировок на текущий день
```php
$valute = new dimidrol88\сurrenciesMarker\CurrencyMarker();
print_r($valute);
```
### Получения котировок на заданный день
```php
$valute = new dimidrol88\сurrenciesMarker\CurrencyMarker(date('d/m/Y'));// 10/09/1994
print_r($valute);
```
### Получения котировки по аббревиатуре
```php
$valute = new dimidrol88\сurrenciesMarker\CurrencyMarker(date('d/m/Y'));// 10/09/1994
echo $valute->usd;
echo $valute->eur;
```
### Все наименования валют
```php
$valute = new dimidrol88\сurrenciesMarker\CurrencyMarker();
print_r($valute->getCurrenciesList());
```