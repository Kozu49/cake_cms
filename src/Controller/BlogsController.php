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
        $this->loadModel('Articles');
        $articles=$this->Articles->find('all')
                                    ->limit(3);
        $this->set('articles',$articles);


        // $recentArticles = $this->fetchTable('Articles')->find('all', [
        //     'limit' => 5,
        //     'order' => 'Articles.created DESC'
        // ])
        // ->all();

    }

    public function about()
    {
    }

    public function contact()
    {
    }

}
