<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .add-movie-btn {
            background-color: #2ecc71;
            color: white;
            padding: 10px 15px;
            text-align: center;
            display: block;
            width: 200px;
            margin: 20px auto;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
        }

        .add-movie-btn:hover {
            background-color: #27ae60;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Movies List</h1>

        <!-- Button to trigger modal -->
        <a href="javascript:void(0)" class="add-movie-btn" onclick="openModal()">Add Movie</a>

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Release Year</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through movies data from the database -->
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->genre }}</td>
                        <td>{{ $movie->release_year }}</td>
                        <td>{{ $movie->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div id="movieModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Add New Movie</h2>

            <!-- Movie Form -->
            <form id="movieForm" action="{{ route('movies.store') }}" method="POST">
                @csrf
                <input type="text" name="title" class="form-input" placeholder="Movie Title" required><br>
                <input type="text" name="genre" class="form-input" placeholder="Genre" required><br>
                <input type="number" name="release_year" class="form-input" placeholder="Release Year" required><br>
                <textarea name="description" class="form-input" placeholder="Description" rows="4" required></textarea><br>
                <button type="submit" class="form-input">Add Movie</button>
            </form>
        </div>
    </div>

    <script>
        // Open the modal
        function openModal() {
            document.getElementById("movieModal").style.display = "block";
        }

        // Close the modal
        function closeModal() {
            document.getElementById("movieModal").style.display = "none";
        }
    </script>

</body>
</html>
