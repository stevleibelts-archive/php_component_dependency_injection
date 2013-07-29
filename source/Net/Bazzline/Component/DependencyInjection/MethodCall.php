<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-29 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class MethodCall
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-29
 */
class MethodCall implements MethodCallInterface
{
    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-29
     */
    protected $methodName;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-29
     */
    protected $parameters;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-29
     */
    public function __construct()
    {
        $this->methodName = '';
        $this->parameters = array();
    }

    /**
     * {@inheritDoc}
     */
    public function addParameter($value)
    {
        $this->parameters[] = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethodName()
    {
        $this->methodName;
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * {@inheritDoc}
     */
    public function setMethodName($name)
    {
        if (strlen($name) < 1) {
            throw new InvalidArgumentException(
                'Invalid method name provided'
            );
        }

        $this->methodName = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setParameters(array $values)
    {
        $this->parameters = array_values($values);

        return $this;
    }
}