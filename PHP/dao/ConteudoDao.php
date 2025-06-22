<?php

    class ConteudoDao{
        private $conexao;
        
        public function inserir(Conteudo $cont){
            $url = "http://localhost:3001/api/conteudos";
            $dados = [
                "titulo" => $cont->getTitulo(),
                "descricao" => $cont->getDescricao(),
                "texto" => $cont->getTexto(),
                "categoria" => $cont->getCategoria(),
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
            $url = "http://localhost:3001/api/conteudos";
            $result = file_get_contents($url);
            $contList = array();
            $lista = json_decode($result, true);

            if (isset($lista['conteudos']) && is_array($lista['conteudos'])) {
                foreach($lista['conteudos'] as $cont){
                    $contList[] = $this->listaConteudo($cont);
                }
            }
            return $contList;
        }

        public function listaConteudo($row){
            $conteudo = new Conteudo();
            $conteudo->setId(htmlspecialchars($row['id']));
            $conteudo->setTitulo(htmlspecialchars($row['titulo']));
            $conteudo->setDescricao(htmlspecialchars($row['descricao']));
            $conteudo->setTexto(htmlspecialchars($row['texto']));
            $conteudo->setCategoria(htmlspecialchars($row['categoria']));
            $conteudo->setData(htmlspecialchars($row['data']));
            return $conteudo;
        }
        
        public function editar(Conteudo $cont){
            $url = "http://localhost:3001/api/conteudos";
            $dados = [
                "id" => $cont->getId(),
                "titulo" => $cont->getTitulo(),
                "descricao" => $cont->getDescricao(),
                "texto" => $cont->getTexto(),
                "categoria" => $cont->getCategoria(),
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
        }
    }
?>