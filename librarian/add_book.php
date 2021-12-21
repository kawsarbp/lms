<?php
require_once'header.php';
function librarian_value ($name)
{
    if(isset($_SESSION['libraian_value'][$name]))
    {
        return $_SESSION['libraian_value'][$name];
    }
}
?>
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="add_book.php">Add Book</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-6 col-sm-offset-3">

            <?php if(isset($_SESSION['add_success'])) { ?>
                <div class="alert alert-success alert-dismissible text-center" role="alert">
                    <?php echo $_SESSION['add_success']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset($_SESSION['libraian_value']);
                unset($_SESSION['add_success']); } ?>

            <?php if(isset($_SESSION['add_error'])) { ?>
                <div class="alert alert-warning alert-dismissible text-center" role="alert">
                    <?php echo $_SESSION['add_error']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset($_SESSION['add_error']); } ?>

            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="action.php" method="post" enctype="multipart/form-data">
                                <h5 class="mb-lg">Add Book</h5>
                                <div class="form-group">
                                    <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="book_name" class="form-control" id="book_name" value="<?= librarian_value('book_name') ?>" placeholder="Book Name">
                                        <?php if(isset($_SESSION['input_err_librarian']['book_name'])) { ?>
                                            <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['input_err_librarian']['book_name']; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="book_image" class="form-control" id="book_image">
                                        <?php if(isset($_SESSION['input_err_librarian']['book_image'])) { ?>
                                            <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['input_err_librarian']['book_image']; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_author_name" class="col-sm-4 control-label">Book Author Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="book_author_name" value="<?= librarian_value('book_author_name') ?>" id="book_author_name" placeholder="Book Author Name">
                                        <?php if(isset($_SESSION['input_err_librarian']['book_author_name'])) { ?>
                                            <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['input_err_librarian']['book_author_name']; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_author_name" class="col-sm-4 control-label">Book Publication Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="book_publication_name" value="<?= librarian_value('book_publication_name') ?>" class="form-control" id="book_publication_name" placeholder="Book Publication Name">
                                        <?php if(isset($_SESSION['input_err_librarian']['book_publication_name'])) { ?>
                                            <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['input_err_librarian']['book_publication_name']; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_purchase_date" class="col-sm-4 control-label">Book Purchase Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="book_purchase_date" value="<?= librarian_value('book_purchase_date') ?>" class="form-control" id="book_purchase_date">
                                        <?php if(isset($_SESSION['input_err_librarian']['book_purchase_date'])) { ?>
                                            <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['input_err_librarian']['book_purchase_date']; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="book_price" value="<?= librarian_value('book_price') ?>" class="form-control" id="book_price" placeholder="Book Price">
                                        <?php if(isset($_SESSION['input_err_librarian']['book_price'])) { ?>
                                            <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['input_err_librarian']['book_price']; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_qty" class="col-sm-4 control-label">Book Qty</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="book_qty" class="form-control" value="<?= librarian_value('book_qty') ?>" id="book_qty" placeholder="Book Qty">
                                        <?php if(isset($_SESSION['input_err_librarian']['book_qty'])) { ?>
                                            <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['input_err_librarian']['book_qty']; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="available_qty" class="col-sm-4 control-label">Available Qty</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="available_qty" value="<?= librarian_value('available_qty') ?>" class="form-control" id="available_qty" placeholder="Available Qty">
                                        <?php if(isset($_SESSION['input_err_librarian']['available_qty'])) { ?>
                                            <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['input_err_librarian']['available_qty']; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary" name="save_book"><i class="fa fa-save"></i> Save Book</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
unset($_SESSION['input_err_librarian']);
require_once'footer.php';
?>