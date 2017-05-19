<?php

namespace AzPayLaravel\AzPay;

use AzPayLaravel\AzPay\SDK\AZPay_SDK;
use AzPayLaravel\AzPay\SDK\Config;

class AZPay extends AZPay_SDK
{	
	private $azpay;

	public function init()
	{
		// inicializa a SDK
		parent::initialize(config('azpay.merchant_id'), config('azpay.merchant_key'));
		return $this;
	}

	public function setOrder(Array $order)
	{
		$this->config_order = array_merge($this->config_order, $order);
		return $this;	
	}

	public function setBilling(Array $billing)
	{
		$this->config_billing = array_merge($this->config_billing, $billing);
		return $this;
	}

	public function setOptions(Array $options)
	{
		$this->config_options = array_merge($this->config_options, $options);
		return $this;
	}	

	public function setCardPayment(Array $cardPayment)
	{
		$this->config_card_payments = array_merge($this->config_card_payments, $cardPayment);
		return $this;
	}

	public function getCardOperators()
	{
		return Config::$CARD_OPERATORS;
	}

	public function getCurrencies($currency)
	{
		return Config::$CURRENCIES[$currency];
	}

	public function getAll()
	{
		return $this;
	}
}	