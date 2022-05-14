<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Index</title>
</head>
<body>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach
        @endif
        @if(session('message'))
            <div class="text-success">{{ session('message') }}</div>
        @endif
    </div>
    <div class="p-3">
        Bem vindo, <b>{{ $user->name }}</b>. <a href="{{ route('dashboard.user.logout.get') }}">Desconectar</a>
    </div>
    <div class="d-flex flex-row">
        <div class="p-3">
            <h3>Universidades Inscritas:</h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>País</th>
                        <th>Nome</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($universitiesIn as $uni)            
                        <tr>
                            <td>{{ $uni->alpha_two_code }}</td>
                            <td>{{ $uni->name }}</td>
                            <td>{{ $uni->status->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-3">
            <h3>Sugerir Universidades:</h3>
            {{ Form::open(['route' => 'dashboard.university.suggestion.post', 'method' => 'POST']) }}
                <div class="d-flex flex-column">
                    <div class="col">
                        {{ Form::label('alpha_two_code', 'Codigo do País (2 letras) ') }}
                        {{ Form::text('alpha_two_code', null) }}
                    </div>
                    <div class="col">
                        {{ Form::label('country', 'País ') }}
                        {{ Form::text('country', null) }}
                    </div>
                    <div class="col">
                        {{ Form::label('name', 'Nome ') }}
                        {{ Form::text('name', null) }}
                    </div>
                    <div class="domains">
                        {{ Form::label('domains', 'Dominio* ') }}
                        {{ Form::text('domains', null) }}
                    </div>
                    <div class="web_pages">
                        {{ Form::label('web_pages', 'Página Web* ') }}
                        {{ Form::text('web_pages', null) }}
                    </div>
                    <div>
                        <small>* Separar dominios e páginas web por virgulas.</small>
                    </div>
                    <div>
                        {{ Form::button('Enviar', ['type' => 'submit']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>

    <div class="d-flex flex-column p-3">
        <div>
            {{ Form::open(['route' => 'dashboard.index.get', 'method' => 'GET']) }}
                {{ Form::label('name', 'Nome: ') }}
                {{ Form::text('name', null) }}
    
                {{ Form::button('Pesquisar', ['type' => 'submit']) }}
            {{ Form::close() }}
        </div>
        <div>
            <h3>Universidades:</h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>País</th>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($universities as $uni)            
                        <tr>
                            <td>{{ $uni->alpha_two_code }}</td>
                            <td>{{ $uni->name }}</td>
                            <td>{{ $uni->status->name }}</td>
                            <td><a href="{{ route('dashboard.university.subscribe.get', $uni->id) }}">Inscrever-se</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
<script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</html>