<?php

namespace ElevenLabs\V1\SDK\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use ElevenLabs\V1\SDK\Runtime\Normalizer\CheckArray;
use ElevenLabs\V1\SDK\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class GetVoicesResponseModelNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'ElevenLabs\\V1\\SDK\\Model\\GetVoicesResponseModel';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'ElevenLabs\\V1\\SDK\\Model\\GetVoicesResponseModel';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \ElevenLabs\V1\SDK\Model\GetVoicesResponseModel();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('voices', $data)) {
            $values = array();
            foreach ($data['voices'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'ElevenLabs\\V1\\SDK\\Model\\VoiceResponseModel', 'json', $context);
            }
            $object->setVoices($values);
            unset($data['voices']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $values = array();
        foreach ($object->getVoices() as $value) {
            $values[] = $this->normalizer->normalize($value, 'json', $context);
        }
        $data['voices'] = $values;
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
}