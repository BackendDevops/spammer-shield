<?php

namespace Kvnc\SpamShield\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kvnc\SpamShield\Shield
 */
class SpammerShield extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Kvnc\SpammerShield\Shield::class;
    }
}
