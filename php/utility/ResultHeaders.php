<?php
declare(strict_types=1);

// VGd SDK utility: result_headers

class VGdResultHeaders
{
    public static function call(VGdContext $ctx): ?VGdResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result) {
            if ($response && is_array($response->headers)) {
                $result->headers = $response->headers;
            } else {
                $result->headers = [];
            }
        }
        return $result;
    }
}
