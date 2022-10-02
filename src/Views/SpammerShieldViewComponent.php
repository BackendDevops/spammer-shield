<?php

namespace Kvnc\SpammerShield\Views;

use Illuminate\View\Component;

class SpammerShieldViewComponent extends Component
{
    public function render()
    {
        $config = config('spammer-shield');

        return view('spammer-shield::form_inputs', $config);
    }
}
