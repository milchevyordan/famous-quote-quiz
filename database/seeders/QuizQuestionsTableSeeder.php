<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuizQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quiz_questions')->delete();
        
        \DB::table('quiz_questions')->insert(array (
            0 => 
            array (
                'id' => 7,
                'question' => 'What does the acronym SQL stand for',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-25 13:00:16',
                'updated_at' => '2025-06-25 13:00:16',
            ),
            1 => 
            array (
                'id' => 12,
                'question' => 'The forEach method in JavaScript can be stopped using break or return',
                'is_binary' => 1,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-25 13:02:55',
                'updated_at' => '2025-06-25 13:02:55',
            ),
            2 => 
            array (
                'id' => 13,
                'question' => 'Which of these is NOT a JavaScript data type',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-25 13:03:25',
                'updated_at' => '2025-06-25 13:03:25',
            ),
            3 => 
            array (
                'id' => 14,
                'question' => 'In a relational database, every table must have a primary key.',
                'is_binary' => 1,
                'binary_correct_answer' => 1,
                'created_at' => '2025-06-25 13:03:36',
                'updated_at' => '2025-06-25 13:03:36',
            ),
            4 => 
            array (
                'id' => 15,
                'question' => 'Which HTTP method is used to update existing data?',
                'is_binary' => 0,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-25 13:04:02',
                'updated_at' => '2025-06-25 13:04:02',
            ),
            5 => 
            array (
                'id' => 16,
                'question' => 'An abstract class can be instantiated directly.',
                'is_binary' => 1,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-25 13:04:19',
                'updated_at' => '2025-06-25 13:04:19',
            ),
            6 => 
            array (
                'id' => 17,
                'question' => 'What is the result of typeof null in JavaScript?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-25 13:04:48',
                'updated_at' => '2025-06-25 13:04:48',
            ),
            7 => 
            array (
                'id' => 18,
                'question' => 'Which of the following is a NoSQL database',
                'is_binary' => 0,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-25 13:06:50',
                'updated_at' => '2025-06-25 13:06:50',
            ),
            8 => 
            array (
                'id' => 19,
                'question' => 'A compiled language always runs faster than an interpreted one.',
                'is_binary' => 1,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-25 13:07:03',
                'updated_at' => '2025-06-25 13:07:03',
            ),
            9 => 
            array (
                'id' => 20,
                'question' => 'What does the final keyword mean in Java?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-25 13:07:27',
                'updated_at' => '2025-06-25 13:07:27',
            ),
            10 => 
            array (
                'id' => 21,
                'question' => 'CSS Grid and Flexbox can be used together in a layout.',
                'is_binary' => 1,
                'binary_correct_answer' => 1,
                'created_at' => '2025-06-25 13:07:37',
                'updated_at' => '2025-06-25 13:07:37',
            ),
            11 => 
            array (
                'id' => 22,
                'question' => 'Which of these is NOT a valid HTTP status code?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-25 13:07:57',
                'updated_at' => '2025-06-25 13:07:57',
            ),
            12 => 
            array (
                'id' => 23,
                'question' => 'Docker containers share the host machine\'s kernel.',
                'is_binary' => 1,
                'binary_correct_answer' => 1,
                'created_at' => '2025-06-25 13:08:05',
                'updated_at' => '2025-06-25 13:08:05',
            ),
            13 => 
            array (
                'id' => 24,
                'question' => 'What is the purpose of git stash?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-25 13:08:28',
                'updated_at' => '2025-06-25 13:08:28',
            ),
            14 => 
            array (
                'id' => 25,
                'question' => 'HTML is a programming language.',
                'is_binary' => 1,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-25 13:08:41',
                'updated_at' => '2025-06-25 13:08:41',
            ),
            15 => 
            array (
                'id' => 26,
                'question' => 'Which of the following is responsible for defining the structure of a web page',
                'is_binary' => 0,
                'binary_correct_answer' => 1,
                'created_at' => '2025-06-25 13:09:55',
                'updated_at' => '2025-06-25 13:09:55',
            ),
            16 => 
            array (
                'id' => 27,
                'question' => 'In Java, the default value of an uninitialized boolean variable is true.',
                'is_binary' => 1,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-25 13:10:03',
                'updated_at' => '2025-06-25 13:10:03',
            ),
            17 => 
            array (
                'id' => 28,
                'question' => 'In CSS, position: absolute positions the element relative to the nearest positioned ancestor.',
                'is_binary' => 1,
                'binary_correct_answer' => 1,
                'created_at' => '2025-06-25 13:10:15',
                'updated_at' => '2025-06-25 13:10:15',
            ),
            18 => 
            array (
                'id' => 29,
            'question' => 'Which of the following HTTP methods is idempotent (safe to call multiple times)?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-25 13:11:06',
                'updated_at' => '2025-06-25 13:11:06',
            ),
            19 => 
            array (
                'id' => 30,
                'question' => 'In CSS, position: absolute positions the element relative to the nearest positioned ancestor.',
                'is_binary' => 1,
                'binary_correct_answer' => 1,
                'created_at' => '2025-06-25 13:11:18',
                'updated_at' => '2025-06-25 13:11:18',
            ),
            20 => 
            array (
                'id' => 31,
                'question' => 'Which sorting algorithm has the best average-case performance?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-25 13:11:39',
                'updated_at' => '2025-06-25 13:11:39',
            ),
            21 => 
            array (
                'id' => 32,
                'question' => 'The null keyword in JavaScript is the same as undefined.',
                'is_binary' => 1,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-25 13:11:46',
                'updated_at' => '2025-06-25 13:11:46',
            ),
            22 => 
            array (
                'id' => 33,
                'question' => 'Which database command is used to remove all records from a table but keep the structure?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-25 13:12:11',
                'updated_at' => '2025-06-25 13:12:11',
            ),
            23 => 
            array (
                'id' => 34,
                'question' => 'The static keyword in many languages means that a variable or method belongs to the class rather than instances.',
                'is_binary' => 1,
                'binary_correct_answer' => 1,
                'created_at' => '2025-06-25 13:12:19',
                'updated_at' => '2025-06-25 13:12:19',
            ),
            24 => 
            array (
                'id' => 35,
                'question' => 'Does the HTTP protocol maintain a persistent connection between requests by default?',
                'is_binary' => 1,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-26 16:03:45',
                'updated_at' => '2025-06-26 16:03:45',
            ),
            25 => 
            array (
                'id' => 36,
                'question' => 'Is SQL used for structuring the design of a database schema?',
                'is_binary' => 1,
                'binary_correct_answer' => 1,
                'created_at' => '2025-06-26 16:03:54',
                'updated_at' => '2025-06-26 16:03:54',
            ),
            26 => 
            array (
                'id' => 37,
                'question' => 'Can an abstract class in Java be instantiated directly?',
                'is_binary' => 1,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-26 16:04:02',
                'updated_at' => '2025-06-26 16:04:02',
            ),
            27 => 
            array (
                'id' => 38,
                'question' => 'Is CSS case-sensitive when it comes to property names?',
                'is_binary' => 1,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-26 16:04:11',
                'updated_at' => '2025-06-26 16:04:11',
            ),
            28 => 
            array (
                'id' => 39,
                'question' => 'Which of the following is NOT part of the SOLID principles?',
                'is_binary' => 0,
                'binary_correct_answer' => 1,
                'created_at' => '2025-06-26 16:04:38',
                'updated_at' => '2025-06-26 16:04:38',
            ),
            29 => 
            array (
                'id' => 40,
                'question' => 'In Git, which command is used to upload local commits to a remote repository?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-26 16:05:01',
                'updated_at' => '2025-06-26 16:05:01',
            ),
            30 => 
            array (
                'id' => 41,
                'question' => 'Which of these languages runs in the browser and is used to add interactivity to web pages?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-26 16:05:27',
                'updated_at' => '2025-06-26 16:05:27',
            ),
            31 => 
            array (
                'id' => 42,
                'question' => 'Does RESTful API design require that every response be in JSON format?',
                'is_binary' => 1,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-26 16:05:52',
                'updated_at' => '2025-06-26 16:05:52',
            ),
            32 => 
            array (
                'id' => 43,
            'question' => 'Is encapsulation a key principle of Object-Oriented Programming (OOP)?',
                'is_binary' => 1,
                'binary_correct_answer' => 1,
                'created_at' => '2025-06-26 16:06:00',
                'updated_at' => '2025-06-26 16:06:00',
            ),
            33 => 
            array (
                'id' => 44,
                'question' => 'Is TCP a connectionless protocol?',
                'is_binary' => 1,
                'binary_correct_answer' => 0,
                'created_at' => '2025-06-26 16:06:13',
                'updated_at' => '2025-06-26 16:06:13',
            ),
            34 => 
            array (
                'id' => 45,
                'question' => 'Can a CSS class be applied to multiple HTML elements?',
                'is_binary' => 1,
                'binary_correct_answer' => 1,
                'created_at' => '2025-06-26 16:06:23',
                'updated_at' => '2025-06-26 16:06:23',
            ),
            35 => 
            array (
                'id' => 46,
                'question' => 'Which HTTP status code indicates that the requested resource was not found?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-26 16:06:48',
                'updated_at' => '2025-06-26 16:06:48',
            ),
            36 => 
            array (
                'id' => 47,
                'question' => 'What does SQL’s JOIN operation do?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-26 16:07:12',
                'updated_at' => '2025-06-26 16:07:12',
            ),
            37 => 
            array (
                'id' => 48,
                'question' => 'Which of these is a front-end JavaScript framework/library?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-26 16:07:34',
                'updated_at' => '2025-06-26 16:07:34',
            ),
            38 => 
            array (
                'id' => 49,
                'question' => 'Which version control system is distributed rather than centralized?',
                'is_binary' => 0,
                'binary_correct_answer' => NULL,
                'created_at' => '2025-06-26 16:07:57',
                'updated_at' => '2025-06-26 16:07:57',
            ),
        ));
        
        
    }
}