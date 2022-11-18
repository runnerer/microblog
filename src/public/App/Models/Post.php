<?php

namespace App\Models;

use Psr\Container\ContainerInterface;

class Post {
    private $tableName = "posts";
    private $table;

    public function __construct(ContainerInterface $container) {
        $this->table = $container->get('db')->table($this->tableName);
    }

    public function get() {
        return $this->table->get();
    }

    public function create($data) {
        return $this->table->insert($data);
    }

    public function update($id, $data) {
        return $this->table->where('id', $id)->update($data);
    }
}