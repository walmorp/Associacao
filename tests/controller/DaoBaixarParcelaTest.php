<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/Conexao.php');
  require_once (__APP_.'controller/DaoBaixarParcela.php');
class DaoBaixarParcelaTest extends TesteCase {

    /**
     * @var DaoBaixarParcela
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DaoBaixarParcela;
        $_GET['id']='5';
        $_GET['$dataBaixa']='10/10/2018';
        $_GET['valorNominal']='100';
        $_GET['valorAcrescimo']='10';
        $_GET['valorAbatimento']='10';
        $_GET['valorBaixado']='100';
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DaoBaixarParcela::getClassView
     * @todo   Implement testGetClassView().
     */
    public function testGetClassView() {
       $this->assertEquals('BaixarParcela', $this->object->getClassView());
    }

    /**
     * @covers DaoBaixarParcela::executaView
     * @todo   Implement testExecutaView().
     */
    public function testExecutaView() {
       $this->assertEquals(true, $this->object->executaView());
    }

    /**
     * @covers DaoBaixarParcela::gravar
     * @todo   Implement testGravar().
     */
    public function testGravar() {
       $this->assertEquals(true, $this->object->gravar());
    }

    /**
     * @covers DaoBaixarParcela::getParcela
     * @todo   Implement testGetParcela().
     */
    public function testGetParcela() {
       $this->assertInstanceOf('stdClass', ibase_fetch_object($this->object->getParcela()));
    }

}
