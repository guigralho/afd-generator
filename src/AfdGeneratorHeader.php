<?php
namespace GuiGralho\AfdGenerator;

use GuiGralho\Util;

/**
 * Class AfdGeneratorHeader
 */
class AfdGeneratorHeader
{

	/**
	 * posição 001-009
	 * @var numeric
	 */
	protected $leading = '000000000';
	/**
	 * posição 010-010
	 * tipo do registro
	 * @var numeric
	 */
	protected $tipoRegistro = '1';

	/**
	 * posição 011-011
	 * tipo de identificador do empregador. 1 cnpj ou 2 cpf
	 * @var numeric
	 */
	protected $tipoEmpregador = '1';

	/**
	 * posição 012-025
	 * cpf ou cnpj do empregador
	 * @var numeric
	 */
	protected $docEmpregador;

	/**
	 * posição 026-037
	 * cei do empregador, quando existir
	 * @var numeric
	 */
	protected $ceiEmpregador;

	/**
	 * posição 038-187
	 * razão social ou nome do empregador
	 * @var string
	 */
	protected $nomeEmpregador;

	/**
	 * posição 188-204
	 * número de fabricação do REP
	 * @var numeric
	 */
	protected $numRep;

	/**
	 * posição 205-212
	 * data inicial dos registros no arquivo 'ddmmaaaa'
	 * @var numeric
	 */
	protected $dataInicial;

	/**
	 * posição 213-220
	 * data final dos registros no arquivo 'ddmmaaaa'
	 * @var numeric
	 */
	protected $dataFinal;

	/**
	 * posição 221-228
	 * data de geração arquivo 'ddmmaaaa'
	 * @var numeric
	 */
	protected $dataArquivo;

	/**
	 * posição 229-232
	 * hora de geração arquivo 'hhmm'
	 * @var numeric
	 */
	protected $horaArquivo;

	protected $string;

    /**
     * Construtor
     *
     * @param array $params Parâmetros iniciais para construção do objeto
     */
    public function __construct($params = [])
    {
        Util::fillClass($this, $params);
    }

	/**
	 * @return float|int|string
	 */
	public function getLeading()
	{
		return $this->leading;
	}

	/**
	 * @param float|int|string $leading
	 */
	public function setLeading($leading)
	{
		$this->leading = $leading;
	}

	/**
	 * @return float|int|string
	 */
	public function getTipoRegistro()
	{
		return $this->tipoRegistro;
	}

	/**
	 * @param float|int|string $tipoRegistro
	 */
	public function setTipoRegistro($tipoRegistro)
	{
		$this->tipoRegistro = $tipoRegistro;
	}

	/**
	 * @return float|int|string
	 */
	public function getTipoEmpregador()
	{
		return $this->tipoEmpregador;
	}

	/**
	 * @param float|int|string $tipoEmpregador
	 */
	public function setTipoEmpregador($tipoEmpregador)
	{
		$this->tipoEmpregador = $tipoEmpregador;
	}

	/**
	 * @return float|int|string
	 */
	public function getDocEmpregador()
	{
		return $this->docEmpregador;
	}

	/**
	 * @param float|int|string $docEmpregador
	 */
	public function setDocEmpregador($docEmpregador)
	{
		$this->docEmpregador = str_replace(['-','/','.'], '', $docEmpregador);
	}

	/**
	 * @return float|int|string
	 */
	public function getCeiEmpregador()
	{
		return $this->ceiEmpregador;
	}

	/**
	 * @param float|int|string $ceiEmpregador
	 */
	public function setCeiEmpregador($ceiEmpregador)
	{
		$this->ceiEmpregador = $ceiEmpregador;
	}

	/**
	 * @return string
	 */
	public function getNomeEmpregador()
	{
		return $this->nomeEmpregador;
	}

	/**
	 * @param string $nomeEmpregador
	 */
	public function setNomeEmpregador($nomeEmpregador)
	{
		$this->nomeEmpregador = $nomeEmpregador;
	}

	/**
	 * @return float|int|string
	 */
	public function getNumRep()
	{
		return $this->numRep;
	}

	/**
	 * @param float|int|string $numRep
	 */
	public function setNumRep($numRep)
	{
		$this->numRep = $numRep;
	}

	/**
	 * @return float|int|string
	 */
	public function getDataInicial()
	{
		return $this->dataInicial;
	}

	/**
	 * @param float|int|string $dataInicial
	 */
	public function setDataInicial($dataInicial)
	{
		$this->dataInicial = date('dmY', strtotime($dataInicial));
	}

	/**
	 * @return float|int|string
	 */
	public function getDataFinal()
	{
		return $this->dataFinal;
	}

	/**
	 * @param float|int|string $dataFinal
	 */
	public function setDataFinal($dataFinal)
	{
		$this->dataFinal = date('dmY', strtotime($dataFinal));
	}

	/**
	 * @return float|int|string
	 */
	public function getDataArquivo()
	{
		return date('dmY');
	}

	/**
	 * @return float|int|string
	 */
	public function getHoraArquivo()
	{
		return date('Hi');
	}

	public function generate()
	{
		$this->string = array_fill(0, 232, ' ');;

		Util::adiciona($this->string, 1, 9, $this->getLeading());
		Util::adiciona($this->string, 10, 10, $this->getTipoRegistro());
		Util::adiciona($this->string, 11, 11, $this->getTipoEmpregador());
		Util::adiciona($this->string, 12, 25, $this->getDocEmpregador());
		Util::adiciona($this->string, 26, 37, $this->getCeiEmpregador());
		Util::adiciona($this->string, 38, 187, $this->getNomeEmpregador());
		Util::adiciona($this->string, 188, 204, $this->getNumRep());
		Util::adiciona($this->string, 205, 212, $this->getDataInicial());
		Util::adiciona($this->string, 213, 220, $this->getDataFinal());
		Util::adiciona($this->string, 221, 228, $this->getDataArquivo());
		Util::adiciona($this->string, 229, 232, $this->getHoraArquivo());

		return implode('', $this->string);
	}
}
