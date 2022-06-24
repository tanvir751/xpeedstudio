<!DOCTYPE html>
<html>
<head>
<title>Xpeed Studio </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php include "components/head.php" ?>
<script>
    

</script>
</head>
<body>
<?php include "components/nav.php" ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card border-primary mb-3 mt-3" >
                <div class="card-header">Submission Form</div>
                    <div class="card-body">
                        <?php include "components/submission-form.php" ?>
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
    $(document).ready(function(){
    //group add limit
        var maxGroup = 20;
        
        //add more fields group
        $(".addMore").click(function(){
            if($('body').find('.fieldGroup').length < maxGroup){
                var fieldHTML = '<div class="col-md-6 fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
            }else{
                alert('Maximum '+maxGroup+' groups are allowed.');
            }
        });
        
        //remove fields group
        $("body").on("click",".remove",function(){ 
            $(this).parents(".fieldGroup").remove();
        });
    });
    

</script>
</body>
</html>
