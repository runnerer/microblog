<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config['db']['host'] = $_ENV['host'];
$config['db']['username'] = $_ENV['username'];
$config['db']['password'] = $_ENV['password'];
$config['db']['database'] = $_ENV['database'];

$config['db']['driver'] = $_ENV['driver'];
$config['db']['charset'] = $_ENV['charset'];
$config['db']['collation'] = $_ENV['collation'];
$config['db']['prefix'] = $_ENV['prefix'];