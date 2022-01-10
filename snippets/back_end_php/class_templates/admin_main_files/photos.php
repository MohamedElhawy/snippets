<?php include("includes/header.php"); ?>




        <!-- php -->
        <!-- delete image -->
        <?php

            if ( isset($_GET["delete"]) )
            {
                Photos::delete(["id"=>$_GET["delete"]]);
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

                <!-- title and breadcrumbs -->
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Photos
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
                </div>

                <!-- page content -->


                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>


                        <!-- php -->
                        <?php
                            foreach(Photos::read() as $row)
                            {
                                echo "<tr>";
                                echo    "<td>$row->id</td>";
                                echo    "<td>$row->title</td>";
                                echo    "<td>$row->description</td>";
                                echo    "<td><a href='$row->filename' target='_blank' ><img src='$row->filename' alt='$row->title' width='40' height='40'></a></td>";
                                echo    "<td><a href='http://localhost/crs/php/CMS_TEMPLATE_PHP/CMS_TEMPLATE%20%20PHP/admin/photos.php?delete=$row->id'>&times;</a></td>";
                                echo "</tr>";
                            }

                        ?>


                    </tbody>
                </table>



            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>  
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>