<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
</head>

<body style="background-image: url('https://static.vecteezy.com/system/resources/previews/002/058/343/large_2x/abstract-technology-pixel-background-design-free-vector.jpg'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; min-height: 100vh;">

<style>
  /* Update Student Form Specific Styles */

  #update-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
  }

  #update-card {
    width: 100%;
    max-width: 420px;
    background: var(--bg-secondary);
    border: 1px solid var(--border-primary);
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    overflow: hidden;
  }

  #update-header {
    background: var(--bg-secondary);
    padding: 1.5rem 1.5rem 1rem;
    text-align: center;
    border-bottom: 1px solid var(--border-primary);
  }

  #update-header h2 {
    color: var(--text-primary);
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0;
  }

  #update-student-form {
    padding: 1.5rem;
  }

  .form-group {
    margin-bottom: 1rem;
  }

  .form-group label {
    display: block;
    color: var(--text-secondary);
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
  }

  .form-group input {
    width: 100%;
    padding: 0.75rem;
    background: var(--bg-primary);
    border: 1px solid var(--border-secondary);
    border-radius: 8px;
    color: var(--text-primary);
    font-size: 0.875rem;
    transition: all 0.2s ease;
    box-sizing: border-box;
  }

  .form-group input:focus {
    outline: none;
    border-color: var(--accent-one);
    box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
  }

  .form-group input::placeholder {
    color: var(--text-disabled);
  }

  .form-actions {
    display: flex;
    gap: 0.75rem;
    margin-top: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid var(--border-primary);
  }

  #update-submit-btn {
    flex: 1;
    padding: 0.75rem 1rem;
    font-size: 0.875rem;
    font-weight: 600;
    background: var(--accent-one);
    border: none;
    color: white;
    border-radius: 8px;
    transition: all 0.2s ease;
    cursor: pointer;
  }

  #update-submit-btn:hover {
    background: var(--accent-one-dark);
  }

  #back-from-update {
    padding: 0.75rem 1rem;
    background: var(--bg-tertiary);
    border: 1px solid var(--border-secondary);
    color: var(--text-secondary);
    font-weight: 500;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    transition: all 0.2s ease;
    font-size: 0.875rem;
  }

  #back-from-update:hover {
    background: var(--bg-elevated);
    border-color: var(--border-accent);
    color: var(--text-primary);
  }

  .form-group input:invalid:not(:focus):not(:placeholder-shown) {
    border-color: var(--danger);
  }

  .form-group input:valid:not(:focus):not(:placeholder-shown) {
    border-color: var(--success);
  }

  @media (max-width: 640px) {
    #update-container {
      padding: 1rem;
    }

    #update-card {
      margin: 0;
    }

    #update-header h2 {
      font-size: 1.25rem;
    }

    .form-actions {
      flex-direction: column;
    }
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
    background-image: url('https://static.vecteezy.com/system/resources/previews/002/058/343/large_2x/abstract-technology-pixel-background-design-free-vector.jpg');
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
  <div id="update-container" class="container">
    <div id="update-card" class="card">
      <header id="update-header" class="header">

        <!-- Updated title to match original request -->
        <h2>Edit Student</h2>
      </header>

      <form id="update-student-form" method="POST">
        <div class="form-group">
          <label for="update-first-name">First Name</label>
          <input type="text" id="update-first-name" name="first_name" value="<?= $student['first_name'] ?>"
            placeholder="Enter first name" required>
        </div>

        <div class="form-group">
          <label for="update-last-name">Last Name</label>
          <input type="text" id="update-last-name" name="last_name" value="<?= $student['last_name'] ?>"
            placeholder="Enter last name" required>
        </div>

        <div class="form-group">
          <label for="update-email">Email Address</label>
          <input type="email" id="update-email" name="email" value="<?= $student['email'] ?>"
            placeholder="Enter email address" required>
        </div>

        <div class="form-actions">
          <button type="submit" id="update-submit-btn" class="btn-primary">
            <span class="btn-text">Update Student</span>
            <div class="form-group">
              <label for="update-password">Password</label>
              <input type="password" id="update-password" name="password" value=""
                placeholder="Enter new password (leave blank to keep current)">
            </div>
            <span class="btn-loading">Updating...</span>
          </button>
          <a id="back-from-update" class="btn-secondary" href="<?= base_url() ?>users">
            Back to Students
          </a>
        </div>
      </form>
    </div>
  </div>
</body>



</html>