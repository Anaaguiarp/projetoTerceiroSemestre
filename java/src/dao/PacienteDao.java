package dao;

import model.Paciente;
import java.util.ArrayList;
import java.util.List;

public class PacienteDAO {

    public void salvarPaciente(Paciente paciente) {
        if(paciente.getId() == 0){
            paciente.setId(FileHandler.getNextId("Paciente"));
        }

        String insertSQL = String.format(
            "INSERT INTO Paciente (id, nome, email, senha, data_nascimento, nome_social, medicacao, doenca, tipo_sanguineo) VALUES (%d, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
            paciente.getId(),
            paciente.getNome(),
            paciente.getDataNascimento(),
            paciente.getNomeSocial(),
            paciente.getMedicacao(),
            paciente.getDoenca(),
            paciente.getTipoSanguineo()
        );

        FileHandler.writeInsertStatement(insertSQL);
    }

    public Paciente autenticarPaciente(String email, String senha){
        List<String> lines = FileHandler.readLines();
        for(String line : lines){
            if(line.startsWith("INSERT INTO Paciente")){
                String storedEmail = FileHandler.getValueFromInsert(line, "email");
                String storedSenha = FileHandler.getValueFromInsert(line, "senha");

                if(email.equals(storedEmail) && senha.equals(storedSenha)){
                    int id = Integer.parseInt(FileHandler.getValueFromInsert(line, "id"));
                    String nome = FileHander.getValueFromInsert(line, "nome");
                    return new Paciente(id, nome, storedEmail, storedSenha);
                }
            }
        }
        return null;
    }
    
    public Paciente buscarPorId(int id) {
        List<String> lines = FileHandler.readLines();
        for (String line : lines) {
            if (line.startsWith("INSERT INTO Paciente")) {
                String idStr = FileHandler.getValueFromInsert(line, "id");
                if (idStr != null && Integer.parseInt(idStr) == id) {
                    String nome = FileHandler.getValueFromInsert(line, "nome");
                    String email = FileHandler.getValueFromInsert(line, "email");
                    String senha = FileHandler.getValueFromInsert(line, "senha"); 
                    return new Paciente(id, nome, email, senha);
                }
            }
        }
        return null;
    }

    public List<Paciente> listarTodos() {
        List<String> linhas = FileHandler.readLines();
        List<Paciente> pacientes = new ArrayList<>();

        for (String linha : linhas) {
            if (linha.startsWith("INSERT INTO Paciente")) {
                Paciente p = new Paciente();

                p.setId(Integer.parseInt(FileHandler.getValueFromInsert(linha, "id")));
                p.setNome(FileHandler.getValueFromInsert(linha, "nome"));
                p.setCpf(FileHandler.getValueFromInsert(linha, "cpf"));
                p.setDataNascimento(FileHandler.getValueFromInsert(linha, "dataNascimento"));
                p.setNomeSocial(FileHandler.getValueFromInsert(linha, "nome_social"));
                p.setMedicacao(FileHandler.getValueFromInsert(linha, "medicacao"));
                p.setDoenca(FileHandler.getValueFromInsert(linha, "doenca"));
                p.setTipoSanguineo(FileHandler.getValueFromInsert(linha, "tipo_sanguineo"));

                pacientes.add(p);
            }
        }

        return pacientes;
    }
}
