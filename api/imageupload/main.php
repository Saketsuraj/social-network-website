<?php
    include "include/constants.php";
    include('templates/header.php');
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h2>Ajax Image Upload with Form Data using jQuery, PHP and MySQL</h2>                 
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form method="post" name="upload_file" id="upload-file" enctype="multipart/form-data">    
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control input-upl-name"" placeholder="Name">
                </div>
                
                <div class="input-group mb-3">
                    <input type="file" name="fileURL" class="form-control input-upl-file"" id="file-url">     
                </div>
                
                <button type="button" name="submit" id="action-upl-file" class="float-right btn btn-primary">Submit</button>
            </form>
            <div class="row">
                <div class="col-lg-6" id="render-image">
                    
                </div>
            </div>
        </div>
    </div>
    <?php
    include('templates/footer.php');
    ?>