<?php
$apiKey = '4199c50d194ed33911e62298b790f0d5';
$appId = '6b0ddc17';
$apiUrl = "https://trackapi.nutritionix.com/v2/natural/nutrients";

if (isset($_POST['food'])) {
    $food = $_POST['food'];
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'x-app-id: ' . $appId,
        'x-app-key: ' . $apiKey
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['query' => $food, 'timezone' => 'US/Eastern']));
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nutrition Information</title>
    <link rel="stylesheet" type="text/css" href="assets/style2.css">
</head>
<body>
    <header>
        <h1>Diabetes Guidelines</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="account/login.php">Login</a>
            <a href="account/register.php">Register</a>
            <a href="nutrition.php">Nutrition</a>
            <a href="contact.php">Contact</a>
            <a href="facts.php">Facts</a>
            <a href="news.php">News</a>
        </nav>
    </header>
    <main>
        <h2>Search Food Nutrition</h2>
        <form method="post" action="nutrition.php">
            <input type="text" name="food" placeholder="Enter food name" required>
            <button type="submit">Search</button>
        </form>
        <div id="nutrition-info">
            <?php if (isset($data['foods'])): ?>
                <?php foreach ($data['foods'] as $food): ?>
                    <div class="nutrition-item">
                        <h3><?php echo htmlspecialchars($food['food_name']); ?></h3>
                        <p>Calories: <?php echo htmlspecialchars($food['nf_calories']); ?></p>
                        <p>Carbohydrates: <?php echo htmlspecialchars($food['nf_total_carbohydrate']); ?></p>
                        <p>Proteins: <?php echo htmlspecialchars($food['nf_protein']); ?></p>
                        <p>Fats: <?php echo htmlspecialchars($food['nf_total_fat']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php elseif (isset($response)): ?>
                <p>No results found for "<?php echo htmlspecialchars($food); ?>"</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
