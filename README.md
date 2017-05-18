# Larave AzPay
##### O Laravel AzPay consome a SDK do AzPay e fornece uma forma simples de gerar o pagamentos.

## Requerimentos
* PHP >= 5.5.*
* Laravel >= 5.2

## Instalação 
``` composer require gmodugno/azpaylaravel ```

## Service Provider
Abra o arquivo `config/app.php` e adicione ao Array `providers` a seguinte instrução:
```php
AzPayLaravel\AzPay\AzPayServiceProvider::class, 
```

## Aliases do Package
Ainda no arquivo `config/app.php` adicione no Array `aliases` a seguinte instrução:

```php 
'AZPay' => AzPayLaravel\AzPay\Facades\AZPay::class, 
```

## Criação do arquivo de configuração
Digite o seguinte comando no seu Terminal

``` php artisan vendor:publish --tag=config ```

Pronto, se tudo deu certo, irá paracer a seguinte mensagem

``` Copied File [/vendor/gmodugno/azpaylaravel/src/AzPay/Config/azpay.php] To [/config/azpay.php] ```

## Ajustando as Configurações
Abra o arquivo `config/azpay.php` e coloque suas credenciais da AzPay.
``` php
return [
	'merchant_id' => 'MERCHANT_ID',
	'merchant_key' => 'MERCHANT_KEY'
];
```

## Inicializar a SDK
``` php 
AZPay::init();
```

## Order
``` php

// set
AZPay::setConfigOrder([
    'reference' => '123456789',
    'totalAmount' => '1000'
]);

// get
return AZPay::getConfigOrder();
```

# License
[MIT license](https://opensource.org/licenses/MIT)