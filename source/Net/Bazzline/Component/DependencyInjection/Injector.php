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
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     */
    protected $classNames;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     */
    public function __construct()
    {
        //@todo implement or use a collection
        $this->classNames = array();
    }

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
     * @todo implement alias support
     */
    public function addConsumer($className, $alias = '', DeclarationInterface $declaration = null)
    {
        if ($this->hasConsumer($className)
            || ($alias != '' && $this->hasConsumer($alias))) {
            throw new RuntimeException(
                'Consumer "' . $className . '" already added.'
            );
        }

        if (!class_exists($className)) {
            throw new RuntimeException(
                'Class "' . $className . '" does not exists.'
            );
        }

        if (is_null($declaration)) {
            $this->classNames[$className] = new $className();
        }
        //@todo implement else

        return $this;
    }

    /**
     * Validates if given class name where add as consumer to the injector.
     *
     * @param string $classNameOrAlias
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-10
     */
    public function hasConsumer($classNameOrAlias)
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