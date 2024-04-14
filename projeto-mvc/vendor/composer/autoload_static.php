<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0623c0b3f195091ee12cb0b35ed2337d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Php\\Projetomvc\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Php\\Projetomvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0623c0b3f195091ee12cb0b35ed2337d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0623c0b3f195091ee12cb0b35ed2337d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0623c0b3f195091ee12cb0b35ed2337d::$classMap;

        }, null, ClassLoader::class);
    }
}
