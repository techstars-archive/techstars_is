<h1 style="text-align: center;"><b>tech</b>stars is...</h1>

<script type="text/javascript">
    $(document).ready(function(){
        $.ajax(
            {async:true,
             dataType:"html",
             success:function(data, textStatus) {$("#quote").html(data);},
             url:"\/statements\/random"}
        );
        return false;
    });
</script>

<div id="wrapper">
  <?php
    $this->Js->get('#what');
    $this->Js->event('click',
                     $this->Js->request(array('controller' => 'statements',
                                              'action' => 'random'),
                                        array('async' => true,
                                              'update' => '#quote')));
  ?>
  <div id="quote"><p></p></div>
</div>

<div style="text-align: center;">
<?php
    $questions = array('Oh cool! What else?',
                       'Awesome! Anything else?',
                       'Super cool! What else?',
                       'Great! What else is TechStars?',                       
                       'Neat! What else you got?',
                       'Awesome! What else is TechStars?');
    echo $this->Html->link(__($questions[array_rand($questions)], true),'',
                           array('id' => 'what'));
?>
</div>
      
<br />
<br />

<div style="text-align: center;">
<?php
echo $this->Html->link(__('Did we forget something?', true),
                       array('controller' => 'statements',
                             'action' => 'add'),
                       array('id' => 'submit'));
?>

<?php echo $this->Js->writeBuffer(); ?>
</div>


