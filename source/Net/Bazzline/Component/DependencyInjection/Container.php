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
 * @todo implement method that converts \My\Class to My_Class as well as \\My\\Class
 * @todo implement circular reference detection like https://github.com/symfony/DependencyInjection/blob/master/ContainerBuilder.php:475
 * @todo implement reference or link so that an alias can use the same definition as another class (if definition exists already)
 */
class Container implements ContainerInterface
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    protected $definitions;

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
        $this->definitions = array();
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
    public function addConsumer($className, $alias = '', DefinitionInterface $definition = null)
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
            //@todo implement else
            throw new InvalidArgumentException(
                'Not supported so far.'
            );
        }

        return $this;
    }

    /**
     * Validates if given class name where add as consumer to the container.
     *
     * @param string $classNameOrAlias
     * @return boolean
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-10
     * @todo implement "|| method_exists($this, 'get' . ucfirst($classNameOrAlias))"
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
     * @todo implement "|| method_exists($this, 'get' . ucfirst($classNameOrAlias))"
     */
    public function getConsumer($classNameOrAlias)
    {
        $hash = $this->generateHash($classNameOrAlias);

        return ($this->hasConsumer($classNameOrAlias)) ? $this->sharedObjects[$hash] : null;
    }

    /**
     * @param string $classNameOrAlias
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function hasDefinition($classNameOrAlias)
    {
        $hash = $this->generateHash($classNameOrAlias);

        return (array_key_exists($hash, $this->definitions));
    }

    /**
     * @param string $classNameOrAlias
     * @return null|DefinitionInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    public function getDefinition($classNameOrAlias)
    {
        $hash = $this->generateHash($classNameOrAlias);

        return ($this->hasDefinition($classNameOrAlias)) ? $this->definitions[$hash] : null;
    }

    /**
     * @param string $hash
     * @param DefinitionInterface $definition
     * @return $this
     * @throws \Net\Bazzline\Component\Converter\InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-11
     */
    protected function addDefinition($hash, DefinitionInterface $definition)
    {
        if ($this->hasDefinition($hash)) {
            throw new InvalidArgumentException(
                'Definition already already added for "' . $hash . '".'
            );
        }

        $this->definitions[$hash];

        return $this;
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