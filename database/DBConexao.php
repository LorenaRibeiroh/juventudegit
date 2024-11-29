<?php
        class DBConexao{

            //configurações de banco de dados
            private $host = "localhost";
            private $dbname = "biblioteca";
            private $username = "root";
            private $password = "senac123";

            private $conx;
            private static $instace = null;

            public function __construct()
            {
                try{
                    //inicializar a conexão
       
        $this->conx = new PDO("mysql:host=$this->host,dbname=$this->dbname;charset=utf8",$this->username,$this->password);
        $this->conx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


                }catch(PDOException $e){
                    echo "erro na conexão com banco de dados: ".$e->getMessage();
                }

            }

             /**
              * Método estático para obter a instância única da conexão
              */

              public static function getConexao(){
                if (!self::$instace) {
                    self::$instace = new DBConexao();
                }
                return self::$instace->conx;
              }
            


        }

        