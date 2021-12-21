<?php require_once'header.php'; ?>
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="issue_book.php">Issue Book</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-6 col-sm-offset-3">
            <?php if(isset($_SESSION['issue_sucess'])) { ?>
                <div class="alert alert-success alert-dismissible text-center" role="alert">
                    <?php echo $_SESSION['issue_sucess']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php unset($_SESSION['issue_sucess']); } ?>
            <?php if(isset($_SESSION['issue_error'])) { ?>
                <div class="alert alert-warning alert-dismissible text-center" role="alert">
                    <?php echo $_SESSION['issue_error']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset($_SESSION['issue_error']); } ?>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-8 col-sm-offset-2">
                            <form class="form-inline" method="POST" action="">
                                <div class="form-group">
                                        <select name="student_id" class="form-control" id="">
                                            <option value="">Select</option>
                                            <?php $result = mysqli_query($con,"SELECT * FROM `students` WHERE `status` = '1'");
                                            while($row = mysqli_fetch_array($result)) { ?>
                                                <option value="<?= $row['id'] ?>"><?= ucwords($row['fname'].' '.$row['lname']). ' - ('.$row['roll'].')' ?></option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="search"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST['search']))
                    {
                        if(!empty($_POST['student_id']))
                        {
                        $id = $_POST['student_id'];
                        $result = mysqli_query($con,"SELECT * FROM `students` WHERE `id` = '$id' AND `status` = '1'");
                        $row = mysqli_fetch_array($result);
                        ?>
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST" action="action.php">
                                            <div class="form-group">
                                                <label for="name">Student Name</label>
                                                <input type="text" class="form-control" id="name" value="<?= ucwords($row['fname'].' '.$row['lname']) ?>" readonly>
                                                <input type="hidden" value="<?= $row['id'] ?>" name="student_id">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Book Name</label>
                                                <select name="book_id" class="form-control" id="" required>
                                                    <option value="">Select</option>
                                                    <?php $result = mysqli_query($con,"SELECT * FROM `books` WHERE `available_qty` > 0");
                                                    while($row = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?= $row['id'] ?>"><?= ucwords($row['book_name']); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Book Issue Date</label>
                                                <input type="text" class="form-control" name="book_issue_date" value="<?= date('d-m-Y') ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name="issue_book"><i class="fa fa-save"></i> Save Issue Book</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php require_once'footer.php'; ?>