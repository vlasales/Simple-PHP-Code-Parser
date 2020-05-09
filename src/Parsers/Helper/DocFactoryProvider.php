<?php
declare(strict_types=1);

namespace SimplePhpParser\Parsers\Helper;

use phpDocumentor\Reflection\DocBlockFactory;

final class DocFactoryProvider
{
    /**
     * @var DocBlockFactory
     */
    private static $docFactory;

    public static function getDocFactory(): DocBlockFactory
    {
        if (self::$docFactory === null) {
            self::$docFactory = DocBlockFactory::createInstance();
        }

        return self::$docFactory;
    }
}
