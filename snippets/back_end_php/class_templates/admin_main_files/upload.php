<?php include_once("includes/header.php"); ?>



    <!-- php -->
    <?php

       if ( isset( $_POST["submit_image"] ) )
       {
           Photos::create([ $_POST["photo_title"] , $_POST["photo_description"] , upload_file($_FILES["uploaded_img"] , "uploads") ]);
       }

    ?>
















        <!-- html -->

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->

            <?php include("includes/top_nav.php"); ?>

            <?php include("includes/nav_side_menu.php"); ?>

            
        </nav>

        <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- title and breadcrumbs -->
                    <h1 class="page-header">
                        Uploads
                        <small>Subheading</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol>


                    <!-- page content -->
                    <div>

                        <form action="upload.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                        
                                <label for="title">Title</label>
                                <input type="text" id="title" name="photo_title" class="form-control">

                            </div>

                            <div class="form-group">
                        
                                <label for="description">Description</label>
                                <input type="text" id="description" name="photo_description" class="form-control">

                            </div>


                            <div class="form-group">
                        
                                <label for="uploaded_img">Upload image</label>
                                <input type="file" id="uploaded_img" name="uploaded_img">

                            </div>

                            <input type="submit" name="submit_image" value="Upload">

                        </form>

                    </div>



                </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>  
        <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>