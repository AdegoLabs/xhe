<?php

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}

include 'madeline.php';

$message = "И захотели... КАКАО КО-КО-КО КО-КО-КО-КО!!!!";
$contactPhone = '380992209347';

$MP = new \danog\MadelineProto\API('session.madeline3');
$MP->start();

$contact = ['_' => 'inputPhoneContact', 'client_id' => 0, 'phone' => $contactPhone, 'first_name' => 'Test', 'last_name' => 'Test2'];
$import = $MP->contacts->importContacts(['contacts' => [$contact]]);
$contactId = $import['imported'][0]['user_id'];

$MP->messages->sendMessage(['peer' => $contactId, 'message' => $message]);