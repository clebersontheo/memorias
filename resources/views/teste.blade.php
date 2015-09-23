@foreach($fotografias as $fotografia)
    <h1>{{ $fotografia->nome_fotografia }}</h1>
    <p>{{ $fotografia->descricao }}</p>
    <p>{{ $fotografia->cidade->nome_cidade }}</p>
    <img src="{{ $fotografia->caminho_alta_resolucao }}" width="200px">
    <p>{{ $fotografia->bairro->nome_bairro }}</p>
    @foreach($fotografia->pessoa as $pe)
        <p>{{ $pe->nome_pessoa }}</p><p>{{ $pe->pivot->tipo_pessoa }}</p>
    @endforeach

@endforeach