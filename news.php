<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diabetes News</title>
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>
    <header>
        <h1>Diabetes News</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="nutrition.php">Nutrition</a>
            <a href="contact.php">Contact</a>
            <a href="facts.php">Facts</a>
            <a href="news.php">News</a>
            <a href="akun.php">Akun</a>
        </nav>
    </header>
    <main>
        <section>
            <label for="sortOptions">Sort by: </label>
            <select id="sortOptions">
                <option value="publishedAt">Published Date</option>
                <option value="relevancy">Relevancy</option>
                <option value="popularity">Popularity</option>
            </select>
            <div id="articles"></div>
        </section>
    </main>
    <script>
        const apiKey = '9f791c44dae3433690028095ded3bf4f';
        const articlesContainer = document.getElementById('articles');
        const sortOptions = document.getElementById('sortOptions');

        function fetchArticles(sortBy) {
            const apiUrl = `https://newsapi.org/v2/everything?q="diabetes"&language=en&apiKey=${apiKey}&pageSize=8&sortBy=${sortBy}`;
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    articlesContainer.innerHTML = ''; // Clear existing content
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
                .catch(error => {
                    articlesContainer.innerHTML = '<p>Failed to load news articles. Please try again later.</p>';
                    console.error('Error fetching data:', error);
                });
        }

        // Initial fetch with default sortBy parameter
        fetchArticles(sortOptions.value);

        // Fetch articles on sort option change
        sortOptions.addEventListener('change', (event) => {
            fetchArticles(event.target.value);
        });
    </script>
</body>
</html>
