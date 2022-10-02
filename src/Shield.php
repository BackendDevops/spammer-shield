<?php

namespace Kvnc\SpammerShield;

use Illuminate\Http\Request;
use Kvnc\SpammerShield\Exceptions\SpamShieldException;
use Throwable;

class Shield
{
    public function __construct(protected object $config)
    {
        $this->config = $this->getConfig();
    }

    public function getConfig(): object
    {
        return (object) config('spammer-shield');
    }

    protected function calculateFormTime(Request $request)
    {
    }

    protected function googleCheck(Request $request)
    {
    }

    /**
     * @throws Throwable
     */
    protected function checkHoneypotInput(Request $request): bool
    {
        if (! $request->has($this->config->input_name)) {
            return true;
        }
        throw_if(! empty($request->input($this->config->input_name)), SpamShieldException::class);

        return true;
    }

    protected function checkRandomQuestion(Request $request)
    {
    }

    /**
     * @throws Throwable
     */
    public function checkRules(Request $request)
    {
        if (! $this->config->is_enabled) {
            return;
        }
        $this->checkHoneypotInput($request);
        $this->checkRandomQuestion($request);
        $this->calculateFormTime($request);
        $this->googleCheck($request);
    }
}
