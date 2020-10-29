# REST API SDK for PHP

![](https://img.shields.io/github/v/tag/ge-tracker/PayPal-PHP-SDK?label=version&sort=semver&style=flat-square) [![](https://img.shields.io/github/workflow/status/ge-tracker/PayPal-PHP-SDK/Integration/master?style=flat-square)](https://github.com/ge-tracker/PayPal-PHP-SDK/actions?query=branch%3Amaster)

**This is a refactored version of PayPal's deprecated PHP SDK. I have integrated some of the new Subscription API endpoints, as detailed in the table below.**

| API                                                          | Class                          |
| ------------------------------------------------------------ | ------------------------------ |
| [Plans](https://developer.paypal.com/docs/api/subscriptions/v1/#plans) | `\PayPal\Api\SubscriptionPlan` |
| [Subscriptions](https://developer.paypal.com/docs/api/subscriptions/v1/#subscriptions) | `\PayPal\Api\Subscription`     |
| [Catalog Product](https://developer.paypal.com/docs/api/catalog-products/v1/) | `\PayPal\Api\CatalogProduct`   |

## Installation

This package is not intended to be widely distributed, and as such, I am not submitting it to packagist. 

To install this package, first add the GitHub repository to your `composer.json`:

```json
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/ge-tracker/PayPal-PHP-SDK.git"
    }
]
```

Next, require the package with Composer:

```bash
composer require paypal/rest-api-sdk-php
```

---

## __Welcome to PayPal PHP SDK__. This repository contains PayPal's PHP SDK and samples for REST API.

## SDK Documentation

[Our PayPal-PHP-SDK Page](http://paypal.github.io/PayPal-PHP-SDK/) includes all the documentation related to PHP SDK. Everything from SDK Wiki, to Sample Codes, to Releases. Here are few quick links to get you there faster.

* [PayPal-PHP-SDK Home Page](https://paypal.github.io/PayPal-PHP-SDK/)
* [Wiki](https://github.com/paypal/PayPal-PHP-SDK/wiki)
* [Samples](https://paypal.github.io/PayPal-PHP-SDK/sample/)
* [Installation](https://github.com/paypal/PayPal-PHP-SDK/wiki/Installation)
* [Make your First SDK Call](https://github.com/paypal/PayPal-PHP-SDK/wiki/Making-First-Call)
* [PayPal Developer Docs](https://developer.paypal.com/docs/)

## Prerequisites

   - PHP 5.3 or above
   - [curl](https://secure.php.net/manual/en/book.curl.php), [json](https://secure.php.net/manual/en/book.json.php) & [openssl](https://secure.php.net/manual/en/book.openssl.php) extensions must be enabled


## License

Read [License](LICENSE) for more licensing information.

## Contributing

Read [here](CONTRIBUTING.md) for more information.

## More help
   * [Going Live](https://github.com/paypal/PayPal-PHP-SDK/wiki/Going-Live)
   * [PayPal-PHP-SDK Home Page](http://paypal.github.io/PayPal-PHP-SDK/)
   * [SDK Documentation](https://github.com/paypal/PayPal-PHP-SDK/wiki)
   * [Sample Source Code](http://paypal.github.io/PayPal-PHP-SDK/sample/)
   * [API Reference](https://developer.paypal.com/docs/api/)
   * [Reporting Issues / Feature Requests](https://github.com/paypal/PayPal-PHP-SDK/issues)
