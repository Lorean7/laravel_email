<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
    <title>CRUD</title>
</head>

<body>
    <div class="app">
        @php
            $login = $_GET['login'];
            $email = $_GET['email'];
            $user_data = $login .','. $email;
            dump($user_data);
            echo('hello'. ' ,' . $login);
        @endphp


        <form action="/user/add" method="post">
            @csrf
            <input type="hidden" name="user_data" value="{{$user_data}}" >
            <input type="text" placeholder="Введите текст сообщения" name="data">
            <button type="submit"  >Отправить в БД</button>
        </form>
    </div>
</body>

</html>