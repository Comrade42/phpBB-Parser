<?php

namespace Comrade42\PhpBBParser;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Finder\Finder;

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

        $this->container->compile();

        parent::__construct($name, $version);
    }

    /**
     * @return ContainerBuilder
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @return string
     */
    public function getRootPath()
    {
        return $this->container->getParameter('root_path');
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultCommands()
    {
        $commands = parent::getDefaultCommands();

        $finder = new Finder();
        $finder->files()->name('*Command.php')->in($this->getRootPath() . '/src');

        foreach ($finder as $file)
        {
            /** @var \Symfony\Component\Finder\SplFileInfo $file */
            $namespace = strtr($file->getRelativePath(), '/', '\\');
            $class = new \ReflectionClass($namespace . '\\' . $file->getBasename('.php'));

            if ($class->isSubclassOf('Comrade42\\PhpBBParser\\Command\\ContainerAwareCommand') && !$class->isAbstract())
            {
                $commands[] = $class->newInstance($this->container);
            }
        }

        return $commands;
    }
}
