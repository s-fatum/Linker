<?php
require 'app/functions.php';
$host =  'http://'.$_SERVER['HTTP_HOST'].'/';


if (isset($_GET['clear'])) {
    $filename = $_SERVER['DOCUMENT_ROOT'].'/app/array.txt';

    @file_put_contents($filename, "");

    header( 'Refresh:1; URL=http://'.$_SERVER['HTTP_HOST'].'/' );
}
?>

<html>
<head>
</head>
<body>




<form class="my-form" id="myForm">
    <p>
        Сcылка:
        <input id="put_url" type="text" placeholder="Введите ссылку" name="url" required>
    </p>
    <button type="submit">Отправить</button>
</form>

<div id="response"></div>




<script type="text/javascript">
    var responsc = document.querySelector('#response');

    var form = document.querySelector('#myForm');

    form.addEventListener('submit', function(evt) {
        evt.preventDefault();

        var formData = {
            url: document.querySelector('input[name="url"]').value,
        };

        var request = new XMLHttpRequest();

        request.addEventListener('load', function() {
            // В этой части кода можно обрабатывать ответ от сервера
            console.log(request.response);
            document.getElementById("put_url").value = "";
            response.innerHTML = request.response;
        });

        request.open('POST', 'app/engine.php', true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        request.send('url=' + encodeURIComponent(formData.url));
    });
</script>

</body>
</html>


<?php if (get_data()) { ?>
    <br>
    <hr>
    <a href="?clear=1">Стереть данные</a>
<?php
}


/**  что у нас в файле */
echo '<br><br><pre>';
print_r(get_data());
echo '</pre>';


?>