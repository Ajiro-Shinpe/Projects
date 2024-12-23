<?php
    class Employee{
        // private $name = "bla bla";
        // private $salary = 150;

        public $name = "bla bla";
        public $salary = 150;

        public function __construct($name , $salary) {
            $this->name = $name;
            $this->salary = $salary;
            $this->describe();
        }
        protected function describe(){
            echo "Emp details : <br>";
            echo "emp name :  $this->name <br>";          
            echo "emp salary :  $this->salary <br>";     
        }
    }
    
    class Programmer extends Employee{
        private $language = "PHP";
        function __construct($name , $language , $salary)
        {   
            $this->name = $name;
            $this->language = $language;
            $this->salary = $salary;
            $this->describe();
            echo "emp language: $this->language <br> <br>";
        }
    }

$emp = new Employee("abc",20000);
$emp2 = new Programmer("bbg","python",100000);

?>