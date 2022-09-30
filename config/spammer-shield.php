<?php

return [
    'input_name' => env('SPAMMER_SHIELD_INPUT_NAME', 'specific_values'),
    'input_class' => env('SPAMMER_SHIELD_INPUT_CLASS', 'shield-pot'), //Don't change the class unless you did not add the class in your css
    'form_submission_time' => env('SPAMMER_SHIELD_FORM_TIME', 4), // the time bots can fill up your form in seconds, don't extends this too much
    'is_enabled' => env('SPAMMER_SHIELD_IS_ENABLED', true),
    'is_google_enabled' => env('SPAMMER_SHIELD_IS_ENABLED_CAPTCHA', false),
    'is_random_question_enabled' => env('SPAMMER_SHIELD_IS_ENABLED_RANDOM_QUESTION', true),
    'is_timeout_filter_enabled' => env('SPAMMER_SHIELD_IS_TIMEOUT_FILTER_ENABLED', false),
    'google_recaptcha_site_key' => env('SPAMMER_SHIELD_GOOGLE_SITE_KEY', ''),
    'google_recaptcha_secret_key' => env('SPAMMER_SHIELD_GOOGLE_SECRET_KEY', ''),

];
