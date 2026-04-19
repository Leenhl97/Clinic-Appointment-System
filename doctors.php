<?php
include 'header.php';
include 'db_connect.php'; 

// Fetch doctors
$sql = "SELECT * FROM doctors";
$result = mysqli_query($conn, $sql);
?>

<style>
    /* Page Layout */
    .doctors-page {
        max-width: 1000px;
        margin: 40px auto;
        padding: 0 20px;
        font-family: Arial, sans-serif;
    }

    .page-title {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

    /* Filter Buttons */
    .filter-section {
        text-align: center;
        margin-bottom: 40px;
    }

    .btn-filter {
        padding: 10px 25px;
        margin: 5px;
        border: 2px solid #2ecc71;
        background: transparent;
        color: #2ecc71;
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: bold;
    }

    .btn-filter.active, .btn-filter:hover {
        background: #2ecc71;
        color: white;
    }

    /* Doctor Cards */
    .doctors-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .doctor-card {
        display: flex;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
        flex-direction: row; 
    }

    .doctor-card:hover {
        transform: translateY(-5px);
    }

    /* Image on the LEFT */
    .doctor-image img {
        width: 200px;
        height: 100%;
        min-height: 200px; 
        object-fit: cover;
    }

    /* Content on the RIGHT - Left Aligned */
    .doctor-info {
        flex: 1;
        padding: 20px;
        text-align: left; 
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start; 
    }

    .doctor-info h3 {
        margin: 0 0 10px 0;
        color: #2c3e50;
    }

    .specialty-tag {
        display: inline-block;
        background: #e8f5e9;
        color: #2e7d32;
        padding: 5px 12px;
        border-radius: 5px;
        font-size: 0.9em;
        margin-bottom: 10px;
    }

    .bio {
        color: #666;
        line-height: 1.6;
        margin-bottom: 15px;
        text-align: left;
    }

    .btn-book {
        background: #3498db;
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .btn-book:hover {
        background: #2980b9;
    }
</style>

<main class="doctors-page">
    <h1 class="page-title">Find Your Specialist 🩺</h1>

    <div class="filter-section">
        <button class="btn-filter active" onclick="filterDoctors('all', this)">All</button>
        <button class="btn-filter" onclick="filterDoctors('Cardiology', this)">Cardiology</button>
        <button class="btn-filter" onclick="filterDoctors('Pulmonology', this)">Pulmonology</button>
        <button class="btn-filter" onclick="filterDoctors('Pediatrics', this)">Pediatrics</button>
    </div>

    <div class="doctors-container" id="doctorsContainer">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="doctor-card" data-specialty="<?php echo $row['specialization']; ?>">
                    <div class="doctor-image">
                        <img src="images/<?php echo $row['image']; ?>" alt="Doctor">
                    </div>
                    <div class="doctor-info">
                        <h3><?php echo $row['name']; ?></h3>
                        <span class="specialty-tag"><?php echo $row['specialization']; ?></span>
                        <p class="bio"><?php echo $row['bio']; ?></p>
                        
                        <a href="booking.php?doctor_name=<?php echo urlencode($row['name']); ?>" class="btn-book">Book Now</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p style='text-align:center'>No doctors found.</p>";
        }
        ?>
    </div>
</main>

<script>
function filterDoctors(category, button) {
    document.querySelectorAll('.btn-filter').forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');

    const cards = document.querySelectorAll('.doctor-card');
    cards.forEach(card => {
        const specialty = card.getAttribute('data-specialty');
        if (category === 'all' || specialty === category) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<?php include 'footer.php'; ?>