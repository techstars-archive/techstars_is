<h1><b>tech</b>stars is...</h1>

<br />

<?php
echo $this->Form->create('Statement');
echo $this->Form->input('body',
                        array('label' => 'Please Tell Us: TechStars is...',
                              'rows' => '1',
                              'maxlength' => '50'));
echo $this->Form->input('name',
                        array('label' => 'And What\'s your name?',
                              'rows' => '1',
                              'maxlength' => '25'));

$options = array( Statement::TYPE_MENTOR => 'Mentor',
                  Statement::TYPE_FOUNDER => 'Founder',
                  Statement::TYPE_ASSOCIATE => 'Associate',
                  Statement::TYPE_HACKSTAR => 'HackStar',
                  Statement::TYPE_STAFF => 'Staff');

echo $this->Form->input('type',
                        array('label' => 'How are you affiliated with TechStars?',
                              'options' => $options));

echo $this->Form->input('company',
                        array('label' => 'If you\'re a TechStars founder, what\'s your company\'s name?',
                              'maxlength' => '25'));

echo $this->Form->end('Submit Your Response!');
?>