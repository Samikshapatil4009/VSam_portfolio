
<?php

require_once __DIR__ . '/../config/config.php';

require_admin();


// Get type and ID
$type = $_GET['type'] ?? 'project';

$id = (int)($_GET['id'] ?? 0);


// Allowed database tables
$tables = [
    'project' => 'projects',
    'service' => 'services',
    'plan'    => 'pricing_plans'
];

if (!isset($tables[$type])) {
    exit('Invalid type');
}

$table = $tables[$type];

$item = [];


// Fetch existing record
if ($id) {

    $st = db()->prepare("SELECT * FROM $table WHERE id = ?");

    $st->execute([$id]);

    $item = $st->fetch() ?: [];

}


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Project data
    if ($type === 'project') {

        $data = [
            trim($_POST['title']),
            trim($_POST['project_type']),
            trim($_POST['description']),
            trim($_POST['technologies']),
            trim($_POST['image']),
            trim($_POST['demo_url']),
            (int)isset($_POST['is_published'])
        ];

        $cols = '
            title = ?,
            project_type = ?,
            description = ?,
            technologies = ?,
            image = ?,
            demo_url = ?,
            is_published = ?
        ';

    }


    // Service data
    elseif ($type === 'service') {

        $data = [
            trim($_POST['title']),
            trim($_POST['description']),
            trim($_POST['icon']),
            (int)($_POST['sort_order'] ?? 0),
            (int)isset($_POST['is_active'])
        ];

        $cols = '
            title = ?,
            description = ?,
            icon = ?,
            sort_order = ?,
            is_active = ?
        ';

    }


    // Pricing plan data
    else {

        $data = [
            trim($_POST['name']),
            trim($_POST['price']),
            trim($_POST['price_note']),
            trim($_POST['description']),
            trim($_POST['features']),
            (int)($_POST['sort_order'] ?? 0),
            (int)isset($_POST['is_active'])
        ];

        $cols = '
            name = ?,
            price = ?,
            price_note = ?,
            description = ?,
            features = ?,
            sort_order = ?,
            is_active = ?
        ';

    }


    // Update existing record
    if ($id) {

        $data[] = $id;

        $st = db()->prepare(
            "UPDATE $table SET $cols WHERE id = ?"
        );

        $st->execute($data);

    }


    // Insert new record
    else {

        $st = db()->prepare(
            "INSERT INTO $table SET $cols"
        );

        $st->execute($data);

    }


    // Redirect after saving
    header('Location: dashboard.php?saved=1');

    exit;

}


// Page title
$pageTitle = 'Edit ' . $type;

require __DIR__ . '/../includes/header.php';


// Form value helper function
function val($key, $default = '')
{
    global $item;

    return e((string)($item[$key] ?? $default));
}

?>


<section class="section-pad">

    <div class="container"
         style="max-width: 760px; padding-top: 50px">


        <!-- Dashboard Link -->
        <a href="dashboard.php">
            ← Dashboard
        </a>


        <!-- Page Heading -->
        <h1 class="section-title">

            <?= $id ? 'Edit' : 'Add' ?>

            <?= e(ucfirst($type)) ?>

        </h1>


        <!-- Edit Form -->
        <form method="post" class="contact-form">


            <!-- PROJECT FORM -->
            <?php if ($type === 'project'): ?>


                <label>
                    Project title
                </label>

                <input
                    class="form-control mb-3"
                    name="title"
                    value="<?= val('title') ?>"
                    required
                >


                <label>
                    Project type
                </label>

                <input
                    class="form-control mb-3"
                    name="project_type"
                    value="<?= val('project_type', 'Web Development') ?>"
                >


                <label>
                    Description
                </label>

                <textarea
                    class="form-control mb-3"
                    name="description"
                    required
                ><?= val('description') ?></textarea>


                <label>
                    Technologies (comma separated)
                </label>

                <input
                    class="form-control mb-3"
                    name="technologies"
                    value="<?= val('technologies') ?>"
                    required
                >


                <label>
                    Screenshot path (e.g. uploads/project.jpg)
                </label>

                <input
                    class="form-control mb-3"
                    name="image"
                    value="<?= val('image') ?>"
                >


                <label>
                    Live demo URL
                </label>

                <input
                    class="form-control mb-3"
                    type="url"
                    name="demo_url"
                    value="<?= val('demo_url') ?>"
                >


                <label class="d-block mb-3">

                    <input
                        type="checkbox"
                        name="is_published"
                        <?= !empty($item['is_published']) ? 'checked' : '' ?>
                    >

                    Publish on website

                </label>


            <!-- SERVICE FORM -->
            <?php elseif ($type === 'service'): ?>


                <label>
                    Service title
                </label>

                <input
                    class="form-control mb-3"
                    name="title"
                    value="<?= val('title') ?>"
                    required
                >


                <label>
                    Description
                </label>

                <textarea
                    class="form-control mb-3"
                    name="description"
                    required
                ><?= val('description') ?></textarea>


                <label>
                    Icon (emoji or symbol)
                </label>

                <input
                    class="form-control mb-3"
                    name="icon"
                    value="<?= val('icon', '✦') ?>"
                >


                <label>
                    Sort order
                </label>

                <input
                    class="form-control mb-3"
                    type="number"
                    name="sort_order"
                    value="<?= val('sort_order', '0') ?>"
                >


                <label class="d-block mb-3">

                    <input
                        type="checkbox"
                        name="is_active"
                        <?= !isset($item['is_active']) || $item['is_active'] ? 'checked' : '' ?>
                    >

                    Active

                </label>


            <!-- PRICING PLAN FORM -->
            <?php else: ?>


                <label>
                    Plan name
                </label>

                <input
                    class="form-control mb-3"
                    name="name"
                    value="<?= val('name') ?>"
                    required
                >


                <label>
                    Starting price (editable text)
                </label>

                <input
                    class="form-control mb-3"
                    name="price"
                    value="<?= val('price') ?>"
                    required
                >


                <label>
                    Price note
                </label>

                <input
                    class="form-control mb-3"
                    name="price_note"
                    value="<?= val('price_note', 'starting') ?>"
                >


                <label>
                    Description
                </label>

                <input
                    class="form-control mb-3"
                    name="description"
                    value="<?= val('description') ?>"
                    required
                >


                <label>
                    Features (one per line)
                </label>

                <textarea
                    class="form-control mb-3"
                    rows="7"
                    name="features"
                    required
                ><?= val('features') ?></textarea>


                <label>
                    Sort order
                </label>

                <input
                    class="form-control mb-3"
                    type="number"
                    name="sort_order"
                    value="<?= val('sort_order', '0') ?>"
                >


                <label class="d-block mb-3">

                    <input
                        type="checkbox"
                        name="is_active"
                        <?= !isset($item['is_active']) || $item['is_active'] ? 'checked' : '' ?>
                    >

                    Active

                </label>


            <?php endif; ?>


            <!-- Save Button -->
            <button class="btn btn-primary">
                Save changes
            </button>


        </form>

    </div>

</section>


<?php

require __DIR__ . '/../includes/footer.php';

?>
