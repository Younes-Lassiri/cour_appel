@php
    $posts = App\Models\Post::get();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script>
        const posts = <?php echo json_encode($posts); ?>;
    </script>    
    <div class="theLoaderLikes">
        
    </div>
    <div class="social-media-likesSection">
        <div class="social-media-likesSectionOne">
            <i class='bx bxs-star mainStarParent' onclick="fillLikes()">
                <span class="mainStarChild" id="postIdsLength"></span>
            </i>
            <i class='bx bxl-youtube' ></i>
            <i class='bx bxl-twitter' ></i>
            <i class='bx bxl-facebook' ></i>
        </div>
    </div>
    <div class="employeDetailLikes">
        <div class="employeDetailLikesOne">
            <div class="employeDetailLikesOneOne"><i class='bx bx-plus' onclick="hideDetail()"></i></div>
            <div class="employeDetailLikesOneTwo">مفضلاتي</div>
        </div>
        <div class="employeDetailLikesTwo">
            
        </div>
    </div>

    
<script>
    function fillLikes(){
        let theDetail = document.querySelector('.employeDetailLikes');
        let theLoader = document.querySelector('.theLoaderLikes');
        if (theDetail.style.display = 'none') {
            theLoader.style.display = 'grid';
            theDetail.classList.remove('hideEmpDetailLikes');
            document.body.classList.add('shadow-overlay');
            theDetail.style.display = 'grid';
        }
    }
</script>

<script>
    function hideDetail(){
        let theDetail = document.querySelector('.employeDetailLikes');
        let theLoader = document.querySelector('.theLoaderLikes');
        if (theDetail.style.display = 'grid') {
            theLoader.style.display = 'none';
            document.body.classList.remove('shadow-overlay');
            theDetail.classList.add('hideEmpDetailLikes');

        }
    }
</script>



</body>
</html>