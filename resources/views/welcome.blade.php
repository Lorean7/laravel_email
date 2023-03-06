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
        <div class="mode_form" id='mode_form'>
            <input type="button" value="Изменить режим" id=''>
        </div>
        <form class="form_registration" id='form_registration' action="/registration" method="post">
            @csrf
            <input type="text" placeholder="Введите имя пользователя" name="login">
            <input type="text" placeholder="Введите почту" name="email">
            <input type="text" placeholder="Введите пароль" name="password">
            <input type="text" placeholder="Повторите пароль" name="password_repeat">
            <button type="submit">Регистрация</button>
        </form>
        <form class="form_auth" id='form_auth' action="/auth" method="post">
            @csrf
            <input type="text" placeholder="Введите имя пользователя" name="login">
            <input type="text" placeholder="Введите пароль" name="password">
            <button type="submit">Авторизация</button>
        </form>
    </div>
    <script>
        const form_auth = document.getElementById('form_auth');
        const form_registration = document.getElementById('form_registration');
        form_auth.hidden = true;
        document.getElementById('mode_form').addEventListener('click',()=>{
            if(form_registration.hidden != true){
                form_auth.hidden = false;
                form_registration.hidden = true
            }else if(form_registration.hidden == true){
                form_registration.hidden = false
                form_auth.hidden = true;
            }
        })
    </script>
</body>

</html>