# Smotreshka
Класс для работы с облачной тв-платформой Смотрешка(https://smotreshka.tv)

## Requirement
PHP >= 5.2

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
### `account_create($email, $login = null, $password = null ,$purchases = null, $info = null)` create user account in service

```php
$smotreshka->account_create($email);
```
`$email required` email for send password

`$login` any chars

`$password` 5 to 200 chars

`$purchases: array()` array of subscribes

`$info: object` any data


#### `account_show($id)` show user account data

```php
$smotreshka->account_show($id);
```
`$id` user account id in service

### account_update($id, $info)
```php
$smotreshka->account_update($id, $info);
```
`$id` user account id in service
`$info: object` any data

    public function account_reset_password($id, $password){
        if (isset($password)) {$data = array('password' => $password);} else {$data = array();}
        $http = Http::post($this->url.'accounts/'.$id.'/reset-password', json_decode($data));
        return $http->json();
    }

    public function account_delete($id){
        $http = Http::delete($this->url.'accounts/'.$id, json_encode(array()));
        return $http->json();
    }

    public function accounts($count = null, $page = null){
        $params = array();
        if (isset($page)) $params['page_num'] = $page;
        if (isset($count)) $data['page_sie'] = $count;

        if (count($params) > 0) $query = '?'.http_build_query($params);

        $http = Http::get($this->url.'accounts'.$query);
        return $http->json();
    }

    public function account_subscriptions($id){
        $http = Http::get($this->url.'accounts/'.$id.'/subscriptions');
        return $http->json();
    }

    public function account_subscriptions_create($id, $subscription_id){
        $data = array(
            'id' => $subscription_id,
            'valid' => true
        );

        $http = Http::post($this->url.'accounts/'.$id.'/subscriptions', json_encode($data));
        return $http->json();
    }

    public function account_subscriptions_delete($id, $subscription_id){
        $data = array(
            'id' => $subscription_id,
            'valid' => false
        );

        $http = Http::post($this->url.'accounts/'.$id.'/subscriptions', json_encode($data));
        return $http->json();
    }

    public function get_subscriptions(){
        $http = Http::get($this->url.'subscriptions');
        return $http->json();
    }






## Contributing

1. Fork it ( https://github.com/Wondersoft/olap-view/fork )
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create a new Pull Request