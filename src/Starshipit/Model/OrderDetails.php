<?php

namespace Starshipit\Model;

/**
 * Class OrderDetails
 * @package Starshipit\Model
 */
class OrderDetails
{

    /**
     * @var int
     */
    protected $order_id;

    /**
     * @var string
     */
    protected $order_date;

    /**
     * @var int
     */
    protected $order_number;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @var string
     */
    protected $carrier;

    /**
     * @var string
     */
    protected $carrier_name;

    /**
     * @var string
     */
    protected $carrier_service_code;

    /**
     * @var string
     */
    protected $shipping_method;

    /**
     * @var string
     */
    protected $signature_required;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var object
     */
    protected $sender_details;

    /**
     * @var object
     */
    protected $destination;

    /**
     * @var array
     */
    protected $items;

    /**
     * @var array
     */
    protected $packages;

    /**
     * @var array
     */
    protected $metadatas;

    /**
     * @var string
     */
    protected $tracking_number;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var bool
     */
    protected $return_order;

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
      * @param string $orderId
      * @return $this
      */
    public function setOrderId($orderId)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setOrderDate($date)
    {
        $this->order_date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * @param string $orderNumber
     * @return $this
     */
    public function setOrderNumber($orderNumber)
    {
        $this->order_number = $orderNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->order_number;
    }

    /**
     * @param string $Reference
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $Carrier
     * @return $this
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;

        return $this;
    }

    /**
     * @return string
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * @param string $carrier_name
     * @return $this
     */
    public function setCarrierName($carrier_name)
    {
        $this->carrier_name = $carrier_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCarrierName()
    {
        return $this->carrier_name;
    }

    /**
     * @param string $tracking_number
     * @return $this
     */
    public function setTrackingNumber($tracking_number)
    {
        $this->tracking_number = $tracking_number;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->tracking_number;
    }

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $CarrierServiceCode
     * @return $this
     */
    public function setCarrierServiceCode($carrier_service_code)
    {
        $this->carrier_service_code = $carrier_service_code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCarrierServiceCode()
    {
        return $this->carrier_service_code;
    }

    /**
     * @param string $ShippingMethod
     * @return $this
     */
    public function setShippingMethod($shipping_method)
    {
        $this->shipping_method = $shipping_method;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->shipping_method;
    }

    /**
     * @param boolean $required
     * @return $this
     */
    public function setSignatureRequired($required)
    {
        $this->signature_required = $required;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getSignatureRequired()
    {
        return $this->signature_required;
    }

    /**
     * @param boolean $flag
     * @return $this
     */
    public function setReturnOrder($flag)
    {
        $this->return_order = $flag;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getReturnOrder()
    {
        return $this->return_order;
    }

    /**
     * @param string $Currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $SenderDetails
     * @return $this
     */
    public function setSenderDetails($sender_details)
    {
        $this->sender_details = $sender_details;

        $this->sender_details = $sender_details;

        return $this;
    }

    /**
     * @return string
     */
    public function getSenderDetails()
    {
        return $this->sender_details;

        return $this->sender_details;
    }

    /**
     * @return Address
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param Address $destination
     * @return $this
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * @return Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     * @return $this
     */
    public function setItems(array $items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return string
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * @param string $Packages
     * @return $this
     */
    public function setPackages(array $packages)
    {
        $this->packages = $packages;

        return $this;
    }

    /**
     * @return string
     */
    public function getMetadatas()
    {
        return $this->metadatas;
    }

    /**
     * @param string $Metadatas
     * @return $this
     */
    public function setMetadatas($metadatas)
    {
        $this->metadatas = $metadatas;

        return $this;
    }
}

