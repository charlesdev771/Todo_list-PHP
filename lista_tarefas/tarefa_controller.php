<?php

    require "../lista_tarefas/tarefa.model.php";
    require "../lista_tarefas/tarefa.service.php";
    require "../lista_tarefas/conexao.php";


    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    print($acao);

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
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
    } else if ($acao == 'atualizar')
    {
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id']);
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        
        if ($tarefaService->atualizar()) 
        {
            header('Location: nova_tarefa.php');
        }
    }else if ($acao == 'remover')
    {
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();
        header('Location: nova_tarefa.php');

    }

    else ($acao == 'recuperarTarefasPendentes')
    {
        $tarefa = new Tarefa();
        $tarefa->__set('id_status', 1);
        $conexao = new Conexao();

        $tarefaService = new TarefaService();
        $tarefas = $tarefaService->recuperarTarefasPendentes();
    }



?>