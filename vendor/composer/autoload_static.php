<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit48b7cf6c49923534402f1a2889981688
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Guptarakesh198\\Panelhelper\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Guptarakesh198\\Panelhelper\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit48b7cf6c49923534402f1a2889981688::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit48b7cf6c49923534402f1a2889981688::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit48b7cf6c49923534402f1a2889981688::$classMap;

        }, null, ClassLoader::class);
    }
}
