<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-07-29 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class Definition
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-07-29
 */
class Definition implements DefinitionInterface
{
    /**
     * @var array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-29
     */
    protected $arguments;

    /**
     * @var
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    protected $isShared;

    /**
     * @var array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-29
     */
    protected $methodCalls;

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-28
     */
    public function __construct()
    {
        $this->arguments = array();
        $this->methodCalls = array();
        $this->setShared(true);
    }

    /**
     * {@inheritdoc}
     */
    public function addMethodCall(MethodCallInterface $methodCall)
    {
        $this->methodCalls[] = $methodCall;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethodCalls()
    {
        return $this->methodCalls;
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function hasMethodCalls()
    {
        return (!empty($this->methodCalls));
    }

    /**
     * {@inheritdoc}
     */
    public function addArgument($value)
    {
        $this->arguments[] = $value;

        $index = end($this->arguments);
        reset($this->arguments);

        return $index;
    }

    /**
     * {@inheritdoc}
     */
    public function getArgument($index)
    {
        if (!isset($this->arguments[$index])) {
            throw new InvalidArgumentException(
                'No argument exists for provided index "' . $index . '"'
            );
        }

        return $this->arguments[$index];
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function setArguments(array $arguments)
    {
        $this->arguments = $arguments;

        return count($this->arguments);
    }

    /**
     * {@inheritdoc}
     */
    public function hasArguments()
    {
        return (!empty($this->arguments));
    }

    /**
     * {@inheritdoc}
     */
    public function setShared($shared)
    {
        $this->isShared = (bool) $shared;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function IsShared()
    {
        return $this->isShared;
    }
}