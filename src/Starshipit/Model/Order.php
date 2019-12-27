<?php

namespace Starshipit\Model;

use Starshipit\Model;
/**
 * Class Order
 *
 * @package Starshipit\Model
 */
class Order
{
    /**
     * @var string
     */
    protected $success;

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @var OrderDetails
     */
    protected $order;

    /**
     * @var string
     */
    protected $data;

    /**
     * @var int
     */
    protected $typeId;

    /**
     * @var string
     */
    protected $type;

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
     * @param array $errors
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
     * @param OrderDetails $order
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return OrderDetails
     */
    public function getOrder()
    {
        return $this->order;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    }

    public function getTypeId()
    {
        return $this->typeId;
    }
}

