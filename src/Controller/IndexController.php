<?php

namespace Project\Controller;


class IndexController extends DefaultController
{
    public function indexAction(): void
    {
        $pageTemplate = 'index.twig';
        $config = [
            'page' => 'home',
            'dailySoup' => [
                'day' => 'Mo|31.07.2017',
                'soup' => ['Erbsensuppe', 'Linsensuppe']
            ]
        ];

        $this->viewRenderer->renderTemplate($pageTemplate, $config);
    }
}