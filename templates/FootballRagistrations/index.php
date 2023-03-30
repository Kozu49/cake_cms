<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\FootballRagistration> $footballRagistrations
 */
?>
<div class="footballRagistrations index content">
    <?= $this->Html->link(__('New Football Ragistration'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Football Ragistrations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('created_to') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($footballRagistrations as $footballRagistration): ?>
                <tr>
                    <td><?= $this->Number->format($footballRagistration->id) ?></td>
                    <td><?= $footballRagistration->has('student') ? $this->Html->link($footballRagistration->student->name, ['controller' => 'Students', 'action' => 'view', $footballRagistration->student->id]) : '' ?></td>
                    <td><?= h($footballRagistration->created_to) ?></td>
                    <td><?= h($footballRagistration->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $footballRagistration->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $footballRagistration->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $footballRagistration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $footballRagistration->id)]) ?>
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
