<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Barbearia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

@vite([
    'resources/css/welcome.css',
    'resources/css/login/login.css',
    'resources/css/components/sidebar.css',
    'resources/css/home/home.css',
    'resources/css/user/user-index.css',
    'resources/css/user/user-create.css',
    'resources/css/user/user-edit.css',
    'resources/css/employees/employee-index.css',
    'resources/css/employees/employee-create.css',
    'resources/css/employees/employee-edit.css',
    'resources/css/clients/client-create.css',
    'resources/css/clients/client-edit.css',
    'resources/css/clients/client-index.css',
    'resources/css/payment/payment-index.css',
    'resources/css/payment/payment-create.css',
    'resources/css/payment/payment-edit.css',
    'resources/css/services/service-index.css',
    'resources/css/services/service-create.css',
    'resources/css/services/service-edit.css',
])

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
</style>

<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
