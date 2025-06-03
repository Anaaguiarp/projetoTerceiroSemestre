import java.util.Scanner;
import model.Administrador;
import model.Pessoa;

public class App {
    public static void main(String[] args) throws Exception {
        Scanner sc = new Scanner(System.in);
        File arquivo = new File();
        String nome;

        do {
            System.out.println("\nDigite o nome da pessoa ou 'sair' para encerrar:");
            nome = sc.nextLine();

            if (nome.equalsIgnoreCase("sair")) break;

            System.out.print("Digite um email: ");
            String email = sc.nextLine();

            System.out.print("Digite seu nome social ou 'N' caso não possua: ");
            String nomeSocial = sc.nextLine();

            System.out.print("Digite sua senha: ");
            String senha = sc.nextLine();

            System.out.print("Informe sua data de nascimento (AAAA-MM-DD): ");
            String dataNascimento = sc.nextLine();

            System.out.print("Informe seu gênero ('Feminino', 'Masculino' ou 'Outros'): ");
            String genero = sc.nextLine();

            if (!genero.equalsIgnoreCase("Feminino") &&
                !genero.equalsIgnoreCase("Masculino") &&
                !genero.equalsIgnoreCase("Outros")) {
                System.err.println("Informação inválida de gênero. Pulando cadastro.");
                continue;
            }

            System.out.print("Essa pessoa é um administrador ou um paciente? (a/p): ");
            String resposta = sc.nextLine();

            if (resposta.equalsIgnoreCase("a")) {
                Administrador adm = new Administrador();
                adm.setNome(nome);
                adm.setEmail(email);
                adm.setNome_social(nomeSocial);
                adm.setSenha(senha);
                adm.setDataNascimento(dataNascimento);
                adm.setGenero(genero);

                System.out.print("Digite o documento: ");
                adm.setDocumento(sc.nextLine());

                System.out.print("Digite a formação: ");
                adm.setFormacao(sc.nextLine());

                System.out.print("Digite a especialidade: ");
                adm.setEspecialidade(sc.nextLine());

                adm.registraLogin();
                arquivo.writeInsertStartment(adm.toStringSql());
            } else if(resposta.equalsIgnoreCase("p")){
                // settar em paciente
            }else{
                System.err.println("Informe uma opção válida!");
            }

        } while (!nome.equalsIgnoreCase("sair"));

        sc.close();
    }
}
