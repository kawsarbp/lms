<?php require_once'header.php'; ?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
            <div class="content-header">
                    <!-- leftside content header -->
                 <div class="leftside-content-header">
                     <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                     </ul>
                 </div>
            </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>All Issue Book</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Book Issue Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $s_id = $_SESSION['student_id'];
                                $result = mysqli_query($con,"SELECT `issue_books`.`book_issue_date`, `books`.`book_name`,`books`.`book_image` FROM `books` INNER JOIN `issue_books` ON `issue_books`.`book_id` = `books`.`id` WHERE `issue_books`.`student_id`='$s_id'");
                                while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?= $row['book_name'] ?></td>
                                    <td><img src="../img/books/<?= $row['book_image'] ?>" alt="Book" style="width: 180px; height: 120px;"></td>
                                    <td><?= date('d-M-Y',strtotime($row['book_issue_date'])) ?></td>
                                </tr>
                                    <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once'footer.php'; ?>