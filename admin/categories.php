<?php require_once "./admin_includes/header.php"?>

<body>

<div id="wrapper">
    <div id="page-wrapper">

        <?php require_once "./admin_includes/nav.php"?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <small>Author</small>
                    </h1>
                    <h2>Categories</h2>
                </div>
<!--                Add New Category -->
                <div class="col-lg-6">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Add New Category</label>
                            <input type="text" name="category" placeholder="category" class="form-control pb-2">
                        </div>
                        <div class="form_group">
                            <button class="btn btn-success" type="submit" name="btn_category">Add Category</button>
                        </div>
                    </form>
                    <!--                Edit New Category -->
                    <?php

                        if(isset($_GET['edit']))
                        {
                            $edit_id = $_GET['edit'];
                            $sql = "select * from categories where cat_id = '$edit_id'";
                            $result = mysqli_query($con,$sql);
                            $data = mysqli_fetch_assoc($result)
                            ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                <small>Author</small>
                            </h1>
                            <h2>Categories</h2>
                        </div>
                        <!--                Add New Category -->
                        <div class="col-lg-6">
                            <form action="update.php" method="POST">
                                <label>Edit Category</label>
                                <input type="text" name="edit_category" value="<?php echo $data['cat_title'] ?>" placeholder="category" class="form-control pb-2">
                                <input type="hidden" name="edit_id" value="<?php echo $data['cat_id'] ?>">
                                <button class="btn btn-success" type="submit" name="btn_edit_category">Edit Category</button>
                            </form>
                        <?php
                        }
                    ?>


                </div>

                <div class="col-lg-6">
                    <?php
                    if(isset($_POST['btn_category']))
                    {
                        if($_POST['category'] == "")
                        {
                            echo '<p class="alert alert-danger">Please Enter Category</p>';
                        }
                        else
                        {
                            $add_cat = $_POST['category'];
                            $query = "insert into categories (cat_title) values ('$add_cat')";
                            mysqli_query($con,$query);
                        }

                    }

                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20%">Category ID</th>
                            <th style="width: 50%">Category Name</th>
                            <th style="width: 30%" colspan="2">Operations</th>
                        </tr>
                        <tr>
                        <?php
                          $sql = "select * from categories";
                            $result = mysqli_query($con,$sql);

                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>
                            <td><?php echo $row['cat_id']; ?></td>
                            <td><?php echo $row['cat_title']; ?></td>
                            <td><a href="categories.php?Del=<?php echo $row['cat_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
                            <td><a href="categories.php?edit=<?php echo $row['cat_id']; ?>" class="btn btn-success"><span class="fa fa-edit"></span></a></td>
                        </tr>
                        <?php
                             }

                        // Delete Category Record
                        if ( isset($_GET['Del'] ) )
                        {
                            $del = $_GET['Del'];
                            $sql = "delete from categories where cat_id='$del'";
                            $result = mysqli_query($con,$sql);

                            if($result)
                            {
                                header("location: /cms/admin/categories.php");
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <?php require_once "./admin_includes/footer.php"?>
