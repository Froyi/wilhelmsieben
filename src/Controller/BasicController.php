<?php
declare(strict_types=1);

namespace Project\Controller;

class BasicController extends DefaultController
{
    public function notFoundAction(): void
    {
        $this->viewRenderer->renderTemplate();
    }
}