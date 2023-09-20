<?php
session_start();
if (!isset($_SESSION['setfolder']))
{
    echo "Invalid username or password. Please try again.";
    header("Location: /login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
</head>
<body>
<span>your files will be at <?=$_SESSION['setfolder'] ?></span> | <a href="">start a new set</a> | <a href="/logout.php">logout</a>
<form id="imageDragAndDropUploader" method="POST" action="upload.php" class="dropzone"></form>
<form id="docDragAndDropUploader" method="POST" action="upload.php" class="dropzone"></form>
<form id="submit">
    <input type="email" name="username" />
    <input type="text" name="delievery address" />
    <button type="submit">Submit data and files!</button>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
</body>
<script type="text/javascript">
    Dropzone.options.imageDragAndDropUploader = {
        paramName: "img",
        maxFilesize: 2,
        acceptedFiles: 'image/*',
        success: function(file, response){
            //Here you can get your response.
            console.log(response);
        }
    };
    Dropzone.options.docDragAndDropUploader = {
        paramName: "doc",
        maxFilesize: 2,
        acceptedFiles: 'application/pdf',
        success: function(file, response){
            //Here you can get your response.
            console.log(response);
        }
    };
</script>
</html>