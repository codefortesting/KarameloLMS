<?php
/*
 * Chipotle Software(c) 2012
 * File: APP/Test/Fixture/VclassroomFixture.php
 */
class VclassroomFixture extends CakeTestFixture {
    
 /*
  * Optional Importing table information and records
  */
   #public $import = array('Model' => array('Vclassroom'), 'connection' => 'default');

    /* Optional. Set this property to load fixtures to a different test datasource */
    public $useDbConfig = 'test';

    public $fields = array(
                       'id'        => array('type' => 'integer', 'key' => 'primary'),
                       'quote'     => array('type' => 'string', 'length' => 255, 'null' => False),
                       'author'    => array('type' => 'string', 'length' => 255, 'null' => False),
                       'user_id'   => 'integer'
                       );

    public $records = array(
                            array('id'          => 1, 
                                  'quote'       => 'Vclassroom Vclassroom Vclassroom ',
                                  'author'      => 'Author 111 Author 111 Author 111 Author 111 ', 
                                  'user_id'     => 1
                                  ),
                            array('id'          => 2, 
                                  'quote'       => 'Second  Students List', 
                                  'author'      => 'Author 222 Author 222Author 222Author 222', 
                                  'user_id'     => 1),
                            array('id'          => 3, 
                                  'quote'       => 'Vclassroom 333 Vclassroom 333   ',
                                  'author'      => 'Author 333 Author 333 Author 333 Author 333 ', 
                                  'user_id'     => 1)
                            );
 }

# ? > EOF
