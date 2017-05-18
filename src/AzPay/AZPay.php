<?php

namespace AzPayLaravel\AzPay;

use AzPayLaravel\AzPay\SDK\AZPay_SDK;

class AZPay
{	
	/**
	 * Instancia o AzPay_SDK
	 * @var AzPayLaravel\AzPay\SDK\AZPay_SDK
	 */
	private $azpay;

	/**
	 * Config Order
	 * @var Array
	 */
	private $config_order;

	/**
	 * Inicia o serviço da SDK da AzPay
	 * @return self
	 */
	public function init()
	{
		$this->getInstance();
		return $this;
	}

	/**
	 * Instancia o AzPayLaravel\AzPay\SDK\AZPay_SDK
	 * @return self
	 */
	public function getInstance()
	{
		if (!isset($this->azpay)) {
			$this->azpay = new AZPay_SDK(config('azpay.merchant_id'), config('azpay.merchant_key'));
		}	
		return $this->azpay;
	}

	/**
	 * Set Config Order
	 * @param Array $config
	 */
	public function setConfigOrder(Array $config)
	{
		$this->azpay->config_order = $config;
		return $this;
	}

	/**
	 * Retorna as config_order
	 * @return Array $config_order
	 */
	public function getConfigOrder()
	{
		return $this->azpay->config_order;
	}
}