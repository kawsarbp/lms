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
                     <div class="row">
                         <!--BOX Style 1-->
                         <?php
                         $result1 = mysqli_query($con,"SELECT * FROM `libraian`");
                         $count1 = mysqli_num_rows($result1);
                         ?>
                         <div class="col-sm-6 col-md-4 col-lg-3">
                             <div class="panel widgetbox wbox-1 bg-darker-1">
                                 <a href="index.php">
                                     <div class="panel-content">
                                         <h1 class="title color-w"><i class="fa fa-globe"></i> Libraian</h1>
                                         <h4 class="subtitle color-lighter-1"><?= $count1; ?></h4>
                                     </div>
                                 </a>
                             </div>
                         </div>
                         <!--BOX Style 2-->
                         <?php
                         $result2 = mysqli_query($con,"SELECT * FROM `books`");
                         $count2 = mysqli_num_rows($result2);
                         $total = mysqli_query($con,"SELECT SUM(`book_qty`) AS total FROM `books`");
                         $total_count = mysqli_fetch_array($total);
                         $total2 = mysqli_query($con,"SELECT SUM(`available_qty`) AS available  FROM `books`;");
                         $total_count2 = mysqli_fetch_array($total2);
                         ?>
                         <div class="col-sm-6 col-md-4 col-lg-3">
                             <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                                 <a href="manage_books.php">
                                     <div class="panel-content">
                                         <h1 class="title color-light-1"> <i class="fa fa-book"></i> <?= $count2.' ('.$total_count['total'].' - '.$total_count2['available'] .') '; ?> </h1>
                                         <h4 class="subtitle">Total Books</h4>
                                     </div>
                                 </a>
                             </div>
                         </div>
                         <!--BOX Style 3-->
                         <?php
                            $result3 = mysqli_query($con,"SELECT * FROM `students`");
                            $count3 = mysqli_num_rows($result3);
                         ?>
                         <div class="col-sm-6 col-md-4 col-lg-3">
                             <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                                 <a href="students.php">
                                     <div class="panel-content">
                                         <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $count3; ?> </h1>
                                         <h4 class="subtitle color-darker-1">Total Students</h4>
                                     </div>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
            </div>
<?php require_once'footer.php'; ?>