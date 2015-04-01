<?php
/**
 * Created by PhpStorm.
 * User: orlando
 * Date: 01/04/15
 * Time: 15:16
 */

namespace RT\Database;

class DadosTest extends \PHPUnit_Framework_TestCase
{
    private $db;

    public function setUp()
    {
        $this->db = new ServicesDB();
    }

    public function tearDown()
    {
        $this->db = null;
    }

    public function testVerificaSeRetornaUmaConexao()
    {
        $this->assertInstanceOf('\PDO', $this->db->conexao());
    }
}