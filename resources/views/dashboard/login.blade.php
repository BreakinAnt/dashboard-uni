<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Login</title>
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
        <h3>Login:</h3>
        {{ Form::open(['route' => 'dashboard.user.login.post']) }}
            <div>
                {{ Form::label('email', 'E-mail') }}
                {{ Form::text('email', null) }}
            </div>
            <div>
                {{ Form::label('password', 'Senha') }}
                {{ Form::password('password', null) }}
            </div>
            <div>
                {{ Form::button('Entrar', ['type' => 'submit']) }}
            </div>
        {{ Form::close() }}
    </div>
    <div>
        <h3>Não é cadastrado?</h3> 
        {{ Form::open(['route' => 'dashboard.user.signup.post']) }}
            <div>
                {{ Form::label('name', 'Nome') }}
                {{ Form::text('name', null) }}
            </div>
            <div>
                {{ Form::label('email', 'E-mail') }}
                {{ Form::text('email', null) }}
            </div>
            <div>
                {{ Form::label('password', 'Senha') }}
                {{ Form::password('password', null) }}
            </div>
            <div>
                {{ Form::button('Cadastrar', ['type' => 'submit']) }}
            </div>
        {{ Form::close() }}
    </div>
</body>
<script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</html>