<?php
    class Admin extends Pessoa {
        private $ultimoLogin;
        private $documento;
        private $formacao;
        private $especialidade;

        public function __construct($nome, $email, $senha, $data_nascimento, $genero, $ultimoLogin, $formacao, $especialidade){
            parent::__construct($nome, $email, $senha, $data_nascimento, $genero);
            $this->ultimoLogin = $ultimoLogin;
            $this->formacao = $formacao;
            $this->especialidade = $especialidade;
        }

        public function getUltimoLogin(){
            return $this->ultimoLogin;
        }

        public function setUmtimoLogin($ultimoLogin){
            $this->ultimoLogin = $ultimoLogin;
        }

        public function getDocumento(){
            return $this->documento;
        }

        public function setDocumento($documento){
            $this->documento = $documento;
        }

        public function getFormacao(){
            return $this->formacao;
        }

        public function setFormacao($formacao){
            $this->formacao = $formacao;
        }
        
        public function getEspecialidade(){
            return $this->especialidade;
        }

        public function setEspecialidade($especialidade){
            $this->especialidade = $especialidade;
        }

        public function __toString(){
            parent::__toString()." Último login: {$this->ultimoLogin}\nFormação: {$this->formacao}\nEspecialidade: {$this->especialidade}";
        }
    }
?>