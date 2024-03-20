<?php
class User
{
	public string $name;
	public string $surname;
	public string $username;
    protected bool $is_admin = false;
	
	public function __construct(string $name, string $surname, string $username) {
		$this->name = $name;
		$this->surname = $surname;
		$this->username = $username;
	}

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function printFullName()
    {
        if ($this->isAdmin()) echo $this->name . " " . $this->surname . " (admin)" . PHP_EOL;
        else echo $this->name . " " . $this->surname . PHP_EOL;
    }
}

class Client extends User
{
	private string $city;
	private string $state;
	private string $country;
	
	public function __construct(string $name, string $surname, string $username) {
        parent::__construct($name, $surname, $username);
	}

    /**
     * @return mixed
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function location(): string
    {
        return $this->city . "," . $this->state . "," . $this->country;
    }
}

class Admin extends User
{
    public function __construct(string $name, string $surname, string $username) {
        parent::__construct($name, $surname, $username);
        $this->is_admin = true;
    }
}

$user = new User("Adam", "fdgnjklwen", "user");
$client = new Client("Mariusz", "dfsnklsf", "client");
$client->setCity("Toruń");
$client->setState("Kansas");
$client->setCountry("Polska");
$admin = new Admin("Krzysztof", "fewjiogwje", "admin");

$user->printFullName();
echo $user->username . PHP_EOL;
echo $user->isAdmin() . PHP_EOL;

$client->printFullName();
echo $client->username . PHP_EOL;
echo $client->isAdmin() . PHP_EOL;
echo $client->location() . PHP_EOL;

$admin->printFullName();
echo $admin->username . PHP_EOL;
echo $admin->isAdmin() . PHP_EOL;
?>
