<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-10 
 */

namespace Net\Bazzline\Component\DependencyInjection;

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
     * Adds a class to the injector. If you do not provide a declaration, the
     *  injector simple creates a new instance of that class by each call.
     *
     * @param string $className
     * @param DeclarationInterface $definition
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     */
    public function addConsumer($className, DeclarationInterface $definition = null)
    {
        // TODO: Implement addConsumer() method.
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