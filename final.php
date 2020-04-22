<!DOCTYPE html>
<html lang="es">
<head>
    <title> Webpay Php </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3..7/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h3>Compra exitosa</h3>
            <table class="table table-striped table-hover">
                <thead><tr><th>Campo</th><th>Valor</th></tr></thead>
                <tbody>
                    <tr>
                        <td> Monto </td>
                        <td id="amount"></td>
                    </tr>
                    <tr>
                        <td>Código de autorización</td>
                        <td id="authorizationCode"></td>
                    </tr>
                    <tr>
                        <td>Código de Respuesta </td>
                        <td id="responseCode"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    document.getElementById('amount').innerHTML = window.localStorage.getItem('amount');
    document.getElementById('authorizationCode').innerHTML = window.localStorage.getItem('authorizationCode');
    document.getElementById('responseCode').innerHTML = window.localStorage.getItem('responseCode');


</html>
                    
