<?php
declare(strict_types=1);

// VGd SDK utility: feature_add

class VGdFeatureAdd
{
    public static function call(VGdContext $ctx, mixed $f): void
    {
        $ctx->client->features[] = $f;
    }
}
