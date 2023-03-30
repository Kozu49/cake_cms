<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FootballRagistration $footballRagistration
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Football Ragistration'), ['action' => 'edit', $footballRagistration->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Football Ragistration'), ['action' => 'delete', $footballRagistration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $footballRagistration->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Football Ragistrations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Football Ragistration'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="footballRagistrations view content">
            <h3><?= h($footballRagistration->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $footballRagistration->has('student') ? $this->Html->link($footballRagistration->student->name, ['controller' => 'Students', 'action' => 'view', $footballRagistration->student->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($footballRagistration->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created To') ?></th>
                    <td><?= h($footballRagistration->created_to) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($footballRagistration->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
