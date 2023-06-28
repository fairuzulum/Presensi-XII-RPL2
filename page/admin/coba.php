<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-2" id="form-nama">
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" id="nama" name="nama" value="" class="form-control" />
            </div>
        </div>
    </div>
    </div>
  
<script>
     $(function() {
                        $("#nama").autocomplete({
                            source: 'carinama.php'
                        });
                    });
</script>

</body>

</html>