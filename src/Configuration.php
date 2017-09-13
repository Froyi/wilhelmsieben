<?php

namespace Project;

class Configuration
{
    const CONFIG_PATH = ROOT_PATH . '/config.php';

    /** @var array $configuration */
    protected $configuration;

    public function __construct()
    {
        /** @noinspection PhpIncludeInspection */
        $this->configuration = include self::CONFIG_PATH;
    }

    /**
     * @return array
     */
    public function getConfiguration(): array
    {
        return $this->configuration;
    }

    public function getEntryByName(string $name)
    {
        if (!isset($this->configuration[$name])) {
            throw new \InvalidArgumentException('there has to be a valid config key');
        }

        return $this->configuration[$name];
    }
}