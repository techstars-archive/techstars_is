<h1><b>tech</b>stars is...</h1>

<h2>Register</h2>

<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end(__('Submit', true));
?>
