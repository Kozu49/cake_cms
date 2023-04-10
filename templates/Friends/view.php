<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Friend $friend
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Friend'), ['action' => 'edit', $friend->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Friend'), ['action' => 'delete', $friend->id], ['confirm' => __('Are you sure you want to delete # {0}?', $friend->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Friends'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Friend'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="friends view content">
            <h3><?= h($friend->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($friend->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($friend->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($friend->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($friend->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($friend->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Spouses') ?></h4>
                <?php if (!empty($friend->spouses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Friend Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($friend->spouses as $spouses) : ?>
                        <tr>
                            <td><?= h($spouses->id) ?></td>
                            <td><?= h($spouses->name) ?></td>
                            <td><?= h($spouses->friend_id) ?></td>
                            <td><?= h($spouses->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Spouses', 'action' => 'view', $spouses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Spouses', 'action' => 'edit', $spouses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Spouses', 'action' => 'delete', $spouses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $spouses->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
