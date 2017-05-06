<?php
/*
    ---06/05/2017

    Criado Por Mickael Braz de Souza
    Sistema de Uploads de imagem com corte e
    redimensionamento com utilizando o plugin 
    para jquery, Jcrop e a classe para
    PHP, WideImage. Algumas alterações foram
    feitas para redução de código, e também,
    temos algumas mudanças na nomenclatura
    dos atributos e métodos.
    
    ----06/05/2017---
*/
class Upload {
    private $file;
    private $name;
    private $exten;
    private $newName;
    private $result;
    private $msg;
    private $folder;
    private $dir_img;
    
    public function __construct(array $img) {
        $this->folder = "img/";
        //Metódo responsável por criar o diretório onde a imagem será salva
        $this->name = $img['name'];//Atribuindo o nome
        $this->exten = @end(explode('.', $this->name));//Obtendo a extensão
        $this->file = $img;//Atribuindo o arquivo
        $this->newName = rand().'.'.$this->extn;//Criando um novo nome aleatório
        $this->dir_img = $this->folder.''.$this->newName;//Criando um novo Diretório
        $this->moveFile();//Chamando o metódo moveArquivo, responsável por salvar a imagem
    }
    /*public function image(){//Metódo responsável por criar o diretório onde a imagem será salva
        $this->nome= $img['name'];//Atribuindo o nome
        $this->extn = @end(explode('.', $this->nome));//Obtendo a extensão
        $this->arquivo = $img;//Atribuindo o arquivo
        $this->novo = rand().'.'.$this->extn;//Criando um novo nome aleatório
        $this->dir_img = $this->diretorio.''.$this->novo;//Criando um novo Diretório
        $this->moveArquivo();//Chamando o metódo moveArquivo, responsável por salvar a imagem
    }*/
    private function moveFile() {

        if(move_uploaded_file($this->file['tmp_name'], $this->dir_img)){//Salvando a Imagem no diretório
            $this->result = true;//Atribuindo true para o resultado, caso seja possivel realiszar o upload
            $this->msg = 'Upload realizado com sucesso';
        }else{            
            $this->result = false;//Atribuindo false ao resultado, caso não seja possivel, fazer o upload
            $this->msg = 'Upload não foi realizado com sucesso';
        }
    }
    
    public function getResult() {
        return $this->result;
    }

    public function getMsg() {
        return $this->msg;
    }
}
