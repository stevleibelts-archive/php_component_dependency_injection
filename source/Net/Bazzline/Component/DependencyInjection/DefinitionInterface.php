<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-07-29 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/*
    specification:
        arguments:
            'foo'
            'My\Other\Class'
        methodCalls:
            'setBar':
                'foo'
            'setUserAndScope':
                'My\User'
                'Two'
                */
/**
 * Class DefinitionInterface.
 * Arguments are constructor parameter values.
 * MethodCalls are defined separately.
 * Yes, influenced by http://symfony.com/doc/current/components/dependency_injection/definitions.html
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-07-29
 */
interface DefinitionInterface
{
    /**
     * @param MethodCallInterface $methodCall
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-28
     */
    public function addMethodCall(MethodCallInterface $methodCall);

    /**
     * @return array|MethodCallInterface[]
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-28
     */
    public function getMethodCalls();

    /**
     * @param array|MethodCallInterface[]
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-28
     */
    public function setMethodCalls(array $methodCalls);

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    public function hasMethodCalls();

    /**
     * @param mixed $argument
     * @return int - index or replaced argument
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-28
     */
    public function addArgument($argument);

    /**
     * @param int $index
     * @return mixed
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-30
     */
    public function getArgument($index);

    /**
     * @return array $arguments[$index => array[$name => $value]]
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-20
     */
    public function getArguments();

    /**
     * @param int $index
     * @param mixed $argument
     * @return int - index or replaced argument
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-30
     */
    public function replaceArgument($index, $argument);

    /**
     * @param array $parameters
     * @return int - number of added arguments
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-29
     */
    public function setArguments(array $parameters);

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    public function hasArguments();

    /**
     * @param bool $isShared
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    public function setShared($isShared);

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-11
     */
    public function isShared();
}