<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/Conexao.php');
class ConexaoTest extends TesteCase {

    /**
     * @var Conexao
     */
    protected $object;
    protected $conexao;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Conexao();
        $this->conexao=$this->object->getConexao();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }
    public function testConexao() {
       $this->assertInstanceOf('Conexao', new Conexao());
    }

    /**
     * @covers Conexao::getConexao
     * @todo   Implement testGetConexao().
     */
    public function testGetConexao() {
       $this->assertEquals($this->conexao, $this->object->getConexao());
    }

    /**
     * @covers Conexao::freeResult
     * @todo   Implement testFreeResult().
     */
    public function testFreeResult() {
       $this->assertEquals(true, $this->object->freeResult($this->conexao));
       $this->assertEquals(true, $this->object->freeResult($this->conexao));
       //$this->assertEquals(false, $this->object->freeResult(null));
    }

    /**
     * @covers Conexao::query
     * @todo   Implement testQuery().
     */
    public function testQuery() {
       $this->assertInstanceOf('stdClass', ibase_fetch_object($this->object->query("SELECT 'true' from rdb\$database")));
       $this->assertEquals(false, $this->object->query("SELECT 'true' from XXXXXX"));
       $this->assertEquals(false, $this->object->query("INSERT INTO TIPO_COBRANCA (ID, DESCRICAO, SIGLA) VALUES (1, 'Tipo Cobranca', 'TC');"));
       $this->assertEquals(false, $this->object->query("DELETE FROM TIPO_COBRANCA WHERE (ID = 1);"));
       $this->assertEquals(false, $this->object->query("UPDATE ASSOCIADO SET NASCIMENTO = '2010-01-01' WHERE (ID = 1);"));
    }

    /**
     * @covers Conexao::fecha
     * @todo   Implement testFecha().
     */
    public function testFecha() {
       $this->assertEquals(true, $this->object->fecha());
    }

}
