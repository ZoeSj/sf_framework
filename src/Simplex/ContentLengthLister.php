<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 20:16
 */

namespace Simplex;
class ContentLengthLister
{
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();
        $headers = $response->headers;

        if (!$headers->has('Content-Length') && !$headers->has('Transfer-Encoding')) {
            $headers->set('Content-Length', strlen($response->getContent()));
        }
    }
}