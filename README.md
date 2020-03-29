# PHP SDK for uSendIt SMS Gateway

This is an unofficial PHP sdk for uSendIt SMS gateway platform.
For more information about request and response parameters, please refer to official documentation  [here](https://usendit.co.mz/apiusendit).

## Installation

Before you begin to use this SDK make sure that, you have already have an account at [uSendIt](https://usendit.co.mz).
If not please [create one](https://usendit.co.mz/criarconta).

#### Install Using Composer

The easiest way to install is using Composer.

```
composer require codeonweekends/usendit-php-sdk
```

#### Download ZIP file or Clone

Optionally you can download the repository directly to your project folder. Just click [here](https://github.com/codeonweekends/usendit-php-sdk/archive/master.zip).

Or clone the repository to your project folder.

```
git clone https://github.com/codeonweekends/usendit-php-sdk.git
```

## How to Schedule SMS'S
There are two available methods to send SMS.

```
sendMessage()
```
The ```sendMessage()``` methods is used when you need to schedule a single SMS.

### Schedule single SMS

```php
// Create a new SMS object
$sms = new SMS(MSISDN, MOBILE_OPERATOR, MESSAGE);

//Instantiate USendIt object and set the username and password of your uSendIt account.
$uSendIt = new USendIt();
$uSendIt->setUsername('username');
$uSendIt->setPassword('password');

// Send the SMS
$response = $uSendIt->sendMessage($sms);
```

The ```sendMessage``` method returns a ```ScheduleResult``` object.