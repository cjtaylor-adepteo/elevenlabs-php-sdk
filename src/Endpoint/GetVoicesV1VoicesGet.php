<?php

namespace ElevenLabs\V1\SDK\Endpoint;

class GetVoicesV1VoicesGet extends \ElevenLabs\V1\SDK\Runtime\Client\BaseEndpoint implements \ElevenLabs\V1\SDK\Runtime\Client\Endpoint
{
    /**
     * Gets a list of all available voices for a user.
     *
     * @param array $headerParameters {
     *     @var string $xi-api-key Your API key. This is required by most endpoints to access our API programatically. You can view your xi-api-key using the 'Profile' tab on the website.
     * }
     */
    public function __construct(array $headerParameters = array())
    {
        $this->headerParameters = $headerParameters;
    }
    use \ElevenLabs\V1\SDK\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/v1/voices';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getHeadersOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(array('xi-api-key'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('xi-api-key', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \ElevenLabs\V1\SDK\Exception\GetVoicesV1VoicesGetUnprocessableEntityException
     *
     * @return null|\ElevenLabs\V1\SDK\Model\GetVoicesResponseModel
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'ElevenLabs\\V1\\SDK\\Model\\GetVoicesResponseModel', 'json');
        }
        if (is_null($contentType) === false && (422 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \ElevenLabs\V1\SDK\Exception\GetVoicesV1VoicesGetUnprocessableEntityException($serializer->deserialize($body, 'ElevenLabs\\V1\\SDK\\Model\\HTTPValidationError', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}