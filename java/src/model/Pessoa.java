package model;

public class Pessoa{
    private int id;
    private String nome;
    private String email;
    private String senha;
    private String data_nascimento;
    private String genero;

    public Pessoa(){};

    public Pessoa(int id, String nome, String email, String senha, String data_nascimento, String genero){
        this.id = id;
        this.nome = nome;
        this.email = email;
        this.senha = senha;
        this.data_nascimento = data_nascimento;
        this.genero = genero;
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

    public String getData_nascimento() {
        return this.data_nascimento;
    }

    public void setData_nascimento(String data_nascimento) {
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
        return "Usuário\nNome: "+this.nome+". E-mail: "+this.email+". Data de nascimento: "+this.data_nascimento+". Gênero: "+this.genero;
    }
}
