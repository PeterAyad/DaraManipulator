<?php
$dbhost = 'localhost';
$dbname = 'table';
$dbusername = 'root';
$dbpassword = '';

// 2. Create db object mysqli

$mysqli   = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_errno($mysqli))
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
$stmt = $mysqli->prepare("SELECT * FROM `employees` ;");
$stmt->execute();
$result = $stmt->get_result();
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Wrokshop Members</title>
    <link href="styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="sb-nav-fixed sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Database Board</a>
        <!-- Navbar Search-->
    </nav>
    <main>
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Name:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="send" type="button" data-dismiss="modal" class="btn btn-primary">Done</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <h1 class="mt-4">Title</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Info.</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Table Example
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Control</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Control</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['position']; ?></td>
                                        <td><?php echo $row['office']; ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td><?php echo $row['start_date']; ?></td>
                                        <td style="text-align: center;"><button data-id="<?php echo $row['id']; ?>" class=" edit btn btn-primary" data-toggle="modal" data-target="#Modal">Edit Name</button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
        var current_id = null;
        $('#Modal').on('shown.bs.modal', function() {
            $('#edit').trigger('focus')
        })
        $(".edit").click(function() {
            current_id = $(this).attr("data-id");
            $.ajax({
                url: "edit_request.php",
                type: "POST",
                data: {
                    get: 1,
                    id: current_id
                },
                success: function(data) {
                    $('#message-text').val(data);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                },
            });
        });
        $("#send").click(function() {
            $.ajax({
                url: "edit_request.php",
                type: "POST",
                data: {
                    set: 1,
                    name: $('#message-text').val(),
                    id: current_id
                },
                success: function(data) {
                    var myTable = document.getElementById('dataTable');
                    console.log(myTable);
                    myTable.rows[current_id].cells[0].innerHTML = data;
                },
                error: function(xhr, status, error) {
                    console.log(error);
                },
            });
        });
    </script>
</body>

</html>