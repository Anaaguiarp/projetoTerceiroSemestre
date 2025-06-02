package controller;

import model.Paciente;
import dao.PacienteDao;
import java.util.List;

public class SistemaController {
    private PacienteDao pacienteDao;
    private Paciente pacienteLogado;

    public SistemaController(){
        this.pacienteDao = new PacienteDao();
        this.pacienteLogado = null;
    }

    public boolean loginPaciente(String email, String senha){
        this.pacienteLogado = pacienteDao.autenticarPaciente(email, senha);
        return this.pacienteLogado != null;
    }

    public void logoutPaciente(){
        this.pacienteLogado = null;
        System.out.println("Logout realizado com sucesso.");
    }

    public Paciente getPacienteLogado(){
        return pacienteLogado;
    }

    public boolean cadastrarPaciente(String nome, String email, String senha) {
    if (pacienteDao.buscarPorEmail(email) != null) {
        System.out.println("Erro: Email já cadastrado.");
        return false;
    }

    Paciente novoPaciente = new Paciente(0, nome, email, senha); // senha simples, por enquanto
    pacienteDao.salvarPaciente(novoPaciente);
    System.out.println("Usuário cadastrado com sucesso!");
    return true;
}
    public List<Paciente> listarFuncionarios() {
        return pacienteDao.listarTodos();
    }
}
