<?php

namespace Project\Controller;


class BasicController extends DefaultController
{
    public function notFoundAction(): void
    {
        $pageTemplate = 'index.twig';
        $config = ['page' => 'error'];

        $this->viewRenderer->renderTemplate($pageTemplate, $config);
    }
}