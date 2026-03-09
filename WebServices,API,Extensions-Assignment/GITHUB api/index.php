<?php

$userData = null;
$repos = null;
$error = "";

if(isset($_GET['username'])) {

    $username = $_GET['username'];

    function apiCall($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "User-Agent: MyApp"
        ]);

        $response = curl_exec($ch);

        if(curl_errno($ch)){
            return false;
        }

        curl_close($ch);
        return json_decode($response, true);
    }

    $userUrl = "https://api.github.com/users/$username";
    $repoUrl = "https://api.github.com/users/$username/repos";

    $userData = apiCall($userUrl);

    if(isset($userData['message'])) {
        $error = "User not found!";
    } else {
        $repos = apiCall($repoUrl);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GitHub User Search</title>
    <style>
        body { font-family: Arial; text-align:center; background:#f4f4f4; }
        .card {
            background:#fff;
            padding:20px;
            margin:20px auto;
            width:400px;
            box-shadow:0 0 10px rgba(0,0,0,0.2);
            border-radius:8px;
        }
        .repo {
            background:#e9e9e9;
            margin:5px;
            padding:5px;
            border-radius:5px;
        }
    </style>
</head>
<body>

<h2>GitHub User Search</h2>

<form method="GET">
    <input type="text" name="username" placeholder="Enter GitHub Username" required>
    <button type="submit">Search</button>
</form>

<?php if($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if($userData && !$error): ?>
<div class="card">
    <img src="<?php echo $userData['avatar_url']; ?>" width="100">
    <h3><?php echo $userData['name']; ?></h3>
    <p><strong>Username:</strong> <?php echo $userData['login']; ?></p>
    <p><strong>Public Repos:</strong> <?php echo $userData['public_repos']; ?></p>
    <p><strong>Followers:</strong> <?php echo $userData['followers']; ?></p>
</div>

<h3>Repositories</h3>

<?php foreach($repos as $repo): ?>
    <div class="repo">
        <strong><?php echo $repo['name']; ?></strong><br>
        <?php echo $repo['description']; ?><br>
        ⭐ Stars: <?php echo $repo['stargazers_count']; ?>
    </div>
<?php endforeach; ?>

<?php endif; ?>

</body>
</html>