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
    protected $arguments;

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
        $this->arguments = array();
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
    public function addArgument($value)
    {
        $this->arguments[] = $value;

        $index = end($this->arguments);
        reset($this->arguments);

        return $index;
    }

    /**
     * {@inheritDoc}
     */
    public function getArguments()
    {
        $this->arguments;
    }

    /**
     * {@inheritdoc}
     */
    public function replaceArgument($index, $argument)
    {
        if (!isset($this->arguments[$index])) {
            throw new InvalidArgumentException(
                'No argument exists for provided index "' . $index . '"'
            );
        }

        $this->arguments[$index] = $argument;

        return $index;
    }

    /**
     * {@inheritDoc}
     */
    public function setArguments(array $arguments)
    {
        $this->arguments = $arguments;

        return count($this->arguments);
    }
}