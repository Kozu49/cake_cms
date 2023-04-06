<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $users
 */
?>
<!-- added css for a single view -->
<?php $this->Html->css('my',['block'=>true])  ?>
<!-- . -->

<div class="users index content">
    <?=$this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right'])?>
    <h3><?=__('Users')?></h3>
    <?=$this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'index'], 'type' => 'get'])?>
    <?=$this->Form->input('name', ['label' => 'Search', 'value' => $this->request->getQuery('name')])?>
    <?=$this->Form->submit(__('Search'))?>
    <?=$this->Form->end()?>
    <?=$this->Html->link(__('Refresh'), ['controller' => 'users', 'action' => 'index'], ['class' => 'button'])?>




    <div class="table-responsive">
    <?=$this->Form->create(null, ['url' => ['action' => 'deleteAll']])?>
    <button>Delete All</button>
        <table>
            <thead>
                <tr>
                <th>#</th>
                    <th><?=$this->Paginator->sort('id')?></th>
                    <th><?=$this->Paginator->sort('username')?></th>
                    <th><?=$this->Paginator->sort('email')?></th>
                    <th><?=$this->Paginator->sort('mobile')?></th>
                    <th><?=$this->Paginator->sort('image')?></th>
                    <th><?=$this->Paginator->sort('skill')?></th>
                    <th><?=$this->Paginator->sort('Status')?></th>
                    <th><?=$this->Paginator->sort('created')?></th>
                    <th><?=$this->Paginator->sort('modified')?></th>
                    <th class="actions"><?=__('Actions')?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                <td><?=$this->Form->checkbox('ids[]', ['value' => $user->id])?></td>
                    <td><?=$this->Number->format($user->id)?></td>
                    <td><?=h($user->username)?></td>
                    <td><?=h($user->email)?></td>
                    <td><?=h($user->profile ? $user->profile->mobile : '' )?></td>
                    
                    <td><?=$this->Html->image($user->image, [ 
                        'alt' => '',
                        'class' => 'img-fluid', 
                        'width' => 150, 
                        'height' => 100
                    ])?>
                </td>
                <td>
                   <?php
                        foreach($user->skills as $key => $skill){
                            echo $skill->name. " ";
                        }
                    ?>
                </td>
                <td>
                <?php if ($user->status == 1): ?>
                        <?= ('Active') ?>
                    <?php else: ?>
                        <?= ('Inactive') ?>                    
                        <?php endif;?>
                    </td>
                    <td><?=h($user->created)?></td>
                    <td><?=h($user->modified)?></td>
                    <td>
                    <?php if ($user->status == 1): ?>
                        <?=$this->Form->postLink(__('Inactive'), ['action' => 'userStatus', $user->id,$user->status], ['block' => true, 'confirm' => __('Are you sure you want to Inactive # {0}?', $user->id)])?>
                    <?php else: ?>
                        <?=$this->Form->postLink(__('Active'), ['action' => 'userStatus', $user->id,$user->status], ['block' => true, 'confirm' => __('Are you sure you want to Active # {0}?', $user->id)])?>
                    <?php endif;?>
                    </td>
                    <td class="actions">
                        <?=$this->Html->link(__('View'), ['action' => 'view', $user->id])?>
                        <?=$this->Html->link(__('Edit'), ['action' => 'edit', $user->id])?>
                        <?=$this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['block' => true, 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)])?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <?=$this->Form->end()?>
        <?=$this->fetch('postLink');?>
    </div>

</div>
