<?php
    class Statement extends AppModel {
        var $name = 'Statement';
        var $displayField = 'name';
        var $validate = array('body' => array('between' => array('rule' => array('between',5, 50),
                                                                 'message' => 'Must be between 5 to 50 characters')),
                              'name' => array('between' => array('rule' => array('between',5, 50),
                                                                 'message' => 'Must be between 5 to 50 characters')),
                              'type' => array('rule' => 'notEmpty'),
                              'company' => array('maxlength' => array('rule' => array('maxLength', '50'),
                                                                      'message' => 'Must be between 5 to 50 characters'))

                              );

        const STATUS_PENDING   = 0;
        const STATUS_APPROVED  = 1;

        const TYPE_MENTOR      = 0;
        const TYPE_FOUNDER     = 1;
        const TYPE_ASSOCIATE   = 2;
        const TYPE_HACKSTAR    = 3;
        const TYPE_STAFF       = 4;
        
    }

?>