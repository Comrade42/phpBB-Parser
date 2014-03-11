<?php

namespace Comrade42\PhpBBParser\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ContainerAwareCommand
 * @package Comrade42\PhpBBParser\Command
 */
abstract class ContainerAwareCommand extends Command implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container
     * @param string|null $name
     */
    public function __construct(ContainerInterface $container, $name = null)
    {
        parent::__construct($name);

        $this->setContainer($container);
    }

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
