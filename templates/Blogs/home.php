<div class="container">

    <div class="row">
        <div class="col-4">
            <h3 style="color: #fff;" class="bg-info text-capitalize p-1">Recent Post</h3>
            <ul class="list-group list-group-flush">
            <?php foreach ($articleLists as $key => $articleList): ?>
              <li class="list-group-item"><a href=<?= $this->Url->build(['controller' => 'blogs', 'action' => 'view',$key]) ?>><?= $articleList?></a></li>
              <?php endforeach;?>
            </ul>
        </div>

        <div class="col-8">
            <div class="row">
               <div class="list-group ">
                <?php foreach ($articles as $key => $article): ?>
                  <a href=<?=$this->Url->build(['controller' => 'blogs', 'action' => 'view', $article->id])?> class="list-group-item list-group-item-action flex-column mb-2">
                    <div class="d-flex w-100 justify-content-between">
                      <?=

                        $this->Text->truncate(
                          $article->details,
                          250,
                          [
                              'ellipsis' => '...',
                              'exact' => true
                          ]
                        );
                      ?>
                      <small>3 days ago</small>
                    </div>
                  </a>
                  <?php endforeach;?>

                  <ul class="pagination">
                  <?=$this->Paginator->prev("<<")?>
                  <?=$this->Paginator->numbers()?>
                  <?=$this->Paginator->next(">>")?>
                  </ul>

                </div>
            </div>
        </div>
    </div>

    </div>