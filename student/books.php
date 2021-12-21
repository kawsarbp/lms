<?php require_once 'header.php'; ?>
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="books.php">Books</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <form method="POST" action="">
                        <div class="row pt-md">
                            <div class="form-group col-sm-9 col-lg-10">
                                <span class="input-with-icon">
                                    <input type="text" name="search" class="form-control" id="lefticon" placeholder="Search" required>
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                            <div class="form-group col-sm-3  col-lg-2 ">
                                <button type="submit" class="btn btn-primary btn-block" name="search_book">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST['search_book']))
        {
            $search = $_POST['search'];
            ?>
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <?php
                            $result = mysqli_query($con,"SELECT * FROM `books` WHERE `book_name` LIKE '%$search%'");
                            $not_found = mysqli_num_rows($result);
                            if($not_found > 0)
                            {
                            while ($row = mysqli_fetch_array($result)) { ?>
                            <div class="col-sm-3 col-md-2">
                                <img src="../img/books/<?= $row['book_image'] ?>" alt="Book" style="width:100%; height:120px; margin-bottom: 10px;">
                                <div><?= $row['book_name'] ?></div>
                                <div><b> Available Quentity <?= '('.$row['available_qty'].')' ?></b></div>
                            </div>
                            <?php } }
                            else {
                                echo '<h1 class="text-danger text-center">Data Not Found!</h1>';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else { ?>
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <?php
                            $result = mysqli_query($con,"SELECT * FROM `books`");
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <div class="col-sm-3 col-md-2">
                                    <img src="../img/books/<?= $row['book_image'] ?>" alt="Book" style="width:100%; height:120px; margin-bottom: 10px;">
                                    <div><?= $row['book_name'] ?></div>
                                    <div><b> Available Quentity <?= '('.$row['available_qty'].')' ?></b></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
    </div>
<?php require_once 'footer.php'; ?>