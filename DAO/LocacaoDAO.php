<?php

require_once __DIR__ .'../../source/DBConexao.php';

class LocacaoDAO{
	
	private static $conexao;
	
    public function __construct()
    {
		self::$conexao = DBConexao::getInstance();
	}
	
	//Function Insert
    public function inserir(Locacao $locacao)
    {
        if($locacao->getCodigo_aluno() != null && $locacao->getFuncionario() != null && $locacao->getCodigo_de_barra() != null)
        {
			
			$query = self::$conexao->prepare("INSERT INTO locacao(codigo_aluno, funcionario, codigo_de_barra, status) VALUES (?, ?, ?, 'Ativo')");
				
            $query->bindValue(1, $locacao->getCodigo_aluno());
            $query->bindValue(2, $locacao->getFuncionario());
            $query->bindValue(3, $locacao->getCodigo_de_barra());
				
			if($query->execute()){
				return "200";
			}else{
				return "400";
			} 		
		}else{
			return "400";
		}

	}
	
	 //Function Listar
	public function listar(){
		
		$query = self::$conexao->prepare("SELECT locacao.codigo, aluno.nome, locacao.funcionario, locacao.codigo_de_barra, livro.titulo FROM locacao INNER JOIN livro ON locacao.codigo_de_barra = livro.codigo_de_barra INNER JOIN aluno ON locacao.codigo_aluno = aluno.codigo WHERE locacao.status = 'Ativo' ORDER BY locacao.codigo");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	
	//Funcion find
	public function buscar($codigo){

		$query = self::$conexao->prepare("SELECT locacao.codigo, aluno.nome FROM locacao INNER JOIN aluno ON locacao.codigo_aluno = aluno.codigo WHERE locacao.status = 'Ativo' AND locacao.codigo_de_barra = ? ");

		$query->bindValue(1, $codigo);

		$query->execute();

		return $query->fetchAll();		
	} 

	//Funcion find
	public function buscarByAluno($codigo){

		$query = self::$conexao->prepare("SELECT locacao.codigo, livro.codigo_de_barra, livro.titulo 
		FROM locacao INNER JOIN aluno ON locacao.codigo_aluno = aluno.codigo 
		INNER JOIN livro ON locacao.codigo_de_barra = livro.codigo_de_barra 
		WHERE locacao.status = 'Ativo' AND aluno.codigo = ? ");

		$query->bindValue(1, $codigo);

		$query->execute();

		return $query->fetchAll();		
	} 
	
	//Function Insert
    public function devolucao($codigo)
    {
        if($codigo != null)
        {
			
			$query = self::$conexao->prepare("UPDATE locacao SET status = 'Desativado' WHERE codigo = ?");
				
            $query->bindValue(1, $codigo);

				
			if($query->execute()){
				return "200";
			}else{
				return "400";
			} 		
		}else{
			return "400";
		}
		return "400";
	}

    /*
    public function buscarNome($nome){

		$query = self::$conexao->prepare("SELECT codigo,nome FROM aluno WHERE nome = ? ");

		$query->bindValue(1, $nome);

        $query->execute();
        
        return $query;
		
	}
*/
	public function retornarTotal(){
		$query = self::$conexao->prepare("SELECT COUNT(*) AS 'quantidade' FROM locacao WHERE status = 'Ativo'");

		$query->execute();
        
        return $query->fetch();
	} 
	
}