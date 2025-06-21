<?php
    require_once 'Pessoa.php';
    class Paciente extends Pessoa{
        private $estado;
        private $cidade;
        private $medicacao;
        private $doenca;
        private $tipo_sanguineo;

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

        public function setTipoSanguineo($tipo_sanguineo){
            $this->tipo_sanguineo = $tipo_sanguineo;
        }

        public function getTipoSanguineo(){
            return $this->tipo_sanguineo;
        }
    }

?>