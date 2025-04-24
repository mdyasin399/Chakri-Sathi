<?php include("auth_check.php"); ?>

<?php

// Dummy login session simulation
$_SESSION['user_type'] = "Job Seeker"; // should be set during login
$_SESSION['user_name'] = "Md. Job Seeker";

if ($_SESSION['user_type'] !== "Job Seeker") {
  header("Location: login.html");
  exit();
}

$conn = new mysqli("localhost", "root", "", "chakri_sathi");
$filter = isset($_GET['category']) ? $_GET['category'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM jobs WHERE 1";
if ($filter) $sql .= " AND category='$filter'";
if ($search) $sql .= " AND title LIKE '%$search%'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Chakri Sathi</title>
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<header class="dashboard-navbar">
  <div class="logo">Chakri-Sathi</div>
  <input type="checkbox" id="menu-toggle">
  <label for="menu-toggle" class="menu-icon">&#9776;</label>

  <nav>
    <ul class="menu">
      <li><a href="dashboard.php">Home</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="resume.php">Resume</a></li>
      <li><a href="applied_jobs.php">Applied Jobs</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>
</header>

<div class="welcome-banner">
  <h3>Welcome, <?= $_SESSION['user_name']; ?> 👋</h3>
</div>


  <main class="dashboard-container">
    <aside class="filter-box">
      <h3>Filter by Category</h3>
      <form method="GET">
        <select name="category">
          <option value="">All Categories</option>
          <option value="IT">IT</option>
          <option value="Sales">Sales</option>
          <option value="HR">HR</option>
        </select>
        <input type="text" name="search" placeholder="Search jobs..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Apply</button>
      </form>
    </aside>

    <section class="job-feed">
      <h2>Latest Jobs</h2>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="job-card">
          <h3><?= $row['title'] ?></h3>
          <p><strong>Company:</strong> <?= $row['company'] ?></p>
          <p><strong>Location:</strong> <?= $row['location'] ?></p>
          <p><strong>Category:</strong> <?= $row['category'] ?></p>
          <p><em>Posted on: <?= $row['posted_date'] ?></em></p>
          <button>Apply Now</button>
        </div>
      <?php } ?>
    </section>
  </main>
</body>
</html>
