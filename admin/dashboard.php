
<?php

require_once __DIR__ . '/../config/config.php';

require_admin();

// Dashboard counts
$counts = [
    'projects' => db()->query('SELECT COUNT(*) FROM projects')->fetchColumn(),
    'services' => db()->query('SELECT COUNT(*) FROM services')->fetchColumn(),
    'enquiries' => db()->query('SELECT COUNT(*) FROM enquiries')->fetchColumn()
];

// Fetch enquiries
$enquiries = db()->query(
    'SELECT * FROM enquiries ORDER BY created_at DESC LIMIT 100'
)->fetchAll();

// Fetch projects
$projects = db()->query(
    'SELECT * FROM projects ORDER BY created_at DESC'
)->fetchAll();

// Fetch services
$services = db()->query(
    'SELECT * FROM services ORDER BY sort_order, id'
)->fetchAll();

// Fetch pricing plans
$plans = db()->query(
    'SELECT * FROM pricing_plans ORDER BY sort_order, id'
)->fetchAll();

// Page title
$pageTitle = 'Admin Dashboard';

require __DIR__ . '/../includes/header.php';

?>

<section class="section-pad">

    <div class="container" style="padding-top: 50px">

        <!-- Dashboard Header -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <div class="section-kicker">CONTROL PANEL</div>

                <h1 class="section-title">
                    Welcome, <?= e($_SESSION['admin_name']) ?>
                </h1>
            </div>

            <a class="btn btn-outline-light" href="logout.php">
                Log out
            </a>

        </div>


        <!-- Dashboard Statistics -->
        <div class="row g-3 my-4">

            <?php foreach ($counts as $k => $v): ?>

                <div class="col-md-4">

                    <div class="service-card">

                        <div class="small-muted text-uppercase">
                            <?= e($k) ?>
                        </div>

                        <div class="display-5 fw-bold">
                            <?= e((string)$v) ?>
                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>


        <!-- Success Message -->
        <?php if (isset($_GET['saved'])): ?>

            <div class="alert alert-success">
                Changes saved.
            </div>

        <?php endif; ?>


        <!-- Dashboard Actions -->
        <div class="d-flex flex-wrap gap-2 mb-4">

            <a class="btn btn-primary" href="edit.php?type=project">
                + Add project
            </a>

            <a class="btn btn-outline-light" href="edit.php?type=service">
                + Add service
            </a>

            <a class="btn btn-outline-light" href="edit.php?type=plan">
                Edit pricing plans
            </a>

            <a class="btn btn-outline-light"
               href="../index.php"
               target="_blank">
                View website ↗
            </a>

        </div>


        <!-- Project Gallery -->
        <h2 class="h3 mb-3">
            Project gallery
        </h2>

        <div class="table-responsive mb-5">

            <table class="table table-dark table-bordered align-middle">

                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Published</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($projects as $p): ?>

                        <tr>

                            <td>
                                <?= e($p['title']) ?>
                            </td>

                            <td>
                                <?= $p['is_published'] ? 'Yes' : 'Draft' ?>
                            </td>

                            <td>

                                <a href="edit.php?type=project&id=<?= $p['id'] ?>">
                                    Edit
                                </a>

                                ·

                                <a href="delete.php?type=project&id=<?= $p['id'] ?>"
                                   onclick="return confirm('Delete this project?')">
                                    Delete
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>


        <!-- Services -->
        <h2 class="h3 mb-3">
            Services
        </h2>

        <div class="table-responsive mb-5">

            <table class="table table-dark table-bordered align-middle">

                <tbody>

                    <?php foreach ($services as $s): ?>

                        <tr>

                            <td>
                                <?= e($s['title']) ?>
                            </td>

                            <td>
                                <?= $s['is_active'] ? 'Active' : 'Hidden' ?>
                            </td>

                            <td>

                                <a href="edit.php?type=service&id=<?= $s['id'] ?>">
                                    Edit
                                </a>

                                ·

                                <a href="delete.php?type=service&id=<?= $s['id'] ?>"
                                   onclick="return confirm('Delete this service?')">
                                    Delete
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>


        <!-- Pricing Packages -->
        <h2 class="h3 mb-3">
            Pricing packages
        </h2>

        <div class="table-responsive mb-5">

            <table class="table table-dark table-bordered align-middle">

                <tbody>

                    <?php foreach ($plans as $p): ?>

                        <tr>

                            <td>
                                <?= e($p['name']) ?>
                            </td>

                            <td>
                                <?= e($p['price']) ?>
                            </td>

                            <td>

                                <a href="edit.php?type=plan&id=<?= $p['id'] ?>">
                                    Edit
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>


        <!-- Client Enquiries -->
        <h2 class="h3 mb-3">
            Client enquiries
        </h2>

        <div class="table-responsive">

            <table class="table table-dark table-bordered align-middle">

                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name / Email</th>
                        <th>Phone</th>
                        <th>Service</th>
                        <th>Requirements</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($enquiries as $q): ?>

                        <tr>

                            <td>
                                <?= e($q['created_at']) ?>
                            </td>

                            <td>
                                <?= e($q['name']) ?>
                                <br>
                                <?= e($q['email']) ?>
                            </td>

                            <td>
                                <?= e($q['phone']) ?>
                            </td>

                            <td>
                                <?= e($q['service']) ?>
                            </td>

                            <td style="min-width: 240px">
                                <?= nl2br(e($q['requirements'])) ?>
                            </td>

                            <td>

                                <form method="post"
                                      action="status.php"
                                      class="d-flex gap-1">

                                    <input type="hidden"
                                           name="id"
                                           value="<?= $q['id'] ?>">

                                    <select name="status"
                                            class="form-select form-select-sm">

                                        <?php foreach (['New', 'Contacted', 'Closed'] as $st): ?>

                                            <option <?= $q['status'] === $st ? 'selected' : '' ?>>
                                                <?= $st ?>
                                            </option>

                                        <?php endforeach; ?>

                                    </select>

                                    <button class="btn btn-sm btn-primary">
                                        Save
                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</section>

<?php

require __DIR__ . '/../includes/footer.php';

?>
