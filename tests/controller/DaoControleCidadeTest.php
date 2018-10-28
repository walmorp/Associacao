<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/DaoControleCidade.php');
class DaoControleCidadeTest extends TesteCase {

    /**
     * @var DaoControleCidade
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DaoControleCidade;
        $_GET['id']='1';
        $_GET['nome']='Criciúma';
        $_GET['siglaUF']='SC';
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DaoControleCidade::getTabela
     * @todo   Implement testGetTabela().
     */
    public function testGetTabela() {
       $this->assertEquals('CIDADE', $this->object->getTabela());
    }

    /**
     * @covers DaoControleCidade::getClassModel
     * @todo   Implement testGetClassModel().
     */
    public function testGetClassModel() {
       $this->assertEquals('Cidade', $this->object->getClassModel());
    }

    /**
     * @covers DaoControleCidade::getClassView
     * @todo   Implement testGetClassView().
     */
    public function testGetClassView() {
       $this->assertEquals('ControleCidade', $this->object->getClassView());
    }

    /**
     * @covers DaoControleCidade::executaView
     * @todo   Implement testExecutaView().
     */
    public function testExecutaView() {
        $this->assertEquals(true, $this->object->executaView());
    }

    /**
     * @covers DaoControleCidade::gravar
     * @todo   Implement testGravar().
     */
    public function testGravar() {
       $this->assertEquals(true, $this->object->gravar());
    }

    /**
     * @covers DaoControleCidade::existe
     * @todo   Implement testExiste().
     */
    public function testExiste() {
       $this->assertEquals(true, $this->object->existe('1'));
    }

    /**
     * @covers DaoControleCidade::insere
     * @todo   Implement testInsere().
     */
    public function testInsere() {
       $this->assertEquals(true, $this->object->insere());
    }

    /**
     * @covers DaoControleCidade::altera
     * @todo   Implement testAltera().
     */
    public function testAltera() {
       $this->assertEquals(true, $this->object->altera());
    }

    /**
     * @covers DaoControleCidade::apaga
     * @todo   Implement testApaga().
     */
    public function testApaga() {
       $this->assertEquals(true, $this->object->apaga('0'));
    }

    /**
     * @covers DaoControleCidade::ler
     * @todo   Implement testLer().
     */
    public function testLer() {
       $this->assertContains(false, $this->object->ler('0'));
    }

    /**
     * @covers DaoControleCidade::lista
     * @todo   Implement testLista().
     */
    public function testLista() {
       $this->assertEquals(true, $this->object->lista());
    }

}
