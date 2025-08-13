<?php
// Enable error reporting at the VERY TOP of the file
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
require_once 'db_config.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize form data
    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $project = $conn->real_escape_string($_POST['project'] ?? '');
    $rating = (int)($_POST['rating'] ?? 5);
    $review = $conn->real_escape_string($_POST['review'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($review)) {
        die("Name and review are required fields");
    }
    
    // Insert into database
    $sql = "INSERT INTO reviews (client_name, project_name, rating, review_text) 
            VALUES ('$name', '$project', $rating, '$review')";
    
    if ($conn->query($sql)) {
        // Success - redirect to prevent form resubmission
        header("Location: reviews.php?success=1");
        exit();
    } else {
        $error = "Database error: " . $conn->error;
    }
}

// Fetch existing reviews
$reviews = $conn->query("SELECT * FROM reviews ORDER BY date_submitted DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Client Reviews - Zaima Graphic Design</title>
    <style>
        /* Use your existing styles from 00.php */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background: #ecf0f1;
            color: #2c3e50;
            line-height: 1.6;
        }
        
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #6e8efb;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2.2rem;
        }
        
        .review-form {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 40px;
        }
        
        label {
            display: block;
            margin: 15px 0 8px;
            font-weight: bold;
        }
        
        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        textarea {
            height: 120px;
            resize: vertical;
        }
        
        .rating-options {
            display: flex;
            gap: 10px;
            margin: 10px 0;
        }
        
        .rating-option {
            cursor: pointer;
            font-size: 1.5rem;
            color: #ddd;
        }
        
        .rating-option.active {
            color: #f39c12;
        }
        
        .submit-btn {
            background: #6e8efb;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s;
        }
        
        .submit-btn:hover {
            background: #5a7df4;
            transform: translateY(-2px);
        }
        
        .home-btn {
            display: inline-block;
            background: #649ed7ff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            transition: all 0.3s;
        }
        
        .home-btn:hover {
            background: #5a7df4;
        }
        
        .reviews-list {
            margin-top: 40px;
        }
        
        .review-card {
            background: white;
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .client-name {
            font-weight: bold;
            color: #6e8efb;
        }
        
        .project-name {
            font-style: italic;
            color: #7f8c8d;
        }
        
        .review-date {
            color: #95a5a6;
            font-size: 0.9rem;
        }
        
        .review-rating {
            color: #f39c12;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Client Reviews</h1>
        
        <?php if (isset($_GET['success'])): ?>
            <div style="background:#d4edda; color:#155724; padding:15px; margin-bottom:20px; border-radius:5px;">
                Thank you! Your review has been submitted successfully.
            </div>
        <?php endif; ?>
        
        <?php if (!empty($error)): ?>
            <div style="color:red; padding:10px; margin:10px; border:1px solid red;">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <a href="00.php" class="home-btn">Back to Home</a>
        
        <div class="review-form">
            <h2>Submit Your Review</h2>
            <form method="POST" action="reviews.php"> <!-- Add the action -->
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="project">Project Name (optional):</label>
                <input type="text" id="project" name="project">
                
                <label>Rating:</label>
                <div class="rating-options">
                    <span class="rating-option" data-value="1">★</span>
                    <span class="rating-option" data-value="2">★</span>
                    <span class="rating-option" data-value="3">★</span>
                    <span class="rating-option" data-value="4">★</span>
                    <span class="rating-option" data-value="5">★</span>
                </div>
                <input type="hidden" id="rating" name="rating" value="5">
                
                <label for="review">Your Review:</label>
                <textarea id="review" name="review" required></textarea>
                
                <button type="submit" class="submit-btn">Submit Review</button>
            </form>
        </div>
        
        <div class="reviews-list">
            <h2>Past Reviews</h2>
            
            <?php if ($reviews->num_rows > 0): ?>
                <?php while($review = $reviews->fetch_assoc()): ?>
                    <div class="review-card">
                        <div class="review-header">
                            <div>
                                <span class="client-name"><?= htmlspecialchars($review['client_name']) ?></span>
                                <?php if (!empty($review['project_name'])): ?>
                                    <span class="project-name"> - <?= htmlspecialchars($review['project_name']) ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="review-date">
                                <?= date('M j, Y', strtotime($review['date_submitted'])) ?>
                            </div>
                        </div>
                        <div class="review-rating">
                            <?= str_repeat('★', $review['rating']) ?>
                        </div>
                        <p><?= nl2br(htmlspecialchars($review['review_text'])) ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No reviews yet. Be the first to review!</p>
            <?php endif; ?>
        </div>
    </div>
    <script>
        // Star rating selection
        document.querySelectorAll('.rating-option').forEach(star => {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                document.getElementById('rating').value = value;
                
                // Update star display
                document.querySelectorAll('.rating-option').forEach((s, i) => {
                    if (i < value) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
            });
        });
        
        // Initialize with 5 stars selected
        document.querySelectorAll('.rating-option').forEach((star, i) => {
            if (i < 5) star.classList.add('active');
        });
    </script>
</body>
</html>