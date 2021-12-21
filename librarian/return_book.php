<?php require_once'header.php'; ?>
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="return_book.php">Return Book</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Return Book</b></h4>
            <div class="panel">
                <?php if(isset($_SESSION['return_success'])) { ?>
                    <div class="alert alert-success alert-dismissible text-center" role="alert">
                        <?php echo $_SESSION['return_success']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php unset($_SESSION['return_success']); } ?>
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Book Issue Date</th>
                                <th>Return Book</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result = mysqli_query($con,"SELECT `issue_books`.`id`,`issue_books`.`book_issue_date`,`issue_books`.`book_id`, `students`.`fname`,`students`.`lname`,`students`.`roll`,`students`.`email`,`students`.`phone`,`books`.`book_name`,`books`.`book_image` FROM `issue_books` INNER JOIN `students` ON `students`.`id` = `issue_books`.`student_id` INNER JOIN `books` ON `books`.`id` = `issue_books`.`book_id` WHERE `issue_books`.`book_return_date` = ''");
                            while($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?= ucwords($row['fname']. ' ' .$row['lname']) ?></td>
                                    <td><?= $row['roll'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td><?= $row['book_name'] ?></td>
                                    <td><img src="../img/books/<?= $row['book_image'] ?>" alt="book" style="width: 120px;"></td>
                                    <td><?= date('d-M-Y',strtotime($row['book_issue_date'])) ?></td>
                                    <td><a href="action.php?id=<?= base64_encode($row['id']) ?>&bookid=<?= base64_encode($row['book_id']) ?>" class="btn btn-info">Return Book</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

?>
<?php require_once'footer.php'; ?>