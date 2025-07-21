<?php 
    namespace App\Models;

    use MF\Model\Model;

    class Usuario extends Model{
        private $id;
        private $nome;
        private $email;
        private $senha;

        public function __get($atribute){
            return $this->$atribute;
        }

        public function __set($atribute, $value){
            $this->$atribute = $value;
        }

        // Salvar
        public function salvar(){
            $query = "INSERT INTO usuarios(nome, email, senha)values(:nome, :email, :senha)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':nome', $this->__get('nome'));
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->bindValue(':senha', $this->__get('senha')); //md5() -> hash 32 caracteres
            $stmt->execute();

            return $this;
        }

        // Validar se um cadastro pode ser feito

        public function validarCadastro(){
            $valido = true;

            if(strlen($this->__get('nome')) < 3){
                $valido = false;
            }

            if(strlen($this->__get('email')) < 3){
                $valido = false;
            }

            if(strlen($this->__get('senha')) < 3){
                $valido = false;
            }

            return $valido;
        }
        // Recuperar um usuario por E-mail
        public function getUsuarioPorEmail(){
            $query = "SELECT nome, email FROM usuarios WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

    }
?>