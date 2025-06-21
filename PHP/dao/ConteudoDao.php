<?php

    class ConteudoDao{
<<<<<<< HEAD:dao/ConteudoDao.php
        public function inserir(Conteudo $cont){
            $url = "http://localhost:3000/conteudos";
            $dados = [
                "titulo" => $cont->getTitulo(),
                "descricao" => $cont->getDescricao(),
                "conteudo" => $cont->getConteudo(),
=======
        private $conexao;
        
        public function inserir(Conteudo $cont){
            $url = "http://localhost:3001/api/conteudos";
            $dados = [
                "titulo" => $cont->getTitulo(),
                "descricao" => $cont->getDescricao(),
                "texto" => $cont->getTexto(),
                "categoria" => $cont->getCategoria(),
>>>>>>> a419c745a2a70f6fab0e2c7afa0e586f2e1291c7:PHP/dao/ConteudoDao.php
                "data" => $cont->getData(),
            ];

            $options = [
                "http" => [
                    "header" => "Content-Type: application/json\r\n",
                    "method" => "POST",
                    "content" => json_encode($dados)
                ]
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            return $result ? json_decode($result, true) : false;
        }
    
        public function read(){
<<<<<<< HEAD:dao/ConteudoDao.php
            $url = "http://localhost:3000/conteudos";
            $result = file_get_contents($url);
            $contList = array();
            $lista = json_decode($result, true);
            foreach($lista as $cont):
                $contList[] = $this->listaConteudo($cont);
            endforeach;
=======
            $url = "http://localhost:3001/api/conteudos";
            $result = file_get_contents($url);
            $contList = array();
            $lista = json_decode($result, true);

            if (isset($lista['conteudos']) && is_array($lista['conteudos'])) {
                foreach($lista['conteudos'] as $cont){
                    $contList[] = $this->listaConteudo($cont);
                }
            }
            
>>>>>>> a419c745a2a70f6fab0e2c7afa0e586f2e1291c7:PHP/dao/ConteudoDao.php
            return $contList;
        }

        public function listaConteudo($row){
            $conteudo = new Conteudo();
            $conteudo->setId(htmlspecialchars($row['id']));
            $conteudo->setTitulo(htmlspecialchars($row['titulo']));
            $conteudo->setDescricao(htmlspecialchars($row['descricao']));
<<<<<<< HEAD:dao/ConteudoDao.php
            $conteudo->setConteudo(htmlspecialchars($row['conteudo']));
=======
            $conteudo->setTexto(htmlspecialchars($row['texto']));
            $conteudo->setCategoria(htmlspecialchars($row['categoria']));
>>>>>>> a419c745a2a70f6fab0e2c7afa0e586f2e1291c7:PHP/dao/ConteudoDao.php
            $conteudo->setData(htmlspecialchars($row['data']));
            return $conteudo;
        }
        
        public function editar(Conteudo $cont){
<<<<<<< HEAD:dao/ConteudoDao.php
            $url = "http://localhost:3000/conteudos/".$cont->getId();
            $dados = [
                "titulo" => $cont->getTitulo(),
                "descricao" => $cont->getDescricao(),
                "conteudo" => $cont->getConteudo(),
=======
            $url = "http://localhost:3001/api/conteudos";
            $dados = [
                "id" => $cont->getId(),
                "titulo" => $cont->getTitulo(),
                "descricao" => $cont->getDescricao(),
                "texto" => $cont->getTexto(),
                "categoria" => $cont->getCategoria(),
>>>>>>> a419c745a2a70f6fab0e2c7afa0e586f2e1291c7:PHP/dao/ConteudoDao.php
                "data" => $cont->getData(),
            ];

            $options = [
                "http" => [
                    "header"  => "Content-Type: application/json\r\n",
                    "method"  => "PUT",
                    "content" => json_encode($dados)
                ]
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            if($result === FALSE){
                return ["erro" => "Falha na requisiçãp PATCH"];
            }

            return json_decode($result, true);
        }
    
<<<<<<< HEAD:dao/ConteudoDao.php
        public function buscarPorId($id){
            $url = "http://localhost:3000/conteudos/" . urlencode($id);
            try {
                $response = @file_get_contents($url);
                if ($response === FALSE) {
                    return null; // ID não encontrado ou erro na requisição
                }
                $data = json_decode($response, true);
                if ($data) {
                    return $this->listaConteudo($data);
                }
                return null;
            } catch (Exception $e) {
                echo "<p>Erro ao buscar conteúdo por ID: </p> <p>{$e->getMessage()}</p>";
                return null;
            }
=======
        public function deletar($id) {
            $url = "http://localhost:3001/api/conteudos";
            $dados = ["id" => $id];
            
            $options = [
                "http" => [
                    "header"  => "Content-Type: application/json\r\n",
                    "method"  => "DELETE",
                    "content" => json_encode($dados)
                ]
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            return $result ? json_decode($result, true) : false;
        }

        public function buscarPorId($id){
            $url = "http://localhost:3001/api/conteudos";
            $response = file_get_contents($url);
            $dados = json_decode($response, true);
            $conteudos = $dados['conteudos'];

            foreach ($conteudos as $item) {
                if ($item['id'] == $id) {
                    return $this->listaConteudo($item);
                }
            }

            return new Conteudo(); // retorna vazio se não achar
>>>>>>> a419c745a2a70f6fab0e2c7afa0e586f2e1291c7:PHP/dao/ConteudoDao.php
        }
    }
?>