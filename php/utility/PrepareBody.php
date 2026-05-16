<?php
declare(strict_types=1);

// VGd SDK utility: prepare_body

class VGdPrepareBody
{
    public static function call(VGdContext $ctx): mixed
    {
        if ($ctx->op->input === 'data') {
            return ($ctx->utility->transform_request)($ctx);
        }
        return null;
    }
}
