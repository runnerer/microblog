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

    public function getByEmail($email) {
        return $this->table->where('email', $email)->get()->toArray();
    }

    public function create($userData) {
        return $this->table->insert([
            'email' => $userData['email'],
            'password' => $userData['password'],
            'name' => $userData['name']
        ]);
    }
}