<?php

namespace App\MyClasses;

class MyService
{
	private $myservice;

	private function __construct()
	{
	}

	public static getInstance()
	{
		return self::$myservice ?? self::$myservice = new MyService();
	}

	public function setId($id)
	{
		$this->id = $id;
		if ($id >= 0 && $id < count($this->data)) {
			$this->msg = "select id:" . $id . ', data:"' . $this->data[$id] . '"';
		}
	}

	public function say()
	{
		return $this->msg;
	}

	public function data(int $id)
	{
		return $this->data[$id];
	}

	public function alldata()
	{
		return $this->data;
	}
}
