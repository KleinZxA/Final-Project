<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;
class newModel extends Model {
    protected $db;
    protected $table = 'students';
    protected $allowedFields = [
        'stud_fname',
        'stud_lname',
        'idstudents',
        'stud_yearlvl',
        'stud_course'

    ];
    public function initialize() {

        $query = $this->db->query('SELECT
        idstudents,
        stud_fname,
        stud_lname,
        stud_course
        FROM students');

        return $query->getResult();
    }
    public function save_Student($data){
        $query = $this ->db->prepare(static function ($db) {
            $sql = 'INSERT INTO students (stud_fname, stud_course, stud_course) VALUES (?, ?, ?)';
            return (new Query($db))->setQuery($sql);
        });

        $query->execute($data['name'], $data['department'], $data['course']);
        $query->close();

        return;
    }

    public function delete_student($id){
        $query = $this ->db->prepare(static function ($db) {
            $sql = 'DELETE FROM students WHERE idstudents = ?';
        
            return (new Query($db))->setQuery($sql);
        });
        $query->execute($id);
        $query->close();

        return;
    }

    public function get($id){
        $query = $this ->db->query('SELECT * FROM students WHERE idstudents = '.$id);
        $result = $query->getRow();
        return $result;
    }

    public function edit($data){
        $query = $this ->db->prepare(static function ($db) {
            $sql = 'UPDATE students SET stud_fname = ?, stud_course = ?, stud_course = ? WHERE idstudents = ?';
            return (new Query($db))->setQuery($sql);
        });

        $query->execute($data['name'], $data['department'], $data['course'], $data['id']);
        $query->close();
        return;
    }
}

#functions: initialize(), save(), delete(), edit()