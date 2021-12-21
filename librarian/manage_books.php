<?php require_once'header.php'; ?>
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="manage_books.php">Manage Books</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Books</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Publication Name</th>
                                <th>Author Name</th>
                                <th>Purchase Date</th>
                                <th>Book Price</th>
                                <th>Book Quantity</th>
                                <th>Available Quantity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result = mysqli_query($con,"SELECT * FROM `books` ORDER BY `id` DESC");
                            $sn = 1;
                            while($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?= $sn; ?></td>
                                    <td><?= $row['book_name'] ?></td>
                                    <td>
                                        <img src="../img/books/<?= $row['book_image'] ?>" alt="Book Image" style="width:150px;height:100px;">
                                    </td>
                                    <td><?= $row['book_publication_name'] ?></td>
                                    <td><?= $row['book_author_name'] ?></td>
                                    <td><?= date('d-M-Y',strtotime($row['book_purchase_date'])) ?></td>
                                    <td><?= $row['book_price'] ?></td>
                                    <td><?= $row['book_qty'] ?></td>
                                    <td><?= $row['available_qty'] ?></td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-info"  data-toggle="modal" data-target="#book-<?= $row['id'] ?>" ><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id'] ?>"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="delete.php?deletebookid=<?= base64_encode($row['id']) ?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </td>
                            <?php $sn++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<?php
$result = mysqli_query($con,"SELECT * FROM `books` ORDER BY `id` DESC");
while($row = mysqli_fetch_array($result)) {
    ?>
    <div class="modal fade" id="book-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Info</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Book Name</th>
                            <td><?= $row['book_name'] ?></td>
                        </tr>
                        <tr>
                            <th>Book Image</th>
                            <td>
                                <img src="../img/books/<?= $row['book_image'] ?>" alt="Book Image" style="width:150px;height:100px;">
                            </td>
                        </tr>
                        <tr>
                            <th>Publication Name</th>
                            <td><?= $row['book_publication_name'] ?></td>
                        </tr>
                        <tr>
                            <th>Author Name</th>
                            <td><?= $row['book_author_name'] ?></td>
                        </tr>
                        <tr>
                            <th>Purchase Date</th>
                            <td><?= $row['book_purchase_date'] ?></td>
                        </tr>
                        <tr>
                            <th>Book Price</th>
                            <td><?= $row['book_price'] ?></td>
                        </tr>
                        <tr>
                            <th>Book Quantity</th>
                            <td><?= $row['book_qty'] ?></td>
                        </tr>
                        <tr>
                            <th>Available Quantity</th>
                            <td><?= $row['available_qty'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>


<?php
$result = mysqli_query($con,"SELECT * FROM `books` ORDER BY `id` DESC");
while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $book_info = mysqli_query($con,"SELECT * FROM `books` WHERE `id`='$id'");
    $book_info_row = mysqli_fetch_array($book_info);
    ?>
    <div class="modal fade" id="book-update-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Info</h4>
                </div>
                <div class="modal-body">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="action.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Book Name</label>
                                            <input type="text" value="<?= $book_info_row['book_name'] ?>" name="book_name" class="form-control" placeholder="Book Name">
                                            <input type="hidden" value="<?= $book_info_row['id'] ?>" name="id">
                                        </div>
                                        <div class="form-group">
                                            <label>Book Image</label>
                                            <input type="file" name="book_image" class="form-control">
                                            <img src="../img/books/<?= $book_info_row['book_image'] ?>" alt="Book" style="width:120px; height: 80px;">
                                        </div>
                                        <div class="form-group">
                                            <label>Book Author Name</label>
                                            <input type="text" value="<?= $book_info_row['book_author_name'] ?>" class="form-control" name="book_author_name" placeholder="Book Author Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Book Publication Name</label>
                                            <input type="text" value="<?= $book_info_row['book_publication_name'] ?>" name="book_publication_name" class="form-control" placeholder="Book Publication Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Book Purchase Date</label>
                                            <input type="date" value="<?= $book_info_row['book_purchase_date'] ?>" name="book_purchase_date"  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Book Price</label>
                                            <input type="number" value="<?= $book_info_row['book_price'] ?>" name="book_price" class="form-control" placeholder="Book Price">
                                        </div>
                                        <div class="form-group">
                                            <label>Book Qty</label>
                                            <input type="number" value="<?= $book_info_row['book_qty'] ?>" name="book_qty" class="form-control" placeholder="Book Qty">
                                        </div>
                                        <div class="form-group">
                                            <label>Available Qty</label>
                                            <input type="number" value="<?= $book_info_row['available_qty'] ?>" name="available_qty" class="form-control" placeholder="Available Qty">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="book_update"><i class="fa fa-pencil-square-o"></i> Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<?php require_once'footer.php'; ?>