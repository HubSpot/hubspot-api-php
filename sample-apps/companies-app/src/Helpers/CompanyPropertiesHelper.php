<?php

namespace Helpers;

class CompanyPropertiesHelper
{
    public static function isEditable($property): bool
    {
        if ($property->readOnlyValue || $property->calculated) {
            return false;
        }

        return true;
    }
}
