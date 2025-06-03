package dao;

import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class FileHandler {
    private static final String FILE_NAME = "inserts.sql";

    public static synchronized void writeInsertStatement(String insertStatement) {
        try (FileWriter fw = new FileWriter(FILE_NAME, true);
            PrintWriter pw = new PrintWriter(fw)) {
            pw.println(insertStatement);
        } catch (IOException e) { // Exception para Input Output
            System.err.println("Erro ao escrever no arquivo '" + FILE_NAME + "': " + e.getMessage());
        }
    }

    public static synchronized List<String> readLines() {
        try {
            if (!Files.exists(Paths.get(FILE_NAME))) {
                return new ArrayList<>();
            }
            return Files.readAllLines(Paths.get(FILE_NAME));
        } catch (IOException e) {
            System.err.println("Erro ao ler o arquivo '" + FILE_NAME + "': " + e.getMessage());
            return new ArrayList<>();
        }
    }

    public static String getValueFromInsert(String insertLine, String fieldName) {
        Pattern pattern = Pattern.compile(fieldName + "\\s*=\\s*'([^']*)'|" + fieldName + "\\s*=\\s*([^,)]+)");
        Matcher matcher = pattern.matcher(insertLine);
        if (matcher.find()) {
            if(matcher.group(1) != null) return matcher.group(1);
            if(matcher.group(2) != null) return matcher.group(2);
        }

        if (insertLine.contains("VALUES (")) {
            String valuesPart = insertLine.substring(insertLine.indexOf("VALUES (") + 8, insertLine.lastIndexOf(")"));
            String[] values = valuesPart.split(",\\s*");

            if (insertLine.startsWith("INSERT INTO Paciente")) {
                if (fieldName.equals("id") && values.length > 0) return values[0].trim();
                if (fieldName.equals("nome") && values.length > 1) return values[1].trim().replace("'", "");
                if (fieldName.equals("email") && values.length > 2) return values[2].trim().replace("'", "");
                if (fieldName.equals("senha") && values.length > 3) return values[3].trim().replace("'", "");
            }
        }

        return null;
    }

    public static int getNextId(String entityTypePrefix) {
        List<String> lines = readLines();
        int maxId = 0;
        String idMarker = "VALUES (";

        for (String line : lines) {
            if (line.startsWith("INSERT INTO " + entityTypePrefix)) {
                try {
                    int startIndex = line.indexOf(idMarker) + idMarker.length();
                    int endIndex = line.indexOf(",", startIndex);
                    if (endIndex == -1) {
                        endIndex = line.indexOf(")", startIndex);
                    }
                    if (startIndex < endIndex) {
                        String idStr = line.substring(startIndex, endIndex).trim();
                        int id = Integer.parseInt(idStr);
                        if (id > maxId) {
                            maxId = id;
                        }
                    }
                } catch (Exception e) {
                    System.err.println("Erro ao parsear ID da linha: " + line + " - " + e.getMessage());
                }
            }
        }
        return maxId + 1;
    }
}
