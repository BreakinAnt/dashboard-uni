<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
        @if(session('message'))
            <div>{{ session('message') }}</div>
        @endif
    </div>
    <div>
        Bem vindo, <b>{{ $user->name }}</b>.
    </div>
    <div>
        {{ Form::open(['route' => 'dashboard.index.get', 'method' => 'GET']) }}
            {{ Form::label('name', 'Nome') }}
            {{ Form::text('name', null) }}

            {{ Form::button('Pesquisar', ['type' => 'submit']) }}
        {{ Form::close() }}
    </div>
    <table>
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
</body>
</html>