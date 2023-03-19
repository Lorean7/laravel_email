var message = false;
    setInterval(function() {
        // делаем запрос к серверу
        fetch('/message')
            .then(function(response) {
                // получаем данные с сервера
                response.text().then(function(data) {
                    // обновляем данные на странице
                    var messages = JSON.parse(data).messages;
                    console.log(messages)
                    return messages})
                    // ...
                    .then(function(response) {
                        // обрабатываем ответ сервера
                        console.log(response);
                        var url = document.URL
                        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                        var http = new XMLHttpRequest();
                        var url = "/process-data";
                        
                        http.open("POST", url, true);


                        http.setRequestHeader("Content-Type", "application/json");
                        http.setRequestHeader("X-CSRF-TOKEN", csrfToken);

                        http.onreadystatechange = function() {
                        if(http.readyState == 4 && http.status == 200) {
                            alert(http.responseText);
                        }
                    }
                    http.send(response);
                    }).catch(function(error) {
                        // обрабатываем ошибку запроса
                        console.error(error);
                    });
                    
                });
            }, 5000); // опрашиваем сервер каждые 5 секунд
