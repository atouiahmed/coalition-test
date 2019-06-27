<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coalition Test</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>
<div class="container">

    <div class="row m-5">
        <div class="pull-left m-4">
            <button class="btn btn-primary">Add</button>
            <button class="btn btn-danger">Delete</button>
        </div>
        <table class="table">
            <thead>
            <tr>

                <th>#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th scope="col">Created At</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" class="form-check"></td>
                <td>Product</td>
                <td>2</td>
                <td>100</td>
                <td>200</td>
                <td>12/01/2015</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
