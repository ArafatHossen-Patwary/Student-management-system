<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Student;
use App\Models\Teacher;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create Departments
        $cs = Department::create([
            'name' => 'Computer Science & Engineering',
            'code' => 'CSE',
            'description' => 'Department of Computer Science and Engineering',
            'status' => true,
        ]);

        $eee = Department::create([
            'name' => 'Electrical & Electronic Engineering',
            'code' => 'EEE',
            'description' => 'Department of Electrical and Electronic Engineering',
            'status' => true,
        ]);

        $bba = Department::create([
            'name' => 'Business Administration',
            'code' => 'BBA',
            'description' => 'Department of Business Administration',
            'status' => true,
        ]);

        // Create Teachers
        $t1 = Teacher::create([
            'name' => 'Dr. John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '+1234567890',
            'designation' => 'Professor',
            'department_id' => $cs->id,
        ]);

        $t2 = Teacher::create([
            'name' => 'Prof. Sarah Jenkins',
            'email' => 'sarah.j@example.com',
            'phone' => '+1987654321',
            'designation' => 'Associate Professor',
            'department_id' => $cs->id,
        ]);

        $t3 = Teacher::create([
            'name' => 'Dr. Alan Turing',
            'email' => 'alan.turing@example.com',
            'phone' => '+1122334455',
            'designation' => 'Senior Lecturer',
            'department_id' => $eee->id,
        ]);

        // Create Students
        Student::create([
            'student_id' => 'STU1001',
            'name' => 'Alice Smith',
            'email' => 'alice@example.com',
            'phone' => '+15550101',
            'gender' => 'female',
            'date_of_birth' => '2002-05-15',
            'address' => '123 Baker Street, London',
            'department_id' => $cs->id,
        ]);

        Student::create([
            'student_id' => 'STU1002',
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'phone' => '+15550102',
            'gender' => 'male',
            'date_of_birth' => '2001-09-20',
            'address' => '456 Elm Street, New York',
            'department_id' => $cs->id,
        ]);

        Student::create([
            'student_id' => 'STU1003',
            'name' => 'Charlie Brown',
            'email' => 'charlie@example.com',
            'phone' => '+15550103',
            'gender' => 'male',
            'date_of_birth' => '2003-01-10',
            'address' => '789 Pine Road, Boston',
            'department_id' => $eee->id,
        ]);
    }
}
