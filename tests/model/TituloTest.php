<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'model/Titulo.php');
class TituloTest extends TesteCase {

    /**
     * @var Titulo
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Titulo;
        $this->object->setId("1");
        $this->object->setNumero_titulo("1 WP");
        $this->object->setAssociado($this->getFKAssociado());
        $this->object->setData_socio("01/10/2018");
        $this->object->setId_tipo_titulo("1");
        $this->object->setId_situacao_titulo("1");
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Titulo::getTabela
     * @todo   Implement testGetTabela().
     */
    public function testGetTabela() {
       $this->assertEquals('TITULO', $this->object->getTabela());
    }

    /**
     * @covers Titulo::getId
     * @todo   Implement testGetId().
     */
    public function testGetId() {
        $this->assertEquals('1', $this->object->getId());
    }

    /**
     * @covers Titulo::getNumero_titulo
     * @todo   Implement testGetNumero_titulo().
     */
    public function testGetNumero_titulo() {
        $this->assertEquals('1 WP', $this->object->getNumero_titulo());
    }

    /**
     * @covers Titulo::getAssociado
     * @todo   Implement testGetAssociado().
     */
    public function testGetAssociado() {
        $this->assertEquals($this->getFKAssociado(), $this->object->getAssociado());
    }

    /**
     * @covers Titulo::getData_socio
     * @todo   Implement testGetData_socio().
     */
    public function testGetData_socio() {
        $this->assertEquals('01/10/2018', $this->object->getData_socio());
    }

    /**
     * @covers Titulo::getId_tipo_titulo
     * @todo   Implement testGetId_tipo_titulo().
     */
    public function testGetId_tipo_titulo() {
        $this->assertEquals('1', $this->object->getId_tipo_titulo());
    }

    /**
     * @covers Titulo::getId_situacao_titulo
     * @todo   Implement testGetId_situacao_titulo().
     */
    public function testGetId_situacao_titulo() {
        $this->assertEquals('1', $this->object->getId_situacao_titulo());
    }

    public function getFKAssociado() {
        $obj = new Associado();

        $obj->setID('1');
        $obj->setNome('Fulano de Tal');

        return $obj;
    }

}
