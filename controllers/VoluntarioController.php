<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Voluntario.php";

    class VoluntarioController extends VoluntarioModel{
 

        private $voluntarioModel;

        public function __construct()
        {
            $this->voluntarioModel = new Voluntario();
        }
    
        public function listarVoluntario(){

            return $this->voluntarioModel->listar();
    
        }

        public function cadastrarVoluntario(){

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
                $dados = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'telefone' =>  $_POST['telefone'],
                    'data_nascimento' => $_POST['data_nascimento'],
                    'turno' => $_POST['turno'],
                    'descricao' => $_POST['descricao'],
                    'data_criacao' => $_POST['data_criacao'],

                ];
    
                $this->voluntarioModel->cadastrar($dados);
    
                header('Location: index.php');
                exit;
    
            }
             ///
        }
    
        public function editarVoluntario(){
            
            $id = $_GET['id'];
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
                $dados = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'telefone' =>  $_POST['telefone'],
                    'data_nascimento' => $_POST['data_nascimento'],
                    'turno' => $_POST['turno'],
                    'descricao' => $_POST['descricao'],
                    'data_criacao' => $_POST['data_criacao'],
                ];
    
                $this->voluntarioModel->editar($id, $dados);
    
                header('Location: index.php');
                exit;
            }
    
            return $this->usuarioModel->buscar($id);
    
        }

    }