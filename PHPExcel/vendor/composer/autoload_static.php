<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite52b0e478996a9fd2ea0c1bd273fd5ca
{
    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInite52b0e478996a9fd2ea0c1bd273fd5ca::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
