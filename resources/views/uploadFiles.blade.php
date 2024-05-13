<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Image Upload Preview</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/upload.css">
</head>
<body>
    <div class="container">
        <input type="file" id="file-input" accept="image/png, image/jpeg" onchange="preview()" multiple>
        <label for="file-input">
            <i class="fas fa-upload"></i> &nbsp; Choose A Photo
        </label>
        <p id="num-of-files">No Files Chosen</p>
        <div id="images"></div>
    </div>
    <script src="/js/main.js"></script>
</body>
</html>