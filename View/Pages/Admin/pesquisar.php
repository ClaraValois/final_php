<?php

// Incluir a conexão com o banco de dados
include_once "./banco.php";

// Receber os dados do JavaScript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Acessa o IF quando o campo pesquisar usuário possuir valor
if (!empty($dados['texto_pesquisar'])) {

    // Criar a variável com o caracter "%" indicando que pode ter letras antes e depois do valor pesquisado
    $nome = "%" . $dados['texto_pesquisar'] . "%";

    // Criar QUERY pesquisar usuários
    $query_users = "SELECT id_user, nome_user, email_user
            WHERE nome_user LIKE :nome_user";
    // Preparar a QUERY
    $result_usuarios = $conn->prepare($query_usuarios);

    // Substitui o link pelo valor que vem do formulário
    $result_usuarios->bind_param(':nome_user', $nome);

    // Executar a QUERY
    $result_usuarios->execute();

    // Recebe os dados dos usuários
    $listar_usuarios = "";

    // Acessa o IF quando retornar usuário no banco de dados
    if (($result_usuarios) and ($result_usuarios-> num_rows() != 0)) {

        // Ler os registros retornado do banco de dados 
        while($row_usuario = array( $result_usuarios->fetch(PDO::FETCH_ASSOC))){

            // Extrair o array para imprimir através da chave no array
            extract($row_usuario);

            // Imprimir o valor de cada coluna retornada do banco de dados
            $listar_usuarios .= "ID: $id<br>";
            $listar_usuarios .= "Nome: $nome<br>";
            $listar_usuarios .= "E-mail: $email<br>";
            $listar_usuarios .= "<hr>";

        }

        // Criar o array de informações que será retornado para o JavaScript
        $retorna = ['status' => true, 'dados' => $listar_usuarios];
    } else {
        // Criar o array de informações que será retornado para o JavaScript
        $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>"];
    }
} else {
    // Criar o array de informações que será retornado para o JavaScript
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>"];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);
