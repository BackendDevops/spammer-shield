<?php

namespace Kvnc\SpammerShield\Views;

use Illuminate\View\View;
use Kvnc\SpammerShield\Shield;

class SpammerShieldViewComposer
{
    public function __construct(protected Shield $shield)
    {
    }

    public function compose(View $view)
    {
        $config = $this->shield->getConfig();

        $view->with('is_enabled', $config->is_enabled)
        ->with('is_google_enabled', $config->is_google_enabled)
        ->with('is_random_question_enabled', $config->is_random_question_enabled)
        ->with('is_timeout_filter_enabled', $config->is_timeout_filter_enabled)
        ->with('google_recaptcha_site_key', $config->google_recaptcha_site_key)
        ->with('google_recaptcha_secret_key', $config->google_recaptcha_secret_key)
        ->with('input_name', $config->input_name)
        ->with('input_class', $config->input_class)
        ->with('form_submission_time', $config->form_submission_time);
    }
}
