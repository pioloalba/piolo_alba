<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- for responsive on mobile (scales correctly). -->
  <title>Add Student</title>
</head>

<style>
  /* Create Student Form Specific Styles */

.form-card {
  max-width: 420px;
  margin: 2rem auto;
  background: var(--bg-secondary);
  border-radius: 12px;
  border: 1px solid var(--border-primary);
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  overflow: hidden;
}

.form-header {
  padding: 1.5rem 1.5rem 1rem;
  text-align: center;
  border-bottom: 1px solid var(--border-primary);
}

.form-title {
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 0.5rem;
}

.form-subtitle {
  color: var(--text-muted);
  font-size: 0.875rem;
}

.student-form {
  padding: 1.5rem;
}

.form-group {
  margin-bottom: 1rem;
}

.form-label {
  display: block;
  margin-bottom: 0.5rem;
  color: var(--text-secondary);
  font-weight: 500;
  font-size: 0.875rem;
}

.form-input {
  width: 100%;
  padding: 0.75rem;
  background: var(--bg-primary);
  border: 1px solid var(--border-secondary);
  border-radius: 8px;
  color: var(--text-primary);
  font-size: 0.875rem;
  transition: all 0.2s ease;
  outline: none;
  box-sizing: border-box;
}

.form-input::placeholder {
  color: var(--text-disabled);
}

.form-input:focus {
  border-color: var(--accent-one);
  box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
}

.form-actions {
  display: flex;
  gap: 0.75rem;
  margin-top: 1.5rem;
  padding-top: 1rem;
  border-top: 1px solid var(--border-primary);
}

.btn-submit {
  flex: 1;
  padding: 0.75rem 1rem;
  font-size: 0.875rem;
  font-weight: 600;
}

.form-actions .btn-secondary {
  padding: 0.75rem 1rem;
  font-size: 0.875rem;
  font-weight: 500;
}

@media (max-width: 640px) {
  .form-card {
    margin: 1rem;
    border-radius: 8px;
  }

  .form-header,
  .student-form {
    padding: 1rem;
  }

  .form-title {
    font-size: 1.25rem;
  }

  .form-actions {
    flex-direction: column;
  }
}

.form-input:invalid:not(:placeholder-shown) {
  border-color: var(--danger);
}

.form-input:valid:not(:placeholder-shown) {
  border-color: var(--success);
}

</style>

<body>
  <div class="main-container"> <!--  A wrapper for the whole page content. -->
    <div class="form-card"> <!--  A card-like container for the form (styled with CSS).  -->
      <div class="form-header">
        <h1 class="form-title">Add New Student</h1>
        <p class="form-subtitle">Enter student information below</p>
      </div>

      <form id="student-form" method="POST" class="student-form">
        action="/index.php/users/create"
        <!--id="student-form" → Unique identifier (useful for JavaScript validation later).
        method="POST" → Sends the form data via POST request (so data isn’t visible in the URL).
        class="student-form" → For CSS styling. -->
        <div class="form-group">
          <label for="first_name" class="form-label">First Name</label>
          <input type="text" id="first_name" name="first_name" class="form-input" placeholder="Enter first name"
            required>
        </div>

        <div class="form-group">
          <label for="last_name" class="form-label">Last Name</label>
          <input type="text" id="last_name" name="last_name" class="form-input" placeholder="Enter last name" required>
        </div>

        <div class="form-group">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" id="email" name="email" class="form-input" placeholder="Enter email address" required>
        </div>

        <div class="form-actions">
          <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-input" placeholder="Enter password"
              required>
          </div>
          <button type="submit" class="btn btn-primary btn-submit">
            Save Student
          </button>
          <a href="<?= base_url() ?>users" class="btn btn-secondary">
            Cancel
          </a>
        </div>
      </form>
    </div>
  </div>
</body>


</html>