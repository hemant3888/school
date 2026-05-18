<?php include 'header.php'; ?>

<div class="pagetitle">
    <h1>Add Gallery Image</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Add Gallery Image</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
            <h5 class="card-title mb-0">Add Gallery Image</h5>
             
        </div>
<form id="galleryForm" enctype="multipart/form-data">

    <div class="mb-3">
        <label class="form-label">Upload Image</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary">
        Upload Image
    </button>

</form>
        

    </div>

</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
$("#galleryForm").on("submit", function(e){
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: "db/upload-gallery.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
            $(".btn-primary").text("Uploading...");
        },
        success: function(res){

            if(res.trim() === "success"){
                toastr.success("Image Uploaded Successfully");
                $("#galleryForm")[0].reset();
            }else{
                toastr.error(res);
            }
        },
        error: function(){
            toastr.error("Upload Failed");
        },
        complete: function(){
            $(".btn-primary").text("Upload Image");
        }
    });

});
</script>



<?php include 'footer.php' ?>