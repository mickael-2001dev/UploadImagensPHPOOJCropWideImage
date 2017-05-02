<?php
/*
    ---01/05/2017

    Criado Por Mickael Braz de Souza
    Sistema de Uploads de imagem com corte e
    redimensionamento com utilizando o plugin 
    para jquery, Jcrop e a classe para
    PHP, WideImage.

    ----01/05/2017---
*/
class Upload {
    private $arquivo;
    private $nome;
    private $extn;
    private $novo;
    private $result;
    private $msg;
    private $diretorio;
    public $dir_img;
    
    public function __construct() {
        $this->diretorio = "img/";
    }
    public function image(array $img){//Metódo responsável por criar o diretório onde a imagem será salva
        $this->nome= $img['name'];//Atribuindo o nome
        $this->extn = @end(explode('.', $this->nome));//Obtendo a extensão
        $this->arquivo = $img;//Atribuindo o arquivo
        $this->novo = rand().'.'.$this->extn;//Criando um novo nome aleatório
        $this->dir_img = $this->diretorio.''.$this->novo;//Criando um novo Diretório
        $this->moveArquivo();//Chamando o metódo moveArquivo, responsável por salvar a imagem
    }
    private function moveArquivo() {

        if(move_uploaded_file($this->arquivo['tmp_name'], $this->dir_img)){//Salvando a Imagem no diretório
            $this->result = $this->nome;//Atribuindo o nome ao resultado, para o atributo não ficar vazio
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
    public function getNovo(){
        return $this->novo;
    }
    public function getDiretorio(){
        return $this->diretorio;
    }
}
