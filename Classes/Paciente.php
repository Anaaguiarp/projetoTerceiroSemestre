<?php

    class Paciente extends Pessoa{
        private $estado;
        private $cidade;
        private $medicacao;
        private $doenca;

        public function __construct($nome, $email, $senha, $data_nascimento, $genero, $estado, $cidade, $medicacao, $doenca){
            parent::__construct($nome, $email, $senha, $data_nascimento, $genero);
            $this->estado = $estado;
            $this->cidade = $cidade;
            $this->medicacao = $medicacao;
            $this->doenca = $doenca;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function setCidade($cidade){
            $this->cidade = $cidade;
        }

        public function getCidade(){
            return $this->cidade;
        }

        public function setMedicacao($medicacao){
            $this->medicacao = $medicacao;
        }

        public function getMedicacao(){
            return $this->medicacao;
        }

        public function setDoenca($doenca){
            $this->doenca = $doenca;
        }

        public function getDoenca(){
            return $this->doenca;
        }
    }

?>