<?php
namespace GuiGralho\AfdGenerator;

use GuiGralho\Util;

/**
 * Class AfdGeneratorHeader
 */
class AfdGeneratorContent
{

	/**
	 * posição 001-009
	 * NRS
	 * @var numeric
	 */
	protected $nsr;

	/**
	 * posição 010-010
	 * tipo do registro
	 * @var numeric
	 */
	protected $tipoRegistro = '3';

	/**
	 * posição 011-018
	 * data de marcação de ponto, 'ddmmaaaa'
	 * @var numeric
	 */
	protected $dataPonto;

	/**
	 * posição 019-022
	 * horário de marcação de ponto, 'hhmm'
	 * @var numeric
	 */
	protected $horarioPonto;

	/**
	 * posição 023-034
	 * número do PIS do empregado
	 * @var numeric
	 */
	protected $numPis;

	/**
	 * @var
	 */
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
	public function getNsr()
	{
		return $this->nsr;
	}

	/**
	 * @param float|int|string $nsr
	 */
	public function setNsr($nsr)
	{
		$this->nsr = $nsr;
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
	public function getDataPonto()
	{
		return $this->dataPonto;
	}

	/**
	 * @param float|int|string $dataPonto
	 */
	public function setDataPonto($dataPonto)
	{
		$this->dataPonto = date('dmY', strtotime(str_replace('/', '-', $dataPonto)));
	}

	/**
	 * @return float|int|string
	 */
	public function getHorarioPonto()
	{
		return $this->horarioPonto;
	}

	/**
	 * @param float|int|string $horarioPonto
	 */
	public function setHorarioPonto($horarioPonto)
	{
		$this->horarioPonto = date('Hi', strtotime($horarioPonto));
	}

	/**
	 * @return float|int|string
	 */
	public function getNumPis()
	{
		return $this->numPis;
	}

	/**
	 * @param float|int|string $numPis
	 */
	public function setNumPis($numPis)
	{
		$this->numPis = $numPis;
	}

	/**
	 * @return string
	 */
	public function generate()
	{
		$this->string = array_fill(0, 34, ' ');;

		Util::adiciona($this->string, 1, 9, Util::fillZero($this->getNsr(), 9, STR_PAD_LEFT));
		Util::adiciona($this->string, 10, 10, $this->getTipoRegistro());
		Util::adiciona($this->string, 11, 18, $this->getDataPonto());
		Util::adiciona($this->string, 19, 22, $this->getHorarioPonto());
		Util::adiciona($this->string, 23, 34, Util::fillZero($this->getNumPis(), 12, STR_PAD_LEFT));

		return implode('', $this->string);
	}
}
