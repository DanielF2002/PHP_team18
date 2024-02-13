<?php $pageTitle = "Midnight Sun Bistro";
$pageDescription = "Midnight Sun Bistro, the best restaurant in Helsinki.";
include "layout/header.php"; ?>
<main class="row justify-content-between">
            <article class="col-12 col-lg-5">
                <h1>Gastronomique!</h1>
                <p class="fs-5">Whether you're savoring a quiet dinner for two or celebrating a special occasion with
                    friends,
                    Midnight Sun Bistro promises an unforgettable voyage into the heart of culinary excellence.</p>
                <a href="reservation.php" class="btn">Reserve a seat</a>
            </article>
            <aside class="col-12 col-lg-6">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="layout/images/hero1.jpg" class="d-block w-100" alt="A fining dining restaurant slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="layout/images/hero2.jpg" class="d-block w-100" alt="A fining dining restaurant slide 2">
                        </div>
                        <div class="carousel-item">
                            <img src="layout/images/hero3.jpg" class="d-block w-100" alt="A fining dining restaurant slide 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </aside>
        </main>
</main>
<?php include "layout/footer.php"; ?>