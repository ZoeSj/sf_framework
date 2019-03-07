<?php
/**
 * Created by PhpStorm.
 * User: shengjia
 * Date: 2019/3/7
 * Time: 20:11
 */

namespace Simplex;
class GoogleListener
{
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getRequest();

        if ($response->isRedirection()
            || ($response->headers->has('Content-Type') && false === strpos($response->headers->get('Content-Type'), 'html'))
            || 'html' !== $event->getRequest()->getRequestFormat()
        ) {
            return;
        }
        $response->setContent($response->getContent() . 'GA CODE');
    }
}