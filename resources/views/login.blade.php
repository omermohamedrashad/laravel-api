<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Register</title>
        </head>
        <body>
            <form action="/auth/login" method="POST">
                @csrf

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Type your email">


                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Type your password">


                <button type="submit">Login</button>
            </form>
        </body>
    </html>
