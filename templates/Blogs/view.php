<?php

  $this->Breadcrumbs->add([
          [
            'title' => 'Home', 
            'url' => ['controller' => 'Blogs', 'action' => 'home'],
            'options' => ['class'=>'breadcrumb-item']
          ],


          [
            'title' => $article->title, 
            'url' => ['controller' => 'Blogs', 'action' => 'view', $article->id],
            'options' => [
                            'class'=>'breadcrumb-item active',
                            'innerAttrs' => [
                              'class' => 'test-list-class',
                              'id' => 'the-products-crumb'
                          ]
            
                        ]
          ]
  ]);


?>
<div class="container">

    <div class="row">
        <div class="col-4">
            <h3 style="color: #fff;" class="bg-info text-capitalize p-1">Recent Post</h3>
            <ul class="list-group list-group-flush">
            <?php foreach ($articleLists as $key => $articleList): ?>
              <li class="list-group-item"><a href=<?=$this->Url->build(['controller' => 'blogs', 'action' => 'view', $key])?>><?=$articleList?></a></li>
              <?php endforeach;?>
            </ul>
        </div>

        <div class="col-8">
            <div class="row">
               <div class="list-group ">
                  <a href="#" class="list-group-item list-group-item-action flex-column mb-2">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1"> <?=$article->details?></h5>
                      <small>3 days ago</small>
                    </div>
                  </a>


                </div>
            </div>
        </div>
    </div>

    </div>