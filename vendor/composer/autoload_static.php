<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit320abd277683a4d60b27a4668fa92ea0
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Element\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Element\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit320abd277683a4d60b27a4668fa92ea0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit320abd277683a4d60b27a4668fa92ea0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
