<?php

namespace jafo232\ambientapi;


use Illuminate\Support\Facades\Facade;


class AmbientApiFacade extends Facade{


	protected static function getFacadeAccessor() {


		return 'ambientapi';
	}

}