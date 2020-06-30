<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3ec6ac12da9355d99cc8549c2218897b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3ec6ac12da9355d99cc8549c2218897b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3ec6ac12da9355d99cc8549c2218897b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}