<?php

namespace BinaryCabin\LaravelReporting\Facades;

use Illuminate\Support\Facades\Facade;

class Reporting extends Facade
{
    protected static function getFacadeAccessor() {
        return 'reporting';
    }
}