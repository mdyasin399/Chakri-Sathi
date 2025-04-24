<?php include("auth_check.php"); ?>

<?php

$conn = new mysqli("localhost", "root", "", "chakri_sathi");
$user_id = 1; // Simulate logged-in user

// Handle Post Upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caption = $_POST['caption'];
    $photo = '';

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo_name = time() . "_" . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photo_name);
        $photo = "uploads/" . $photo_name;
    }

    $stmt = $conn->prepare("INSERT INTO posts (user_id, caption, photo) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $caption, $photo);
    $stmt->execute();
}

// Fetch user posts
$result = $conn->query("SELECT * FROM posts WHERE user_id = $user_id ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile - Chakri-Sathi</title>
  <link rel="stylesheet" href="profile.css">
</head>
<body>
  <div class="profile-wrapper">
    <!-- Cover Photo -->
    <div class="cover-photo">
      <img src="https://via.placeholder.com/1200x300/00529B/ffffff" alt="Cover">
    </div>

    <!-- Profile Info -->
    <div class="profile-info">
      <img src="https://via.placeholder.com/120" class="profile-pic">
      <h2>Md. Job Seeker</h2>
      <p>BSc in CSE • Aspiring Web Developer</p>
      <button class="edit-btn">✏️ Edit Bio</button>
    </div>

    <!-- Post Form -->
    <div class="post-form-container">
      <form class="post-form" method="post" enctype="multipart/form-data">
        <textarea name="caption" placeholder="What's on your mind?" required></textarea>
        <div class="upload-row">
          <label class="custom-upload">
            📸 Upload
            <input type="file" name="photo" accept="image/*" onchange="previewImage(event)">
          </label>
          <img id="preview" class="preview-img" src="" alt="" style="display: none;">
          <button type="submit">📤 Post</button>
        </div>
      </form>
    </div>

    <!-- News Feed -->
    <div class="feed">
      <?php while($row = $result->fetch_assoc()): ?>
        <div class="post-card">
          <p><?= htmlspecialchars($row['caption']) ?></p>
          <?php if ($row['photo']): ?>
            <img src="<?= $row['photo'] ?>" class="post-photo">
          <?php endif; ?>
          <div class="post-footer">
            <small>📅 Posted on <?= $row['created_at'] ?></small>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <script>
    function previewImage(event) {
      const output = document.getElementById('preview');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.style.display = 'block';
    }
  </script>
</body>

</html>
