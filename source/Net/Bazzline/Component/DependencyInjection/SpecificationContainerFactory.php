<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-29 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class SpecificationContainerFactory
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-29
 */
class SpecificationContainerFactory
{
    /**
     * @param Configuration $configuration
     * @return SpecificationContainer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-29
     */
    public function create(Configuration $configuration)
    {
        $container = new SpecificationContainer();

        if ($configuration->hasKey('constructor')) {
            $container->setConstructorParameters($configuration->getByKey('constructor'));
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