<?php

namespace PPF\Ques\Facades;

use Illuminate\Support\Facades\Facade;

class FacadeExample extends Facade{

    protected static function getFacadeAccessor() { return 'ClassExample'; }

}