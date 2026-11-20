
<?php

require_once __DIR__ . '/config/config.php';

$pageTitle = 'VSam Digital Solution';

// Fetch services
$services = db()->query("
    SELECT * FROM services
    WHERE is_active = 1
    ORDER BY sort_order, id
")->fetchAll();

// Fetch projects
$projects = db()->query("
    SELECT * FROM projects
    WHERE is_published = 1
    ORDER BY created_at DESC
")->fetchAll();

// Fetch pricing plans
$plans = db()->query("
    SELECT * FROM pricing_plans
    WHERE is_active = 1
    ORDER BY sort_order, id
")->fetchAll();

require __DIR__ . '/includes/header.php';

?>

<!-- ================= HERO SECTION ================= -->

<section class="hero-section" id="about">

    <div class="hero-glow glow-one"></div>
    <div class="hero-glow glow-two"></div>

    <div class="container position-relative">

        <div class="row align-items-center min-vh-100 py-5">

            <div class="col-lg-7 pt-5">

                <div class="eyebrow">
                    <span class="status-dot"></span>
                    INDEPENDENT WEB DEVELOPMENT STUDIO
                </div>

                <h1>
                    We Build Modern Websites That
                    <span class="gradient-text">
                        Grow Your Business.
                    </span>
                </h1>

                <p class="hero-copy">
                    We help businesses establish their online presence
                    with professional, responsive, and user-friendly websites.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">

                    <a class="btn btn-primary btn-lg" href="#work">
                        View Our Projects ↗
                    </a>

                    <a class="btn btn-outline-light btn-lg" href="#contact">
                        Hire Us
                    </a>

                    <a class="text-link align-self-center" href="#contact">
                        Get a Free Quote →
                    </a>

                </div>

                <div class="hero-proof">
                    ✦ Clean design
                    ✦ Reliable development
                    ✦ Mobile-first
                </div>

            </div>

            <div class="col-lg-5 d-none d-lg-block">

                <div class="code-card">

                    <div class="code-top">
                        <i></i>
                        <i></i>
                        <i></i>
                        <span>your-next-website.php</span>
                    </div>

                    <div class="code-body">

                        <p>
                            <span class="code-purple">const</span>
                            <span class="code-blue">digitalGrowth</span> = {
                        </p>

                        <p class="indent">
                            <span class="code-green">design</span>:
                            <b>'beautiful'</b>,
                        </p>

                        <p class="indent">
                            <span class="code-green">experience</span>:
                            <b>'intuitive'</b>,
                        </p>

                        <p class="indent">
                            <span class="code-green">responsive</span>:
                            <b>true</b>,
                        </p>

                        <p class="indent">
                            <span class="code-green">performance</span>:
                            <b>'optimized'</b>
                        </p>

                        <p>};</p>

                        <div class="code-result">
                            ✓ Ready to grow your business
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="hero-bottom">

        <div class="container d-flex justify-content-between">

            <span>DESIGN · DEVELOPMENT · DIGITAL GROWTH</span>

            <span>SCROLL TO EXPLORE ↓</span>

        </div>

    </div>

</section>


<!-- ================= ABOUT SECTION ================= -->


<section class="section-pad section-alt" id="services">

    <div class="container">

        <div class="section-kicker">
            02 / WHAT We DO
        </div>

        <div class="section-heading-row">

            <h2 class="section-title">
                Services built around
                <span class="gradient-text">your goals.</span>
            </h2>

            <p class="body-muted">
                Practical digital solutions designed to make
                your business look credible and work smarter.
            </p>

        </div>

        <div class="row g-4 mt-3">

            <?php foreach ($services as $i => $s): ?>

                <div class="col-md-6 col-lg-3">

                    <article class="service-card h-100">

                        

                        <!-- Service Number -->
                        <div class="service-number">
                            <?= '0' . ($i + 1) ?>
                        </div>

                        <!-- Title Before Hover -->
                        <h3 class="service-front-title">
                            <?= e($s['title']) ?>
                        </h3>

                        <!-- Content On Hover -->
                        <div class="service-card__content">

                            <h3 class="service-card__title">
                                <?= e($s['title']) ?>
                            </h3>

                            <p class="service-card__description">
                                <?= e($s['description']) ?>
                            </p>

                            <a href="#contact" class="service-card__link">
                                Get Started ↗
                            </a>

                        </div>

                    </article>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<!-- ================= TECHNOLOGY MARQUEE ================= -->

<div class="technology-section">

    <p class="technology-label">TECHNOLOGIES WE WORK WITH</p>

    <div class="technology-marquee">

        <div class="technology-track">

            <!-- First Set -->

            <div class="technology-item">
                <i class="fa-brands fa-php"></i>
                <span>PHP</span>
            </div>

            <div class="technology-item">
                <i class="fa-brands fa-react"></i>
                <span>React.js</span>
            </div>

            <div class="technology-item">
                <i class="fa-brands fa-node-js"></i>
                <span>Node.js</span>
            </div>

            <div class="technology-item">
                <i class="fa-solid fa-server"></i>
                <span>Express.js</span>
            </div>

            <div class="technology-item">
                <i class="fa-brands fa-angular"></i>
                <span>Angular</span>
            </div>

            <!-- Duplicate Set for Continuous Animation -->

            <div class="technology-item">
                <i class="fa-brands fa-php"></i>
                <span>PHP</span>
            </div>

            <div class="technology-item">
                <i class="fa-brands fa-react"></i>
                <span>React.js</span>
            </div>

            <div class="technology-item">
                <i class="fa-brands fa-node-js"></i>
                <span>Node.js</span>
            </div>

            <div class="technology-item">
                <i class="fa-solid fa-server"></i>
                <span>Express.js</span>
            </div>

            <div class="technology-item">
                <i class="fa-brands fa-angular"></i>
                <span>Angular</span>
            </div>

        </div>

    </div>

</div>



<!-- ================= PROJECTS SECTION ================= -->

<section class="section-pad" id="work">

    <div class="container">

        <div class="section-kicker">
            03 / SELECTED WORK
        </div>

        <div class="section-heading-row">

            <h2 class="section-title">
                Projects &
                <span class="gradient-text">
                    experiments.
                </span>
            </h2>

            <p class="body-muted">
                A selection of builds and concepts.
                Ask for a walkthrough or live preview.
            </p>

        </div>

        <div class="row g-4 mt-2">

            <?php foreach ($projects as $p): ?>

                <div class="col-md-6">

                    <article class="project-card h-100">

                        <?php if (!empty($p['image'])): ?>

                            <img
                                class="project-image"
                                src="<?= e($p['image']) ?>"
                                alt="<?= e($p['title']) ?> project preview"
                            >

                        <?php else: ?>

                            <div class="project-placeholder">

                                <span>PROJECT PREVIEW</span>

                                <strong>
                                    <?= e($p['title']) ?>
                                </strong>

                            </div>

                        <?php endif; ?>

                        <div class="project-info">

                            <div class="d-flex justify-content-between gap-2">

                                <h3>
                                    <?= e($p['title']) ?>
                                </h3>

                                <span class="project-year">
                                    <?= e($p['project_type']) ?>
                                </span>

                            </div>

                            <p>
                                <?= e($p['description']) ?>
                            </p>

                            <div class="d-flex justify-content-between align-items-center">

                                <span class="tech-list">
                                    <?= e($p['technologies']) ?>
                                </span>

                                <?php if (!empty($p['demo_url'])): ?>

                                    <a
                                        class="text-link"
                                        href="<?= e($p['demo_url']) ?>"
                                        target="_blank"
                                        rel="noopener"
                                    >
                                        Live Demo ↗
                                    </a>

                                <?php endif; ?>

                            </div>

                        </div>

                    </article>

                </div>

            <?php endforeach; ?>

        </div>

        <?php if (!$projects): ?>

            <p class="body-muted mt-4">
               
            </p>

        <?php endif; ?>

    </div>

</section>


<!-- ================= PRICING SECTION ================= -->


<section class="section-pad section-alt" id="pricing">

    <div class="container">

        <a class="section-kicker pricing-kicker" href="#pricing-plans">
    04 / SIMPLE PRICING
</a>

        <div class="section-heading-row">

            <h2 class="section-title">
                Clear packages.
                <span class="gradient-text">
                    No surprises.
                </span>
            </h2>

        </div>

        <div class="row g-4 mt-2" id="pricing-plans">

            <?php foreach ($plans as $i => $plan): ?>

                <div class="col-md-4">

                    <article class="price-card h-100 d-flex flex-column">

                        <div class="plan-name">
                            <?= e($plan['name']) ?>
                        </div>

                        <div class="plan-price">

                            <?= e($plan['price']) ?>

                            <small>
                                <?= e($plan['price_note']) ?>
                            </small>

                        </div>

                        <p class="body-muted">
                            <?= e($plan['description']) ?>
                        </p>

                        <ul>

                            <?php foreach (explode("\n", $plan['features']) as $feature): ?>

                                <?php if (trim($feature) !== ''): ?>

                                    <li>
                                        ✓ <?= e(trim($feature)) ?>
                                    </li>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </ul>

                       
                        <a href="#contact" class="btn btn-primary w-100 mt-auto">
                                Get Started ↗
                        </a>


                    </article>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>



<!-- ================= CONTACT SECTION ================= -->

<section class="section-pad" id="contact">

    <div class="container">

        <div class="section-kicker">
            05 / LET'S TALK
        </div>

        <div class="row g-5">

            <!-- Contact Information -->

            <div class="col-lg-5">

                <h2 class="section-title">
                    Have a project in
                    <span class="gradient-text">
                        mind?
                    </span>
                </h2>

                <p class="body-muted mt-3">
                    Tell us a little about what you need.
                    We'll review your enquiry and get back to you.
                </p>

                <!-- Email -->

                <div class="contact-method">

                    <span>✉</span>

                    <div>

                        <small>EMAIL</small>

                        <a href="mailto:psamiksha5334@gmail.com">
                            psamiksha5334@gmail.com
                        </a>

                    </div>

                </div>

                <!-- WhatsApp -->

                <div class="contact-method">

                    <span>📱</span>

                    <div>

                        <small>WHATSAPP</small>

                        <a
                            href="https://wa.me/918080574392?text=Hi%2C%20I'm%20interested%20in%20developing%20a%20professional%20website%20for%20my%20business.%20Could%20we%20discuss%20the%20details%3F"
                            target="_blank"
                            rel="noopener"
                        >
                            Chat with me
                        </a>

                    </div>

                </div>

                <!-- Call -->

                <div class="contact-method">

                    <span>📞</span>

                    <div>

                        <small>CALL US</small>

                        <a href="tel:+918080574392">
                            +91 8080574392
                        </a>

                    </div>

                </div>


            </div>


            <!-- Contact Form -->

            <div class="col-lg-7">

                <form
                    class="contact-form"
                    action="submit-contact.php"
                    method="post"
                >

                    <div class="row g-3">

                        <div class="col-md-6">

                            <label for="name">
                                Your name *
                            </label>

                            <input
                                id="name"
                                name="name"
                                class="form-control"
                                required
                                maxlength="100"
                            >

                        </div>

                        <div class="col-md-6">

                            <label for="email">
                                Email address *
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                class="form-control"
                                required
                                maxlength="150"
                            >

                        </div>

                        <div class="col-md-6">

                            <label for="phone">
                                Phone number
                            </label>

                            <input
                                id="phone"
                                name="phone"
                                class="form-control"
                                maxlength="25"
                            >

                        </div>

                        <div class="col-md-6">

                            <label for="service">
                                Service interested in
                            </label>

                            <select
                                id="service"
                                name="service"
                                class="form-select"
                            >

                                <option value="">
                                    Select a service
                                </option>

                                <?php foreach ($services as $s): ?>

                                    <option value="<?= e($s['title']) ?>">
                                        <?= e($s['title']) ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="col-12">

                            <label for="requirements">
                                Project requirements *
                            </label>

                            <textarea
                                id="requirements"
                                name="requirements"
                                rows="5"
                                class="form-control"
                                required
                                maxlength="5000"
                                placeholder="What do you want to build? Include any important features or timeline."
                            ></textarea>

                        </div>

                        <div class="col-12">

                            <button
                                class="btn btn-primary btn-lg w-100"
                                type="submit"
                            >
                                Send Project Enquiry ↗
                            </button>

                            <small class="small-muted d-block mt-3">
                                Your details are used only to respond
                                to this enquiry.
                            </small>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<?php

require __DIR__ . '/includes/footer.php';

?>
