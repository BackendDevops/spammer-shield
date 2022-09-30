<?php

namespace VendorName\Skeleton\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VendorName\Skeleton\Shield
 */
class SpammerShield extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Kvnc\SpammerShield\Shield::class;
    }
}
