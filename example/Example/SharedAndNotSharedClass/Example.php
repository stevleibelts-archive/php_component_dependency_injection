<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-09 
 */

namespace Example\SharedAndNotSharedClass;

use Net\Bazzline\Component\DependencyInjection\Container;
use Net\Bazzline\Component\DependencyInjection\Definition;

include __DIR__ . '/../../../vendor/autoload.php';

Example::create()
    ->setup()
    ->andRun();

/**
 * Class Example
 *
 * @package Example\UseContainerAsFactory
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-09
 */
class Example
{
    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    protected $classOne;

    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    protected $classTwo;

    /**
     * @var \Net\Bazzline\Component\DependencyInjection\ContainerInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    protected $container;

    /**
     * @return Example
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    public static function create()
    {
        $self = new self();

        return $self;
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    public function setup()
    {
        $this->classOne = '\\Example\\SharedAndNotSharedClass\\One';
        $this->classTwo = '\\Example\\SharedAndNotSharedClass\\Two';
        $definitionTwo = new Definition();
        $definitionTwo->setShared(false);

        $this->container = new Container();
        $this->container->addConsumer($this->classOne);
        $this->container->addConsumer($this->classTwo, '', $definitionTwo);

        return $this;
    }

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    public function andRun()
    {
        $objectOne = $this->container->getConsumer($this->classOne);
        $objectTwo = $this->container->getConsumer($this->classOne);
        $objectThree = $this->container->getConsumer($this->classTwo);
        $objectFour = $this->container->getConsumer($this->classTwo);
        /**
         * @var \Example\SharedAndNotSharedClass\One $objectOne
         * @var \Example\SharedAndNotSharedClass\One $objectTwo
         * @var \Example\SharedAndNotSharedClass\Two $objectThree
         * @var \Example\SharedAndNotSharedClass\Two $objectFour
         */
        echo str_repeat('-', 16) . PHP_EOL;
        echo 'Container has consumer "' . $this->classOne . '"?: ' . ($this->container->hasConsumer($this->classOne) ? 'yes' : 'no') . PHP_EOL;
        echo 'Container has consumer "' . $this->classTwo . '"?: ' . ($this->container->hasConsumer($this->classTwo) ? 'yes' : 'no') . PHP_EOL;
        echo str_repeat('-', 16) . PHP_EOL;
        echo 'Class "' . $this->classOne . '" is shared.' . PHP_EOL;
        echo 'Class "' . $this->classTwo . '" is not shared.' . PHP_EOL;
        echo str_repeat('-', 16) . PHP_EOL;
        echo 'Object hash and class of object one "' . spl_object_hash($objectOne) . ' ' . get_class($objectOne) . PHP_EOL;
        echo 'Object hash and class of object two "' . spl_object_hash($objectTwo) . ' ' . get_class($objectTwo) . PHP_EOL;
        echo 'Object hash and class of object three "' . spl_object_hash($objectThree) . ' ' . get_class($objectThree) . PHP_EOL;
        echo 'Object hash and class of object four "' . spl_object_hash($objectFour) . ' ' . get_class($objectFour) . PHP_EOL;
        echo str_repeat('-', 16) . PHP_EOL;
    }
}