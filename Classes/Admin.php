<?php
    class Admin extends Pessoa {
        private $ultimoLogin;
        //private $numCIP; ------------------------------>  EM ANALISE
        private $formacao;
        private $especialidade;

        public function getUltimoLogin(){
            return $this->ultimoLogin;
        }

        public function setUmtimoLogin($ultimoLogin){
            $this->ultimoLogin = $ultimoLogin;
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