<?php
    class Employee{
        private $name = "bla bla";
        private $salary = 150;
        
        function setName($name){
            $this->name = $name;
        }
        function showname(){
            echo "emp name :  $this->name <br>";
        }
    }
    
    class Programmer extends Employee{
        private $language = "PHP";
        
        function setLanguage($language){
            $this->language = $language;
        }
        function showLanguage(){
            echo "emp language :  $this->language <br>";
        }
    }

    $emp = new Employee();
    $emp->setName("John Doe");
    $emp->showname();

    $emp2 = new Programmer();
    $emp2->setName("natasha");
    $emp2->showname();
    $emp2->setLanguage("Java");
    $emp2->showLanguage();
?>