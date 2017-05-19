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
$azpay = AZPay::init();
```

## Order
``` php
// Order
$azpay->setOrder([
	'reference'   => '123456789',
	'totalAmount' => '1000'
]);
```

## Billing
``` php
// Billing
$azpay->setBilling([
	'customerIdentity' => '1',
    'name'             => 'Fulano de Tal',
    'address'          => 'Av. Federativa, 230',
    'address2'         => '10 Andar',
    'city'             => 'Mogi das Cruzes',
    'state'            => 'SP',
    'postalCode'       => '20031-170',
    'phone'            => '21 4009-9400',
    'email'            => 'fulanodetal@email.com'
]);
```

## Options
``` php
// Options
$azpay->setOptions([
	'urlReturn'   => 'http://loja.exemplo.com.br',
	'fraud'       => 'false',
	'customField' => ''
]);
```

## CreditCard
``` php
// CreditCard
$azpay->setCardPayment([
	'acquirer'           => AZPay::getCardOperators()['cielo']['modes']['store']['code'],
	'method'             => '1',
	'amount'             => '1000',
	'currency'           => AZPay::getCurrencies('BRL'),
	'numberOfPayments'   => '1',
	'groupNumber'        => '0',
	'country'            => 'BRA',
	'flag'               => 'visa',
	'cardHolder'         => 'José da Silva',
	'cardNumber'         => '4012001037141112',
	'cardSecurityCode'   => '123',
	'cardExpirationDate' => '201805',
	'saveCreditCard'     => 'true'
]);
```
## Enviando 
``` php
// Try
try {
	
	// venda direta
	$azpay->sale()->execute();

	$xml_request = $azpay->response();

	return $xml_request;

} catch (AzPayLaravel\AzPay\SDK\AZPay_Error $e) {

    # HTTP 409 - AZPay Error
    $error = $azpay->responseError();   

    dd($error);

} catch (AzPayLaravel\AzPay\SDK\AZPay_Curl_Exception $e) {
    
    # Connection Error
    dd($e->getMessage());

} catch (AzPayLaravel\AzPay\SDK\AZPay_Exception $e) {
	
    # General Error
    dd($e->getMessage());
}
```

# License
[MIT license](https://opensource.org/licenses/MIT)