<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Register</title>
        </head>
        <body>
            <form action="/register" method="POST">
                @csrf
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Type your username">


                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Type your email">


                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Type your password">


                <button type="submit">Register</button>
            </form>
        </body>
    </html>
