<?php

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\View\ViewBuilder;

class BlogsController extends AppController
{

    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('blog');
        $this->loadModel('Menus');
        $menus = $this->Menus->find('all', ['contain' => ['Submenus']]);
        $this->set('menus', $menus);

    }

    public function home()
    {
        $this->loadModel('Articles');
        $articles = $this->Articles->find('all');
        $articleLists = $this->Articles->find('list');
        $this->set('articles', $this->paginate($articles, ['limit' => 3]));
        $this->set('articleLists', $articleLists);

        // $recentArticles = $this->fetchTable('Articles')->find('all', [
        //     'limit' => 5,
        //     'order' => 'Articles.created DESC'
        // ])
        // ->all();

    }

    public function view($id = null)
    {
        $this->loadModel('Articles');
        $article = $this->Articles->get($id);
        $articleLists = $this->Articles->find('list');
        $this->set('articleLists', $articleLists);
        $this->set('article', $article);

    }
    public function about()
    {
    }

    public function contact()
    {

    }

}
