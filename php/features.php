<?php
declare(strict_types=1);

// VGd SDK feature factory

require_once __DIR__ . '/feature/BaseFeature.php';
require_once __DIR__ . '/feature/TestFeature.php';


class VGdFeatures
{
    public static function make_feature(string $name)
    {
        switch ($name) {
            case "base":
                return new VGdBaseFeature();
            case "test":
                return new VGdTestFeature();
            default:
                return new VGdBaseFeature();
        }
    }
}
