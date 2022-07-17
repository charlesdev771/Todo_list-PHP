<?php

    require "../lista_tarefas/tarefa.model.php";
    require "../lista_tarefas/tarefa.service.php";
    require "../lista_tarefas/conexao.php";

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir')
    {
        $tarefa = new Tarefa();

        $tarefa->__set('tarefa', $_POST['tarefa']);
    
        $conexao = new Conexao();
    
        $tarefaService = new TarefaService($conexao,$tarefa);
        $tarefaService->inserir();
    
        header('Location: http://127.0.0.1/lista_tarefas_public/?inclusao=0');
    }
    else if($acao == 'recuperar')
    {
        echo 'Chegamos';
    }





?>