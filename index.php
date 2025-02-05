<?php include 'database/database.php'; 
// $dateTime = new DateTime($row['showtime']);
// $formattedShowtime = $dateTime->format('H:i');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Movie Theater Schedule </title>
  <link href="statics/css/bootstrap.min.css" rel="stylesheet">
  <script src="statics/js/bootstrap.js"></script>
  <style>
    body {
      background-color: hsl(209, 58.10%, 29.00%);
      font-size: 16px; 
    }

    .container {
      background-color: rgb(250, 247, 247);
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      padding: 20px;
    }

    .title {
      text-align: center;
      margin-top: 20px; 
      font-size: 3rem;
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

    .card-text {
      font-size: 1.5rem; 
    }

    .btn {
      font-size: 1.6rem; 
      margin-top: 10px; 
    }
  </style>
</head>

<body>
    <div class="container d-flex justify-content-center mt-5"> 
      <div class="col-6">
        <div class="row">
          <p class="display-6 fw-bold text-center title">Movie Theater Schedule</p>
        </div>
        <div class="row">
          <a href="views/add_movie.php" class="btn btn-outline-dark btn-sm">Add New Movie</a>
        </div>
        <?php
          $res = $conn->query("SELECT * FROM movies");
        ?>
        <?php if($res->num_rows > 0): ?>
            <?php while($row = $res->fetch_assoc()): ?>
            <div class="row border rounded p-3 my-3 movie-card">
                <div>
                <h3 class="fw-bold"><?= $row['title']; ?></h3>
                <p class="card-text">Genre: <?= $row['genre']; ?></p>
                <p class="card-text">Date: <?= $row['date']; ?></p>
                <p class="card-text">Showtime: <?= $row['showtime']; ?></p>
                <h5 class="fw-bold">
                    <small> 
                    <?= $row['status'] == 0 ? "Ongoing" : "Done"; ?> 
                    </small>
                </h5>
                <div class="row my-1">
                    <a href="views/update_movie.php?id=<?=$row['id'];?>" class="btn btn-sm btn-warning">Edit</a>
                </div>
                <div class="row my-1">
                    <a href="handlers/delete_movie_handler.php?id=<?=$row['id'];?>" class="btn btn-sm btn-danger">Delete</a>
                </div>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="row border rounded p-3 my-3 text-center">
                <div class="col mt-3">
                    <p class="text-muted"> 🎬 No movies scheduled! Add a new movie to get started.</p>
                </div>
            </div>
        <?php endif; ?>
      </div>
    </div>
</body>

</html>