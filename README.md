# Official BongaTech PHP Api SDK

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This PHP SDK provides convenient methods for consuming BongaTech API.

## Documentation

BongaTech API Documentation can be found at https://bulk.bongatech.co.ke/docs


## Install

Via Composer

``` bash
$ composer require bongatech/Api
```

## Usage

### Sending a Message

``` php
<?php
require_once '../vendor/autoload.php';

use BongaTech\Api\BongaTech;
use BongaTech\Api\Models\Sms;

$instance = new BongaTech("TOKEN_string");

//create an Sms Object
$sms= new Sms("BONGATECH", "0716079675", "Test Message 1", "101");

//send Sms object
$response = $instance->sendSMS($sms);

var_dump($response);

```

### Sending Messages in batches

``` php
<?php
require_once '../vendor/autoload.php';

use BongaTech\Api\BongaTech;
use BongaTech\Api\Models\Sms;

$instance = new BongaTech("TOKEN_string");

//create multiple Sms Object(s)
$sms1= new Sms("BONGATECH", "0716079675", "Test Message 1", "101");
$sms2 = new Sms("BizTxt", "0716079675", "Test Message 2", "102");

//send Sms object
$response = $instance->sendBatchSMS($sms1, $sms2);

var_dump($response);


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email makamuevans@gmail.com instead of using the issue tracker.

## Credits

- [Makamu Evans][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/BongaTech/Api.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/BongaTech/Api.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/bongatech/api
[link-downloads]: https://packagist.org/packages/bongatech/api
[link-author]: https://github.com/MakamuEvans
[link-contributors]: ../../contributors
