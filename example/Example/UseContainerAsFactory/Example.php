<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-09 
 */

namespace Example\UseContainerAsFactory;

use Net\Bazzline\Component\DependencyInjection\Container;

include __DIR__ . '/../../../vendor/autoload.php';

Example::create()
    ->setup()
    ->andRun();

/**
 * Class Example
 *
 * @package Example\UseContainerAsFactory
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-09
 */
class Example
{
    /**
     * @var \Net\Bazzline\Component\DependencyInjection\ContainerInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    protected $container;

    /**
     * @return Example
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public static function create()
    {
        $self = new self();

        return $self;
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function setup()
    {
        $this->container = new Container();
        $this->container->addConsumer('\\Example\\UseContainerAsFactory\\BasicClass');

        return $this;
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function andRun()
    {
        $className = '\\Example\UsecontainerAsFactory\\BasicClass';
        $objectOne = $this->container->getConsumer($className);
        $objectTwo = $this->container->getConsumer($className);

        echo 'Conainter has consumer "' . $className . '"?: ' . ($this->container->hasConsumer($className) ? 'yes' : 'no') . PHP_EOL;
        echo 'Vardump of first created object by the container.' . PHP_EOL;
        echo var_export($objectOne, true);
        echo 'Adding property to second reference of same instance.'. PHP_EOL;
        $objectTwo->setMyProperty('thats my property');
        echo 'Calling getMyProperty on first object: "' . $objectOne->getMyProperty . '"' . PHP_EOL;
        echo 'Calling getMyProperty on second object: "' . $objectTwo->getMyProperty . '"' . PHP_EOL;
        echo 'Vardump of second created object by the container.' . PHP_EOL;
        echo var_export($objectTwo, true);
    }
}