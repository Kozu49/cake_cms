<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FootballRagistration $footballRagistration
 * @var string[]|\Cake\Collection\CollectionInterface $students
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $footballRagistration->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $footballRagistration->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Football Ragistrations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="footballRagistrations form content">
            <?= $this->Form->create($footballRagistration) ?>
            <fieldset>
                <legend><?= __('Edit Football Ragistration') ?></legend>
                <?php
                    echo $this->Form->control('student_id', ['options' => $students]);
                    echo $this->Form->control('created_to');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
