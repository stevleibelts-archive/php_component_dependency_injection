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
    protected $sharedObjects;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     */
    public function __construct()
    {
        //@todo implement or use a collection
        $this->sharedObjects = array();
    }

    /**
     * Adds a class to the container. If you do not provide a definition, the
     *  container simple creates a new instance of that class by each call.
     *
     * @param string $className
     * @param string $alias
     * @param DefinitionInterface $definition
     * @return string (consumer id)
     * @throws RuntimeException|InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-10
     */
    public function register($className, $alias = '', DefinitionInterface $definition = null)
    {
        $id = (strlen($alias) > 0) ? $alias : $className;

        if ($this->hasConsumer($id)) {
            throw new RuntimeException(
                'Consumer "' . $id . '" already added.'
            );
        }

        $hash = $this->generateHash($id);

        if (!class_exists($className)) {
            throw new RuntimeException(
                'Class "' . $className . '" does not exists.'
            );
        }

        if (is_null($definition)) {
            $this->sharedObjects[$hash] = new $className();
        } else {
            throw new InvalidArgumentException(
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

        return (array_key_exists($hash, $this->sharedObjects));
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

        return ($this->hasConsumer($classNameOrAlias)) ? $this->sharedObjects[$hash] : null;
    }

    /**
     * @param string $id
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    protected function generateHash($id)
    {
        return sha1($id);
    }
}