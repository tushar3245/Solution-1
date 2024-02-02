<?php
class Car {
    public $name;
    public $model;
    public $year;

    public function __construct($name, $model, $year) {
        $this->name = $name;
        $this->model = $model;
        $this->year = $year;
    }
    public function displayCarInfo() {
        return "{$this->year} {$this->name} {$this->model}";
    }
}

class ElectricCar extends Car {
    public $batteryCapacity;

    public function __construct($name, $model, $year, $batteryCapacity) {
        parent::__construct($name, $model, $year);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function displayCarInfo() {
        return parent::displayCarInfo() . "\nBattery Capacity: {$this->batteryCapacity} kWh";
    }
}

class GasCar extends Car {
    public $fuelEfficiency;

    public function __construct($name, $model, $year, $fuelEfficiency) {
        parent::__construct($name, $model, $year);
        $this->fuelEfficiency = $fuelEfficiency;
    }

    public function displayCarInfo() {
        return parent::displayCarInfo() . "\nFuel Efficiency: {$this->fuelEfficiency} MPG";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carType = $_POST['carType'];
    $name = $_POST['name'];
    $model = $_POST['model'];
    $year = $_POST['year'];

    if ($carType == 'Electric') {
        $batteryCapacity = $_POST['batteryCapacity'];
        $car = new ElectricCar($name, $model, $year, $batteryCapacity);
    } else {
        $fuelEfficiency = $_POST['fuelEfficiency'];
        $car = new GasCar($name, $model, $year, $fuelEfficiency);
    }

    echo "<h2>Car Information:</h2>";
    echo $car->displayCarInfo();
}
?>
