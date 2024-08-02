<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Export Database</title>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Export Database</h2>
        <button id="exportButton" class="btn btn-primary">Export my_loan Table</button>
    </div>

      <h2>Import Database</h2>

    <form method="post" action="import.php" enctype="multipart/form-data">
        <label for="import_file">Choose SQL File:</label>
        <input type="file" name="import_file" id="import_file" accept=".sql" required>
        <br>
        <button type="submit">Import</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="export.js"></script>

</body>

</html>
