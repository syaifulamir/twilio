<?php

namespace TwilioPackage\Twilio\Facades;

use Illuminate\Support\Facades\Facade;

class Twilio extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'twilio';
    }
}
