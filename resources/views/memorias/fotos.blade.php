<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Fotografia e Memória - Ji-Paraná</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fotos.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
</head>
<body>

<header>
    <div class="logo">
        <img src="/img/site/logo.png" alt="Logo Fotografia e memória">
    </div>
    <div class="titulo">
        <h1>FOTOGRAFIA E MEMÓRIA</h1>
    </div>

    <nav id="menu">
        <ul>
            <li><a href="/">HOME</a></li>
            <li><a href="#">FOTOS</a></li>
            <li><a href="/sobre">SOBRE</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="conteudo" id="content">
        @foreach($fotografias  as $fotografia)
            <div class="item"><a href="{{ route('memorias.show', ['id'=>$fotografia->id]) }}"><img src="{{ $fotografia->caminho_alta_resolucao }}"/></a></div>
        @endforeach
        <div class="pagiacao">
            {!! $fotografias->render() !!}
        </div>
    </div>
</main>

<script src="/js/infinite-scroll-master/jquery.infinitescroll.min.js"></script>
<!-- INFINITE SCROLL INITIATE -->
<script>
    $('#content').infinitescroll({

        navSelector  : "ul.pagination",
        // selector for the paged navigation (it will be hidden)
        nextSelector : "ul.pagination li:last-child a",
        // selector for the NEXT link (to page 2)
        itemSelector : "#content img",
        // selector for all items you'll retrieve
        extraScrollPx: 200
    });
</script>
</body>
</html>