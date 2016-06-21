<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Login Session'), ['action' => 'edit', $loginSession->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Login Session'), ['action' => 'delete', $loginSession->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loginSession->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Login Session'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login Session'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loginSession view large-9 medium-8 columns content">
    <h3><?= h($loginSession->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $loginSession->has('user') ? $this->Html->link($loginSession->user->id, ['controller' => 'Users', 'action' => 'view', $loginSession->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Session Token') ?></th>
            <td><?= h($loginSession->session_token) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($loginSession->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Time') ?></th>
            <td><?= h($loginSession->start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('End Time') ?></th>
            <td><?= h($loginSession->end_time) ?></td>
        </tr>
    </table>
</div>
