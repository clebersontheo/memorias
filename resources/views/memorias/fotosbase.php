<?php $admin = false ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>
<div class="container">
    @yield('content')
    <h1>FOTOS</h1>
    <a href="{{ route('memorias.create') }}">Nova</a>
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fotografias  as $fotografia)
        <tr>
            <th>{{ $fotografia->id }}</th>
            <th>{{ $fotografia->nome_fotografia }}</th>
            <th><img src="{{ $fotografia->caminho_alta_resolucao }}" width="200px"></th>
            <th>
                <a href="{{ route('memorias.show', ['id'=>$fotografia->id]) }}">Ver</a>
                @if($admin)
                <a href="{{ route('memorias.edit', ['id'=>$fotografia->id]) }}">Editar</a>
                <form action="{{ route('memorias.update', ['id'=>$fotografia->id]) }}" class="form" method="POST" style="display:inline-block">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="remove">
                </form>
                @endif
            </th>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>