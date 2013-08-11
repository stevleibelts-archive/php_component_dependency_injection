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
     * @param string $alias
     * @param DeclarationInterface $declaration
     * @return $this
     * @throws RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     */
    public function addConsumer($className, $alias = '', DeclarationInterface $declaration = null);

    /**
     * Validates if given class name where add as consumer to the injector.
     *
     * @param string $classNameOrAlias
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-10
     */
    public function hasConsumer($classNameOrAlias);

    /**
     * Returns a new or shared instance of a given class name.
     *
     * @param string $classNameOrAlias
     * @return null|mixed|object
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     */
    public function getConsumer($classNameOrAlias);
}