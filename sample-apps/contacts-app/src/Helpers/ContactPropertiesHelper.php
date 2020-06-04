<?php

namespace Helpers;

use HubSpot\Crm\ObjectType;

class ContactPropertiesHelper
{
    public static $properties;

    public static function isEditable($property): bool
    {
        if ($property->readOnlyValue || $property->calculated) {
            return false;
        }

        return true;
    }

    public static function getProperties()
    {
        if (is_null(static::$properties)) {
            static::$properties = HubspotClientHelper::createFactory()
                ->crm()->properties()->coreApi()
                ->getAll(ObjectType::CONTACTS)->getResults();
        }

        return static::$properties;
    }

    public static function getDisplayProperties(array $properties = []): array
    {
        foreach (static::getProperties() as $property) {
            if ('string' === $property->getType()
                    && false === $property->getModificationMetadata()->getReadOnlyValue()) {
                $properties[] = $property->getName();
            }
        }

        return $properties;
    }

    public static function getPropertiesLabels(array $labels = []): array
    {
        foreach (static::getProperties() as $property) {
            if ('string' === $property->getType()
                    && false === $property->getModificationMetadata()->getReadOnlyValue()) {
                $labels[$property->getName()] = $property->getLabel();
            }
        }

        return $labels;
    }
}
