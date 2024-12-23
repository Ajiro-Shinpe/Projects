<?php
class Player
{
    //properties
    public $name;
    public $speed;
    public $health;
    public $score;

    // Methods of Our Class
    // Constructor - It allows you to initialize objects. It is the code which is executed whenever a new object is instantiated
    function __construct($name, $speed, $health, $score)
    {
        $this->name = $name;
        $this->speed = $speed;
        $this->health = $health;
        $this->score = $score;

        echo "Player Name $this->name <br>";
        echo "Player speed $this->speed <br>";
        echo " Player health $this->health <br>";
        echo "Player score $this->score <br>";
        echo "<br>";
    }
    function __destruct()
    {
        echo "detroying $this->name <br>";
    }
}

// Create the player object
$player1 = new Player("tommy", 5, "85%", 40);
$player2 = new Player("CJ", 7, "100%", 90);
