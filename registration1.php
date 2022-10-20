<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    
</head>
<body>
    
    <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h1>Registration form</h1>
                </div>
                <div class="panel-body">
                    <form action = "registration1.php" method="POST" enctype="multipart/form-data">
                        Image to upload:
                        <input type="file" name="uploadfile" value="uploadfile"><br>
                        <input type="submit" name="submit" value="submit"><br><br>

                       <!-- <div class="form-group">
                            <label for="Name">Name:</label>
                            <input type="text" name="Name" required><br><br>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input type="text" name="Email" required><br><br>
                        </div>
                        <div class="form-group">
                            <label for="Phone No.">Contact:</label>
                            <input type="text" name="Phone No." required><br><br>
                        </div>
                        <div class="form-group">
                            <label for="Class">Class:</label>
                            <input type="text" name="Class" required><br><br>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                        
                            <label for="male" class="radio-inline"><input type="radio" name="gender" id="male">Male</label>
                            <label for="female" class="radio-inline"><input type="radio" name="gender" id="female">Female</label>
                            <label for="others" class="radio-inline"><input type="radio" name="gender" id="others">Others</label>
                        </div>
                    
                        <div>
                            <input type="date" id="datePickerId" />
                        </div>
                        <br> 
                        <div class="form-group">
                            <input type="button" value="register" > -->
                        </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            console.log("Hello");
            datePickerId.max = new Date().toISOString().split("T")[0];
            console.log(datePickerId);
            datePickervar = new Date()
            console.log(datePickervar);
            
         datePickervar.setDate( datePickervar.getDate() - 10 );
         datePickerId.min = datePickervar.toISOString().slice(0,10);
        
        //  console.log(len.getDate());
        //  console.log( len );
          
        })
        </script>
    </body>
</html>

<?php

if(isset($_POST['submit']) && isset($_FILES['uploadfile']) )
{

// echo "<pre>";
// print_r($_FILES['my_image']);
// echo "</pre>";

$img_name = $_FILES['uploadfile']['name'];
$img_size = $_FILES['uploadfile']['size'];

$error = $_FILES['uploadfile']['error'];
$target_path = "C:\wamp64\www\uploads"."/";  

$target_path = $target_path.basename( $_FILES['uploadfile']['name']);   

// $target_path = $target_path.basename( $uploadfile);   
print_r($target_path);
if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path)) {  
    echo "File uploaded successfully!";  
} else{  
    // echo "Sorry, file not uploaded, please try again!";  
}  
}
?>

<?php
function get_options()
{
    $courses = array('BCA'=>'1','Btech'=>'2','MCA'=>'3', 'MBA'=>'4', 'Mtech.'=>'5');
    $options ='';
    while(list($k,$v)=each($courses))
    {
        $options.='<option value="'.$v.'">'.$k.'</option>';
    }
    return $options;
}
?>
<?php
include('db.php');
$sql= "select id,name from state";
$stmt = $con->prepare($sql);
$stmt -> execute();
$State= $stmt->fetchAll(PDO::FETCH_ASSOC);


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
                            <select class="form-control" id="state">
                                <option value="-1">Select State</option>
                                <?php
                                foreach($State as $State)
                                {?>
                                <option value="<?php echo $State['name']?>"><?php echo $State['name']?></option>
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
                    var id=jQuery(this).name;
                    if(id=='-1')
                    {
                        jQuery('#city').html('<option value="-1">Select City</option>');
                    }else{
                        $("#divLoading").addClass('show');
             
                        jQuery('#city').html('<option value="-1">Select City</option>');
                    jQuery.ajax({
                        type:'post',
                        url:'get_data.php',
                        data:'id='+id+'&type=city',
                        success:function(result){
                        jQuery('#city').append(result);
                    }
                    });
                    }
                });
                $("#divLoading").addClass('show');
             
            });

        </script>
    </body>
</html>