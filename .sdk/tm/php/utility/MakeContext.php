<?php
declare(strict_types=1);

// VGd SDK utility: make_context

require_once __DIR__ . '/../core/Context.php';

class VGdMakeContext
{
    public static function call(array $ctxmap, ?VGdContext $basectx): VGdContext
    {
        return new VGdContext($ctxmap, $basectx);
    }
}
