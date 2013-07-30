<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-29 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class Factory
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-29
 */
class Factory
{
    /**
     * @param Configuration $configuration
     * @return Definition
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-29
     */
    public function create(Configuration $configuration)
    {
        $container = new Definition();

        if ($configuration->hasKey('constructor')) {
            $container->setArguments($configuration->getByKey('constructor'));
        }

        if ($configuration->hasKey('methodCalls')) {
            foreach ($configuration->getByKey('methodCalls') as $methodName => $parameters) {
                $methodCall = new MethodCall();
                $methodCall->setMethodName($methodName);
                $methodCall->setParameters($parameters);

                $container->addMethodCall($methodCall);
            }
        }

        return $container;
    }
}