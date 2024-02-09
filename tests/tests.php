<?php
use PHPUnit\Framework\TestCase;
use config.php;
use Crud.php;

namespace QuantumArcade\Tests;

class CrudTest extends TestCase
{
    public function testGetDBConnection()
    {
        $crud = new Crud();
        $this->assertIsTrue($crud->getDBConnection());
    }

    public function testCreate()
    {
        $crud = new Crud();
        $passHash = password_hash("guest", PASSWORD_DEFAULT);
        $this->assertIsTrue($crud->create(["username" => "guest", "email" => "guest@guest.com", "passHash" => $passHash], "users"));
    }

    public function testLogin()
    {
        $crud = new Crud();
        $this->assertIsTrue($crud->login());
    }
}
