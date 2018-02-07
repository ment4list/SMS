# SMS

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A simple abstract SMS wrapper with support for templates.

## Structure


```
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require mentalist/sms
```

## Usage

``` php
// Create a recipient
$recipient = '555-555-5555';

// Use default Provider
$SMS = new \Mentalist\SMS\SMS();

// Add a recipient
$SMS->addRecipient($recipient);
// Set the message
$SMS->setMessage('Hello, League!');
// Send it!
$SMS->send();

// Use Nexmo Provider
$provider = new \Mentalist\SMS\Provider\NexmoProvider('NEXMO_API_KEY', 'NEXMO_API_SECRET');
$SMS = new \Mentalist\SMS\SMS($provider);

// Add multiple recipients
$SMS->addRecipients([$recipient, '555-000-5555']);
// Set the message
$SMS->setMessage('Sent using Nexmo!');
// Send it!
$SMS->send();

// Clear recipients
$recipients = $SMS->clearRecipients();

// Get credits
$credits = $SMS->getCredits();
// or
$credits = $provider->getCredits();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email tooone777@gmail.com instead of using the issue tracker.

## Credits

- [Jurgens Banninga][link-author]
- [All Contributors][link-contributors]

Special thanks to [The League of Extraordinary Packages][link-inspiration] for the inspiration and excellent starting point.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mentalist/sms.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/mentalist/sms/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/mentalist/sms.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/mentalist/sms.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mentalist/sms.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/mentalist/sms
[link-travis]: https://travis-ci.org/mentalist/sms
[link-scrutinizer]: https://scrutinizer-ci.com/g/mentalist/sms/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/mentalist/sms
[link-downloads]: https://packagist.org/packages/mentalist/sms
[link-author]: https://github.com/ment4list
[link-inspiration]: https://thephpleague.com/
[link-contributors]: ../../contributors
