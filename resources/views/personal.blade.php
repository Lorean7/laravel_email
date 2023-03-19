<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- 
    <script src="../js/pross.js"></script> -->
    
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
        <div>
           
        </div>
        <div id="messages-container"></div>

        <form action="/user/add" method="post">
            @csrf
            <input type="hidden" name="user_data" value="{{$user_data}}" >
            <input type="text" placeholder="Введите текст сообщения" name="data">
            <button type="submit">Отправить в БД</button>
        </form>
    </div>
</body>

</html>