<?php

namespace AzPayLaravel\AzPay\Facades;

use Illuminate\Support\Facades\Facade;

class AZPay extends Facade
{

	protected static function getFacadeAccessor()
	{
		return 'AZPay';
	}
}