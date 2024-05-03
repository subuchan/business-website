<?php
 require_once 'subscriber.php';
$subscriber = new Subscriber();

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$subject = filter_input(INPUT_POST, 'subject');
$message = filter_input(INPUT_POST, 'message');


$subscriber->setName($name);
$subscriber->setEmail($email);
$subscriber->setSubject($subject);
$subscriber->setMessage($message);
$result = $subscriber->save_subscriber();
echo json_encode($result);

?>