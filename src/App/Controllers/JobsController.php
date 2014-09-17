<?php

namespace App\Controllers;

use Goiaba\Net\Http\Base\ControllerActionInterface,
    Goiaba\Net\Http\Base\RequestInterface,
    Goiaba\Net\Http\Base\ResponseInterface,
    Goiaba\Net\Http\Base\ViewInterface,
    App\Models\Jobs as Jobs;


class JobsController implements ControllerActionInterface
{
    public function listAction() 
    {
        die('list action');
    }

    public function execute(RequestInterface $request, ResponseInterface $response, ViewInterface $view)
    {
        $job = new Jobs();
        $job->setRank(10);
        $view->setTemplate('jobs/index.php');
        $view->pass('jobs', $job);
        return true;
    }
}

