$(document).ready(function () {
    //attach csrf token to request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //clear modal fields and errors
    function clearModal() {
        var modal = $('#createModal')
        modal.modal('hide');
        modal.find('input').val('');
        modal.find('.text-danger').text('');
        //clear fields

    }

    //handel errors of validation
    function handleErrors(errors) {
        if (errors['name'])
            $('.name_error').text(errors['name'][0])
        if (errors['qte'])
            $('.qte_error').text(errors['qte'][0])
        if (errors['price'])
            $('.price_error').text(errors['price'][0])
    }

    function fetchData(data) {
        var rows = []
        var total = 0;
        //fetch data and render to table
        data.forEach(function (item) {

            rows.push(
                '<tr id="' + item.id + '">' +
                '<td class="id">' + item.id + '</td>' +
                '<td class="name">' + item.name + '</td>' +
                '<td class="qte">' + item.qte + '</td>' +
                '<td class="price">' + item.price + '</td>' +
                '<td class="total">' + (item.price * item.qte) + '</td>' +
                '<td>' + item.created_at + '</td>' +
                '<td>' + '<button class="btn btn-danger delete_row" >Delete</button>' +
                '<button class="btn btn-success edit_row">Edit</button>' +
                '</td>'
                + '</tr>'
            )
            total += (item.price * item.qte);
        });
        $('table').find('tbody').html(rows)
        $('#total').text(total);

    }

    function loadData() {

        //load all data
        $.get('/products', function (data) {
            fetchData(data);
        })

    }

    loadData();
    $('#create_row').click(function () {

        //get required data
        var id = $('#InputProductId').val();
        var data = {
                name: $('#InputProductName').val(),
                qte: $('#InputQuantity').val(),
                price: $('#InputPrice').val(),
            }
        ;
        //check if action is create or update action
        if (id) {
            $.ajax({
                url: 'products/' + id,
                type: 'PUT',
                success: function (data) {
                    fetchData(data)
                    clearModal()
                },
                data: data
            }).catch(function (res) {
                handleErrors(res.responseJSON.errors)
            });
        }

        else {

            $.ajax({
                url: 'products',
                type: 'POST',
                timeout: 5000,
                success: function (data) {
                    fetchData(data)
                    clearModal()
                },

                data: data
            }).catch(function (res) {
                handleErrors(res.responseJSON.errors)
            });
        }

    })

    //bind dynamic edit buttons of dynamic rows to click event
    $('body').on('click', '.delete_row', function () {
        var id = $(this).closest('tr').attr('id');
        if (confirm('are you sure?')) {
            $.ajax({
                url: 'products/' + id,
                type: 'DELETE',
                success: function (data) {
                    fetchData(data)
                },
            });
        }
    });
    //bind dynamic delete buttons of dynamic rows to click event
    $('body').on('click', '.edit_row', function () {

        var pr = $(this).closest('tr');
        $('#InputProductId').val(pr.attr('id')),
            $('#InputProductName').val(pr.find('.name').text()),
            $('#InputQuantity').val(pr.find('.qte').text()),
            $('#InputPrice').val(pr.find('.price').text()),
            $('#createModal').modal('show');
    });


//clear modal on hide
    $('#createModal').on('hidden.bs.modal', function (e) {
        clearModal();
    })
})