<?php
/**
 * Chipotle Software(c) 2006-2012
 * GPLv3 License
 * File: APP/Test/Case/Model/MessageTest.php
 */

App::uses('Controller', 'Controller');
App::uses('Message', 'Model');

class MessageTestCase extends CakeTestCase {
 
 public $fixtures = array('app.quote', 'app.user');

 #public $dropTables = False;

 public function setUp() 
 {
     parent::setUp();
     $this->Message = ClassRegistry::init('Message');
 }

 # it "should return unauthorized without a valid session"
 # it "should return a populated array"
 public function testMyFunction() 
 {
     $this->loadFixtures('Message');
 }
 
 # it "should return unauthorized without a valid session"
 # it "should return a valid array"
 # it "should return a validate class attribute"
 # it "should return a populated array"
 public function testThreeMessages() 
 {
   $result  = $this->Message->threeMessages();
   $expected = array(
                     array('Message' => array(
                                      'id'      => 1,
                                      'quote'   => 'Message Message Message ',
                                      'author'  => 'Author 111 Author 111 Author 111 Author 111 ',
                                      'user_id' => 1
                                      )
                     ),
                     array('Message' => array(
                                      'id'      => 2,
                                      'quote'   => 'Second  Students List',
                                      'author'  => 'Author 222 Author 222Author 222Author 222',
                                      'user_id' => 1
                                         )
                        ),
                     array('Message' => array(
                                      'id'      => 3,
                                      'quote'   => 'Message 333 Message 333   ',
                                      'author'  => 'Author 333 Author 333 Author 333 Author 333 ',
                                      'user_id' => 1
                                         )
                           ));

  $this->assertEquals($expected, $result);
  $this->assertInternalType('array',$result);
  $this->assertClassHasAttribute('validate', 'Message');
 }
}

# ? > EOF
