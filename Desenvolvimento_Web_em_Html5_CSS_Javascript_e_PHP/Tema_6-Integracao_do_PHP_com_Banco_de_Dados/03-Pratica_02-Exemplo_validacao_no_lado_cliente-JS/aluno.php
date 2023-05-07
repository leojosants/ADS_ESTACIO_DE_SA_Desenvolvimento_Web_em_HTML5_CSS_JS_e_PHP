<?php
require_once 'basicdao.php';

class Aluno
{
    public $matricula;
    public $nome;
    public $entrada;

    public function __construct($matricula = "", $nome = "", $entrada = 0)
    {
        $this->matricula = $matricula;
        $this->nome = $nome;
        $this->entrada = $entrada;
    }
}

class AlunoDAO extends BasicDAO
{
    function obterTodos()
    {
        return parent::execQUERY("SELECT * FROM alunos");
    }

    function inserir(Aluno $aluno)
    {
        parent::execDML(
            "INSERT INTO ALUNOS VALUES (?, ?, ?)",
            $aluno->matricula,
            $aluno->nome,
            $aluno->entrada
        );
    }
}
