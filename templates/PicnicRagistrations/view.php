<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PicnicRagistration $picnicRagistration
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Picnic Ragistration'), ['action' => 'edit', $picnicRagistration->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Picnic Ragistration'), ['action' => 'delete', $picnicRagistration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $picnicRagistration->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Picnic Ragistrations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Picnic Ragistration'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="picnicRagistrations view content">
            <h3><?= h($picnicRagistration->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $picnicRagistration->has('student') ? $this->Html->link($picnicRagistration->student->name, ['controller' => 'Students', 'action' => 'view', $picnicRagistration->student->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($picnicRagistration->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($picnicRagistration->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($picnicRagistration->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($picnicRagistration->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
