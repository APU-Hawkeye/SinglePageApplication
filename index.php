<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>AJAX Form</title>

</head>
<body>
    <script>
        $(document).ready(function() {
            $('#myForm').submit(function(e) {
                e.preventDefault(); // Prevent form submission
                // Collect form data
                var formData = new FormData(this);
                // Send AJAX request
                $.ajax({
                    url: 'process.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle success response
                        $('#myTable tbody').append(response);
                        $('#myForm')[0].reset(); // Reset the form
                    }
                });
            });
        });
        function deleteRow(button) {
            $(button).closest('tr').remove();
        }
    </script>

    <div class="col-sm-5 d-flex align-content-stretch p-5">
        <div class="card card-border w-100">
            <div class="card-header text-center">
                <h3>Form Details</h3>
            </div>
            <div class="card-body">
                <form id="myForm" method="POST" enctype="multipart/form-data">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name" required>
                    <br>
                    <label for="image">Image:</label>
                    <input class="form-control" type="file" id="image" name="image" required>
                    <br>
                    <label for="address">Address:</label>
                    <textarea class="form-control" type="text" id="address" name="address" rows="3" required></textarea>
                    <br>
                    <label for="gender">Gender:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <table id="myTable" class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</body>
</html>

