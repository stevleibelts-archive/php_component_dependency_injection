<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-10 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class Container
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-10
 */
class Container implements ContainerInterface
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
     * Adds a class to the container. If you do not provide a declaration, the
     *  container simple creates a new instance of that class by each call.
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
        if ($this->hasConsumer($className, $alias)) {
            throw new RuntimeException(
                'Consumer "' . $className . '" already added.'
            );
        }

        $hash = $this->generateHash($className, $alias);

        if (!class_exists($className)) {
            throw new RuntimeException(
                'Class "' . $className . '" does not exists.'
            );
        }

        if (is_null($declaration)) {
            $this->classNames[$hash] = new $className();
        } else {
            throw new RuntimeException(
                'Not supported so far.'
            );
        }
        //@todo implement else

        return $this;
    }

    /**
     * Validates if given class name where add as consumer to the container.
     *
     * @param string $classNameOrAlias
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-10
     */
    public function hasConsumer($classNameOrAlias)
    {
        $hash = $this->generateHash($classNameOrAlias);

        return (array_key_exists($hash, $this->classNames));
    }

    /**
     * Returns a new or shared instance of a given class name.
     *
     * @param string $classNameOrAlias
     * @return null|mixed|object
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     * @todo handle how to deal with shared and not shared objects
     */
    public function getConsumer($classNameOrAlias)
    {
        $hash = $this->generateHash($classNameOrAlias);

        return ($this->hasConsumer($classNameOrAlias)) ? $this->classNames[$hash] : null;
    }

    /**
     * @param string $className
     * @param string $alias
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    protected function generateHash($className, $alias = '')
    {
        return (is_null($alias)) ? sha1($alias) : sha1($className);
    }
}