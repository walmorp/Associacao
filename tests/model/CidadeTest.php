<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'model/Cidade.php');
class CidadeTest extends TesteCase {

    /**
     * @var Cidade
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Cidade;
        $this->object->setID('1');
        $this->object->setNome('Criciúma');
        $this->object->setSigla_uf('SC');
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
     * @covers Cidade::getTabela
     * @todo   Implement testGetTabela().
     */
    public function testGetTabela() {
       $this->assertEquals('CIDADE', $this->object->getTabela());
    }

    /**
     * @covers Cidade::getId
     * @todo   Implement testGetId().
     */
    public function testGetId() {
        $this->assertEquals('1', $this->object->getId());
    }

    /**
     * @covers Cidade::getNome
     * @todo   Implement testGetNome().
     */
    public function testGetNome() {
        $this->assertEquals('Criciúma', $this->object->getNome());
    }

    /**
     * @covers Cidade::getSigla_uf
     * @todo   Implement testGetSigla_uf().
     */
    public function testGetSigla_uf() {
        $this->assertEquals('SC', $this->object->getSigla_uf());
    }

}
