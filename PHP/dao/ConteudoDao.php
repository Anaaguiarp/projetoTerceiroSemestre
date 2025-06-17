<?php

    class ConteudoDao{
        public function inserir(Conteudo $cont){
            $url = "http://localhost:3000/conteudos";
            $dados = [
                "titulo" => $cont->getTitulo(),
                "descricao" => $cont->getDescricao(),
                "texto" => $cont->getTexto(),
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
            $url = "http://localhost:3000/conteudos";
            $result = file_get_contents($url);
            $contList = array();
            $lista = json_decode($result, true);
            foreach($lista as $cont):
                $contList[] = $this->listaConteudo($cont);
            endforeach;
            return $contList;
        }

        public function listaConteudo($row){
            $conteudo = new Conteudo();
            $conteudo->setId(htmlspecialchars($row['id']));
            $conteudo->setTitulo(htmlspecialchars($row['titulo']));
            $conteudo->setDescricao(htmlspecialchars($row['descricao']));
            $conteudo->setTexto(htmlspecialchars($row['texto']));
            $conteudo->setData(htmlspecialchars($row['data']));
            return $conteudo;
        }
        
        public function editar(Conteudo $cont){
            $url = "http://localhost:3000/conteudos/".$cont->getId();
            $dados = [
                "titulo" => $cont->getTitulo(),
                "descricao" => $cont->getDescricao(),
                "texto" => $cont->getTexto(),
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
        }
    }
?>