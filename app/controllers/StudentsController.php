<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentsController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('StudentsModel');
        $this->call->library('pagination');
        // Set custom theme and CSS classes
        $this->pagination->set_theme('custom');
        $this->pagination->set_custom_classes([
            'nav'    => 'pagination-nav',
            'ul'     => 'pagination-list',
            'li'     => 'pagination-item',
            'a'      => 'pagination-link',
            'active' => 'active'
        ]);

        
        // Restrict access to logged-in users only
        if (!$this->session->has_userdata('user_id')) {
            $this->session->set_flashdata('error', 'You must log in to access this page.');
            redirect('login');
            exit;
        }
    }

    //get_all() → Fetch all students from DB → Pass data to ui/"filename.css" view.
    //create() → If form submitted → Save student to DB → Redirect.
    //→ Otherwise → Show the "create student" form.

    // function get_all() {
    //         $students = $this->StudentsModel->all();   
    //         $this->call->view('ui/get_all', ['students' => $students]); //Loads a view file located at ui/get_all
    //     }
     function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'last_name'  => $_POST['last_name'],
                'first_name' => $_POST['first_name'],
                'email'      => $_POST['email'],
                'password'   => $_POST['password']
            ];
            $this->StudentsModel->insert($data);
            redirect('users/get-all');
        }
        $this->call->view('ui/create');
    }


    function update($id) {
        $student = $this->StudentsModel->find($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'last_name'  => $_POST['last_name'],
                'first_name' => $_POST['first_name'],
                'email'      => $_POST['email']
            ];
            if (!empty($_POST['password'])) {
                $data['password'] = $_POST['password'];
            }
            $this->StudentsModel->update($id, $data);
            redirect('users');
        }
        $this->call->view('ui/update', ['student' => $student]);
    }


    function delete($id) {
         $this->StudentsModel->soft_delete($id);
         redirect('users');
    }

    //PAGINATION
    public function get_all($page = 1) {
        try {
        // Get items per page from query parameter or use default
        $per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 10;
        
        // Validate per_page values
        $allowed_per_page = [10, 25, 50, 100];
        if (!in_array($per_page, $allowed_per_page)) {
            $per_page = 10;
        }
        

        $search = isset($_GET['search']) ? trim($_GET['search']) : null;
        $total_rows = $this->StudentsModel->count_all_records($search);
        // Get total count for pagination
        
        // Initialize pagination
        $pagination_data = $this->pagination->initialize(
            $total_rows,        // Total number of rows
            $per_page,          // Rows per page
            $page,              // Current page number
            '/users/get-all', // Base URL (change this to your route)
            5                   // Number of page links to show
        );
        
        // Get records for current page
        $data['records'] = $this->StudentsModel->get_records_with_pagination($pagination_data['limit'],$search);
        $data['total_records'] = $total_rows;
        $data['pagination_data'] = $pagination_data;
        $data['pagination_links'] = $this->pagination->paginate();
        
       $this->call->view('ui/get_all', $data); //Loads a view file located at ui/get_all
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Failed to load records: ' . $e->getMessage());
            redirect('/users/get-all');
        }

    }

}
