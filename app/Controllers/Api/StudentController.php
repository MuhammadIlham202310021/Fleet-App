<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use CodeIgniter\RESTful\ResourceController;

class StudentController extends ResourceController
{
    protected $modelName = StudentModel::class;
    protected $format    = 'json';

    // Get /api/students
    public function index()
    {
        $students = $this->model->getStudentsWithDepartment()->findAll();
        return $this->respond($students, 200);
    }

    // Get /api/students/5
    public function show($id = null)
    {
        $student = $this->model->find($id);

        if (!$student) {
            return $this->failNotFound("Siswa dengan id $id tidak ditemukan");
        }

        return $this->respond($student, 200);
    }

    // POST /api/students -> Body payload JSON
    public function create()
    {
        // Ini bedanya dengan form web: payload dibaca sebagai JSON body, bukan getPost()
        $payload = $this->request->getJSON(true);

        if (!$this->model->save($payload)) {
            return $this->failValidationErrors($this->model->errors());
        }

        $newId = $this->model->getInsertID();

        return $this->respondCreated(
            $this->model->find($newId),
            'Siswa berhasil dibuat'
        );
    }

    // PUT/PATCH /api/students/5
    public function update($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound("Siswa dengan id $id tidak ditemukan");
        }

        $payload = $this->request->getJSON(true);

        if (!$this->model->update($id, $payload)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond($this->model->find($id), 200);
    }

    // DELETE /api/students/5
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound("Siswa dengan id $id tidak ditemukan");
        }

        $this->model->delete($id);
        return $this->respondDeleted(['id' => $id]);
    }
}