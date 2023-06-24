<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- datatable -->
    <link rel="stylesheet" href="datatables.min.css">
    <script src="datatables.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <table class="table" id="mytable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name & Lead id</th>
                            <th>Gender</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                        </tr>

                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
         let table = $('#mytable').DataTable({
            'serverSide': true,
            'processing': true,
            "pageLength": 50,
            "ordering": false,
            "aLengthMenu": [
				[10, 20, 50, 100],
				[10, 20, 50, "All"]
			],
            "searching": true,
            "dom": '<"top"f>rt<"bottom"ilp><"clear">',
            "pagingType": "simple_numbers",
            'ajax': {
                url: 'ajax.php',
                type: 'post',
            }
         });
    </script>
</body>

</html>