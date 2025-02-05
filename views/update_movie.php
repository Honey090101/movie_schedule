<?php
include '../database/database.php';

try {
    $id = $_GET['id']; 

    $stmt = $conn->prepare("SELECT * FROM movies WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $movie = $result->fetch_assoc();
    } else {
        die("Movie not found");
    }
    $stmt->close();

} catch (\Exception $e) {
    echo "Error: " . $e;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Movie</title>
  <link href="../statics/css/bootstrap.min.css" rel="stylesheet">
  <script src="../statics/js/bootstrap.js"></script>
  <style>
    body {
      background-color:hsl(209, 58.10%, 29.00%); 
    }

    .container {
      background-color:rgb(250, 247, 247); 
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
      padding: 20px; 
    }

    .title {
      text-align: center;
      margin-top: 20px; 
    }

    .movie-card {
      background-color: #e9ecef; 
      border-radius: 5px;
      padding: 15px;
      transition: transform 0.2s; 
    }

    .movie-card:hover {
      transform: scale(1.02); 
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); 
    }

    .btn-outline-dark {
      margin-top: 10px; 
    }

    label {
      font-size: 1.3rem; 
    }
  </style>
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
      <div class="col-6">
        <div class="row">
          <p class="display-5 fw-bold text-center">Update Movie</p>
        </div>
        <div class="row">
          <form class="form" action="../handlers/update_movie_handler.php" method="POST">
            <input name="id" value="<?= $movie['id'] ?>" hidden /> 
            <div class="my-3">
              
              <label>Title</label>
              <input class="form-control" type="text" name="title" value="<?= $movie['title'] ?>" required />
            </div>
            <div class="my-3">

              <label>Genre</label>
              <input class="form-control" type="text" name="genre" value="<?= $movie['genre'] ?>" required />
            </div>

            <div class="my-3">
               <label>Date</label>
              <input class="form-control" type="date" name="date" value="<?= $movie['date'] ?>" required />
            </div>

            <div class="my-3">
                <label>Showtime</label>
                <input type="time" class="form-control" name="showtime" value="<?= date('H:i', strtotime($movie['showtime'])) ?>" required />
            </div>

            <label>Status</label>
            <select class="form-control" name="status" required>
              <option value="0" <?= $movie['status'] == 0 ? 'selected' : ''; ?>>Ongoing</option>
              <option value="1" <?= $movie['status'] == 1 ? 'selected' : ''; ?>>Done</option>
            </select>
            </div>

            <div class="my-3">
              <button type="submit" class="btn btn-outline-dark">Save Movie</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>

</html>