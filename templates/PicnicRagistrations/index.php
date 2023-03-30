<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PicnicRagistration> $picnicRagistrations
 */
?>
<div class="picnicRagistrations index content">
    <?= $this->Html->link(__('New Picnic Ragistration'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Picnic Ragistrations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($picnicRagistrations as $picnicRagistration): ?>
                <tr>
                    <td><?= $this->Number->format($picnicRagistration->id) ?></td>
                    <td><?= $picnicRagistration->has('student') ? $this->Html->link($picnicRagistration->student->name, ['controller' => 'Students', 'action' => 'view', $picnicRagistration->student->id]) : '' ?></td>
                    <td><?= $this->Number->format($picnicRagistration->amount) ?></td>
                    <td><?= h($picnicRagistration->created_at) ?></td>
                    <td><?= h($picnicRagistration->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $picnicRagistration->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $picnicRagistration->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $picnicRagistration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $picnicRagistration->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
