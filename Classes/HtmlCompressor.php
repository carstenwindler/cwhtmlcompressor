<?php

namespace CarstenWindler\Cwhtmlcompressor;

class HtmlCompressor
{
    public function contentCompressHook(&$params)
    {
        $httpAcceptEncoding = $_SERVER['HTTP_ACCEPT_ENCODING'] ?? '';

        if (strpos($httpAcceptEncoding, 'gzip') === false) {
            return;
        }

        header('Content-Encoding: gzip');
        $params['pObj']->content = gzencode($params['pObj']->content);
    }
}
