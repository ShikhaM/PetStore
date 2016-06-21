<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pet Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="petDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($petDetail) ?>
    <fieldset>
        <legend><?= __('Add Pet Detail') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('name');
            echo $this->Form->input('species');
            echo $this->Form->input('subspecies');
            echo $this->Form->input('dob');
            echo $this->Form->input('weight');
            echo $this->Form->input('price');
            echo $this->Form->input('description');
            echo $this->Form->input('colour');
            echo $this->Form->input('collection_location');
            echo $this->Form->input('image_url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
