<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/DaoRelatorioCobrador.php');
class DaoRelatorioCobradorTest extends TesteCase {

    /**
     * @var DaoRelatorioCobrador
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DaoRelatorioCobrador;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DaoRelatorioCobrador::getClassView
     * @todo   Implement testGetClassView().
     */
    public function testGetClassView() {
       $this->assertEquals('RelatorioCobrador', $this->object->getClassView());
    }

    /**
     * @covers DaoRelatorioCobrador::executaView
     * @todo   Implement testExecutaView().
     */
    public function testExecutaView() {
        $this->assertEquals(true, $this->object->executaView());
    }

    /**
     * @covers DaoRelatorioCobrador::mostraRelatorio
     * @todo   Implement testMostraRelatorio().
     */
    public function testMostraRelatorio() {
       $this->assertEquals(true, $this->object->mostraRelatorio());
    }

}
