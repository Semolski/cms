<?php require_once "./admin_includes/header.php"?>

<body>

    <?php require_once "./admin_includes/nav.php"; ?>

    <?php

        if(isset($_POST['btn_add_post']))
        {
            $post_title = $_POST['post_title'];
            $post_cat_id = $_POST['post_cat_id'];
            $post_author = $_POST['post_author'];
            $post_status = $_POST['post_status'];

            $post_image = $_FILES['image']['name'];
            $post_temp = $_FILES['image']['tmp_name'];

            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_comment = 4;

            $sql = "insert into posts (post_cat_id,post_title,post_author,post_date,post_img,post_content,post_tags,post_comment_count,post_status) values('$post_cat_id', '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags', '$post_comment',  '$post_status')";

            $result = mysqli_query($con,$sql);
            if($result)
            {
                echo "Record has been saved.";
                move_uploaded_file($post_temp, "../imgs/$post_image");
            }
            else
            {
                echo "query failed";
            }
        }

    ?>

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Post Title</label>
                            <input type="text" name="post_title" placeholder="Post Title" class="form-control pb-4">
                        </div>
                        <div class="form-group">
                            <label>Post Category ID</label>
                            <input type="text" name="post_cat_id" placeholder="Post Category ID" class="form-control pb-4">
                        </div>
                        <div class="form-group">
                            <label>Post Author</label>
                            <input type="text" name="post_author" placeholder="Post Author" class="form-control pb-4">
                        </div>
                        <div class="form-group">
                            <label>Post Status</label>
                            <input type="text" name="post_status" placeholder="Post Status" class="form-control pb-4">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" placeholder="Post Image" class="form-control pb-4">
                        </div>
                        <div class="form-group">
                            <label>Post Tags</label>
                            <input type="text" name="post_tags" placeholder="Post Tags" class="form-control pb-4">
                        </div>
                        <div class="form-group">
                            <label>Post Content</label>
                            <textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form_group">
                            <button class="btn btn-success" type="submit" name="btn_add_post">Add Posts</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->

    <?php require_once "./admin_includes/footer.php"?>
