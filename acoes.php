<?php
session_start();
require 'conexao.php';

// Criar Stand
if (isset($_POST['create_stand'])) {
    $imagem =mysqli_real_escape_string($conexao, trim($_POST['imagem']));
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $parte = mysqli_real_escape_string($conexao, trim($_POST['parte']));
    $forma = mysqli_real_escape_string($conexao, trim($_POST['forma']));
    $habilidade = mysqli_real_escape_string($conexao, trim($_POST['habilidade']));
    $especial = mysqli_real_escape_string($conexao, trim($_POST['especial']));
    $poder = mysqli_real_escape_string($conexao, trim($_POST['poder']));
    $velocidade = mysqli_real_escape_string($conexao, trim($_POST['velocidade']));
    $alcance = mysqli_real_escape_string($conexao, trim($_POST['alcance']));
    $resistencia = mysqli_real_escape_string($conexao, trim($_POST['resistencia']));
    $precisao = mysqli_real_escape_string($conexao, trim($_POST['precisao']));
    $potencial = mysqli_real_escape_string($conexao, trim($_POST['potencial']));

    $sql = "INSERT INTO stands (imagem, nome, parte, forma, habilidade, especial, poder, velocidade, alcance, resistencia, precisao, potencial) 
            VALUES ('$imagem', '$nome', '$parte', '$forma', '$habilidade', '$especial', '$poder', '$velocidade', '$alcance', '$resistencia', '$precisao', '$potencial')";
    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Stand criado com sucesso';
        header('Location: view.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Erro ao criar o Stand';
        header('Location: view.php');
        exit;
    }
}

// Atualizar Stand
if (isset($_POST['update_stand'])) {
    $imagem = mysqli_real_escape_string($conexao, trim($_POST['imagem']));
    $stand_id = mysqli_real_escape_string($conexao, $_POST['stand_id']);
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $parte = mysqli_real_escape_string($conexao, trim($_POST['parte']));
    $forma = mysqli_real_escape_string($conexao, trim($_POST['forma']));
    $habilidade = mysqli_real_escape_string($conexao, trim($_POST['habilidade']));
    $especial = mysqli_real_escape_string($conexao, trim($_POST['especial']));
    $poder = mysqli_real_escape_string($conexao, trim($_POST['poder']));
    $velocidade = mysqli_real_escape_string($conexao, trim($_POST['velocidade']));
    $alcance = mysqli_real_escape_string($conexao, trim($_POST['alcance']));
    $resistencia = mysqli_real_escape_string($conexao, trim($_POST['resistencia']));
    $precisao = mysqli_real_escape_string($conexao, trim($_POST['precisao']));
    $potencial = mysqli_real_escape_string($conexao, trim($_POST['potencial']));

    // Query de atualização
    $sql = "UPDATE stands SET 
                imagem = '$imagem',
                nome = '$nome', 
                parte = '$parte', 
                forma = '$forma', 
                habilidade = '$habilidade', 
                especial = '$especial', 
                poder = '$poder', 
                velocidade = '$velocidade', 
                alcance = '$alcance', 
                resistencia = '$resistencia', 
                precisao = '$precisao', 
                potencial = '$potencial'
            WHERE id = '$stand_id'";
    mysqli_query($conexao, $sql);

    // Verifica o resultado da operação
    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Stand atualizado com sucesso';
        header('Location: view.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Nenhuma alteração foi feita ou erro ao atualizar o Stand';
        header("Location: editStand.php?id=$stand_id");
        exit;
    }
}


// Deletar Stand
if (isset($_POST['delete_stand'])) {
    require_once 'conexao.php'; // Inclui a conexão com o banco de dados

    // Obtém o ID do stand
    $stand_id = $_POST['delete_stand'];

    // Consulta para deletar
    $sql = "DELETE FROM stands WHERE id = '$stand_id'";
    mysqli_query($conexao, $sql);

    // Verifica se foi deletado com sucesso
    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Stand deletado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Erro ao deletar o Stand';
    }

    // Redireciona para a página de visualização
    header('Location: view.php');
    exit;
}
?>
