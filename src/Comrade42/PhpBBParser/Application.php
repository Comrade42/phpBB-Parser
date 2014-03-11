<?php

namespace Comrade42\PhpBBParser;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class Application
 * @package Comrade42\PhpBBParser
 */
class Application extends BaseApplication
{
    /**
     * @var ContainerBuilder
     */
    protected $container;

    /**
     * @param string $rootPath
     * @param string $name The name of the application
     * @param string $version The version of the application
     * @throws \InvalidArgumentException
     */
    public function __construct($rootPath, $name = 'UNKNOWN', $version = 'UNKNOWN')
    {
        if (!is_dir($rootPath)) {
            throw new \InvalidArgumentException("Wrong root path '{$rootPath}' specified!");
        }

        $this->container = new ContainerBuilder();
        $this->container->setParameter('root_path', realpath($rootPath));

        $loader = new YamlFileLoader($this->container, new FileLocator(array($rootPath . '/app/config')));
        $loader->load('config.yml');

        parent::__construct($name, $version);
    }
}
