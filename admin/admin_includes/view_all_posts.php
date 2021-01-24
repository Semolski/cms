<table class="table table-stripped">
    <tr>
        <td>ID</td>
        <td>Author</td>
        <td>Title</td>
        <td>Category</td>
        <td>Status</td>
        <td>Img</td>
        <td>Comment</td>
        <td colspan="2">Date</td>
    </tr>
    <tr>

        <?php

        $query = "select * from posts";
        $result = mysqli_query($con,$query);

        while($row = mysqli_fetch_assoc($result))
        {
        ?>

        <td><?php echo $row['post_id']; ?></td>
        <td><?php echo $row['post_author']; ?></td>
        <td><?php echo $row['post_title']; ?></td>
        <td><?php echo $row['post_cat_id']; ?></td>
        <td><?php echo $row['post_status']; ?></td>
        <td><img width="50" height="50" class="img-responsive" src="../imgs/<?php echo $row['post_img']; ?>"></td>
        <td><?php echo $row['post_comment_count']; ?></td>
        <td><?php echo $row['post_date']; ?></td>
        <td><a href="posts.php?del=<?php echo $row['post_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
        <td><a href="posts.php?edit=<?php echo $row['post_id']; ?>" class="btn btn-success"><span class="fa fa-edit"></span></a></td>
    </tr>
    <?php
    }
    ?>
</table>

<?php

    if(isset($_GET['del']))
    {
        $del_id = $_GET['del'];
        $sql = "delete from posts where post_id='$del_id'";
        mysqli_query($con,$sql);
    }


 ?>