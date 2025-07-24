<?php
class User {
    protected $age = 25;
    protected function getAge() {
        return $this->age;
    }
}
class Admin extends User {
    public function showAge() {
        return $this->getAge();
    }
}
