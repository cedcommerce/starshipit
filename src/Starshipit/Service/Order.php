<?php
    namespace Starshipit\Service;

    use Starshipit\Model\Authorization;
    use Starshipit\Model\Order as OrderModel;
    use Starshipit\Model\Search as SearchModel;
    use Starshipit\Model\OrderDetails;
    use Starshipit\Traits;
    use GuzzleHttp\ClientInterface;
    use GuzzleHttp\Exception\BadResponseException;
    use Starshipit\Model\ErrorResponse;
    use JMS\Serializer\SerializerInterface;
    use Starshipit\Exception\ApiException;
    use GuzzleHttp\Psr7;

    /**
     * Class Order
     */

    class Order
    {
        use Traits\AuthorizationTrait;
        use Traits\ClientTrait;
        use Traits\SerializerTrait;

        /**
         * Configuration constructor.
         *
         * @param ClientInterface     $client
         * @param Authorization       $authorization
         * @param SerializerInterface $serializer
         */

        public function __construct(ClientInterface $client, Authorization $authorization, SerializerInterface $serializer) {
            $this->setClient($client);
            $this->setAuthorization($authorization);
            $this->setSerializer($serializer);
        }

        /**
         * @param Model\OrderDetails|object
         * @return Model\Order|object
         */

        public function post(OrderModel $order)
        {
            try {
                $body = $this->getSerializer()->serialize($order, 'json');
                $result = $this->getClient()->post(
                    'orders',
                    [
                        'headers' => [
                            'Content-Type'              => 'application/json',
                            'StarShipIT-Api-Key'        => $this->getAuthorization()->getApiKey(),
                            'Ocp-Apim-Subscription-Key' => $this->getAuthorization()->getSubscriptionKey(),
                            'User-Agent'                => $this->getAuthorization()->getUserAgent(),
                        ],
                        'body' => $body,
                    ]
                );
            } catch (BadResponseException $exception) {
                throw new ApiException(
                    $this->getSerializer()->deserialize(
                        (string) Psr7\stream_for($exception->getResponse()->getBody())->getContents(),
                        ErrorResponse::class,
                        'json'
                    ),
                    $exception
                );
            }

            $data = json_decode($body, true);
            $typeId = $order->getTypeId();
            $type = $order->getType();

            /** @var OrderModel $order */
            $order = $this->getSerializer()->deserialize(
                (string) $result->getBody(),
                OrderModel::class,
                'json'
            );

            // Maintaining old data incase of failure
            $current = $order->getData();
            if (isset($data['order']) && !isset($current['order_id'])) {
                $order->setData($data['order']);
            }
            $order->setType($type);
            $order->setTypeId($typeId);

            return $order;
        }

        /**
         * @param string $id
         * @return Model\Order|object
         */

        public function get($id)
        {
            try {
                $result = $this->getClient()->get(
                    sprintf('orders?order_id=%s', $id),
                    [
                        'headers' => [
                            'Content-Type'              => 'application/json',
                            'StarShipIT-Api-Key'        => $this->getAuthorization()->getApiKey(),
                            'Ocp-Apim-Subscription-Key' => $this->getAuthorization()->getSubscriptionKey(),
                            'User-Agent'                => $this->getAuthorization()->getUserAgent(),
                        ],
                    ]
                );
            } catch (BadResponseException $exception) {
                throw new ApiException(
                    $this->getSerializer()->deserialize(
                        (string) Psr7\stream_for($exception->getResponse()->getBody())->getContents(),
                        ErrorResponse::class,
                        'json'
                    ),
                    $exception
                );
            }

            return $this->getSerializer()->deserialize(
                (string) $result->getBody(),
                OrderModel::class,
                'json'
            );
        }

        /**
         * @param string $id
         * @return Model\Order|object
         */

        public function search($phrase)
        {
            try {
                $result = $this->getClient()->get(
                    sprintf('orders/search?phrase=%s', $phrase),
                    [
                        'headers' => [
                            'Content-Type'              => 'application/json',
                            'StarShipIT-Api-Key'        => $this->getAuthorization()->getApiKey(),
                            'Ocp-Apim-Subscription-Key' => $this->getAuthorization()->getSubscriptionKey(),
                            'User-Agent'                => $this->getAuthorization()->getUserAgent(),
                        ],
                    ]
                );
            } catch (BadResponseException $exception) {
                throw new ApiException(
                    $this->getSerializer()->deserialize(
                        (string) Psr7\stream_for($exception->getResponse()->getBody())->getContents(),
                        ErrorResponse::class,
                        'json'
                    ),
                    $exception
                );
            }

            return $this->getSerializer()->deserialize(
                 (string) $result->getBody(),
                 SearchModel::class,
                 'json'
             );
        }
    }

