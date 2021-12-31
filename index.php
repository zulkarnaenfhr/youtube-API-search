<?php 
    require 'config.php';
    $maxContent = 15;

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
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">

        <!-- link css -->
        <link rel="stylesheet" href="style.css">

        <title>Youtube API</title>

    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbarBranding" href="#">Youtube API Search</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div id="sideNavbar">
            <ul>
                <li>
                    <!-- <button class="custom-btn"> 1. API Facebook </button> -->
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
                    <input type="text" name="searchKeyword" id="" placeholder="Search Bar" class="inputSearchKeyword">
                    <button type="submit" class="buttonSearch" name="submitSearch">Search</button>
                </form>
                <?php 
                    if (isset($_POST['submitSearch']) && !empty($keyword)) {
                ?>
                <div class="searchingInformation">
                    <p class="headerHasilPencarian">Menampilkan hasil pencarian dari
                        <b>
                            <?php echo $keyword ?>
                        </b>
                    </p>
                </div>
            <?php } else { ?>
                <div class="welcomingDiv">
                    <div class="welcomingDiv-content">
                        <h1>Welcome on Board, Retro Youtube Clone</h1>
                        <h3>Fahri Izzuddin Zulkarnaen (19081010046)</h3>
                    </div>
                </div>
                <?php    
                    }
                ?>
                <?php 
                    if (isset($_POST['submitSearch']) && !empty($keyword)) {
                        $apikey = 'AIzaSyBqbREm8cqNHOIFxu-io9U8rDQ7Nv0RP0A'; 
                        $keywordBaru = str_replace(" ","%20",$keyword);
                        $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keywordBaru . '&maxResults=' . $maxContent .'&type=video&key=' . $apikey;
                        $searchAPIYoutube = file_get_contents($googleApiUrl);
                        $value = json_decode($searchAPIYoutube,true)
                ?>

                <?php 
                    for ($i=0; $i < $maxContent; $i++) { 
                        $videoId = $value['items'][$i]['id']['videoId'];
                        $title = $value['items'][$i]['snippet']['title'];
                        $description = $value['items'][$i]['snippet']['description'];
                        $title = $value['items'][$i]['snippet']['title'];
                        $channelId = $value['items'][$i]['snippet']['channelId'];

                        // get jumlah viewers
                        $videoStatisticsAPI = "https://youtube.googleapis.com/youtube/v3/videos?part=statistics&id=$videoId&key=$apikey";
                        $videoStatisticsAPI = file_get_contents($videoStatisticsAPI);
                        $dataVideoStatistics = json_decode($videoStatisticsAPI, true);
                        $viewers = $dataVideoStatistics['items'][0]['statistics']['viewCount'];
                        $jumlahViewers = singkat_angka($viewers);

                        // get publish datenya
                        $datePublish = $value['items'][$i]['snippet']['publishedAt'];
                        
                        $jaraknya = "";

                        $selisihPublish = getJarakPublish($datePublish);

                        // get channel data
                        $channelDataAPI = "https://www.googleapis.com/youtube/v3/channels?part=snippet&id=$channelId&key=$apikey";
                        $channelDataAPI = file_get_contents($channelDataAPI);
                        $channelData = json_decode($channelDataAPI, true);
                        $channelName = $channelData['items'][0]['snippet']['title'];
                        $channelPict = $channelData['items'][0]['snippet']['thumbnails']['default']['url'];
                        
                ?>
                <div class="row">
                    <div class="col-4">
                        <div class="youtubeVideo">
                            <iframe
                                class="videoYoutube-embed"
                                id="iframe"
                                src="//www.youtube.com/embed/<?php echo $videoId; ?>"
                                data-autoplay-src="//www.youtube.com/embed/<?php echo $videoId; ?>?autoplay=1"></iframe>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="videoInfo">
                            <h4 class="videoTitle">
                                <?php echo $title; ?>
                            </h4>
                            <p>
                                <img src="<?php echo $channelPict?>" alt="" class="channelImg"> <?php echo $channelName ?>
                            </p>
                            <p>
                                <?php echo $jumlahViewers ?>
                                ***<?php echo $selisihPublish ?>
                                yang lalu
                            </p>
                            <p class="videoDesc">
                                <?php echo $description; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php 
                    } // punya for ($i=0; $i < $maxContent; $i++)
                ?>

                <?php
                    } // punya if yang if (isset($_POST['submitSearch']) && !empty($keyword )) 
                ?>
            </section>
        </main>

        <footer>
            <p>Design and Develop by
                <span>SpaceCapt</span>
                <span style="font-size: 15px; color: #b91646;">@2021</span></p>
        </footer>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>

</html>