<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets Victoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        .navbar {
            background-color: #2a9d8f;
        }
        .navbar-nav .nav-link {
            color: white !important;
            font-weight: bold;
        }
        .hero-section {
            background-color: #f4e1d2;
            text-align: center;
            padding: 3rem 1rem;
        }
        .hero-section img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        .hero-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #e76f51;
        }
        .hero-subtitle {
            font-size: 2rem;
            color: #264653;
        }
        .search-bar {
            max-width: 600px;
            margin: 1rem auto;
            display: flex;
            gap: 0.5rem;
        }
        .footer {
            background-color: #e07a5f;
            color: white;
            padding: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/images/logo.png" alt="Logo" height="40"> <!-- Replace with your logo path -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <img src="images/sample-cat.jpg" alt="Pet Image"> <!-- Replace with actual image path -->
            <h1 class="hero-title">Pets Victoria</h1>
            <h2 class="hero-subtitle">Welcome to Pet Adoption</h2>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <div class="search-bar container">
        <input class="form-control" type="text" placeholder="I am looking for ...">
        <select class="form-select">
            <option value="">Select your pet type</option>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <!-- Add more options as needed -->
        </select>
        <button class="btn btn-success" type="button">Search</button>
    </div>

    <!-- Content Section -->
    <div class="container text-center my-5">
        <h3>Discover Pets Victoria</h3>
        <p>
            Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focused on providing a safe and loving environment for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The organization offers a range of services, including adoption counseling, pet education, and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.
        </p>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Copyright 512365 2024. All Rights Reserved | Designed for Pets Victoria</p>
        <a href="#" style="color: white;">Tanya</a>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>