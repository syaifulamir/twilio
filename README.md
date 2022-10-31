# Introduction
This is a vel package for sending SMS with Twilio

### Step One - Installation

Require the package via composer into your project

```shell
composer require syaifulamir/twilio
```

### Step Two - Publishing Configurations
To publish the config file, run:

`php artisan vendor:publish --tag=twilio-config`

This is the content of the config file that will be published at `config/twilio.php`

```php
<?php
    return [
    'account_sid' => env('TWILIO_ACCOUNT_SID'),
    'auth_token' => env('TWILIO_AUTH_TOKEN'),
    'sms_from' => env('TWILIO_SMS_FROM'),
   ];
```
Next, edit your `.env` file with your Twilio Credentials

```bash
TWILIO_ACCOUNT_SID=xxxx
TWILIO_AUTH_TOKEN=xxxx
TWILIO_SMS_FROM=xxxx
```


### Usage
To send a SMS message, you can use the `notify()` method available on the `Twilio` Facade

```php
<?php

use TwilioPackage\Twilio\Facades\Twilio;

$sendSms = Twilio::notify('+2341234567892', 'Hello')

return $sendSms;
```
