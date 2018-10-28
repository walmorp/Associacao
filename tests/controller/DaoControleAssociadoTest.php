<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'controller/DaoControleAssociado.php');
class DaoControleAssociadoTest extends TesteCase {

    /**
     * @var DaoControleAssociado
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DaoControleAssociado;
        $_GET['id']='1';
        $_GET['nome']='Fulano de Tal';
        $_GET['genero']='1';
        $_GET['endereco']='Rua Geral';
        $_GET['nascimento']='01/01/1980';
        $_GET['cpf']='652.392.539-00';
        $_GET['cidade']='1';
        $_GET['situacao']='1';
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers DaoControleAssociado::getTabela
     * @todo   Implement testGetTabela().
     */
    public function testGetTabela() {
       $this->assertEquals('ASSOCIADO', $this->object->getTabela());
    }

    /**
     * @covers DaoControleAssociado::getClassModel
     * @todo   Implement testGetClassModel().
     */
    public function testGetClassModel() {
       $this->assertEquals('Associado', $this->object->getClassModel());
    }

    /**
     * @covers DaoControleAssociado::getClassView
     * @todo   Implement testGetClassView().
     */
    public function testGetClassView() {
       $this->assertEquals('ControleAssociado', $this->object->getClassView());
    }

    /**
     * @covers DaoControleAssociado::executaView
     * @todo   Implement testExecutaView().
     */
    public function testExecutaView() {
       $this->assertEquals(true, $this->object->executaView());
    }

    /**
     * @covers DaoControleAssociado::insere
     * @todo   Implement testInsere().
     */
    public function testInsere() {
       $this->assertEquals(true, $this->object->insere());
       $_GET['nascimento']='2018';
       $this->assertEquals(false, $this->object->insere());
    }

    /**
     * @covers DaoControleAssociado::existe
     * @todo   Implement testExiste().
     */
    public function testExiste() {
       $this->assertEquals(true, $this->object->existe('1'));
       $this->assertEquals(false, $this->object->existe('0'));
    }

    /**
     * @covers DaoControleAssociado::apaga
     * @todo   Implement testApaga().
     */
    public function testApaga() {
       $this->assertEquals(true, $this->object->apaga('0'));
       $this->assertEquals(false, $this->object->apaga('1'));
    }

    /**
     * @covers DaoControleAssociado::altera
     * @todo   Implement testAltera().
     */
    public function testAltera() {
       $this->assertEquals(true, $this->object->altera());
       $_GET['id']='0';
       $this->assertEquals(false, $this->object->altera());
    }

    /**
     * @covers DaoControleAssociado::gravar
     * @todo   Implement testGravar().
     */
    public function testGravar() {
       $this->assertEquals(true, $this->object->gravar());
       unSet($_GET['id']);
       $this->assertEquals(true, $this->object->gravar());
    }

    /**
     * @covers DaoControleAssociado::ler
     * @todo   Implement testLer().
     */
    public function testLer() {
       $this->assertContains(true, $this->object->ler('1'));
       $this->assertContains(false, $this->object->ler('0'));
    }

    /**
     * @covers DaoControleAssociado::lista
     * @todo   Implement testLista().
     */
    public function testLista() {
       $this->assertEquals(true, $this->object->lista());
       $_GET['opSA']='I';
       $this->assertEquals(true, $this->object->lista("A"));
    }

}
?>