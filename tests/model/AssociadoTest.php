<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'model/Associado.php');
class AssociadoTest extends TesteCase {

    /**
     * @var Associado
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Associado();
        $this->object->setId("1");
        $this->object->setNome("Fulano de Tal");
        $this->object->setId_genero("2");
        $this->object->setEndereco("Rua Geral");
        $this->object->setNascimento("01/01/2001");
        $this->object->setCpf("111.111.111-11");
        $this->object->setCidade($this->getFKCidade());
        $this->object->setId_situacao("1");
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
     * @covers Associado::getTabela
     * @todo   Implement testGetTabela().
     */
    public function testGetTabela() {
       $this->assertEquals('ASSOCIADO', $this->object->getTabela());
    }

    /**
     * @covers Associado::getId
     * @todo   Implement testGetId().
     */
    public function testGetId() {
        $this->assertEquals('1', $this->object->getId());
    }

    /**
     * @covers Associado::getNome
     * @todo   Implement testGetNome().
     */
    public function testGetNome() {
        $this->assertEquals('Fulano de Tal', $this->object->getNome());
    }

    /**
     * @covers Associado::getId_genero
     * @todo   Implement testGetId_genero().
     */
    public function testGetId_genero() {
        $this->assertEquals('2', $this->object->getId_genero());
    }

    /**
     * @covers Associado::getEndereco
     * @todo   Implement testGetEndereco().
     */
    public function testGetEndereco() {
        $this->assertEquals('Rua Geral', $this->object->getEndereco());
    }

    /**
     * @covers Associado::getNascimento
     * @todo   Implement testGetNascimento().
     */
    public function testGetNascimento() {
        $this->assertEquals('01/01/2001', $this->object->getNascimento());
    }

    /**
     * @covers Associado::getCpf
     * @todo   Implement testGetCpf().
     */
    public function testGetCpf() {
        $this->assertEquals('111.111.111-11', $this->object->getCpf());
    }

    /**
     * @covers Associado::getCidade
     * @todo   Implement testGetCidade().
     */
    public function testGetCidade() {
        $this->assertEquals($this->getFKCidade(), $this->object->getCidade());
    }

    /**
     * @covers Associado::getId_situacao
     * @todo   Implement testGetId_situacao().
     */
    public function testGetId_situacao() {
        $this->assertEquals('1', $this->object->getId_situacao());
    }

    public function getFKCidade() {
        $objCidade = new Cidade();

        // Configura objCidade. 
        $objCidade->setID('1');
        $objCidade->setNome('Criciúma');
        $objCidade->setSigla_uf('SC');

        return $objCidade;
    }
}
