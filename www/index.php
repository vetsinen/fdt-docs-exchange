<?php
session_start();
require_once ('../src/config.php');
if (!isset($_SESSION['setfolder']))
{
    echo "Invalid username or password. Please try again.";
    header("Location: /login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="us">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Files upload dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <div>
        <span>your files will be at <?=$_SESSION['setfolder'] ?></span> | <a href="/logout.php">logout</a></br>
        <span>put your images here</span>
        <form id="imgDragAndDropUploader" method="POST" action="upload.php" class="dropzone"></form>

        <span>put your pdfs here</span>
        <form id="docDragAndDropUploader" method="POST" action="upload.php" class="dropzone"></form>
        </div>
        <hr>

        <div class="columns is-centered">
            <div class="column is-half">
                <div class="form-container">
                    <h1 class="title is-4">Documents description</h1>
                    <form aria-disabled="false" action="/senddata.php" method="post">
                        <div class="field">
                            <label class="label">Address</label>
                            <div class="control">
                                <input name="address" class="input" type="text" value="address" placeholder="Enter address">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Field 2</label>
                            <div class="control">
                                <input name="field2" class="input" type="text" value="Field 2" placeholder="Enter Field 2">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control" title="upload at least one file to submit form">
                                <button disabled id="submit" class="button is-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
<script type="text/javascript">
    Dropzone.options.imgDragAndDropUploader = {
        paramName: "img",
        parallelUploads: 1,
        acceptedFiles: 'image/*',
        maxFiles: <?=config['maximg'] ?>,
        success: function(file, response){
            document.getElementById("submit").disabled = false;
            console.log(response);
        }
    };
    Dropzone.options.docDragAndDropUploader = {
        paramName: "doc",
        maxFiles: <?=config['maxdoc'] ?>,
        parallelUploads: 1,
        acceptedFiles: 'application/pdf',
        success: function(file, response)
        document.getElementById("submit").disabled = false;
        console.log(response);
        }
    }
</script>
</html>