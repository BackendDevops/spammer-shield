<?php

namespace Kvnc\SpammerShield;

class Shield
{
    public function getConfig(): object
    {
        return (object) config('spammer-shield');
    }
}
