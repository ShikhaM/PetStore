<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $loginSession->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $loginSession->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Login Session'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loginSession form large-9 medium-8 columns content">
    <?= $this->Form->create($loginSession) ?>
    <fieldset>
        <legend><?= __('Edit Login Session') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('start_time');
            echo $this->Form->input('session_token');
            echo $this->Form->input('end_time', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
