<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        $storage = new Zend_Mail_Storage_Imap(array('host' => 'stud.prz.edu.pl',
            'user' => '',
            'password' => '',
            'ssl' => 'SSL'));
        $i=1;
        foreach ($storage as $message) {
//		$message=$storage->getMessage(1);
            echo '----------------------<br />' . "\n";
            echo "From: " . $message->from . "<br />\n";
            echo "To: " . $message->to . "<br />\n";
            echo "Time: " . date("Y-m-d H:s", strtotime($message->date)) . "<br />\n";
            echo "Subject: " . $message->subject . "<br />\n";
            echo "<br />";
            echo utf8_decode($message->getContent());
            if($i==10) break;
            $i++;
        }
    }

}
