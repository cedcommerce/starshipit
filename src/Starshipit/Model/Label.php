<?php

namespace Starshipit\Model;

use Starshipit\Model;
/**
 * Class Label
 *
 * @package Starshipit\Model
 */
class Label
{
    /**
     * @var string
     */
    protected $success;

    /**
     * @var array
     */
    protected $errors;

    /**
     * @var int
     */
    protected $order_id;

    /**
     * @var string
     */
    protected $carrier_name;

    /**
     * @var int
     */
    protected $order_number;

    /**
     * @var array
     */
    protected $tracking_numbers;

    /**
     * @var array
     */
    protected $labels;

    /**
     * @var array
     */
    protected $label_types;

    /**
     * @param string $success
     * @return $this
     */
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }

    /**
     * @return string
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @param string $errors
     * @return $this
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;

        return $this;
    }

    /**
     * @return \Starshipit\Model\Error[]
     */
    public function getErrors()
    {
        return $this->errors;
    }

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
     * @param string $name
     * @return $this
     */
    public function setCarrierName($name)
    {
        $this->carrier_name = $name;

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
     * @param array $numbers
     * @return $this
     */
    public function setTrackingNumbers($numbers)
    {
        $this->tracking_numbers = $numbers;

        return $this;
    }

    /**
     * @return array
     */
    public function getTrackingNumbers()
    {
        return $this->tracking_numbers;
    }

    /**
     * @param array $labels
     * @return $this
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param array $types
     * @return $this
     */
    public function setLabelTypes($types)
    {
        $this->label_types = $types;

        return $this;
    }

    /**
     * @return array
     */
    public function getLabelTypes()
    {
        return $this->label_types;
    }
}

