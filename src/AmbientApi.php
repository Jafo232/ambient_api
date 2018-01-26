<?php

namespace jafo232\ambientapi;


class AmbientApi
{
	private $client;

	public function __construct()
	{
		$this->client = new \GuzzleHttp\Client();
	}

	/*
	 * Get all devices
	 */
	public function getDevices()
	{
		$res = $this->client->request('GET', config('ambient.endpoint') . '/devices?applicationKey=' . config('ambient.applicationKey') .
			'&apiKey=' . config('ambient.apiKey'));

		if ($res->getStatusCode() == 200)
		{
			$data = $res->getBody();

			return json_decode($data, true);
		}
	}

	/*
	 * Get the data for a specific device for a specific end date
	 * $mac = Mac address of device
	 * $limit max 288
	 * $endDate is Epoch in milliseconds
	 */
	public function getDeviceData($mac, $limit = 288, $endDate = null)
	{
		if (is_null($endDate))
			$endDate = time() * 1000;

		$res = $this->client->request('GET', config('ambient.endpoint') . '/devices/' . $mac . '?apiKey=' . config('ambient.apiKey') . '&applicationKey=' . config('ambient.applicationKey') . '&limit=' . intval($limit) . '&endDate=' . intval($endDate));

		if ($res->getStatusCode() == 200)
		{
			$data = $res->getBody();

			return json_decode($data, true);
		}
	}
}