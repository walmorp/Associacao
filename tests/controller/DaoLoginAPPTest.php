<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/DaoLoginAPP.php');
class DaoLoginAPPTest extends TesteCase {

    /**
     * @var DaoLoginAPP
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DaoLoginAPP;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DaoLoginAPP::getClassView
     * @todo   Implement testGetClassView().
     */
    public function testGetClassView() {
       $this->assertEquals('LoginAPP', $this->object->getClassView());
    }

    /**
     * @covers DaoLoginAPP::executaView
     * @todo   Implement testExecutaView().
     */
    public function testExecutaView() {
        $this->assertEquals(true, $this->object->executaView());
    }

    /**
     * @covers DaoLoginAPP::execLogin
     * @todo   Implement testExecLogin().
     */
    public function testExecLogin() {
        $_GET['id']='1';
        $_GET['cpf']='652.392.539-00';
        $this->assertEquals("Fulano de Tal", $this->object->execLogin());

        $_GET['id']='';
        $_GET['cpf']='';
        $this->assertEquals(true, $this->object->execLogin());
    }

}
