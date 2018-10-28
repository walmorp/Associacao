<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'model/TipoCobranca.php');
class TipoCobrancaTest extends TesteCase {

    /**
     * @var TipoCobranca
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new TipoCobranca;
        $this->object->setId("1");
        $this->object->setDescricao("Venda de título");
        $this->object->setSigla("VT");
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }
    
    public function testSet() {
       $this->assertEquals(null, $this->object->setId("1"));
    }

    /**
     * @covers TipoCobranca::getTabela
     * @todo   Implement testGetTabela().
     */
    public function testGetTabela() {
       $this->assertEquals('TIPO_COBRANCA', $this->object->getTabela());
    }

    /**
     * @covers TipoCobranca::getId
     * @todo   Implement testGetId().
     */
    public function testGetId() {
        $this->assertEquals('1', $this->object->getId());
    }

    /**
     * @covers TipoCobranca::getDescricao
     * @todo   Implement testGetDescricao().
     */
    public function testGetDescricao() {
        $this->assertEquals('Venda de título', $this->object->getDescricao());
    }

    /**
     * @covers TipoCobranca::getSigla
     * @todo   Implement testGetSigla().
     */
    public function testGetSigla() {
        $this->assertEquals('VT', $this->object->getSigla());
    }

}
