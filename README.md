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
$valute = new CurrencyMarker();
print_r($valute);
```
### Получения котировок на заданный день
```php
$valute = new CurrencyMarker(date('d/m/Y'));// 10/09/1994
print_r($valute);
```
### Получения котировки по аббревиатуре
```php
$valute = new CurrencyMarker(date('d/m/Y'));// 10/09/1994
echo $valute->usd;
echo $valute->eur;
```