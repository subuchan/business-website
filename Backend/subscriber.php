<?php 
require 'database.php'; 

class Subscriber extends Database{ 

    private $name, $email, $subject,$message;

    function __construct()
    { 
        parent::__construct();
    } 

    public function save_subscriber()
    {
        $query = "INSERT INTO `clients`(`name` , `email`, `subject` , `message`) VALUES(?, ? , ? , ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $this->name, $this->email , $this->subject, $this->message);
        $success = $stmt->execute();
        if($success) {
            $data['success'] = TRUE;
            $data['message'] = "Hi ".$this->name."!<br />Thank you for submitting your information,We ll Contact You Soon.";
        } else if ($stmt->errno) {
            $data['success'] = FALSE;
            $data['message'] = $stmt->error;
        }
        return $data;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }
    
    public function setMessage($message) {
        $this->message = $message;
    }

}