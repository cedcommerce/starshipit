<?php

namespace Starshipit;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\AnnotationReader;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Starshipit\Model\Authorization;
use JMS\Serializer\SerializerInterface;
use Starshipit\Service\Order as OrderService;
use Starshipit\Service\Label as LabelService;
use Starshipit\Service\Tracking as TrackingService;

/**
 * Class Api
 * @package Starshipit\Api
 */
class Api
{
    /**
     * Attempt to access the ping endpoint and will return true on success.
     * @return bool
     */
    public static function ping($endpoint, ClientInterface $client = null)
    {
        AnnotationReader::addGlobalIgnoredName('alias');
        AnnotationRegistry::registerLoader('class_exists');

        $starshipitClient = $client ?: new Client(['base_uri' => $endpoint]);

        return new Ping($starshipitClient);
    }

    /**
     * Attempt to create an Order endpoint returns Order on success
     * @return object
     */
    public static function order(Authorization $authorization, Client $client = null, SerializerInterface $serializer = null)
    {
        AnnotationReader::addGlobalIgnoredName('alias');
        AnnotationRegistry::registerLoader('class_exists');

        $starshipitClient = $client ?: new Client(['base_uri' => $authorization->getEndpoint()]);
        $starshipitSerializer = $serializer ?: SerializerFactory::getSerializer();

        return new OrderService($starshipitClient, $authorization, $starshipitSerializer);
    }

    /**
     * Attempt to create an Label endpoint returns Order on success
     * @return object
     */
    public static function label(Authorization $authorization, Client $client = null, SerializerInterface $serializer = null)
    {
        AnnotationReader::addGlobalIgnoredName('alias');
        AnnotationRegistry::registerLoader('class_exists');

        $starshipitClient = $client ?: new Client(['base_uri' => $authorization->getEndpoint()]);
        $starshipitSerializer = $serializer ?: SerializerFactory::getSerializer();

        return new LabelService($starshipitClient, $authorization, $starshipitSerializer);
    }

    /**
     * Attempt to create an Label endpoint returns Order on success
     * @return object
     */
    public static function tracking(Authorization $authorization, Client $client = null, SerializerInterface $serializer = null)
    {
        AnnotationReader::addGlobalIgnoredName('alias');
        AnnotationRegistry::registerLoader('class_exists');

        $starshipitClient = $client ?: new Client(['base_uri' => $authorization->getEndpoint()]);
        $starshipitSerializer = $serializer ?: SerializerFactory::getSerializer();

        return new TrackingService($starshipitClient, $authorization, $starshipitSerializer);
    }

}

