<?php
class Player
{
    public $name;
    // Set the player's name
    function set_name($name)
    {
        $this->name = $name;
        return $this->name;
    }
    function get_name()
    {
        return $this->name;
    }
}

// Create the player object
$player1 = new Player();
$player1->set_name("Tommy");
echo $player1->get_name();
?>