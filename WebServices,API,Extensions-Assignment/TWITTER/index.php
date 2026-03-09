<?php

$bearerToken = "AAAAAAAAAAAAAAAAAAAAALn%2B7wEAAAAAJs6QLxJk3T3vkOIuaYFB8VzUJ%2BQ%3DpKdqD8t5nlWIwxGkKji7oTpcO6QKDcYvNDvUJ3AkolODVEOXqD";
$tweets = [];
$error = "";

if(isset($_GET['hashtag'])) {

    $hashtag = urlencode("#" . $_GET['hashtag']);
    $url = "https://api.twitter.com/2/tweets/search/recent?query=$hashtag&max_results=10";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $bearerToken"
    ]);

    $response = curl_exec($ch);

    if(curl_errno($ch)) {
        $error = "API Error!";
    } else {
        $data = json_decode($response, true);
        if(isset($data['data'])) {
            $tweets = $data['data'];
        } else {
            $error = "No tweets found or API limit exceeded!";
        }
    }

    curl_close($ch);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hashtag Tweet Search</title>
    <style>
        body { font-family: Arial; text-align:center; background:#f4f4f4; }
        .tweet {
            background:white;
            padding:15px;
            margin:10px auto;
            width:500px;
            border-radius:8px;
            box-shadow:0 0 5px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<h2>Search Tweets by Hashtag</h2>

<form method="GET">
    <input type="text" name="hashtag" placeholder="Enter Hashtag (without #)" required>
    <button type="submit">Search</button>
</form>

<?php if($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<?php foreach($tweets as $tweet): ?>
    <div class="tweet">
        <?php echo $tweet['text']; ?>
    </div>
<?php endforeach; ?>

</body>
</html>