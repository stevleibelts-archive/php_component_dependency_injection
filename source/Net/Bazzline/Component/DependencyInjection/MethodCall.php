<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-07-29 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class MethodCall
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-07-29
 */
class MethodCall implements MethodCallInterface
{
    /**
     * @var string
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-29
     */
    protected $methodName;

    /**
     * @var array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-29
     */
    protected $parameters;

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-29
     */
    public function __construct()
    {
        $this->methodName = '';
        $this->parameters = array();
    }

    /**
     * {@inheritdoc}
     */
    public function addParameter($value)
    {
        $this->parameters[] = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethodName()
    {
        $this->methodName;
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function setParameters(array $values)
    {
        $this->parameters = array_values($values);

        return $this;
    }
}