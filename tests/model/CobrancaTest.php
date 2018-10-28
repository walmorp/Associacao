<?php
  require_once ('defineVar.php');
  require_once (__TEST_.'TesteCase.php');
  require_once (__APP_.'model/Cobranca.php');
class CobrancaTest extends TesteCase {

    /**
     * @var Cobranca
     */
    protected $object;
    protected $objTitulo;
    protected $objAssociado;
    protected $objTipoCobranca;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Cobranca;
        $this->object->setId("1");
        $this->object->setTitulo($this->getFKTitulo());
        $this->object->setAssociado($this->getFKAssociado());
        $this->object->setTipoCobranca($this->getFKTipoCobranca());
        $this->object->setId_situacao_baixa("2");
        $this->object->setData_registro_parcela("01/01/2018");
        $this->object->setData_vencimento("10/10/2018");
        $this->object->setData_baixa("10/10/2018");
        $this->object->setData_registro_baixa("10/10/2018");
        $this->object->setValor_nominal("100");
        $this->object->setValor_acrescimo("10");
        $this->object->setValor_abatimentos("0");
        $this->object->setValor_baixado("110");
    }
    
    public function testSet() {
       $this->assertEquals(null, $this->object->setId("1"));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Cobranca::getTabela
     * @todo   Implement testGetTabela().
     */
    public function testGetTabela() {
       $this->assertEquals('COBRANCA', $this->object->getTabela());
    }

    /**
     * @covers Cobranca::getId
     * @todo   Implement testGetId().
     */
    public function testGetId() {
        $this->assertEquals('1', $this->object->getId());
    }

    /**
     * @covers Cobranca::getTitulo
     * @todo   Implement testGetTitulo().
     */
    public function testGetTitulo() {
        $this->assertEquals($this->getFKTitulo(), $this->object->getTitulo());
    }

    /**
     * @covers Cobranca::getAssociado
     * @todo   Implement testGetAssociado().
     */
    public function testGetAssociado() {
        $this->assertEquals($this->getFKAssociado(), $this->object->getAssociado());
    }

    /**
     * @covers Cobranca::getTipoCobranca
     * @todo   Implement testGetTipoCobranca().
     */
    public function testGetTipoCobranca() {
        $this->assertEquals($this->getFKTipoCobranca(), $this->object->getTipoCobranca());
    }

    /**
     * @covers Cobranca::getId_situacao_baixa
     * @todo   Implement testGetId_situacao_baixa().
     */
    public function testGetId_situacao_baixa() {
        $this->assertEquals('2', $this->object->getId_situacao_baixa());
    }

    /**
     * @covers Cobranca::getData_registro_parcela
     * @todo   Implement testGetData_registro_parcela().
     */
    public function testGetData_registro_parcela() {
        $this->assertEquals('01/01/2018', $this->object->getData_registro_parcela());
    }

    /**
     * @covers Cobranca::getData_vencimento
     * @todo   Implement testGetData_vencimento().
     */
    public function testGetData_vencimento() {
        $this->assertEquals('10/10/2018', $this->object->getData_vencimento());
    }

    /**
     * @covers Cobranca::getData_baixa
     * @todo   Implement testGetData_baixa().
     */
    public function testGetData_baixa() {
        $this->assertEquals('10/10/2018', $this->object->getData_baixa());
    }

    /**
     * @covers Cobranca::getData_registro_baixa
     * @todo   Implement testGetData_registro_baixa().
     */
    public function testGetData_registro_baixa() {
        $this->assertEquals('10/10/2018', $this->object->getData_registro_baixa());
    }

    /**
     * @covers Cobranca::getValor_nominal
     * @todo   Implement testGetValor_nominal().
     */
    public function testGetValor_nominal() {
        $this->assertEquals('100', $this->object->getValor_nominal());
    }

    /**
     * @covers Cobranca::getValor_acrescimo
     * @todo   Implement testGetValor_acrescimo().
     */
    public function testGetValor_acrescimo() {
        $this->assertEquals('10', $this->object->getValor_acrescimo());
    }

    /**
     * @covers Cobranca::getValor_abatimentos
     * @todo   Implement testGetValor_abatimentos().
     */
    public function testGetValor_abatimentos() {
        $this->assertEquals('0', $this->object->getValor_abatimentos());
    }

    /**
     * @covers Cobranca::getValor_baixado
     * @todo   Implement testGetValor_baixado().
     */
    public function testGetValor_baixado() {
        $this->assertEquals('110', $this->object->getValor_baixado());
    }

    public function getFKTitulo() {
        $obj = new Titulo();

        $obj->setID('1');

        return $obj;
    }

    public function getFKAssociado() {
        $obj = new Associado();

        $obj->setID('1');
        $obj->setNome('Fulano de Tal');

        return $obj;
    }

    public function getFKTipoCobranca() {
        $obj = new TipoCobranca();

        $obj->setID('1');

        return $obj;
    }

}
