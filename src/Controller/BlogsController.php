<?php

namespace App\Controller;

use Cake\View\ViewBuilder;

class BlogsController extends AppController
{

    public function home()
    {
        $this->viewBuilder()->setLayout('blog');
    }

}
