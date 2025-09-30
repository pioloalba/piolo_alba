<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: AuthController
 * 
 * Automatically generated via CLI.
 */
class AuthController extends Controller {
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    public function __construct()
    {
        parent::__construct();
        $this->call->library('session');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate input
            if (empty($email) || empty($password)) {
                $error = "Email and password are required.";
                $this->call->view('login', ['error' => $error]);
                return;
            }

            // Check credentials
            $this->call->model('StudentsModel');
            $user = $this->StudentsModel->findByEmail($email);

            if ($user && $password === $user['password']) {
                // Set session variables using LavaLust session library
                $this->session->set_userdata([
                    'user_id' => $user['id'],
                    'user_email' => $user['email'],
                    'logged_in' => TRUE
                ]);
                redirect('users/get-all'); // Redirect to a protected page
            } else {
                $error = "Invalid email or password.";
                $this->call->view('login', ['error' => $error]);
            }
        } else {
            // Show login form
            $this->call->view('login');
        }
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
            $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

            // Validate input
            if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
                $error = "All fields are required.";
                $this->call->view('register', ['error' => $error]);
                return;
            }

            if ($password !== $confirm_password) {
                $error = "Passwords do not match.";
                $this->call->view('register', ['error' => $error]);
                return;
            }

            // Check if user already exists
            $this->call->model('StudentsModel');
            if ($this->StudentsModel->findByEmail($email)) {
                $error = "Email is already registered.";
                $this->call->view('register', ['error' => $error]);
                return;
            }

            // Create new user (store password as plain text)
            $this->StudentsModel->insert([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $password
            ]);

            redirect('login'); // Redirect to login page after successful registration
        } else {
            // Show registration form
            $this->call->view('register');
        }
    }
}