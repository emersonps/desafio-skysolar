<?php

namespace App\Models\MySQL\Skysolar;

final class EnderecoModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $cep;

    /**
     * @var string
     */
    private $logradouro;

    /**
     * @var string
     */
    private $bairro;

    /**
     * @var string
     */
    private $cidade;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var int
     */
    private $usuario_id;


    // Gets ID
    public function getId(): int
    {
        return $this->id;
    } 

    // Get and Set CEP
    /**
     * Summary of getCep
     * @return string
     */
    public function getCep(): string{
        return $this->cep;
    }

    /**
     * Summary of setCep
     * @param string $cep
     * @return EnderecoModel
     */
    public function setCep(string $cep): EnderecoModel
    {
        $this->cep = $cep;
        return $this;
    }

    // Get and Set - Logradouro
    /**
     * Summary of getLogradouro
     * @return string
     */
    public function getLogradouro(): string{
        return $this->logradouro;
    }
    /**
     * Summary of setLogradouro
     * @param string $logradouro
     * @return EnderecoModel
     */
    public function setLogradouro(string $logradouro): EnderecoModel
    {
        $this->logradouro = $logradouro;
        return $this;
    }

    // Get and Set - Bairro
    /**
     * Summary of getBairro
     * @return string
     */
    public function getBairro(){
        return $this->bairro;
    }
    /**
     * Summary of setBairro
     * @param string $bairro
     * @return EnderecoModel
     */
    public function setBairro(string $bairro): EnderecoModel{
        $this->bairro = $bairro;
        return $this;
    }

    // Get and Set - Cidade
    /**
     * Summary of getCidade
     * @return string
     */
    public function getCidade(){
        return $this->cidade;
    }
    /**
     * Summary of setCidade
     * @param string $cidade
     * @return EnderecoModel
     */
    public function setCidade(string $cidade): EnderecoModel{
        $this->cidade = $cidade;
        return $this;
    }

    // Get and Set - Estado
    /**
     * Summary of getEstado
     * @return string
     */
    public function getEstado(){
        return $this->estado;
    }
    /**
     * Summary of setEstado
     * @param string $estado
     * @return EnderecoModel
     */
    public function setEstado(string $estado): EnderecoModel{
        $this->estado = $estado;
        return $this;
    }

    // Get and Set - Usuario_id
    /**
     * Summary of getUsuario_id
     * @return int
     */
    public function getUsuario_id(){
        return $this->usuario_id;
    }
    /**
     * Summary of setUsuario_id
     * @param int $usuario_id
     * @return EnderecoModel
     */
    public function setUsuario_id(int $usuario_id): EnderecoModel{
        $this->usuario_id = $usuario_id;
        return $this;
    }
}

