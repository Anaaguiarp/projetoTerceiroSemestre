import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;

public class File {
    private static String fileName = "Usuarios.txt";

    public void writeInsertStartment(String insert){
        try{
            FileWriter fw = new FileWriter(fileName, true);
            PrintWriter pw = new PrintWriter(fw);
            pw.println(insert);
            pw.close(); //Encerra o printer e escreve
        }catch(IOException e){
            System.err.println("Erro ao escrever um arquivo.txt \n" + e.getMessage());
        }
    }
}