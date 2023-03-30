<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PicnicRagistration $picnicRagistration
 * @var string[]|\Cake\Collection\CollectionInterface $students
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $picnicRagistration->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $picnicRagistration->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Picnic Ragistrations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="picnicRagistrations form content">
            <?= $this->Form->create($picnicRagistration) ?>
            <fieldset>
                <legend><?= __('Edit Picnic Ragistration') ?></legend>
                <?php
                    echo $this->Form->control('student_id', ['options' => $students]);
                    echo $this->Form->control('amount');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
