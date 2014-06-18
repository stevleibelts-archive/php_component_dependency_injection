<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-07-31 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class DefinitionAwareInterface
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-07-31
 */
interface DefinitionAwareInterface
{
    /**
     * @param DefinitionInterface $definition
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-31
     */
    public function setDefinition(DefinitionInterface $definition);

    /**
     * @return DefinitionInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-31
     */
    public function getDefinition();

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-31
     */
    public function hasDefinition();
}