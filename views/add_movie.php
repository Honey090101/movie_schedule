<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Movie</title>
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
      margin-top: 20px;
      text-align: center; 
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
        <p class="display-5 fw-bold text-center">Add New Movie</p>
      </div>
      <div class="row">
        <form class="form" action="../handlers/add_movie_handler.php" method="POST">
          <div class="my-3">

            <label>Title</label>
            <textarea class="form-control" name="title" required></textarea>
          </div>
          <div class="my-3">

            <label>Genre</label>
            <textarea class="form-control" name="genre" required></textarea>
          </div>
          <div class="my-3">

            <label>Date</label>
            <input class="form-control" type="date" name="date" required /> 
          </div>
          <div class="my-3">

            <label>Showtime</label>
            <input type="time" class="form-control" name="showtime" required/> 
          </div>
          <div class="my-3">

     <button type="submit" class="btn btn-outline-dark">Add Movie</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>