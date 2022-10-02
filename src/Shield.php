<?php

namespace Kvnc\SpammerShield;

use Illuminate\Http\Request;
use Kvnc\SpammerShield\Exceptions\SpamShieldException;
use ReCaptcha\ReCaptcha;
use Throwable;

class Shield
{
    protected object $config;

    public function __construct()
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

    /**
     * @throws Throwable
     */
    protected function googleCheck(Request $request)
    {
        $ip = $request->getClientIp();
        $captcha = $request->input('g-recaptcha-response');
        $recaptcha = new ReCaptcha($this->config->google_recaptcha_secret_key);
        $resp = $recaptcha->setExpectedHostname($request->getHost())
            ->verify($captcha, $ip);
        throw_if(!$resp->isSuccess(),SpamShieldException::class);

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
