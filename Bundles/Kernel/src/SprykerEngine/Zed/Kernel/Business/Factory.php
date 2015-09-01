<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerEngine\Zed\Kernel\Business;

use SprykerEngine\Shared\Kernel\AbstractFactory;
use SprykerEngine\Zed\Kernel\BundleConfigLocator;
use SprykerEngine\Shared\Kernel\ClassMapFactory;

class Factory extends AbstractFactory
{

    /**
     * @var string
     */
    protected $classNamePattern = '\\{{namespace}}\\Zed\\{{bundle}}{{store}}\\Business\\';

    /**
     * @var string
     */
    protected $application = 'Zed';

    /**
     * @var string
     */
    protected $layer = 'Business';

    /**
     * @param string $class
     *
     * @throws \Exception
     *
     * @return object
     */
    public function create($class)
    {
        $arguments = func_get_args();

        if (in_array($class, $this->baseClasses)) {
            $bundleConfigLocator = new BundleConfigLocator();
            $bundleConfig = $bundleConfigLocator->locate($this->getBundle(), $arguments[2]);
            $class = $this->getBundle().$class;
            $arguments[] = $bundleConfig;
        }

        array_shift($arguments);

        if ($this->isMagicCall) {
            $arguments = (count($arguments) > 0) ? $arguments[0] : [];
        }
        $this->isMagicCall = false;
        return ClassMapFactory::getInstance()->create('Zed', $this->getBundle(), $class, 'Business', $arguments);
//
//        $class = $this->buildClassName($class);
//        $resolver = $this->getResolver();
//
//        return $resolver->resolve($class, $this->getBundle(), $arguments);
    }

}
