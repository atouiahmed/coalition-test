<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coalition Test</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

    <div class="row m-5">
        <div class="pull-left m-4">
            <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add</button>
        </div>
        <table class="table">
            <thead>
            <tr>

                <th>Product Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">SubTotal</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="pull-right">
            <p class="font-weight-bold">Total value number: <span id="total">0</span></p>
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
                    <input id="InputProductId" type="hidden">
                    <div class="form-group">
                        <label for="InputProductName">Product Name</label>
                        <input required type="text" class="form-control" id="InputProductName"
                               placeholder="Enter Product Name">
                        <p class="text-danger name_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="InputQuantity">Product Quantity</label>
                        <input required type="number" class="form-control" id="InputQuantity"
                               placeholder="Enter Product Quantity">
                        <p class="text-danger qte_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="InputPrice">Product Price</label>
                        <input required type="number" class="form-control" id="InputPrice"
                               placeholder="Enter Product Price">
                        <p class="text-danger price_error"></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="create_row" type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
</body>
<script src="js/script.js"></script>


</html>
