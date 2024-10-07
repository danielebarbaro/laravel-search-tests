<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeiliSearch</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/meilisearch@latest/dist/bundles/meilisearch.umd.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
        Search for Users
    </h1>

    <div class="mb-6">
        <input
            type="text"
            id="search"
            placeholder="Search..."
            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
        >
    </div>

    <div id="results" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3"></div>
</div>

<script>
    const client = new MeiliSearch({
        host: 'http://0.0.0.0:7700',
        apiKey: 'masterKey',
    })

    const index = client.index('users_index')

    const input = document.querySelector('#search')

    input.addEventListener('keyup', event => {
        index.search(event.target.value)
            .then(response => {
                console.log(response.hits);
                let nodes = response.hits.map(user => {
                    let div = document.createElement('div');
                    div.className = 'bg-white p-4 rounded-lg shadow-md border border-gray-200';
                    div.textContent = user.name + ' - ' + user.email;
                    return div;
                });

                let results = document.querySelector('#results');
                results.innerHTML = '';
                results.append(...nodes);
            })
    })
</script>
</body>
</html>
