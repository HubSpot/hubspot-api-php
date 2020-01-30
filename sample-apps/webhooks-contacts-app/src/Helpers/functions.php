<?php

/**
 * @param null $default
 *
 * @return null|mixed
 */
function getEnvParam(string $name, $default = null)
{
    if (!empty($_ENV[$name])) {
        return $_ENV[$name];
    }

    return $default;
}

/**
 * @return null|mixed
 */
function getEnvOrException(string $name)
{
    if (empty($_ENV[$name])) {
        throw new \Exception("Please specify {$name} in .env");
    }

    return $_ENV[$name];
}
