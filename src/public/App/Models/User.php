<?php

namespace App\Models;

use Psr\Container\ContainerInterface;

class User {
    private $tableName = "users";
    private $table;

    public function __construct(ContainerInterface $container) {
        $this->table = $container->get('db')->table($this->tableName);
    }

    public function get() {
        return $this->table->get();
    }

    public function getByEmailAndPassword($email, $password) {
        return $this->table->where('email', $email)->where('password', $password)->get()->toArray();
    }
}