<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\StreamedResponse;

class CommonService
{
	function getSalesCustomData()
	{
		$data = ['customize_date' => '20200115'];

		return $data;
	}
}

