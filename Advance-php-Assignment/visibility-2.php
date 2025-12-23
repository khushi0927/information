<?php

class Account {
    public $username;         
    private $password;        
    protected $accountBalance; 

    public function __construct($username, $password, $balance) {
        $this->username = $username;
        $this->password = $password;
        $this->accountBalance = $balance;
    }


    public function getPassword() {
        return $this->password;
    }
}


class BankAccount extends Account {

    public function showAccountInfo() {
        echo "Username: " . $this->username . "<br>";       
        echo "Balance: ₹" . $this->accountBalance . "<br>"; 
      
        echo "Password: " . $this->getPassword() . "<br>"; 
}

}
$acc = new BankAccount("a", "aa123", 5000);
$acc->showAccountInfo();
?>
