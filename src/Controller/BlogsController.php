<?php

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\View\ViewBuilder;

class BlogsController extends AppController
{

    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('blog');

    }

    public function home()
    {
    }

    public function about()
    {
    }

    public function contact()
    {
    }

}
