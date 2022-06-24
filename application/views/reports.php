<html>
<head>
<title>Xpeed Studio </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php include "components/head.php" ?> 
</head>
<body>
<?php include "components/nav.php" ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card border-primary mb-3 mt-3" >
                <div class="card-header">Buyer Reports</div>
                    <div class="card-body"> 
                        <?php include "components/report-table.php" ?>
                    </div>
                </div> 
            </div>
        </div> 
        
    </div>
</div>
<!-- copy of input fields group -->

<div class="col-md-6 fieldGroupCopy" style="display: none;">
    <div class="form-group " >
        <div class="input-group">
            <input type="text" name="items[]" class="form-control" placeholder="Enter item"/>
            <div class="input-group-addon"> 
                <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
            </div>
        </div>
    </div>
</div>
<?php include "components/footer.php"?>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
        // $('#example').DataTable({searching: false, paging: false, info: false});

    });
    $('input[name="dates"]').daterangepicker();


</script>
</body>
</html>
