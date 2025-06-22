<?php
    require_once 'Pessoa.php';
    class Administrador extends Pessoa {
        private $ultimo_login;
        private $conselho_profissional;
        private $formacao;
        private $registro_profissional;
        private $especialidade;

        public function getUltimoLogin(){
            return $this->ultimo_login;
        }

        public function setUltimoLogin($ultimo_login){
            $this->ultimo_login = $ultimo_login;
        }

        public function getConselhoProfissional(){
            return $this->conselho_profissional;
        }

        public function setConselhoProfissional($conselho_profissional){
            $this->conselho_profissional = $conselho_profissional;
        }

        public function getFormacao(){
            return $this->formacao;
        }

        public function setFormacao($formacao){
            $this->formacao = $formacao;
        }

        public function getRegistroProfissional(){
            return $this->registro_profissional;
        }

        public function setRegistroProfissional($registro_profissional){
            $this->registro_profissional = $registro_profissional;
        }
        
        public function getEspecialidade(){
            return $this->especialidade;
        }

        public function setEspecialidade($especialidade){
            $this->especialidade = $especialidade;
        }

        public function __toString(){
            parent::__toString()." Último login: {$this->ultimoLogin}\nConselho Profissional: {$this->conselho_profissional}\nFormação: {$this->formacao}\nRegistro Profissional: {$this->registro_profissional}\nEspecialidade: {$this->especialidade}";
        }
    }
?>