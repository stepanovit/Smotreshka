# Smotreshka
Класс для работы с облачной тв-платформой Смотрешка(https://smotreshka.tv)

VERSION = 0.1.0

## Requirement
PHP >= 5.2

Http class CURL wrapper ( https://github.com/stepanovit/http_curl_wrapper )

## Usage
### Include required files in the application

Include `Smotreshka` class to .php file

```php
require_once('Smotreshka.php');
```

### How to use
Initialize new Class, and use methods like

```php
$smotreshka = new $Smotreshka($operator, $node);
$smotreshka->subscriptions();
```

`$operator` login in service

`$node` note in service

## Methods
#### `public function account_create($email, $login = null, $password = null ,$purchases = null, $info = null)`
Create user account in service

```php
$smotreshka->account_create($email);
```
`$email required` email for send password

`$login` any chars

`$password` 5 to 200 chars

`$purchases: array()` array of subscribes

`$info: object` any data


#### `public function account_show($id)`
Show user account data

```php
$smotreshka->account_show($id);
```
`$id` user account id in service


#### `public function account_update($id, $info)`
```php
$smotreshka->account_update($id, $info);
```
`$id` user account id in service

`$info: object` any data


#### `public function account_reset_password($id, $password)`
```php
$smotreshka->account_reset_password($id, $password)
```
`$id` user account id in service

`$password` new password 5 to 200 chars


#### `public function account_delete($id)`
```php
$smotreshka->account_delete($id)
```
`$id` user account id in service


#### `public function accounts($count = null, $page = null)`
```php
$smotreshka->accounts()
```
`$count` count element on page

`$page` page number


#### `public function account_subscriptions($id)`
```php
$smotreshka->account_subscriptions($id)
```
`$id` user account id in service


#### `public function account_subscriptions_create($id, $subscription_id)`
```php
$smotreshka->account_subscriptions_create($id, $subscription_id)
```
`$id` user account id in service

`$subscription_id` subscription id


#### `public function account_subscriptions_delete($id, $subscription_id)`
```php
$smotreshka->account_subscriptions_delete($id, $subscription_id)
```
`$id` user account id in service

`$subscription_id` subscription id


#### `public function get_subscriptions()`
Get all available subscriptions
```php
$smotreshka->get_subscriptions()
```

## Contributing
1. Fork it ( https://github.com/stepanovit/Smotreshka/fork )
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create a new Pull Request