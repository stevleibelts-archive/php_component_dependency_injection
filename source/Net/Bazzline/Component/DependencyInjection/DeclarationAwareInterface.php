<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-31 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class DeclarationAwareInterface
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-31
 */
interface DeclarationAwareInterface
{
    /**
     * @param DeclarationInterface $definition
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-31
     */
    public function setDeclaration(DeclarationInterface $definition);

    /**
     * @return DeclarationInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-31
     */
    public function getDeclaration();

    /**
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-31
     */
    public function hasDeclaration();
}