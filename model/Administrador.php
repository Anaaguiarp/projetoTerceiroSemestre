<?php
    require_once 'Pessoa.php';
    class Administrador extends Pessoa {
        private $ultimoLogin;
        private $conselhoProfissional;
        private $formacao;
        private $registroProfissional;
        private $especialidade;

        public function getUltimoLogin(){
            return $this->ultimoLogin;
        }

        public function setUltimoLogin($ultimoLogin){
            $this->ultimoLogin = $ultimoLogin;
        }

        public function getConselhoProfissional(){
            return $this->conselhoProfissional;
        }

        public function setConselhoProfissional($conselhoProfissional){
            $this->conselhoProfissional = $conselhoProfissional;
        }

        public function getFormacao(){
            return $this->formacao;
        }

        public function setFormacao($formacao){
            $this->formacao = $formacao;
        }

        public function getRegistroProfissional(){
            return $this->registroProfissional;
        }

        public function setRegistroProfissional($registroProfissional){
            $this->registroProfissional = $registroProfissional;
        }
        
        public function getEspecialidade(){
            return $this->especialidade;
        }

        public function setEspecialidade($especialidade){
            $this->especialidade = $especialidade;
        }

        public function __toString(){
            parent::__toString()." Último login: {$this->ultimoLogin}\nConselho Profissional: {$this->conselhoProfissional}\nFormação: {$this->formacao}\nRegistro Profissional: {$this->registroProfissional}\nEspecialidade: {$this->especialidade}";
        }
    }
?>