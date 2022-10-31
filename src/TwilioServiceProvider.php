<?php

namespace TwilioPackage\Twilio;

use Exception;
use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client;

class TwilioServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/twilio.php', 'twilio');

        $this->app->bind('twilio', function () {
            $this->ensureConfigValuesAreSet();
            $client = new Client(config('twilio.account_sid'), config('twilio.auth_token'));

            return new Twilio($client);
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfig();
        }
    }

    protected function ensureConfigValuesAreSet()
    {
        $mandatoryAttributes = config('twilio');

        foreach ($mandatoryAttributes as $key => $value) {
            if (empty($value)) {
                throw new Exception("Please provide a value for ${key}");
            }
        }
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../config/twilio.php' => config_path('twilio.php'),
        ], 'twilio-config');
    }
}
