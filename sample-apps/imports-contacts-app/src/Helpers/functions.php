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

function shortenString(string $string, int $length = 25): string
{
    if (strlen($string) > $length) {
        return substr($string, 0, $length - 3).'...';
    }

    return $string;
}
