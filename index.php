<?php
//================= backend =================
include "./controllers/UserController.php";

//====issaugojimas====
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['save'])){
        $hasErrors = UserController::store();
        if(!$hasErrors){
            header("Location:".$_SERVER['REQUEST_URI']);
        }
    }
    
    if(isset($_POST['edit'])){
        $user = UserController::show();
    }
    
    if(isset($_POST['update'])){
        UserController::update();
        header("Location:".$_SERVER['REQUEST_URI']);

    }
    
    if(isset($_POST['destroy'])){
        UserController::destroy();
        header("Location:".$_SERVER['REQUEST_URI']);
    }
}

$users = UserController::index();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php 
        if(isset($_SESSION) && isset($_SESSION['errors'])){
            foreach ($_SESSION['errors'] as $error) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
     <?php }
          unset($_SESSION['errors']); 
        } ?>
  

        <form action="" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Vardas" 
                        <?= isset($_POST['edit']) ? 'value="' . $user->name.'"' : "" ?> 
                    >
                </div>
                <div class="form-group col-md-4">
                    <label >Surname</label>
                    <input type="text" class="form-control" name="surname" placeholder="Pavardė"
                        <?= isset($_POST['edit']) ? 'value="' . $user->surname.'"' : "" ?> 
                    >
                </div>
            </div>    

            <div class="row">
                <div class="form-group col-md-4">
                    <label >Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Pašto adreas"
                        <?= isset($_POST['edit']) ? 'value="' . $user->email.'"' : "" ?> 
                    >
                </div>
                <div class="form-group col-md-4">
                    <label >Phone number</label>
                    <input type="text" class="form-control" name="phoNo" placeholder="telefono numeris"
                        <?= isset($_POST['edit']) ? 'value="' . $user->phoneNumber.'"' : "" ?> 
                    >
                </div>
            </div> 
            <br>
            
                <?= isset($_POST['edit']) ? '<input type="hidden" name="id" value="'.$user->id.'">' : "" ?> 
                <button type="submit"  class="btn btn-primary" name= 
                    <?= isset($_POST['edit']) ? '"update" >Atnaujinti' :'"save" >Išsaugoti'?>
                </button>

                <!-- //trinti cia
                    <?php
                if(isset($_POST['edit'])){
                    echo '<button type="submit" class="btn btn-danger" name="update" value="'.$user->id.'" >Atnaujinti</button>';
                }else{
                    echo '<button type="submit" class="btn btn-primary" name="save">Išsaugoti</button>';

                }
                if(isset($_POST['edit'])){ ?>
                    <button type="submit" class="btn btn-danger" name="update" value="<?=$user->id?>" >Atnaujinti</button>
               <?php }else{ ?>
                    <button type="submit" class="btn btn-primary" name="save">Išsaugoti</button>

                    <?php } ?> 
                //ir trinti sita eilute   --> 

               
        </form>


    <table class="table table-striped">
        <tr>
            <th>name</th>
            <th>surname</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
      

        <?php foreach ($users as $user) {?>
            <tr>
                <td><?=$user->name?></td>
                <td><?=$user->surname?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?=$user->id?>">
                        <button type="submit" class="btn btn-success" name="edit" value=" <?=$user->id?> " > edit</button>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?=$user->id?>">
                        <button type="submit" class="btn btn-danger" name="destroy" >delete</button>
                    </form>
                </td>
            </tr>
                
        <?php }?>
</table>

</div>

</body>
</html>