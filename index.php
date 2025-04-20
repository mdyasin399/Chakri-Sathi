<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chakri-Sathi | Find Your Dream Job</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="navbar">
  <div class="logo">Chakri-Sathi</div>
  <input type="checkbox" id="menu-toggle">
  <label for="menu-toggle" class="menu-icon">&#9776;</label>

  <nav>
    <ul class="menu">
      <li><a href="index.php">Home</a></li>
      <li><a href="jobs.php">Jobs</a></li>
      <li><a href="employers.php">Employers</a></li>
      <li><a href="login.html">Login</a></li>
      <li><a href="register.html">Register</a></li>
    </ul>
  </nav>
</header>


  <section class="hero">
    <h1>Connecting Job Seekers and Employers in Bangladesh</h1>
    <form class="search-box">
      <input type="text" placeholder="Search for jobs...">
      <select>
        <option>Category</option>
        <option>IT</option>
        <option>Marketing</option>
      </select>
      <button type="submit">Search</button>
    </form>
  </section>

  <section class="featured-jobs">
    <h2>Featured Jobs</h2>
    <div class="job-list">
      <?php
      // Simulated job data
      $jobs = [
        ["title" => "Web Developer", "company" => "TechHive Ltd.", "location" => "Dhaka"],
        ["title" => "Sales Executive", "company" => "ABC Ltd.", "location" => "Chittagong"],
        ["title" => "Graphic Designer", "company" => "DesignHouse", "location" => "Sylhet"],
      ];
      foreach ($jobs as $job) {
        echo "<div class='job-card'>";
        echo "<h3>{$job['title']}</h3>";
        echo "<p>{$job['company']} - {$job['location']}</p>";
        echo "<a href='#' class='apply-btn'>Apply Now</a>";
        echo "</div>";
      }
      ?>
    </div>
  </section>

  <section class="featured-companies">
    <h2>Top Hiring Companies</h2>
    <div class="company-logos">
      <img src="https://via.placeholder.com/100x50?text=Company+1" alt="">
      <img src="https://via.placeholder.com/100x50?text=Company+2" alt="">
      <img src="https://via.placeholder.com/100x50?text=Company+3" alt="">
      <img src="https://via.placeholder.com/100x50?text=Company+4" alt="">
    </div>
  </section>

  <footer>
    <p>© 2025 Chakri-Sathi. All rights reserved.</p>
  </footer>
</body>
</html>
