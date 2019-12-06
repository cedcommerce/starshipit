[Starshipit API](https://developers.starshipit.com/)
=======================

PHP library to interface with the [Starshipit API](https://developers.starshipit.com/)

## Installation

The recommended way to install is via [Composer](http://getcomposer.org).


```bash
composer require cedcommerce/starshipit dev-master
```

Don't forget to include Composer's auto-loader if you haven't already:

```php
require 'vendor/autoload.php';
```

## Usage
```php
        /** @var \Starshipit\Model\Authorization $auth */
        $auth = new \Starshipit\Model\Authorization(
                "https://api.starshipit.com/api/",
                "starshipit-api-key", // to be changed
                'subscription-Key', // to be changed
                "your-user-agent" // to be changed
        );

        /** @var \Starshipit\Service\Order $order */
        $order = \Starshipit\Api::order($auth);
        /** @var \Starshipit\Model|Search $result */
        $result = $order->search("xyz");
        /** @var \Starshipit\Model\Order $item */
        if ($result->getSuccess()) {
            echo "Success";
        }
```



## API
[API Documentation](https://developers.starshipit.com/docs/services/58e5bb041164fe12c0b94ff1/operations/create-order)

## Supported Methods

* [POST] Create Label
* [POST] Create Order
* [GET] Get Order
* [GET] Search Orders
* [GET] Tracking Details

## Methods Not Supported at this Stage

* [GET] Address Validation
* [POST] Create Orders
* [POST] Delete Orders
* [POST] Delivery Services
* [GET] Shipping Rates
* [GET] Unshipped Orders
* [PUT] Update Order
* [GET] Users Address Book

## Special Thanks

[JMS Serializer](https://github.com/schmittjoh/serializer)

[Guzzle](https://github.com/guzzle/guzzle)

[James-Azzopardi/starshipit](https://github.com/james-azzopardi/starshipit)