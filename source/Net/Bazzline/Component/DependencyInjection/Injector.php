<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-10 
 */

namespace Net\Bazzline\Component\DependencyInjection;

use SplObjectStorage;

/**
 * Class Injector
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-10
 */
class Injector implements InjectorInterface
{
    /**
     * @var SplObjectStorage
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     */
    protected $instancePool;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     */
    public function __construct()
    {
        $this->instancePool = new SplObjectStorage();
    }

    /**
     * Adds a class to the injector. If you do not provide a declaration, the
     *  injector simple creates a new instance of that class by each call.
     *
     * @param string $className
     * @param DeclarationInterface $declaration
     * @return $this
     * @throws RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     */
    public function addConsumer($className, DeclarationInterface $declaration = null)
    {
        $consumerAlreadyAdded = false;

        if ($consumerAlreadyAdded) {
            throw new RuntimeException(
                'Consumer "' . $className . '" already added.'
            );
        }

        if (!class_exists($className)) {
            throw new RuntimeException(
                'File "' . $className . '" could not be found.'
            );
        }

        if (is_null($declaration)) {
            $this->instancePool->attach(new $className);
        }
        //@todo implement else

        return $this;
    }

    /**
     * Validates if given class name where add as consumer to the injector.
     *
     * @param string $className
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-10
     */
    public function hasConsumer($className)
    {
        // TODO: Implement hasConsumer() method.
    }

    /**
     * Returns a new or shared instance of a given class name.
     *
     * @param string $className
     * @return null|mixed|object
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     */
    public function getConsumer($className)
    {
        // TODO: Implement getConsumer() method.
    }
}