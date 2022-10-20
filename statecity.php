<?php
include('db.php');
$sql= "select id,name from state";
$stmt = $con->prepare($sql);
$stmt -> execute();
$States= $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!doctype html>
<html>
    <head>
        <title>state dropdown</title>
       <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container">
            <h1>State city dropdown</h1>
            <form>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="state">State</label>
                            <select class="form-control" id="state_id">
                                <option value="">Select State</option>
                                <?php
                                foreach($States as $State)
                               {  echo '<option value="'.$State['id'].'">'.$State['name'].'</option>';  
                                
                                    ?>
                                <option   value=" <?php $State['id']?>"> <?php echo $State['name']?></option>
                                <?php  
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="city">City</label>
                            <select class="form-control" id="city">
                                <option>Select city</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id = "divLoading" class="show"></div>
        <style>
            #divLoading{
                display:none;

            }
            #divLoading.show{
                display:block;
                position:fixed;
                z-index:100;
             }

        </style>
        <script>
            $(document).ready(function()
            {
                jQuery('#state').change(function(){
                    console.log('hello');
                    // var id=jQuery(this).name;
                    var state_id = jQuery("#state_id").val();
                    console.log(state_id);
                    if(id=='-1')
                    {
                        jQuery('#city').html('<option value="-1">Select City</option>');
                    }else{console.log('hello1');
                        // $("#divLoading").addClass('show');
             
                        // jQuery('#city').html('<option value="-1">Select City</option>');
                    jQuery.ajax({
                        type:'post',
                        url:'get_data.php',
                        // data:'id='+id+'&type=city',
                        success:function(result){
                        jQuery('#city').append(result);
                    },
                    success: function(data){
			$("#city-list").html(data);
			$("#city-list").removeClass("loader");
		}
                    });
                    }
                });
                $("#divLoading").addClass('show');
             
            });

        </script>
    </body>
</html>