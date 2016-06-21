<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns content">
    <div class="panel">
        <h3 class="text-center">User Registration</h3>
        <?= $this->Form->create($user); ?>
        <?php
        echo $this->Form->input('fullname');
        echo $this->Form->input('email');
        echo $this->Form->input('phone');
        echo $this->Form->input('address');      
        echo $this->Form->input('username');     
        echo $this->Form->input('password');        
 ?>
            <?= $this->Form->submit('Register', array('class' => 'button')); ?>        
        <?= $this->Form->end(); ?>
    </div>
</div>
