<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-12 
 */

namespace Net\Bazzline\Component\DependencyInjection;

/**
 * Class IsNotSharedDefinition
 *
 * @package Net\Bazzline\Component\DependencyInjection
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-12
 */
class IsNotSharedDefinition extends Definition
{
    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-08-12
     */
    public function __construct()
    {
        parent::__construct();
        $this->setShared(false);
    }
}