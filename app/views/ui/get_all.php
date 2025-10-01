<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students List</title>
  <link rel="stylesheet" href="<?= base_url() . 'public/css/style.css' ?>">
  <link rel="stylesheet" href="<?= base_url() . 'public/css/get_all.css' ?>">
</head>

<style>
  /* Custom pagination styling */
  .pagination-nav {
    display: flex;
    justify-content: center;
    margin-top: 1rem;
  }

  .pagination-list {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .pagination-item {
    margin: 0;
  }

  .pagination-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 2.5rem;
    height: 2.5rem;
    padding: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #6b7280;
    background-color: #ffffff;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  }

  .pagination-link:hover {
    background-color: #f9fafb;
    color: #374151;
    border-color: #9ca3af;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
  }

  .pagination-item.active .pagination-link {
    background-color: #3b82f6;
    color: #ffffff;
    border-color: #3b82f6;
    font-weight: 600;
    box-shadow: 0 2px 4px 0 rgba(59, 130, 246, 0.3);
  }

  .pagination-item.active .pagination-link:hover {
    background-color: #2563eb;
    border-color: #2563eb;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px 0 rgba(59, 130, 246, 0.4);
  }

  /* Special styling for First/Last/Prev/Next buttons */
  .pagination-item:first-child .pagination-link,
  .pagination-item:last-child .pagination-link {
    background-color: #f8fafc;
    border-color: #e2e8f0;
    color: #64748b;
    font-weight: 500;
  }

  .pagination-item:first-child .pagination-link:hover,
  .pagination-item:last-child .pagination-link:hover {
    background-color: #f1f5f9;
    border-color: #cbd5e
  }
</style>

<body>

  <div class="main-container">
    <form method="post" action="<?= base_url() ?>logout" style="text-align:right; margin-bottom: 1rem;">
      <button type="submit" class="btn btn-danger">Logout</button>
    </form>

    <div class="student-count">

      <form method="get" action="users/get-all">
        <input id="search-user" type="text" name="search" value="<?= $search ?? '' ?>" placeholder="Search...">
        <!-- <button type="submit">Search</button> -->
      </form>
      <a class="btn btn-primary" href="<?= base_url() . 'users/create' ?>">
        <!-- Button that links to the "create" form (where you add a new student).-->
        <span>Add New Student</span>
      </a>
      <div>
        <strong><?php echo $total_records; ?></strong> students currently enrolled
        <!--Counts the number of student records retrieved from the controller.-->
      </div>
    </div>

    <div class="data-card">
      <table class="data-table" id="students-table">
        <thead>
          <tr>
            <th scope="col">Student ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email Address</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($records as $student): ?>
            <tr id="student-row-<?= $student['id'] ?>">
              <td data-label="Student ID"><?= htmlspecialchars($student['id']) ?></td>
              <td data-label="First Name"><?= htmlspecialchars($student['first_name']) ?></td>
              <td data-label="Last Name"><?= htmlspecialchars($student['last_name']) ?></td>
              <td data-label="Email"><?= htmlspecialchars($student['email']) ?></td>
              <td data-label="Actions" class="table-actions">
                <a href="<?= base_url() . 'users/update/' . $student['id'] ?>" class="btn btn-secondary btn-small"
                  aria-label="Edit <?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?>">
                  Edit
                </a>
                <button type="button" class="btn btn-danger btn-small"
                  onclick="confirmDelete('<?= $student['id'] ?>', '<?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?>')"
                  aria-label="Delete <?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?>">
                  Delete
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- Pagination Controls -->
    <?php if (isset($pagination_data)): ?>
      <div class="mt-8">
        <!-- Pagination Links -->
        <?php if (isset($pagination_links) && !empty($pagination_links)): ?>
          <div class="flex justify-center mb-4">
            <?php echo $pagination_links; ?>
          </div>
        <?php endif; ?>

        <!-- Results and Items Per Page -->
        <div class="flex justify-between items-center text-sm text-gray-600">
          <div>
            <?php echo $pagination_data['info']; ?>
          </div>

        </div>
      </div>
    <?php endif; ?>
  </div>

  <script>
    function confirmDelete(studentId, studentName) {
      if (confirm(`Are you sure you want to delete ${studentName}? This action cannot be undone.`)) {
        window.location.href = '<?= base_url() ?>users/delete/' + studentId;
      }
    }
  </script>
</body>



</html>