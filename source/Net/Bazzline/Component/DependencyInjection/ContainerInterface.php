<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-10 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class ContainerInterface
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-10
 */
interface ContainerInterface
{
    /**
     * Adds a class to the container. If you do not provide a definition, the
     *  container simple creates a new instance of that class by each call.
     *
     * @param string $className
     * @param string $alias
     * @param DefinitionInterface $definition
     * @return string (consumer id)
     * @throws RuntimeException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-10
     */
    public function addConsumer($className, $alias = '', DefinitionInterface $definition = null);

    /**
     * Validates if given class name where add as consumer to the container.
     *
     * @param string $classNameOrAlias
     * @return boolean
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-10
     */
    public function hasConsumer($classNameOrAlias);

    /**
     * Returns a new or shared instance of a given class name.
     *
     * @param string $classNameOrAlias
     * @return null|mixed|object
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-10
     */
    public function getConsumer($classNameOrAlias);

    /**
     * @param string $classNameOrAlias
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    public function hasDefinition($classNameOrAlias);

    /**
     * @param string $classNameOrAlias
     * @return null|DefinitionInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    public function getDefinition($classNameOrAlias);
}