<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/style/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../assets/style/navigation.css">
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Room Rental Management System</title>
</head>

<body>

    <div class="modal fade" id="room_btn" tabindex="-1" aria-labelledby="room_btn" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3">
                    <h1 class="modal-title fs-6 fw-bold" id="modalTitle">Add New Room</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div class="error_sign_in_message"></div>
                    <div class="container p-0">
                        <div class="container p-0 m-0">
                            <label for="room_num" class="form-label fw-medium text-secondary">Room Number</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light text-secondary"><i class="bi bi-123"></i></span>
                                <input type="text" class="form-control bg-light" placeholder="e.g 201" name="room_num" id="room_num" required>
                            </div>
                        </div>
                        <div class="container p-0 mb-2 d-flex align-content-center justify-content-between">
                            <div class="container p-0 me-3">
                                <label for="type" class="form-label fw-medium text-secondary">Type</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-secondary"><i class="bi bi-tag"></i></span>
                                    <select name="type" id="type" class="form-select bg-light fw-medium">
                                        <option value="Solo" selected>Solo</option>
                                        <option value="Duo">Duo</option>
                                        <option value="Studio">Studio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="container p-0 me-3">
                                <label for="floor" class="form-label fw-medium text-secondary">Floor</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-secondary"><i class="bi bi-arrow-up-square"></i></span>
                                    <input type="number" class="form-control bg-light fw-medium text-secondary" min="1" max="5" name="floor" id="floor" required>
                                </div>
                            </div>
                        </div>
                        <div class="container p-0 mb-2">
                            <label for="rent_price" class="form-label fw-medium text-secondary">Monthly Price (₱)</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-light text-secondary"><i class="bi bi-currency-exchange"></i></span>
                                <input type="number" class="form-control bg-light" placeholder="e.g 5000" min="1" max="5000" name="rent_price" id="rent_price" required>
                            </div>
                        </div>
                        <div class="container p-0 mb-2">
                            <label for="status" class="form-label fw-medium text-secondary">Status</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-secondary"><i class="bi bi-tag"></i></span>
                                <select name="status" id="status" class="form-select bg-light fw-medium">
                                    <option value="Available" selected>Available</option>
                                    <option value="Occupied">Occupied</option>
                                    <option value="Maintenance">Maintenance</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-light w-100 fw-medium" style="background-color: #0f2573;" name="add_room" id="add_room">Add Room</button>
                </div>
            </div>
        </div>
    </div>

    <main>

        <div class="container-fluid p-0 m-0 min-vh-100 bg-light d-flex align-content-center justify-content-between">
            <?php include __DIR__ . "/../../../layout/adminNav.php"; ?>

            <div class="container-fluid p-0 bg-light">
                <div class="container mw-100 p-4 m-0 bg-white border-bottom  d-flex align-content-center justify-content-between">
                    <div class="container p-0 m-0">
                        <h1 class="fs-5 fw-bold m-0" style="color: #0f2573;">Room Management</h1>
                        <p class="m-0 text-secondary fw-medium" style="font-size: 12px;"><?php echo date('F d, Y'); ?> Admin View</p>
                    </div>
                    <button type="button" class="btn btn-white text-secondary fw-medium border rounded-5"><i class="bi bi-bell"></i></button>
                </div>

                <div class="container p-4 m-0 mw-100 d-flex align-content-center justify-content-between">
                    <div class="container p-0 m-0 d-flex align-content-center">
                        <div class="input-group w-25">
                            <span class="input-group-text bg-white text-secondary"><i class="bi bi-search"></i></span>
                            <input type="search" class="form-control bg-white" placeholder="Search rooms..." name="search_rooms" id="search_rooms">
                        </div>
                        <select name="filter_status" name="filter_status" id="filter_status" class="form-select ms-3" style="width: 145px;">
                            <option value="Available" selected>Available</option>
                            <option value="Occupied">Occupied</option>
                            <option value="Maintenance">Maintenance</option>
                        </select>
                        <button type="submit" class="btn fw-medium text-light ms-3" style="background-color: #0f2573; width: 145px;" name="filter_btn" id="filter_btn">
                            <i class="bi bi-funnel me-2"></i>Filter
                        </button>
                    </div>
                    <button type="button" class="btn fw-medium text-light" style="background-color: #0f2573; width: 150px;" data-bs-toggle="modal" data-bs-target="#room_btn">
                        <i class="bi bi-plus-lg me-2"></i>Add Room
                    </button>
                </div>

                <div class="container p-4 m-0 mw-100">
                    <table class="table border">
                        <thead>
                            <th class="fw-medium text-secondary">Room No.</th>
                            <th class="fw-medium text-secondary">Floor</th>
                            <th class="fw-medium text-secondary">Type</th>
                            <th class="fw-medium text-secondary">Monthly Rent</th>
                            <th class="fw-medium text-secondary">Status</th>
                            <th class="fw-medium text-secondary">Current Tenant</th>
                            <th class="fw-medium text-secondary">Actions</th>
                        </thead>
                        <tbody id="room_data">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

    <script>
        $(document).ready(function() {

            roomTableData()
            filterTableData();
            add_room() 
            del_room_data()

        })

        function roomTableData() {
            $.ajax({
                    method: 'GET',
                    url: '../../../src/controller/api/admin/Room.php',
                    dataType: "json",
                    success: function(res) {
                        console.log(res)
                        $.each(res.data, function(key, val) {
                            $('#room_data').append(`<tr>\
                                                    <th class="fw-medium" style="color: #0f2573;">${val[1]}</th>\
                                                    <td class="fw-medium text-secondary">${val[2]}</td>\
                                                    <td class="fw-medium text-secondary">${val[3]}</td>\
                                                    <td class="fw-medium" style="color: #0f2573;">₱${val[4]}</td>\
                                                    <td><p class="m-0 rounded-4 ${val[5] == 'Available' ? "text-success bg-success-subtle border border-success-subtle" :
                                                                                  val[5] == 'Occupied' ? 'text-primary bg-primary-subtle border border-primary-subtle'  :
                                                                                  val[5] == 'Maintenance' ? 'text-warning bg-warning-subtle border border-warning-subtle':
                                                                                  ""} 
                                                                                  text-center" style="width: 100px;">${val[5]}</p></td>\
                                                    <td >@social</td>\
                                                    <td class="p-0"  style="font-family:monospace;">
                                                        <button type="button" class="btn d-inline text-secondary" value="${val[0]}" name="edit_btn" id="edit_btn">
                                                        <i class="bi bi-pencil-square me-1"></i>
                                                        Edit
                                                        </button>
                                                        <button type="button" class="btn d-inline text-danger" value="${val[0]}" name="del_btn" id="del_btn">
                                                        <i class="bi bi-trash me-1"></i>
                                                        Delete
                                                        </button>
                                                    </td>\
                                                </tr>`)
                        })
                    },
                    error: function(xhr) {
                        console.log(xhr.status)
                        if(xhr.status == 404) {
                            $('#room_data').html(`<tr>\
                                                <th colspan="7" class="fw-medium text-center text-secondary"><i class="bi bi-exclamation-circle me-2 text-warning"></i>No Filter Found</th>\
                                              </tr>`);
                        }
                    }
                })
        }

        function filterTableData() {

            $('#filter_btn').click(function(e) {
                e.preventDefault();

                const filter_status = $('#filter_status').val()

                $.ajax({
                    method: 'GET',
                    url: '../../../src/controller/api/admin/Room.php',
                    data: {filter_status : filter_status},
                    dataType: "json",
                    success: function(res) {
                        $('#room_data').empty()
                        $.each(res.data, function(key, val) {
                            $('#room_data').append(`<tr>\
                                                    <th class="fw-medium" style="color: #0f2573;">${val[1]}</th>\
                                                    <td class="fw-medium text-secondary">${val[2]}</td>\
                                                    <td class="fw-medium text-secondary">${val[3]}</td>\
                                                    <td class="fw-medium" style="color: #0f2573;">₱${val[4]}</td>\
                                                    <td><p class="m-0 rounded-4 ${val[5] == 'Available' ? "text-success bg-success-subtle border border-success-subtle" :
                                                                                  val[5] == 'Occupied' ? 'text-primary bg-primary-subtle border border-primary-subtle'  :
                                                                                  val[5] == 'Maintenance' ? 'text-warning bg-warning-subtle border border-warning-subtle':
                                                                                  ""} 
                                                                                  text-center" style="width: 100px;">${val[5]}</p></td>\
                                                    <td >@social</td>\
                                                    <td class="p-0"  style="font-family:monospace;">
                                                        <a href="./rooms.php?upd=${val[0]}" class="nav-link d-inline text-secondary" title="Edit" name="edit_room" id="edit_room">
                                                        <i class="bi bi-pencil-square me-1"></i>
                                                        Edit
                                                        </a>
                                                        <button type="button" class="btn d-inline text-danger" value="${val[0]}" name="del_btn" id="del_btn">
                                                        <i class="bi bi-trash me-1"></i>
                                                        Delete
                                                        </button>
                                                    </td>\
                                                </tr>`)
                        })
                    },
                    error: function(xhr) {
                        console.log(xhr.status)
                        if (xhr.status == 404) {
                            $('#room_data').html(`<tr>\
                                                <th colspan="7" class="fw-medium text-center text-secondary"><i class="bi bi-exclamation-circle me-2 text-warning"></i>No Available Room Yet</th>\
                                              </tr>`);
                        }
                    }
                })
            })

        }

        function add_room() {
            $('#add_room').on('click', function(e) {
                e.preventDefault();

                const form = {
                    'add_room': true,
                    'room_num': $('#room_num').val(),
                    'type': $('#type').val(),
                    'floor': $('#floor').val(),
                    'rent_price': $('#rent_price').val(),
                    'status': $('#status').val()
                };

                if (form.room_num == '' || form.type == '' || form.floor == null || form.rent_price == null || form.status == '') {
                    $('.error_sign_in_message').html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <strong>Empty Field</strong> You should check in on some of those fields below.
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>`)
                } else {
                    $.ajax({
                        method: "POST",
                        url: "../../../src/controller/api/admin/Room.php",
                        data: form,
                        success: function(res) {
                            $('#room_btn').modal('hide');
                            Swal.fire({
                                title: "Success!",
                                text: res.message,
                                icon: "success"
                            });
                            $('#room_data').html('')
                            $('#room_num').val('')
                            $('#type').val('')
                            $('#floor').val('')
                            $('#rent_price').val('')
                            $('#status').val('')
                            roomTableData()
                        },
                        error: function(xhr) {
                            if (xhr.status == 409) {
                                $('.error_sign_in_message').html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <strong>Room No.</strong> is already exist
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>`)
                            }
                        }
                    })
                }
            })
        }

        function del_room_data() {

            $(document).on('click', '#del_btn', function(e) {
                e.preventDefault();

                

                const room_id = {
                    'del_btn' : true,
                    'del_btn' : $(this).val()
                };
                console.log(room_id)

                Swal.fire({
                    title               : "Are you sure?",
                    text                : "You won't be able to revert this!",
                    icon                : "warning",
                    showCancelButton    : true,
                    confirmButtonColor  : "#3085d6",
                    cancelButtonText    : "Cancel",
                    confirmButtonText   : "Yes, delete it!",     
                }).then((result) => {
                    if(result.isConfirmed) {
                        $.ajax({
                            method  : "POST", 
                            url     : "../../../src/controller/api/admin/Room.php",
                            data    : room_id,
                            success : function(response) {
                                $('#room_data').html('');
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                })
                                roomTableData();
                            }
                        })
                    }
                })
            })

        }
    </script>
</body>

</html>