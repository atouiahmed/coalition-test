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
            <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add</button>
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
        <div class="pull-right">
            <p class="font-weight-bold">Total: 200</p>
        </div>
    </div>
</div>
<div id="createModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="InputProductName">Product Name</label>
                        <input required type="text" class="form-control" id="InputProductName" placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                        <label for="InputQuantity">Product Quantity</label>
                        <input required type="number" class="form-control" id="InputQuantity"  placeholder="Enter Product Quantity">
                    </div>
                    <div class="form-group">
                        <label for="InputPrice">Product Price</label>
                        <input required type="number" class="form-control" id="InputPrice"  placeholder="Enter Product Price">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</html>
