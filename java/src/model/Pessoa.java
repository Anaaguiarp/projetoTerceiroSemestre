package model;

public class Pessoa{
    private int id;
    private String nome;
    private String nome_social;
    private String email;
    private String senha;
    private String data_nascimento;
    private String genero;

    public Pessoa(){};

    public Pessoa(int id, String nome, String nome_social, String email, String senha){
        this.id = id;
        this.nome = nome;
        this.nome_social = nome_social;
        this.email = email;
        this.senha = senha;
    }

    public int getId() {
        return this.id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNome() {
        return this.nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getNome_social() {
        return this.nome_social;
    }

    public void setNome_social(String nome_social) {
        this.nome_social = nome_social;
    }

    public String getEmail() {
        return this.email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getSenha() {
        return this.senha;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }

    public String getDataNascimento() {
        return this.data_nascimento;
    }

    public void setDataNascimento(String data_nascimento) {
        this.data_nascimento = data_nascimento;
    }

    public String getGenero() {
        return this.genero;
    }

    public void setGenero(String genero) {
        this.genero = genero;
    }

    @Override
    public String toString(){
        return "Usuário\nNome: "+this.nome+". Nome Social: "+this.nome_social+". E-mail: "+this.email+". Data de nascimento: "+this.data_nascimento+". Gênero: "+this.genero;
    }
}
