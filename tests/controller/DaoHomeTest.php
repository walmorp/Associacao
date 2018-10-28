<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/DaoHome.php');
class DaoHomeTest extends TesteCase {

    /**
     * @var DaoHome
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DaoHome;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DaoHome::getClassView
     * @todo   Implement testGetClassView().
     */
    public function testGetClassView() {
       $this->assertEquals('Home', $this->object->getClassView());
    }

    /**
     * @covers DaoHome::executaView
     * @todo   Implement testExecutaView().
     */
    public function testExecutaView() {
        $this->assertEquals(true, $this->object->executaView());
    }

    /**
     * @covers DaoHome::mostraParcelasEmAberto
     * @todo   Implement testMostraParcelasEmAberto().
     */
    public function testMostraParcelasEmAberto() {
        $this->assertEquals(true, $this->object->mostraParcelasEmAberto());
    }

    /**
     * @covers DaoHome::mostraAssociadosAtivos
     * @todo   Implement testMostraAssociadosAtivos().
     */
    public function testMostraAssociadosAtivos() {
        $this->assertEquals(true, $this->object->mostraAssociadosAtivos());
    }

    /**
     * @covers DaoHome::mostraTitulosAtivos
     * @todo   Implement testMostraTitulosAtivos().
     */
    public function testMostraTitulosAtivos() {
       $this->assertEquals(true, $this->object->mostraTitulosAtivos());
    }

}
