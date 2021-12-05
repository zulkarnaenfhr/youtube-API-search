<?php 
    $maxContent = 16;

    if (isset($_POST['submitSearch']) )
     {          
        $keyword = $_POST['searchKeyword'];

        if (empty($keyword))
        {
            echo '<script>
                alert("Inputan Kosong")
            </script>';
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- link css -->
    <link rel="stylesheet" href="style.css">

    <title>Youtube API</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbarBranding" href="#">Youtube API Search</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">Action</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="sideNavbar">
        <ul>
            <li>
                <!-- <button class="custom-btn">
                    1. API Facebook
                </button> -->
                <form action="" method="post" id="searchFom">
                    <input type="hidden" name="searchKeyword" value="API Facebook">
                    <button class="custom-btn" type="submit" name="submitSearch">1. API Facebook</button>
                </form>
            </li>
            <li>
                <form action="" method="post" id="searchFom">
                    <input type="hidden" name="searchKeyword" value="API Instagram">
                    <button class="custom-btn" type="submit" name="submitSearch">2. API Instagram</button>
                </form>
            </li>
            <li>
                <form action="" method="post" id="searchFom">
                    <input type="hidden" name="searchKeyword" value="API Youtube">
                    <button class="custom-btn" type="submit" name="submitSearch">3. API Youtube</button>
                </form>
            </li>
            <li>
                <form action="" method="post" id="searchFom">
                    <input type="hidden" name="searchKeyword" value="API Twitter">
                    <button class="custom-btn" type="submit" name="submitSearch">4. API Twitter</button>
                </form>
            </li>
            <li>
                <form action="" method="post" id="searchFom">
                    <input type="hidden" name="searchKeyword" value="API WhatsApp">
                    <button class="custom-btn" type="submit" name="submitSearch">5. API WhatsApp</button>
                </form>
            </li>
            <li>
                <form action="" method="post" id="searchFom">
                    <input type="hidden" name="searchKeyword" value="API Telegram">
                    <button class="custom-btn" type="submit" name="submitSearch">6. API Telegram</button>
                </form>
            </li>
            <li>
                <form action="" method="post" id="searchFom">
                    <input type="hidden" name="searchKeyword" value="API Line">
                    <button class="custom-btn" type="submit" name="submitSearch">7. API Line</button>
                </form>
            </li>
            <li>
                <form action="" method="post" id="searchFom">
                    <input type="hidden" name="searchKeyword" value="API Google Maps">
                    <button class="custom-btn" type="submit" name="submitSearch">8. API Google Map</button>
                </form>
            </li>
            <li>
                <form action="" method="post" id="searchFom">
                    <input type="hidden" name="searchKeyword" value="API Indodax">
                    <button class="custom-btn" type="submit" name="submitSearch">9. API Indodax</button>
                </form>
            </li>
            <li>
                <form action="" method="post" id="searchFom">
                    <input type="hidden" name="searchKeyword" value="API Accuwheater">
                    <button class="custom-btn" type="submit" name="submitSearch">10. API Accuwheater</button>
                </form>
            </li>
        </ul>
    </div>

    <main>
        <section id="mainContent">
            <form id="searchForm" method="post" action="">
                <input type="text" name="searchKeyword" id="" placeholder="Search Bar">
                <button type="submit" name="submitSearch">Search</button>
            </form>
            <div class="row">
                <?php 
                    if (isset($_POST['submitSearch']) && !empty($keyword)) {
                        $apikey = 'AIzaSyBqbREm8cqNHOIFxu-io9U8rDQ7Nv0RP0A'; 
                        $keywordBaru = str_replace(" ","%20",$keyword);
                        $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keywordBaru . '&maxResults=' . $maxContent .'&type=video'. '&key=' . $apikey;

                        $ch = curl_init();

                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                        curl_setopt($ch, CURLOPT_VERBOSE, 0);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        $response = curl_exec($ch);

                        curl_close($ch);
                        $data = json_decode($response);
                        $value = json_decode(json_encode($data), true);
                ?>

                <?php 
                    for ($i=0; $i < $maxContent; $i++) { 
                        $videoId = $value['items'][$i]['id']['videoId'];
                        $title = $value['items'][$i]['snippet']['title'];
                        $description = $value['items'][$i]['snippet']['description'];
                        $title = $value['items'][$i]['snippet']['title'];
                        
                ?>
                <div class="col-3">
                    <div class="contentContainer">
                        <div class="youtubeVideo">
                            <iframe id="iframe" style="width:100%;height:100%"
                                src="//www.youtube.com/embed/<?php echo $videoId; ?>"
                                data-autoplay-src="//www.youtube.com/embed/<?php echo $videoId; ?>?autoplay=1"></iframe>
                        </div>
                        <div class="videoInfo">
                            <div class="videoTitle">
                                <b>
                                    <?php echo $title; ?>
                                </b>
                            </div>
                            <div class="videoDesc">
                                <?php echo $description; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    } // punya for ($i=0; $i < $maxContent; $i++)
                ?>

                <?php
                    } // punya if yang if (isset($_POST['submitSearch']) && !empty($keyword )) 
                ?>
            </div>
        </section>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html> 