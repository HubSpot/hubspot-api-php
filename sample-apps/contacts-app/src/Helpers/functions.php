<?php

/**
 * @return mixed
 */
function getEnvOrException(string $name)
{
    if (empty($_ENV[$name])) {
        throw new \Exception("Please specify {$name} in .env");
    }

    return $_ENV[$name];
}

/**
 * @param mixed $length
 *
 * @return string
 */
function getShortString(string $string, $length = 25)
{
    if (strlen($string) > $length) {
        return substr($string, 0, $length - 3).'...';
    }

    return $string;
}
