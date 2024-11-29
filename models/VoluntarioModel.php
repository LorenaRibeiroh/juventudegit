<?php

    session_start();

    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

    class Voluntarios{

    protected $id;
    protected $nome;
    private  $email;
    private $telefone;
    private  $data_nascimento;
    private $turno;
    private $descricao;
    public $data_criacao;
    protected $db;
    protected $table = "voluntarios";
    

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }
    // Listar todos os registros da tabela usuário
    public function getAllUsuarios(){
        try{
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);            
        }catch(PDOException $e){
            echo "Erro ao listar: ".$e->getMessage();
            return null;
        }


    }

    public function getUsuarioByld(){
        try{
            $sql = "SELECT * FROM {$this->table} WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id",$id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);            
        }catch(PDOException $e)
        {
            echo "Erro ao Buscar: ".$e->getMessage();
            return null;
        }

    }

    
    public function createVoluntario(){
        try {
            $query = "INSERT INTO {$this->table} (id, nome, email, telefone, data_nascimento, turno, descricao, data_criacao) 
                      VALUES (:id, :nome, :email, :telefone, :data_nascimento, :turno, :descricao, :data_criacao)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['telefone']);
            $stmt->bindParam(':perfil', $dados['data_nascimento']);
            $stmt->bindParam(':perfil', $dados['turno']);
            $stmt->bindParam(':perfil', $dados['descricao']);
            $stmt->bindParam(':perfil', $dados['data_criacao']);
            $stmt->execute();

            $_SESSION['sucesso'] = "Cadastro realizado com sucesso!";

            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: ".$e->getMessage();

            $_SESSION['erro'] = "Erro ao cadastrar o usuário";
            return false;
        }
    }
    
    public function updateVoluntario(){
        try {
            $sql = "UPDATE {$this->table} SET nome = :nome, email = :email, telefone = :telefone, data_nascimento = :data_nascimento, turno = :turno, descricao = :descricao, data_criacao = :data_criacao WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['telefone']);
            $stmt->bindParam(':perfil', $dados['data_nascimento']);
            $stmt->bindParam(':perfil', $dados['turno']);
            $stmt->bindParam(':perfil', $dados['descricao']);
            $stmt->bindParam(':perfil', $dados['data_criacao']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao editar: ".$e->getMessage();
            return false;
        }
    } 
    public function deleteVoluntario(){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir: ".$e->getMessage();
            return false;
        }
    }

}
