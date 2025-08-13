<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaima Graphic Design</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            overflow: hidden;
            height: 100vh;
            background: #f5f7fa;
        }
        
        /* Landing Page Styles */
        #landing-page {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: transform 0.7s ease-in-out;
            z-index: 10;
        }
        
        #landing-page h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        #enter-btn {
            padding: 12px 30px;
            background: white;
            color: #6e8efb;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        #enter-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }
        
        /* Main Page Styles */
        #main-page {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            transform: translateY(100%);
            transition: transform 0.7s ease-in-out;
        }
        
        /* Sidebar Navigation */
        #sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            padding: 20px 0;
            height: 100%;
        }
        
        .nav-btn {
            display: block;
            width: 100%;
            padding: 15px 25px;
            background: none;
            border: none;
            color: white;
            text-align: left;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .nav-btn:hover {
            background: #34495e;
        }
        
        #about-btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        #about-btn::after {
            content: '+';
            font-size: 1.2rem;
        }
        
        #about-btn.expanded::after {
            content: '-';
        }
        
        .sub-btn {
            padding: 12px 25px 12px 35px;
            display: none;
            background: #e5eaee;
            font-size: 0.9rem;
        }
        
        /* Content Area */
        #content {
            flex: 1;
            padding: 30px;
            background: #ecf0f1;
            overflow-y: auto;
        }
        
        .content-section {
            display: none;
            line-height: 1.6;
            padding: 20px;
        }
        
        .content-section.active {
            display: block;
            animation: fadeIn 0.5s;
        }
        
        h2 {
            color: #2c3e50;
            margin: 30px 0 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #bdc3c7;
        }
        
        h3 {
            margin: 20px 0 10px;
            color: #2c3e50;
        }
        
        p {
            margin-bottom: 15px;
        }
        
        ul {
            margin: 20px 0;
            padding-left: 30px;
        }
        
        li {
            margin-bottom: 15px;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Card Styles */
        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        /* Gallery Styles */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        
        .gallery-item {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .gallery-item-content {
            padding: 15px;
        }
        
        /* CV Download Button */
        .download-cv-btn {
            display: inline-block;
            padding: 10px 20px;
            background: #6e8efb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .download-cv-btn:hover {
            background: #5a7df4;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        /* Hero Section */
        .hero-section {
            text-align: center;
            padding: 60px 20px;
            background: linear-gradient(135deg, #6e8efb33, #a777e333);
            border-radius: 10px;
            margin-bottom: 40px;
        }
        
        .hero-section h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #2c3e50;
            border-bottom: none;
        }
        
        .tagline {
            font-size: 1.2rem;
            color: #7f8c8d;
            margin-bottom: 25px;
        }
        
        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background: #6e8efb;
            color: white;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .cta-button:hover {
            background: #5a7df4;
            transform: translateY(-3px);
        }
        
        /* Highlights Grid */
        .highlights {
            display: flex;
            justify-content: space-between;
            margin: 40px 0;
            gap: 20px;
        }
        
        .highlight-card {
            flex: 1;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .highlight-card h3 {
            color: #6e8efb;
            margin-bottom: 10px;
        }
        
        /* Recent Work */
        .recent-work {
            margin-top: 50px;
        }
        
        .project-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }
        
        .project-card {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .project-card:hover {
            transform: translateY(-10px);
        }
        
        .project-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .project-card h4 {
            padding: 15px;
            text-align: center;
            background: white;
        }
        
        /* About Section */
        .about-section {
            line-height: 1.6;
            margin: 20px 0;
        }
        
        .brand-name {
            color: #314380;
            font-weight: bold;
        }
        
        hr {
            margin: 30px 0;
            border: 0;
            height: 1px;
            background: #e0e0e0;
        }
    </style>
</head>
<body>
    <?php
    // Include database configuration
    require_once 'db_config.php';
    
    // Function to fetch data from database
    function fetchData($table) {
        global $conn;
        $allowedTables = ['academic_background', 'work_experience', 'achievements', 'photo_gallery', 'news', 'blog'];
        
        if (!in_array($table, $allowedTables)) {
            die("Invalid table name");
        }
        
        $sql = "SELECT * FROM `$table`";
        $result = $conn->query($sql);
        return $result;
    }
    
    // Fetch data from different tables
    $academicData = fetchData('academic_background');
    $experienceData = fetchData('work_experience');
    $achievementsData = fetchData('achievements');
    $galleryData = fetchData('photo_gallery');
    $newsData = fetchData('news');
    $blogData = fetchData('blog');
    
    $cvPath = 'uploads/my_cv.pdf';
    $absolutePath = __DIR__.'/uploads/my_cv.pdf';
    ?>
    
    <!-- Landing Page -->
    <div id="landing-page">
        <h1>Zaima Graphic Design</h1>
        <button id="enter-btn">Enter Portfolio</button>
    </div>
    
    <!-- Main Page -->
    <div id="main-page">
        <!-- Sidebar Navigation -->
        <div id="sidebar">
            <button class="nav-btn" onclick="showSection('home')">Home</button>
            <button id="about-btn" class="nav-btn" onclick="toggleAboutMenu()">About</button>
            <button class="sub-btn" onclick="showSection('academic')">Academic Background</button>
            <button class="sub-btn" onclick="showSection('experience')">Work Experience</button>
            <button class="nav-btn" onclick="showSection('achievements')">Achievements</button>
            <button class="nav-btn" onclick="showSection('gallery')">Photo Gallery</button>
            <button class="nav-btn" onclick="showSection('news')">News</button>
            <button class="nav-btn" onclick="showSection('blogs')">Blogs</button>
            <button class="nav-btn" onclick="showSection('contact')">Contact</button>
            <button class="nav-btn" onclick="window.location.href='reviews.php'">Client Reviews</button>
        </div>

        
        
        <!-- Content Area -->
        <div id="content">
            <!-- Home Section -->
            <div id="home" class="content-section active">
                <div class="hero-section">
                    <h2>Crafting Visual Stories That Inspire</h2>
                    <p class="tagline">Professional Graphic Design Services for Brands That Dare to Stand Out</p>
                    <a href="gallery" class="cta-button">View My Work</a>
                </div>

                <div class="highlights">
                    <div class="highlight-card">
                        <h3>Brand Identity</h3>
                        <p>Logos, color palettes, and style guides that capture your essence.</p>
                    </div>
                    <div class="highlight-card">
                        <h3>Digital Design</h3>
                        <p>Websites, social media graphics, and UI/UX that engage users.</p>
                    </div>
                    <div class="highlight-card">
                        <h3>Print & Packaging</h3>
                        <p>From business cards to product packaging—tangible designs that impress.</p>
                    </div>
                </div>

                <div class="recent-work">
                    <h3>Featured Projects</h3>
                    <div class="project-grid">
                        <?php 
                        $featuredProjects = $conn->query("SELECT * FROM photo_gallery LIMIT 3");
                        if ($featuredProjects->num_rows > 0):
                            while($project = $featuredProjects->fetch_assoc()): 
                        ?>
                            <div class="project-card">
                                <img src="<?= htmlspecialchars($project['image_path']) ?>" alt="<?= htmlspecialchars($project['title']) ?>">
                                <h4><?= htmlspecialchars($project['title']) ?></h4>
                            </div>
                        <?php 
                            endwhile;
                        else:
                        ?>
                            <p>No featured projects yet. Check back soon!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- About Section -->
            <div id="about" class="content-section">
                <h2>About</h2>
                <section class="about-section">
                    <p>
                        At <span class="brand-name">Zaima Graphic Design</span>, we are a full-service creative studio dedicated to delivering exceptional graphic design solutions that inspire, engage, and elevate brands. With a meticulous eye for detail and a passion for visual storytelling, our team of seasoned designers combines artistic expertise with strategic thinking to craft compelling identities, immersive digital experiences, and impactful marketing collateral.
                    </p>
                    
                    <p>
                        Specializing in branding, print design, digital media, and user-centric visuals, we work closely with clients to understand their vision, values, and objectives—ensuring every design we create is not only aesthetically striking but also purposeful and results-driven. From sleek logos and cohesive brand guidelines to dynamic social media content and high-end packaging, our work is rooted in innovation, precision, and a deep understanding of market trends.
                    </p>
                    
                    <p>
                        What sets us apart is our commitment to excellence at every stage of the creative process. We blend cutting-edge design techniques with timeless principles to produce work that stands out in a competitive landscape. Whether you're a startup looking to establish your identity or an established brand seeking a refresh, we tailor our expertise to meet your unique needs with professionalism and creativity.
                    </p>
                    
                    <p>
                        At <span class="brand-name">Zaima Graphic Design</span>, we believe that powerful design is a catalyst for success. Let's collaborate to bring your brand's story to life with visuals that resonate, captivate, and leave a lasting impression.
                    </p>
                </section>
            </div>
            
            <!-- Academic Background Section -->
            <div id="academic" class="content-section">
                <h2>Academic Background</h2>
                <?php if ($academicData->num_rows > 0): ?>
                    <?php while($row = $academicData->fetch_assoc()): ?>
                        <div class="card">
                            <h3><?= htmlspecialchars($row['degree']) ?></h3>
                            <p><strong>Institution:</strong> <?= htmlspecialchars($row['institution']) ?></p>
                            <p><strong>Year:</strong> <?= htmlspecialchars($row['year']) ?></p>
                            <p><?= htmlspecialchars($row['details']) ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No academic records found.</p>
                <?php endif; ?>
                
                <?php if (file_exists($absolutePath)): ?>
                    <div class="card" style="text-align: center;">
                        <h3>Download My Full CV</h3>
                        <a href="<?= $cvPath ?>" class="download-cv-btn" download="Zannatun_CV.pdf">
                            Download CV (PDF)
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Work Experience Section -->
            <div id="experience" class="content-section">
                <h2>Work Experience</h2>
                <?php if ($experienceData->num_rows > 0): ?>
                    <?php while($row = $experienceData->fetch_assoc()): ?>
                        <div class="card">
                            <h3><?= htmlspecialchars($row['job_title']) ?></h3>
                            <p><strong>Company:</strong> <?= htmlspecialchars($row['company']) ?></p>
                            <p><strong>Duration:</strong> <?= htmlspecialchars($row['duration']) ?></p>
                            <p><strong>Responsibilities:</strong> <?= htmlspecialchars($row['responsibilities']) ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No work experience records found.</p>
                <?php endif; ?>
            </div>
            
            <!-- Achievements Section -->
            <div id="achievements" class="content-section">
                <h2>Achievements</h2>
                <?php if ($achievementsData->num_rows > 0): ?>
                    <ul>
                        <?php while($row = $achievementsData->fetch_assoc()): ?>
                            <li class="card">
                                <h3><?= htmlspecialchars($row['title']) ?></h3>
                                <p class="achievement-year"><?= htmlspecialchars($row['year']) ?></p>
                                <p><?= htmlspecialchars($row['description']) ?></p>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>No achievements records found.</p>
                <?php endif; ?>
            </div>
            
            <!-- Photo Gallery Section -->
            <div id="gallery" class="content-section">
                <h2>Photo Gallery</h2>
                <div class="gallery-grid">
                    <?php 
                    $galleryQuery = $conn->query("SELECT * FROM photo_gallery");
                    if ($galleryQuery->num_rows > 0): 
                        while($row = $galleryQuery->fetch_assoc()): 
                    ?>
                        <div class="gallery-item">
                            <img src="<?= htmlspecialchars($row['image_path']) ?>" 
                                 alt="<?= htmlspecialchars($row['title']) ?>">
                            <div class="gallery-item-content">
                                <h3><?= htmlspecialchars($row['title']) ?></h3>
                                <?php if (!empty($row['category'])): ?>
                                    <p><em>Category: <?= htmlspecialchars($row['category']) ?></em></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php 
                        endwhile; 
                    else: 
                    ?>
                        <p>No gallery items found. Please add some projects.</p>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- News Section -->
            <div id="news" class="content-section">
                <h2>News</h2>
                <?php if ($newsData->num_rows > 0): ?>
                    <?php while($row = $newsData->fetch_assoc()): ?>
                        <div class="card">
                            <h3><?= htmlspecialchars($row['title']) ?></h3>
                            <p><small>Posted on: <?= htmlspecialchars($row['date_posted']) ?></small></p>
                            <p><?= htmlspecialchars($row['content']) ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No news items found.</p>
                <?php endif; ?>
            </div>
            
            <!-- Blogs Section -->
            <div id="blogs" class="content-section">
                <h2>Blogs</h2>
                <?php 
                $blogQuery = $conn->query("SELECT * FROM blog ORDER BY created_at DESC");
                if ($blogQuery->num_rows > 0):
                    while($row = $blogQuery->fetch_assoc()): 
                ?>
                    <div class="card">
                        <h3><?= htmlspecialchars($row['title']) ?></h3>
                        <?php if (!empty($row['featured_image'])): ?>
                            <img src="<?= htmlspecialchars($row['featured_image']) ?>" 
                                 alt="Featured Image" 
                                 style="max-width: 100%; height: auto; border-radius: 5px; margin: 15px 0;">
                        <?php endif; ?>
                        <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                        <p><small>Posted on: <?= date('F j, Y', strtotime($row['created_at'])) ?></small></p>
                    </div>
                <?php 
                    endwhile;
                else: 
                ?>
                    <p>No blog posts available.</p>
                <?php endif; ?>
            </div>
            
            <!-- Contact Section -->
            <div id="contact" class="content-section">
                <h2>Contact Me</h2>
                <div class="card">
                    <p>📧 Email: <a href="mailto:abony1502@gmail.com">abony1502@gmail.com</a></p>
                    <p>📞 Phone: <a href="tel:01914758313">0191*******</a></p>
                    
                    <div style="margin-top: 20px;">
                        <h3>Social Media:</h3>
                        <p>
                            <a href="https://facebook.com/yourprofile" target="_blank" style="display: inline-block; margin-right: 15px;">Facebook</a>
                            <a href="https://instagram.com/yourprofile" target="_blank" style="display: inline-block; margin-right: 15px;">Instagram</a>
                            <a href="https://linkedin.com/in/yourprofile" target="_blank" style="display: inline-block;">LinkedIn</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Enter Portfolio button functionality
        document.getElementById('enter-btn').addEventListener('click', function() {
            document.getElementById('landing-page').style.transform = 'translateY(-100%)';
            document.getElementById('main-page').style.transform = 'translateY(0)';
        });
        
        // Toggle About submenu
        function toggleAboutMenu() {
            const aboutBtn = document.getElementById('about-btn');
            const subButtons = document.querySelectorAll('.sub-btn');
            
            aboutBtn.classList.toggle('expanded');
            
            subButtons.forEach(btn => {
                btn.style.display = btn.style.display === 'block' ? 'none' : 'block';
            });
            
            if (!aboutBtn.classList.contains('expanded')) {
                showSection('about');
            }
        }
        
        // Show sections
        function showSection(sectionId) {
            // Hide all content sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show selected section
            document.getElementById(sectionId).classList.add('active');
            
            // If showing a sub-section, ensure about menu is expanded
            if (sectionId === 'academic' || sectionId === 'experience') {
                document.getElementById('about-btn').classList.add('expanded');
                document.querySelectorAll('.sub-btn').forEach(btn => {
                    btn.style.display = 'block';
                });
            }
            
            // If showing home, return to landing page
            if (sectionId === 'home') {
                document.getElementById('landing-page').style.transform = 'translateY(0)';
                document.getElementById('main-page').style.transform = 'translateY(100%)';
                document.getElementById('about-btn').classList.remove('expanded');
                document.querySelectorAll('.sub-btn').forEach(btn => {
                    btn.style.display = 'none';
                });
            }
        }
    </script>
</body>
</html>