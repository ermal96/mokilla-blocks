<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9d246a0b0550f332851acb0b13a95ff6
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'mokilla\\mokilla_blocks\\Model\\' => 29,
            'mokilla\\mokilla_blocks\\Blocks\\Custom\\' => 37,
            'mokilla\\mokilla_blocks\\Blocks\\' => 30,
            'mokilla\\mokilla_blocks\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'mokilla\\mokilla_blocks\\Model\\' => 
        array (
            0 => '/model',
        ),
        'mokilla\\mokilla_blocks\\Blocks\\Custom\\' => 
        array (
            0 => '/src/custom-blocks',
        ),
        'mokilla\\mokilla_blocks\\Blocks\\' => 
        array (
            0 => '/src',
        ),
        'mokilla\\mokilla_blocks\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'mokilla\\mokilla_blocks\\Blocks\\Custom\\Block_01' => __DIR__ . '/../..' . '/src/custom-blocks/block-01/class-mokilla-blocks-block-01.php',
        'mokilla\\mokilla_blocks\\Blocks\\Initializer' => __DIR__ . '/../..' . '/src/class-initializer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9d246a0b0550f332851acb0b13a95ff6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9d246a0b0550f332851acb0b13a95ff6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9d246a0b0550f332851acb0b13a95ff6::$classMap;

        }, null, ClassLoader::class);
    }
}
