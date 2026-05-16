<?php
declare(strict_types=1);

// VGd SDK utility: result_body

class VGdResultBody
{
    public static function call(VGdContext $ctx): ?VGdResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result && $response && $response->json_func && $response->body) {
            $result->body = ($response->json_func)();
        }
        return $result;
    }
}
