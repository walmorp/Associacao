<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/DaoRelatorioGerencial.php');
class DaoRelatorioGerencialTest extends TesteCase {

    /**
     * @var DaoRelatorioGerencial
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DaoRelatorioGerencial;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DaoRelatorioGerencial::getClassView
     * @todo   Implement testGetClassView().
     */
    public function testGetClassView() {
       $this->assertEquals('RelatorioGerencial', $this->object->getClassView());
    }

    /**
     * @covers DaoRelatorioGerencial::executaView
     * @todo   Implement testExecutaView().
     */
    public function testExecutaView() {
        $this->assertEquals(true, $this->object->executaView());
    }

    /**
     * @covers DaoRelatorioGerencial::mostraRelatorio
     * @todo   Implement testMostraRelatorio().
     */
    public function testMostraRelatorio() {
       $this->assertEquals(true, $this->object->mostraRelatorio());
    }

}
