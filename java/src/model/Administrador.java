package model;

import java.time.LocalDateTime;

public class Administrador extends Pessoa{
    private LocalDateTime ultimoLogin;
    private String documento;
    private String formacao;
    private String especialidade;

    public Administrador(){}

    public Administrador(int id, String nome, String nome_social, String email, String senha){
        super(id, nome, nome_social, email, senha);
    }

    public LocalDateTime getUltimoLogin() {
        return this.ultimoLogin;
    }

    public void setUltimoLogin(LocalDateTime ultimoLogin) {
        this.ultimoLogin = ultimoLogin;
    }

    public String getDocumento() {
        return this.documento;
    }

    public void setDocumento(String documento) {
        this.documento = documento;
    }
    
    public String getFormacao() {
        return this.formacao;
    }

    public void setFormacao(String formacao) {
        this.formacao = formacao;
    }

    public String getEspecialidade() {
        return this.especialidade;
    }

    public void setEspecialidade(String especialidade) {
        this.especialidade = especialidade;
    }

    public void registraLogin(){
        this.ultimoLogin = LocalDateTime.now();
    }

    public String toStringSql(){
        return super.toStringSql()+"INSERT INTO administrador (ultimoLogin, documento, formacao, especialidade) VALUES ('"+this.ultimoLogin+"', '"+this.documento+"', '"+this.formacao+"','"+this.especialidade+"');\n";
    }
    
}