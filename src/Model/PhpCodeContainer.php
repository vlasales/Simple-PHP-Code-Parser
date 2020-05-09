<?php
declare(strict_types=1);

namespace SimplePhpParser\Model;

class PhpCodeContainer
{
    /**
     * @var PHPConst[]
     */
    private $constants = [];

    /**
     * @var PHPFunction[]
     */
    private $functions = [];

    /**
     * @var PHPClass[]
     */
    private $classes = [];

    /**
     * @var PHPInterface[]
     */
    private $interfaces = [];

    /**
     * @return PHPConst[]
     */
    public function getConstants(): array
    {
        return $this->constants;
    }

    /**
     * @param PHPConst $constant
     *
     * @return void
     */
    public function addConstant(PHPConst $constant)
    {
        $this->constants[$constant->name] = $constant;
    }

    /**
     * @return PHPFunction[]
     */
    public function getFunctions(): array
    {
        return $this->functions;
    }

    /**
     * @param PHPFunction $function
     *
     * @return void
     */
    public function addFunction(PHPFunction $function)
    {
        $this->functions[$function->name] = $function;
    }

    /**
     * @param string $name
     *
     * @return PHPClass|null
     */
    public function getClass(string $name)
    {
        if (\array_key_exists($name, $this->classes) && $this->classes[$name] !== null) {
            return $this->classes[$name];
        }

        return null;
    }

    /**
     * @return PHPClass[]
     */
    public function getClasses(): array
    {
        return $this->classes;
    }

    /**
     * @param PHPClass $class
     *
     * @return void
     */
    public function addClass(PHPClass $class)
    {
        $this->classes[$class->name ?: \md5(\serialize($class))] = $class;
    }

    /**
     * @param string $name
     *
     * @return PHPInterface|null
     */
    public function getInterface(string $name)
    {
        if (\array_key_exists($name, $this->interfaces) && $this->interfaces[$name] !== null) {
            return $this->interfaces[$name];
        }

        return null;
    }

    /**
     * @return PHPInterface[]
     */
    public function getInterfaces(): array
    {
        return $this->interfaces;
    }

    /**
     * @param PHPInterface $interface
     *
     * @return void
     */
    public function addInterface(PHPInterface $interface)
    {
        $this->interfaces[$interface->name] = $interface;
    }
}
