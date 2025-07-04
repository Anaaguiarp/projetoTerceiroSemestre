<?php
    class Conteudo{
        private $id;
        private $titulo;
        private $descricao;
        private $texto;
        private $categoria;
        private $data;
        private $nome_autor;

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

        public function getCategoria(){
            return $this->categoria;
        }

        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }

        public function getData(){
            return $this->data;
        }

        public function setData($data){
            $this->data = $data;
        }

        public function getNomeAutor(){
            return $this->nome_autor;
        }

        public function setNomeAutor($nome_autor){
            $this->nome_autor = $nome_autor;
        }

        public function __toString(){
            return "Título: {$this->titulo}. Descrição: {$this->descricao} Texto: {$this->texto} Data: {$this->data}";
        }
    }
?>