<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuizAnswersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quiz_answers')->delete();
        
        \DB::table('quiz_answers')->insert(array (
            0 => 
            array (
                'id' => 4,
                'quiz_question_id' => 7,
                'is_correct' => 0,
                'answer' => 'Structured Question Language',
                'created_at' => '2025-06-25 13:00:16',
                'updated_at' => '2025-06-25 13:00:16',
            ),
            1 => 
            array (
                'id' => 5,
                'quiz_question_id' => 7,
                'is_correct' => 0,
                'answer' => 'Simple Query Language',
                'created_at' => '2025-06-25 13:00:16',
                'updated_at' => '2025-06-25 13:00:16',
            ),
            2 => 
            array (
                'id' => 6,
                'quiz_question_id' => 7,
                'is_correct' => 1,
                'answer' => 'Structured Query Language',
                'created_at' => '2025-06-25 13:00:16',
                'updated_at' => '2025-06-25 13:00:16',
            ),
            3 => 
            array (
                'id' => 7,
                'quiz_question_id' => 13,
                'is_correct' => 0,
                'answer' => 'Boolean',
                'created_at' => '2025-06-25 13:03:25',
                'updated_at' => '2025-06-25 13:03:25',
            ),
            4 => 
            array (
                'id' => 8,
                'quiz_question_id' => 13,
                'is_correct' => 0,
                'answer' => 'Float',
                'created_at' => '2025-06-25 13:03:25',
                'updated_at' => '2025-06-25 13:03:25',
            ),
            5 => 
            array (
                'id' => 9,
                'quiz_question_id' => 13,
                'is_correct' => 1,
                'answer' => 'Undefined',
                'created_at' => '2025-06-25 13:03:25',
                'updated_at' => '2025-06-25 13:03:25',
            ),
            6 => 
            array (
                'id' => 10,
                'quiz_question_id' => 15,
                'is_correct' => 0,
                'answer' => 'GET',
                'created_at' => '2025-06-25 13:04:02',
                'updated_at' => '2025-06-25 13:04:02',
            ),
            7 => 
            array (
                'id' => 11,
                'quiz_question_id' => 15,
                'is_correct' => 1,
                'answer' => 'PUT',
                'created_at' => '2025-06-25 13:04:02',
                'updated_at' => '2025-06-25 13:04:02',
            ),
            8 => 
            array (
                'id' => 12,
                'quiz_question_id' => 15,
                'is_correct' => 0,
                'answer' => 'DELETE',
                'created_at' => '2025-06-25 13:04:02',
                'updated_at' => '2025-06-25 13:04:02',
            ),
            9 => 
            array (
                'id' => 13,
                'quiz_question_id' => 17,
                'is_correct' => 0,
                'answer' => '"null"',
                'created_at' => '2025-06-25 13:04:48',
                'updated_at' => '2025-06-25 13:04:48',
            ),
            10 => 
            array (
                'id' => 14,
                'quiz_question_id' => 17,
                'is_correct' => 1,
                'answer' => '"object"',
                'created_at' => '2025-06-25 13:04:48',
                'updated_at' => '2025-06-25 13:04:48',
            ),
            11 => 
            array (
                'id' => 15,
                'quiz_question_id' => 17,
                'is_correct' => 0,
                'answer' => '"undefined"',
                'created_at' => '2025-06-25 13:04:48',
                'updated_at' => '2025-06-25 13:04:48',
            ),
            12 => 
            array (
                'id' => 16,
                'quiz_question_id' => 18,
                'is_correct' => 0,
                'answer' => 'PostgreSQL',
                'created_at' => '2025-06-25 13:06:50',
                'updated_at' => '2025-06-25 13:06:50',
            ),
            13 => 
            array (
                'id' => 17,
                'quiz_question_id' => 18,
                'is_correct' => 1,
                'answer' => 'MongoDB',
                'created_at' => '2025-06-25 13:06:50',
                'updated_at' => '2025-06-25 13:06:50',
            ),
            14 => 
            array (
                'id' => 18,
                'quiz_question_id' => 18,
                'is_correct' => 0,
                'answer' => 'MySQL',
                'created_at' => '2025-06-25 13:06:50',
                'updated_at' => '2025-06-25 13:06:50',
            ),
            15 => 
            array (
                'id' => 19,
                'quiz_question_id' => 20,
                'is_correct' => 0,
                'answer' => 'The variable can be changed later',
                'created_at' => '2025-06-25 13:07:27',
                'updated_at' => '2025-06-25 13:07:27',
            ),
            16 => 
            array (
                'id' => 20,
                'quiz_question_id' => 20,
                'is_correct' => 0,
                'answer' => 'The method can be overridden',
                'created_at' => '2025-06-25 13:07:27',
                'updated_at' => '2025-06-25 13:07:27',
            ),
            17 => 
            array (
                'id' => 21,
                'quiz_question_id' => 20,
                'is_correct' => 1,
                'answer' => 'The value or method cannot be changed',
                'created_at' => '2025-06-25 13:07:27',
                'updated_at' => '2025-06-25 13:07:27',
            ),
            18 => 
            array (
                'id' => 22,
                'quiz_question_id' => 22,
                'is_correct' => 0,
                'answer' => '204',
                'created_at' => '2025-06-25 13:07:57',
                'updated_at' => '2025-06-25 13:07:57',
            ),
            19 => 
            array (
                'id' => 23,
                'quiz_question_id' => 22,
                'is_correct' => 0,
                'answer' => '302',
                'created_at' => '2025-06-25 13:07:57',
                'updated_at' => '2025-06-25 13:07:57',
            ),
            20 => 
            array (
                'id' => 24,
                'quiz_question_id' => 22,
                'is_correct' => 1,
                'answer' => '699',
                'created_at' => '2025-06-25 13:07:57',
                'updated_at' => '2025-06-25 13:07:57',
            ),
            21 => 
            array (
                'id' => 25,
                'quiz_question_id' => 24,
                'is_correct' => 0,
                'answer' => 'To delete a commit',
                'created_at' => '2025-06-25 13:08:28',
                'updated_at' => '2025-06-25 13:08:28',
            ),
            22 => 
            array (
                'id' => 26,
                'quiz_question_id' => 24,
                'is_correct' => 1,
                'answer' => 'To save uncommitted changes temporarily',
                'created_at' => '2025-06-25 13:08:28',
                'updated_at' => '2025-06-25 13:08:28',
            ),
            23 => 
            array (
                'id' => 27,
                'quiz_question_id' => 24,
                'is_correct' => 0,
                'answer' => 'To rollback the last commit',
                'created_at' => '2025-06-25 13:08:28',
                'updated_at' => '2025-06-25 13:08:28',
            ),
            24 => 
            array (
                'id' => 28,
                'quiz_question_id' => 26,
                'is_correct' => 0,
                'answer' => 'CSS',
                'created_at' => '2025-06-25 13:09:55',
                'updated_at' => '2025-06-25 13:09:55',
            ),
            25 => 
            array (
                'id' => 29,
                'quiz_question_id' => 26,
                'is_correct' => 1,
                'answer' => 'HTML',
                'created_at' => '2025-06-25 13:09:55',
                'updated_at' => '2025-06-25 13:09:55',
            ),
            26 => 
            array (
                'id' => 30,
                'quiz_question_id' => 26,
                'is_correct' => 0,
                'answer' => 'JavaScript',
                'created_at' => '2025-06-25 13:09:55',
                'updated_at' => '2025-06-25 13:09:55',
            ),
            27 => 
            array (
                'id' => 31,
                'quiz_question_id' => 29,
                'is_correct' => 0,
                'answer' => 'POST',
                'created_at' => '2025-06-25 13:11:06',
                'updated_at' => '2025-06-25 13:11:06',
            ),
            28 => 
            array (
                'id' => 32,
                'quiz_question_id' => 29,
                'is_correct' => 1,
                'answer' => 'PUT',
                'created_at' => '2025-06-25 13:11:06',
                'updated_at' => '2025-06-25 13:11:06',
            ),
            29 => 
            array (
                'id' => 33,
                'quiz_question_id' => 29,
                'is_correct' => 0,
                'answer' => 'PATCH',
                'created_at' => '2025-06-25 13:11:06',
                'updated_at' => '2025-06-25 13:11:06',
            ),
            30 => 
            array (
                'id' => 34,
                'quiz_question_id' => 31,
                'is_correct' => 0,
                'answer' => 'Bubble sort',
                'created_at' => '2025-06-25 13:11:39',
                'updated_at' => '2025-06-25 13:11:39',
            ),
            31 => 
            array (
                'id' => 35,
                'quiz_question_id' => 31,
                'is_correct' => 0,
                'answer' => 'Insertion sort',
                'created_at' => '2025-06-25 13:11:39',
                'updated_at' => '2025-06-25 13:11:39',
            ),
            32 => 
            array (
                'id' => 36,
                'quiz_question_id' => 31,
                'is_correct' => 1,
                'answer' => 'Merge sort',
                'created_at' => '2025-06-25 13:11:39',
                'updated_at' => '2025-06-25 13:11:39',
            ),
            33 => 
            array (
                'id' => 37,
                'quiz_question_id' => 33,
                'is_correct' => 0,
                'answer' => 'DELETE',
                'created_at' => '2025-06-25 13:12:11',
                'updated_at' => '2025-06-25 13:12:11',
            ),
            34 => 
            array (
                'id' => 38,
                'quiz_question_id' => 33,
                'is_correct' => 0,
                'answer' => 'DROP',
                'created_at' => '2025-06-25 13:12:11',
                'updated_at' => '2025-06-25 13:12:11',
            ),
            35 => 
            array (
                'id' => 39,
                'quiz_question_id' => 33,
                'is_correct' => 1,
                'answer' => 'TRUNCATE',
                'created_at' => '2025-06-25 13:12:11',
                'updated_at' => '2025-06-25 13:12:11',
            ),
            36 => 
            array (
                'id' => 40,
                'quiz_question_id' => 39,
                'is_correct' => 0,
                'answer' => 'Single Responsibility Principle',
                'created_at' => '2025-06-26 16:04:38',
                'updated_at' => '2025-06-26 16:04:38',
            ),
            37 => 
            array (
                'id' => 41,
                'quiz_question_id' => 39,
                'is_correct' => 0,
                'answer' => 'Open/Closed Principle',
                'created_at' => '2025-06-26 16:04:38',
                'updated_at' => '2025-06-26 16:04:38',
            ),
            38 => 
            array (
                'id' => 42,
                'quiz_question_id' => 39,
                'is_correct' => 1,
                'answer' => 'Secure Encapsulation Principle',
                'created_at' => '2025-06-26 16:04:38',
                'updated_at' => '2025-06-26 16:04:38',
            ),
            39 => 
            array (
                'id' => 43,
                'quiz_question_id' => 40,
                'is_correct' => 0,
                'answer' => 'git pull',
                'created_at' => '2025-06-26 16:05:01',
                'updated_at' => '2025-06-26 16:05:01',
            ),
            40 => 
            array (
                'id' => 44,
                'quiz_question_id' => 40,
                'is_correct' => 1,
                'answer' => 'git push',
                'created_at' => '2025-06-26 16:05:01',
                'updated_at' => '2025-06-26 16:05:01',
            ),
            41 => 
            array (
                'id' => 45,
                'quiz_question_id' => 40,
                'is_correct' => 0,
                'answer' => 'git clone',
                'created_at' => '2025-06-26 16:05:01',
                'updated_at' => '2025-06-26 16:05:01',
            ),
            42 => 
            array (
                'id' => 46,
                'quiz_question_id' => 41,
                'is_correct' => 0,
                'answer' => 'HTML',
                'created_at' => '2025-06-26 16:05:27',
                'updated_at' => '2025-06-26 16:05:27',
            ),
            43 => 
            array (
                'id' => 47,
                'quiz_question_id' => 41,
                'is_correct' => 1,
                'answer' => 'JavaScript',
                'created_at' => '2025-06-26 16:05:27',
                'updated_at' => '2025-06-26 16:05:27',
            ),
            44 => 
            array (
                'id' => 48,
                'quiz_question_id' => 41,
                'is_correct' => 0,
                'answer' => 'PHP',
                'created_at' => '2025-06-26 16:05:27',
                'updated_at' => '2025-06-26 16:05:27',
            ),
            45 => 
            array (
                'id' => 49,
                'quiz_question_id' => 46,
                'is_correct' => 0,
                'answer' => '200',
                'created_at' => '2025-06-26 16:06:48',
                'updated_at' => '2025-06-26 16:06:48',
            ),
            46 => 
            array (
                'id' => 50,
                'quiz_question_id' => 46,
                'is_correct' => 1,
                'answer' => '404',
                'created_at' => '2025-06-26 16:06:48',
                'updated_at' => '2025-06-26 16:06:48',
            ),
            47 => 
            array (
                'id' => 51,
                'quiz_question_id' => 46,
                'is_correct' => 0,
                'answer' => '500',
                'created_at' => '2025-06-26 16:06:48',
                'updated_at' => '2025-06-26 16:06:48',
            ),
            48 => 
            array (
                'id' => 52,
                'quiz_question_id' => 47,
                'is_correct' => 0,
                'answer' => 'Deletes data from tables',
                'created_at' => '2025-06-26 16:07:12',
                'updated_at' => '2025-06-26 16:07:12',
            ),
            49 => 
            array (
                'id' => 53,
                'quiz_question_id' => 47,
                'is_correct' => 1,
                'answer' => 'Combines rows from two or more tables based on a related column',
                'created_at' => '2025-06-26 16:07:12',
                'updated_at' => '2025-06-26 16:07:12',
            ),
            50 => 
            array (
                'id' => 54,
                'quiz_question_id' => 47,
                'is_correct' => 0,
                'answer' => 'Creates a new database',
                'created_at' => '2025-06-26 16:07:12',
                'updated_at' => '2025-06-26 16:07:12',
            ),
            51 => 
            array (
                'id' => 55,
                'quiz_question_id' => 48,
                'is_correct' => 0,
                'answer' => 'Laravel',
                'created_at' => '2025-06-26 16:07:34',
                'updated_at' => '2025-06-26 16:07:34',
            ),
            52 => 
            array (
                'id' => 56,
                'quiz_question_id' => 48,
                'is_correct' => 1,
                'answer' => 'React',
                'created_at' => '2025-06-26 16:07:34',
                'updated_at' => '2025-06-26 16:07:34',
            ),
            53 => 
            array (
                'id' => 57,
                'quiz_question_id' => 48,
                'is_correct' => 0,
                'answer' => 'Django',
                'created_at' => '2025-06-26 16:07:34',
                'updated_at' => '2025-06-26 16:07:34',
            ),
            54 => 
            array (
                'id' => 58,
                'quiz_question_id' => 49,
                'is_correct' => 1,
                'answer' => 'Git',
                'created_at' => '2025-06-26 16:07:57',
                'updated_at' => '2025-06-26 16:07:57',
            ),
            55 => 
            array (
                'id' => 59,
                'quiz_question_id' => 49,
                'is_correct' => 0,
            'answer' => 'Subversion (SVN)',
                'created_at' => '2025-06-26 16:07:57',
                'updated_at' => '2025-06-26 16:07:57',
            ),
            56 => 
            array (
                'id' => 60,
                'quiz_question_id' => 49,
                'is_correct' => 0,
                'answer' => 'CVS',
                'created_at' => '2025-06-26 16:07:57',
                'updated_at' => '2025-06-26 16:07:57',
            ),
        ));
        
        
    }
}