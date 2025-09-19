<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

/**
 * Model: StudentsModel
 * 
 * Automatically generated via CLI.
 */
class StudentsModel extends Model
{
    protected $table = 'lava_lust_test';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }


    protected $has_soft_delete = true;   //→ means when you delete a student, the record is not actually removed from the database.
    protected $soft_delete_column = 'deleted_at';   //UPDATE lava_lust_test SET deleted_at = '2025-08-26 13:45:00' WHERE id = 1;



        //PAGINATION 
        
        // COUNT ALL RECORDS (for pagination library)
        // public function count_all_records() {
        // $count_sql = "SELECT COUNT(id) as total FROM {$this->table} WHERE {$this->deleted} IS NULL";
        // $count_result = $this->db->raw($count_sql);
        // return $count_result ? $count_result->fetch(PDO::FETCH_ASSOC)['total'] : 0;
        // }

        // // GET RECORDS WITH PAGINATION (for pagination library)
        // public function get_records_with_pagination($limit_clause) {
        // $data_sql = "SELECT * FROM {$this->table} WHERE {$this->deleted} IS NULL ORDER BY id DESC {$limit_clause}";
        // $data_result = $this->db->raw($data_sql);
        // return $data_result ? $data_result->fetchAll(PDO::FETCH_ASSOC) : [];
        // }

        public function count_all_records($search = null)
    {
        $sql = "SELECT COUNT(id) AS total FROM {$this->table} WHERE {$this->soft_delete_column} IS NULL";
        $params = [];

        if ($search) {
            $sql .= " AND (first_name LIKE ? OR last_name LIKE ? OR email LIKE ?)";
            $params = ["%{$search}%", "%{$search}%", "%{$search}%"];
        }

        $row = $this->db->raw($sql, $params)->fetch(PDO::FETCH_ASSOC);
        return $row ? (int) $row['total'] : 0;
    }

    public function get_records_with_pagination($limit_clause, $search = null)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->soft_delete_column} IS NULL";
        $params = [];

        if ($search) {
            $sql .= " AND (first_name LIKE ? OR last_name LIKE ? OR email LIKE ?)";
            $params = ["%{$search}%", "%{$search}%", "%{$search}%"];
        }

        $sql .= " ORDER BY id ASC {$limit_clause}";
        return $this->db->raw($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }


}