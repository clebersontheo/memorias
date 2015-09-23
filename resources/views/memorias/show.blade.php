<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Material Design Lite</title>
    <link rel="stylesheet" href="/css/style.css"/>
</head>
<body>

@foreach($fotografias as $fotografia)
<div class="sombra-2dp">
    <img src="{{ $fotografia->caminho_alta_resolucao }}" width="100%">
</div>

<div class="buttonDownload">
    +
</div>

<div class="card sombra-2dp">
    <div class="titulo">
        <h2>Nome</h2>
    </div>
    <div class="conteudoTexto">
        {{ $fotografia->nome_fotografia }}
    </div>
</div>

<div class="card sombra-2dp">
    <div class="titulo">
        <h2>Produção</h2>
    </div>
    <div class="conteudoTexto">
        {{ $fotografia->producao }}
    </div>
</div>

<div class="card sombra-2dp">
    <div class="titulo">
        <h2>Descrição</h2>
    </div>
    <div class="conteudoTexto">
        {{ $fotografia->descricao }}
    </div>
</div>

<div class="card sombra-2dp">
    <div class="titulo">
        <h2>Conservação</h2>
    </div>
    <div class="conteudoTexto">
        {{ $fotografia->conservacao }}
    </div>
</div>

<div class="card sombra-2dp">
    <div class="titulo">
        <h2>Cor</h2>
    </div>
    <div class="conteudoTexto">
        {{ $fotografia->cor }}
    </div>
</div>

<div class="card sombra-2dp">
    <div class="titulo">
        <h2>Pessoas presentes</h2>
    </div>
    <div class="conteudoTexto">
        Cleberson Conrado da Silva e Gabiel Fernandes.
    </div>
</div>

<div class="card sombra-2dp">
    <div class="titulo">
        <h2>Ano</h2>
    </div>
    <div class="conteudoTexto">
        {{ $fotografia->ano }}
    </div>
</div>

<div class="card sombra-2dp">
    <div class="titulo">
        <h2>Referência</h2>
    </div>
    <div class="conteudoTexto">
        {{  $fotografia->referencia }}
    </div>
</div>
<div class="card sombra-2dp">
    <div class="titulo">
        <h2>Autor</h2>
    </div>
    <div class="conteudoTexto">
        Cleberson Conrado da Silva
    </div>
</div>

<div class="card sombra-2dp">
    <div class="titulo">
        <h2>Fonte</h2>
    </div>
    <div class="conteudoTexto">
        Gabriel Fernandes de Oliveira
    </div>
</div>

<div class="card sombra-2dp">
    <div class="titulo">
        <h2>Endereço</h2>
    </div>
    <div class="conteudoTexto">
        {{ $fotografia->cidade->nome_cidade }}, {{ $fotografia->bairro->nome_bairro }}, {{ $fotografia->logradouro->nome_logradouro }}.
    </div>
</div>
    @endforeach


</body>
</html>