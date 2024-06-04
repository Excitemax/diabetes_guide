<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>


    <header>
        <h1>Diabetes News</h1>
        
        <nav>
            <a href="index.php">Home</a>
            <a href="account/register.php">Register</a>
            <a href="account/login.php">Login</a>
            <a href="nutrition.php">Nutrition</a>
            <a href="contact.php">Contact</a>
            <a href="facts.php">Facts</a>
            <a href="news.php">News</a>
        </nav>
    </header>
    <section>
        <div id="articles"></div>
    </section>
    <script>
        // Ganti dengan kunci API Anda
        const apiKey = '9f791c44dae3433690028095ded3bf4f';
        const apiUrl = `https://newsapi.org/v2/everything?q=diabetes&apiKey=${apiKey}&pageSize=5`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const articlesContainer = document.getElementById('articles');
                data.articles.forEach(article => {
                    const articleElement = document.createElement('div');
                    articleElement.classList.add('article');
                    articleElement.innerHTML = `
                        <h3>${article.title}</h3>
                        <p>${article.description}</p>
                        <a href="${article.url}" target="_blank">Read more</a>
                        <hr>
                    `;
                    articlesContainer.appendChild(articleElement);
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
</body>
</html>
