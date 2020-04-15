<?php
/**
 * @return null|mixed
 */
function getValueOrNull(string $name, array $array)
{
    if (array_key_exists($name, $array)) {
        return $array[$name];
    }

    return null;
}

/**
 * @param null $name
 *
 * @return null|mixed
 */
function getEnvOrException(string $name)
{
    if (empty($_ENV[$name])) {
        throw new \Exception("Please specify {$name} in .env");
    }

    return $_ENV[$name];
}
