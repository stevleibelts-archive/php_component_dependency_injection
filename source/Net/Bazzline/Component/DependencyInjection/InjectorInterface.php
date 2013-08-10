<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-10 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class InjectorInterface
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-10
 */
interface InjectorInterface
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
    public function addConsumer($className, DeclarationInterface $definition = null);
}