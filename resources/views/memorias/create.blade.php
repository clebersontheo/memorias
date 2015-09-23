<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Fotografia e Memória</title>
    <script src="/js/jquery.js"></script>
</head>
<body>
<header>

</header>
<main>
    <h1>Inserir uma foto</h1>
    <form action="{{ route('memorias.store') }}" method="POST" class="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div>
            <label for="foto">Foto</label>
            <input type="file" name="foto" />
        </div>
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome"/>
        </div>
        <div>
            <label for="producao">Produção</label>
            <textarea name="producao" id="producao"></textarea>
        </div>
        <div>
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao"></textarea>
        </div>
        <div>
            <label for="conservacao">Conservação</label>
            <select name="conservacao" id="conservacao">
                <option value="1">Ruim</option>
                <option value="2">Média</option>
                <option value="3">Boa</option>
            </select>
        </div>
        <div>
            <label for="cor">Cor</label>
            <select name="cor" id="cor">
                <option value="1">Colorida</option>
                <option value="2">Preto e Branca</option>
            </select>
        </div>
        <div>
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria">
                <option value="1">Monumentos</option>
                <option value="2">Paisangens</option>
                <option value="1">Pessoas</option>
                <option value="2">Eventos</option>
            </select>
        </div>
        <div>
            <label for="pessoaspresentes">Pessoas Presentes</label>
            <textarea name="pessoas_presentes" id="pessoaspresentes"></textarea>
        </div>
        <div>
            <label for="ano">Ano</label>
            <input type="text" name="ano" id="ano"/>
        </div>
        <div>
            <label for="referencia">Referência</label>
            <input type="text" name="referencia" id="referencia"/>
        </div>
        <div>
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor"/>
        </div>
        <div>
            <label for="fonte">Fonte</label>
            <input type="text" name="fonte" id="fonte"/>
        </div>
        <div>
            <label for="pesquisador">Pesquisador</label>
            <input type="text" name="pesquisador" id="pesquisador"/>
        </div>
        <div>
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade"/>
        </div>
        <div>
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro"/>
        </div>
        <div>
            <label for="logradouro">Logradouro</label>
            <input type="text" name="logradouro" id="logradouro"/>
        </div>
        <input type="submit">
    </form>

</main>
<footer>

</footer>
</body>
</html>