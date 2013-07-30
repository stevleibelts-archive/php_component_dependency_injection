<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-29 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class Specification
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-29
 */
class Specification implements SpecificationInterface
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-29
     */
    protected $constructorParameters;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-29
     */
    protected $methodCalls;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-28
     */
    public function __construct()
    {
        $this->constructorParameters = array();
        $this->methodCalls = array();
    }

    /**
     * {@inheritDoc}
     */
    public function addMethodCall(MethodCallInterface $methodCall)
    {
        $this->methodCalls[] = $methodCall;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethodCalls()
    {
        return $this->methodCalls;
    }

    /**
     * {@inheritDoc}
     */
    public function setMethodCalls(array $methodCalls)
    {
        $this->methodCalls = array();

        foreach ($methodCalls as $methodCall) {
            if ($methodCall instanceof MethodCallInterface) {
                $this->addMethodCall($methodCall);
            }
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addConstructorArgument($value)
    {
        $this->constructorParameters[] = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setConstructorArguments(array $parameters)
    {
        $this->constructorParameters = $parameters;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getConstructorArguments()
    {
        $this->constructorParameters;
    }
}