<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Login Session'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loginSession index large-9 medium-8 columns content">
    <h3><?= __('Login Session') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('start_time') ?></th>
                <th><?= $this->Paginator->sort('session_token') ?></th>
                <th><?= $this->Paginator->sort('end_time') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loginSession as $loginSession): ?>
            <tr>
                <td><?= $this->Number->format($loginSession->id) ?></td>
                <td><?= $loginSession->has('user') ? $this->Html->link($loginSession->user->id, ['controller' => 'Users', 'action' => 'view', $loginSession->user->id]) : '' ?></td>
                <td><?= h($loginSession->start_time) ?></td>
                <td><?= h($loginSession->session_token) ?></td>
                <td><?= h($loginSession->end_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $loginSession->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loginSession->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loginSession->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loginSession->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
