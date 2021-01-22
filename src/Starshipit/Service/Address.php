<?php
namespace Starshipit\Service;

use Starshipit\Model\Authorization;
use Starshipit\Model\Address as AddressModel;
use Starshipit\Traits;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use Starshipit\Model\ErrorResponse;
use JMS\Serializer\SerializerInterface;
use Starshipit\Exception\ApiException;
use GuzzleHttp\Psr7;

/**
 * Class Address
 * @package Starshipit\Service
 */

class Address
{
    use Traits\AuthorizationTrait;
    use Traits\ClientTrait;
    use Traits\SerializerTrait;

    const STARSHIPIT_API_BASE_URL = 'https://api.starshipit.com/api/';

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
     * @param AddressModel $address
     * @return mixed
     */
    public function validate_address(AddressModel $address)
    {
        try {
            $params = '';
            $addressData = [];
            if ($street = $address->getStreet()) {
                $street = urlencode($street);
                $addressData[] = 'street='.$street;
            }
            if ($suburb = $address->getSuburb()) {
                $suburb = urlencode($suburb);
                $addressData[] = 'suburb='.$suburb;
            }
            if ($city = $address->getCity()) {
                $city = urlencode($city);
                $addressData[] = 'city='.$city;
            }
            if ($state = $address->getState()) {
                $state = urlencode($state);
                $addressData[] = 'state='.$state;
            }
            if ($post_code = $address->getPostcode()) {
                $post_code = urlencode($post_code);
                $addressData[] = 'post_code='.$post_code;
            }
            if ($country = $address->getCountry()) {
                $addressData[] = 'country='.$country;
            }
            if (count($addressData)) {
                $params = implode('&', $addressData);
            }
            $headers = [
                'Content-Type: application/json',
                'StarShipIT-Api-Key: ' . $this->getAuthorization()->getApiKey(),
                'Ocp-Apim-Subscription-Key: '. $this->getAuthorization()->getSubscriptionKey()
            ];
            $url = self::STARSHIPIT_API_BASE_URL . sprintf('address/validate?%s', $params);
            $ch = @curl_init();
            @curl_setopt($ch, CURLOPT_POST, false);
            @curl_setopt($ch, CURLOPT_URL, $url);
            @curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            @curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
            $response = @curl_exec($ch);
            $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curl_errors = curl_error($ch);
            @curl_close($ch);
            return ['status_code' => $status_code, 'response' => $response, 'errors' => $curl_errors];
        } catch (BadResponseException $exception) {
            return ['status_code' => 400, 'response' => $exception->getMessage(), 'errors' => $curl_errors];
        }
        return false;
    }
}
