<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>File Upload Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
<form action="{{ route('consolidated.list.check') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Имя:</label>
    <input name="name" id="name" type="text">

    <button type="submit">Отправить</button>
</form>

@if(session()->has('success'))
    <div class="column">
        <div class="alert alert-success">
            <div class="notification is-success is-light">
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
@elseif(session()->has('danger'))
    <div class="column">
        <div class="alert alert-danger">
            <div class="notification is-danger is-light">
                {{ session()->get('danger') }}
            </div>
        </div>
    </div>
@endif
</body>
</html>
