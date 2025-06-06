# Laravel PayPay

Simple integration Laravel and PayPay OpenPayment API.

https://developer.paypay.ne.jp/

https://github.com/paypay/paypayopa-sdk-php

## Overview

This package provides a Laravel-style interface for the PayPay OpenPayment API SDK, making it easy to integrate PayPay payment processing into your Laravel applications. The package wraps the official PayPay PHP SDK with familiar Laravel patterns including facades, service providers, and dependency injection.

Key features:
- **Laravel-style interface**: Access PayPay controllers through a clean facade pattern
- **Easy testing**: Built-in support for mocking PayPay API calls in your tests
- **Configuration management**: Environment-based configuration following Laravel conventions
- **Service container integration**: Proper dependency injection and service binding

The package allows you to work with PayPay's payment, refund, QR code, user, and wallet operations using Laravel's familiar syntax while maintaining full access to the underlying PayPay SDK functionality.

## Requirements
- PHP >= 8.2
- Laravel >= 11.0

## Installation

```
composer require revolution/laravel-paypay
```

## Configuration

.env
```
PAYPAY_PRODUCTION=false
PAYPAY_API_KEY=
PAYPAY_API_SECRET=
PAYPAY_MERCHANT_ID=
PAYPAY_CURRENCY=JPY
```

## Usage
Magic method returns the corresponding controller class.

```php
use Revolution\PayPay\Facades\PayPay;

/* @var PayPay\OpenPaymentAPI\Controller\Code $code */
$code = PayPay::code();

/* @var PayPay\OpenPaymentAPI\Controller\Payment $payment */
$payment = PayPay::payment();

/* @var PayPay\OpenPaymentAPI\Controller\Refund $refund */
$refund = PayPay::refund();
```

```php
use Revolution\PayPay\Facades\PayPay;
use PayPay\OpenPaymentAPI\Models\CreateQrCodePayload;

$payload = new CreateQrCodePayload();
// ...

$response = PayPay::code()->createQRCode($payload);

// ...
```

### Testing
```php
use Revolution\PayPay\Facades\PayPay;

PayPay::expects('code->createQRCode')->once()->andReturn([]);
```

## LICENSE
MIT
