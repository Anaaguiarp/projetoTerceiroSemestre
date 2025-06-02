package model;

public class Paciente extends Pessoa{
    private String nome_social;
    private String medicacao;
    private String doenca;
    private String tipo_sanguineo;

    public Paciente(){};

    public Paciente(int id, String nome, String email, String senha){
        super(id, nome, email, senha);
    }

    public String getNomeSocial() {
        return this.nome_social;
    }

    public void setNomeSocial(String nome_social) {
        this.nome_social = nome_social;
    }

    public String getMedicacao() {
        return this.medicacao;
    }

    public void setMedicacao(String medicacao) {
        this.medicacao = medicacao;
    }

    public String getDoenca() {
        return this.doenca;
    }

    public void setDoenca(String doenca) {
        this.doenca = doenca;
    }

    public String getTipoSanguineo() {
        return this.tipo_sanguineo;
    }

    public void setTipoSanguineo(String tipo_sanguineo) {
        this.tipo_sanguineo = tipo_sanguineo;
    }

    @Override
    public String toString(){
        return super.toString()+". Nome social: "+this.nome_social+". Medicações: "+this.medicacao+". Doenças: "+this.doenca+". Tipo sanguíneo: "+this.tipo_sanguineo;
    }
}
