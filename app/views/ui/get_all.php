<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students List</title>
</head>

<style>
  /* Student Management Page - Specific Styles */

  /* Table Styles */
  .data-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
  }

  .data-table thead {
    background: var(--bg-tertiary);
    border-bottom: 2px solid var(--border-secondary);
  }



  .data-table th {
    padding: var(--space-lg);
    text-align: left;
    font-weight: 600;
    color: var(--text-primary);
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-bottom: 1px solid var(--border-primary);
  }

  .data-table tbody tr {
    border-bottom: 1px solid var(--border-primary);
    transition: all 0.2s ease;
  }

  .data-table tbody tr:hover {
    background: var(--bg-tertiary);
  }

  .data-table tbody tr:last-child {
    border-bottom: none;
  }

  .data-table td {
    padding: var(--space-lg);
    color: var(--text-secondary);
    vertical-align: middle;
  }

  .data-table td:first-child {
    color: var(--text-muted);
    font-weight: 500;
    font-family: "SF Mono", Monaco, "Cascadia Code", monospace;
  }

  /* Table Actions */
  .table-actions {
    display: flex;
    gap: var(--space-sm);
    align-items: center;
  }

  /* Student Row Specific Styling */
  [id^="student-row-"] td:nth-child(2),
  [id^="student-row-"] td:nth-child(3) {
    font-weight: 500;
    color: var(--text-primary);
  }

  [id^="student-row-"] td:nth-child(4) {
    color: var(--accent-two);
    font-family: "SF Mono", Monaco, "Cascadia Code", monospace;
    font-size: 13px;
  }

  /* Enhanced Button Styles for Table */
  .table-actions .btn-secondary {
    background: transparent;
    border: 1px solid var(--border-secondary);
    color: var(--text-secondary);
    font-size: 11px;
    padding: 6px 12px;
  }

  .table-actions .btn-secondary:hover {
    background: var(--accent-one);
    border-color: var(--accent-one);
    color: white;
    transform: none;
  }

  .table-actions .btn-danger {
    background: transparent;
    border: 1px solid var(--danger);
    color: var(--danger);
    font-size: 11px;
    padding: 6px 12px;
  }

  .table-actions .btn-danger:hover {
    background: var(--danger);
    color: white;
    transform: none;
  }

  /* Loading States */
  .data-table tbody tr.loading {
    opacity: 0.6;
    pointer-events: none;
  }

  /* Empty State */
  .empty-state {
    text-align: center;
    padding: var(--space-2xl);
    color: var(--text-muted);
  }

  .empty-state h3 {
    color: var(--text-secondary);
    margin-bottom: var(--space-sm);
  }

  /* Responsive Table */
  @media (max-width: 768px) {
    .data-table {
      font-size: 12px;
    }

    .data-table th,
    .data-table td {
      padding: var(--space-sm);
    }

    .table-actions {
      flex-direction: column;
      gap: var(--space-xs);
    }

    .table-actions .btn {
      width: 100%;
      justify-content: center;
    }
  }

  @media (max-width: 640px) {

    /* Stack table on mobile */
    .data-table,
    .data-table thead,
    .data-table tbody,
    .data-table th,
    .data-table td,
    .data-table tr {
      display: block;
    }

    .data-table thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    .data-table tr {
      background: var(--bg-tertiary);
      border-radius: var(--radius-lg);
      margin-bottom: var(--space-md);
      padding: var(--space-md);
      border: 1px solid var(--border-primary);
    }

    .data-table td {
      border: none;
      position: relative;
      padding: var(--space-sm) 0;
      padding-left: 40%;
    }

    .data-table td:before {
      content: attr(data-label) ": ";
      position: absolute;
      left: 0;
      width: 35%;
      font-weight: 600;
      color: var(--text-primary);
      font-size: 11px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .table-actions {
      padding-left: 0 !important;
      flex-direction: row;
      gap: var(--space-sm);
      margin-top: var(--space-sm);
    }
  }

  /* Pagination Styles */

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
    border-color: #cbd5e1;
    color: #475569;
  }

  /* Disabled state for navigation buttons */
  .pagination-item.disabled .pagination-link {
    background-color: #f8fafc;
    border-color: #e2e8f0;
    color: #cbd5e1;
    cursor: not-allowed;
    pointer-events: none;
  }

  /* Search Bar Styling */
  #search-user {
    width: 260px;
    padding: 0.6rem 1rem;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    font-size: 1rem;
    color: #374151;
    background-color: #f9fafb;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
  }

  #search-user:focus {
    border-color: #3b82f6;
    box-shadow: 0 2px 8px rgba(59, 130, 246, 0.08);
    background-color: #fff;
  }

  .student-count form {
    display: inline-block;
    margin-right: 1rem;
    vertical-align: middle;
  }
</style>

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

  /* Modern Dark Theme Student Management System */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  :root {
    /* Updated to match modern UI design system with purple and cyan accents */
    /* Base Colors - Modern Dark Palette */
    --bg-primary: #eaeaea;
    --bg-secondary: #1a1a1a96;
    --bg-tertiary: #2a2a2aa3;
    --bg-elevated: #2a2a2aa3;
    /* Text Colors */
    --text-primary: #ffffff;
    --text-secondary: #e5e5e5;
    --text-muted: #a3a3a3;
    --text-disabled: #666666;

    /* Accent Colors */
    --accent-one: #266683;
    --accent-one-hover: #205973;
    --accent-two: #68e0ff;
    --accent-two-hover: #0891b2;

    /* Status Colors */
    --success: #10b981;
    --danger: #ef4444;
    --warning: #f59e0b;

    /* Border Colors */
    --border-primary: #2a2a2aa3;
    --border-secondary: #404040;
    --border-accent: #4a4a4a;

    /* Spacing */
    --space-xs: 0.25rem;
    --space-sm: 0.5rem;
    --space-md: 1rem;
    --space-lg: 1.5rem;
    --space-xl: 2rem;
    --space-2xl: 3rem;

    /* Border Radius */
    --radius-sm: 0.375rem;
    --radius-md: 0.5rem;
    --radius-lg: 0.75rem;
    --radius-xl: 1rem;

    /* Shadows */
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.4);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
  }

  body {
    /* Updated font stack and background for modern look */
    /*font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; */
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    background: var(--bg-primary);
    color: var(--text-primary);
    line-height: 1.6;
    min-height: 100vh;
    font-size: 14px;
    background-image: url('background.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;

  }

  /* Simplified and modernized layout */
  .main-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: var(--space-xl);
  }

  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--space-xl);
    padding: var(--space-xl);
    background: var(--bg-secondary);
    border-radius: var(--radius-xl);
    border: 1px solid var(--border-primary);
    box-shadow: var(--shadow-md);
  }

  .page-title {
    /* Modern typography with better hierarchy */
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    letter-spacing: -0.025em;
  }

  .student-count {
    /* Updated styling to match modern card design */
    align-content: space-evenly;
    background: var(--bg-secondary);
    padding: var(--space-lg);
    border-radius: var(--radius-lg);
    margin-bottom: var(--space-xl);
    color: var(--text-secondary);
    font-size: 0.875rem;
    font-weight: 500;
    border: 1px solid var(--border-primary);
    box-shadow: var(--shadow-sm);
  }

  .student-count strong {

    color: var(--accent-two);
    font-size: 1.125rem;
    font-weight: 700;
  }

  /* Modern card design with cleaner styling */
  .data-card {
    background: var(--bg-secondary);
    border-radius: var(--radius-xl);
    border: 1px solid var(--border-primary);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
  }

  /* Updated button system to match modern UI */
  .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-sm);
    padding: var(--space-md) var(--space-lg);
    border-radius: var(--radius-lg);
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
  }

  .btn-primary {
    background: var(--accent-one);
    color: white;
    box-shadow: var(--shadow-sm);
  }

  .btn-primary:hover {
    background: var(--accent-one-hover);
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
  }

  .btn-secondary {
    background: transparent;
    color: var(--text-secondary);
    border: 1px solid var(--border-secondary);
  }

  .btn-secondary:hover {
    background: var(--bg-tertiary);
    color: var(--text-primary);
    border-color: var(--border-accent);
  }

  .btn-danger {
    background: var(--danger);
    color: white;
    box-shadow: var(--shadow-sm);
  }

  .btn-danger:hover {
    background: #dc2626;
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
  }

  .btn-small {
    padding: var(--space-sm) var(--space-md);
    font-size: 0.8125rem;
  }

  /* Removed complex table styling - will be handled in get_all.css */
  .data-table {
    width: 100%;
    border-collapse: collapse;
  }

  /* Enhanced responsive design */
  @media (max-width: 768px) {
    .main-container {
      padding: var(--space-lg);
    }

    .page-header {
      flex-direction: column;
      gap: var(--space-lg);
      align-items: stretch;
      text-align: center;
    }

    .page-title {
      font-size: 1.75rem;
    }
  }

  /* Added utility classes for consistency */
  .text-success {
    color: var(--success);
  }

  .text-danger {
    color: var(--danger);
  }

  .text-warning {
    color: var(--warning);
  }

  .text-muted {
    color: var(--text-muted);
  }

  .text-primary {
    color: var(--text-primary);
  }

  .text-secondary {
    color: var(--text-secondary);
  }

  .sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
  }

  /* Subtle animations for better UX */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .data-card,
  .page-header,
  .student-count {
    animation: fadeIn 0.4s ease-out;
  }
</style>

<body>

  <div class="main-container">
    <form method="post" action="<?= base_url() ?>logout" style="text-align:right; margin-bottom: 1rem;">
      <button type="submit" class="btn btn-danger">Logout</button>
    </form>

    <div class="student-count">
  <form method="get" action="<?= base_url() ?>/index.php/users/get-all">
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