<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-09 
 */

namespace Example\AddClassAndCallIt;

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
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    protected $className;

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
        $this->className = '\\Example\\AddClassAndCallIt\\Basic';
        $this->container = new Container();
        $this->container->register($this->className);

        return $this;
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function andRun()
    {
        $objectOne = $this->container->getConsumer($this->className);
        $objectTwo = $this->container->getConsumer($this->className);
        /**
         * @var \Example\AddClassAndCallIt\Basic $objectOne
         * @var \Example\AddClassAndCallIt\Basic $objectTwo
         */
        echo 'Container has consumer "' . $this->className . '"?: ' . ($this->container->hasConsumer($this->className) ? 'yes' : 'no') . PHP_EOL;
        echo 'Vardump of first created object by the container.' . PHP_EOL . PHP_EOL;
        echo var_export($objectOne, true);
        echo 'Adding property to second reference of same instance.'. PHP_EOL;
        $objectTwo->setMyProperty('thats my property');
        echo 'Calling getMyProperty on first object: "' . $objectOne->getMyProperty() . '"' . PHP_EOL;
        echo 'Calling getMyProperty on second object: "' . $objectTwo->getMyProperty() . '"' . PHP_EOL;
        echo 'Vardump of second created object by the container.' . PHP_EOL . PHP_EOL;
        echo var_export($objectTwo, true);
        echo PHP_EOL;
    }
}