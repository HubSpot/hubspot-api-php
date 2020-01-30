<?php

namespace Helpers;

use Kafka\Consumer;
use Kafka\ConsumerConfig;
use Kafka\Producer;
use Kafka\ProducerConfig;

class KafkaHelper
{
    protected static $producer = null;
    protected static $consumer = null;

    public static function getProducer()
    {
        if (!static::$producer) {
            $config = ProducerConfig::getInstance();
            $config->setMetadataRefreshIntervalMs($_ENV['KAFKA_REFRESH_INTERVAL_MS']);
            $config->setMetadataBrokerList($_ENV['KAFKA_BROKER_LIST']);
            $config->setBrokerVersion($_ENV['KAFKA_BROKER_VERSION']);
            $config->setRequiredAck(1);
            $config->setIsAsyn(false);
            $config->setProduceInterval($_ENV['KAFKA_PRODUCE_INTERVAL']);
            static::$producer = new Producer();
        }

        return static::$producer;
    }

    public static function getConsumer(array $topics)
    {
        $config = ConsumerConfig::getInstance();
        $config->setTopics($topics);
        if (!static::$consumer) {
            $config->setMetadataRefreshIntervalMs($_ENV['KAFKA_REFRESH_INTERVAL_MS']);
            $config->setMetadataBrokerList($_ENV['KAFKA_BROKER_LIST']);
            $config->setBrokerVersion($_ENV['KAFKA_BROKER_VERSION']);
            $config->setGroupId($_ENV['KAFKA_GROUP_ID']);
            static::$consumer = new Consumer();
        }

        return static::$consumer;
    }
}
