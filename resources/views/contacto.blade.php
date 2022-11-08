<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto Formulario</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/contacto-style.css">

</head>
<body>
    
    <header>
        <h1 id="title">Contacto</h1>
        <p id="description"><em>Please, fill out this form</em></p>
    </header>

    <form id="survey-form" action="/recepcion-validacion" method="POST">
        @csrf
        <label id="name-label" for="name">Name</label>
        <input id="name" type="text" placeholder="Enter your name" name="name" value = {{$nombre}}>

        <label id="email-label" for="email">Email</label>
        <input id="email" type="text" placeholder="example@gmail.com" name="email" value= {{$email}}>
        

        <p>Do you have any suggestion on what I should study next?</p>
        <textarea id="suggestions" name="suggestions" placeholder="Add your suggestions here..."></textarea>
        
        <input id="submit" type="submit" value="Submit">

        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    <br>
                @endforeach
            </ul>
        </div>
        @endif
    </form>

</body>
</html>