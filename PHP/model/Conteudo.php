<?php
    class Conteudo{
        private $id;
        private $titulo;
        private $descricao;
        private $texto;
        private $data;

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }
        
        public function getTitulo(){
            return $this->titulo;
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function getTexto(){
            return $this->texto;
        }

        public function setTexto($texto){
            $this->texto = $texto;
        }

        public function getData(){
            return $this->data;
        }

        public function setData($data){
            $this->data = $data;
        }

        public function __toString(){
            return "Título: {$this->titulo}. Descrição: {$this->descricao} Texto: {$this->texto} Data: {$this->data}";
        }
    }
?>