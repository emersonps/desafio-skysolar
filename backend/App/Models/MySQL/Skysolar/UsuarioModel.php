<?php

namespace App\Models\MySQL\Skysolar;

final class UsuarioModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nome_completo;

    /**
     * @var string
     */
    private $rg;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var date
     */
    private $dt_nascimento;

    /**
     * Summary of getId
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    } 

    // Get and Set - Nome completo
    /**
     * Summary of getNome
     * @return string
     */
    public function getNome(): string{
        return $this->nome_completo;
    }
    /**
     * Summary of setNome
     * @param string $nome
     * @return UsuarioModel
     */
    public function setNome(string $nome_completo): UsuarioModel
    {
        $this->nome_completo = $nome_completo;
        return $this;
    }

    // Get and Set - RG
    /**
     * Summary of getRg
     * @return string
     */
    public function getRg(): string{
        return $this->rg;
    }
    public function setRg(string $rg): UsuarioModel
    {
        $this->rg = $rg;
        return $this;
    }

    // Get and Set - CPF
    /**
     * Summary of getCpf
     * @return string
     */
    public function getCpf(): string{
        return $this->cpf;
    }
    public function setCpf(string $cpf): UsuarioModel{
        $this->cpf = $cpf;
        return $this;
    }

    // Get and Set - dt_nascimento
    /**
     * Summary of getNascimento
     * @return date|string
     */
    public function getNascimento(){
        return $this->dt_nascimento;
    }
    /**
     * Summary of setNascimento
     * @param string $nascimento
     * @return UsuarioModel
     */
    public function setNascimento(string $nascimento): UsuarioModel{
        $this->dt_nascimento = $nascimento;
        return $this;
    }
}

